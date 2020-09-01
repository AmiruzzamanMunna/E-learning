<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\Cart;
use App\WishList;
use App\Coupon;
use App\CourseOrder;
use App\UserList;
use App\HomePage;
use App\Menues;
use App\Payment;
use DB;
use Stripe;

class CheckOutController extends Controller
{
    public function checkOutIndex(Request $request)
    {
        $category=CourseCategory::where('course_category_parent_id',0)->get();
        $subCategory=DB::select("

        SELECT 
            subCategory.course_category_id,
            tbl_course_category.course_category_name as parentCategory,
            subCategory.course_category_name,
            subCategory.course_category_parent_id
        FROM
            tbl_course_category
                LEFT JOIN
            tbl_course_category AS subCategory ON subCategory.course_category_parent_id = tbl_course_category.course_category_id
        WHERE
            subCategory.course_category_parent_id != 0
        ");
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.checkout')
                ->with('homePage',$homePage)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('user',$user)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function courseOrder(Request $request)
    {
        $course_id=$request->course_id;
        $course_price=$request->course_price;
       

        foreach($course_id as $key=>$val){

            $data=new CourseOrder();
            $data->order_user_id=$request->session()->get('loggedUser');
            $data->order_course_id=$course_id[$key];
            $data->order_amount=$course_price[$key];
            $data->order_date=date('Y-m-d');
            $data->order_status=0;
            $data->save();
        }

        $payment= new Payment();
        $payment->user_id=$request->session()->get('loggedUser');
        $payment->amount=array_sum($course_price);
        $payment->payment_status='given';
        $payment->currency='USD';
        $payment->save();

        Cart::where('cart_user_id',$request->session()->get('loggedUser'))->delete();

        return response()->json(array('status'=>'success'));
    }
}
