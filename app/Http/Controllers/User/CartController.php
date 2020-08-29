<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\Cart;
use App\WishList;
use App\UserList;
use App\Coupon;
use App\HomePage;
use App\Menues;
use DB;

class CartController extends Controller
{
    public function cartIndex(Request $request)
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
        return view('User.cart')
                ->with('user',$user)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('homePage',$homePage)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function getCartItem(Request $request)
    {
        $cart=Cart::where('cart_user_id',$request->session()->get('loggedUser'))
                    ->leftjoin('tbl_course','tbl_course.course_id','tbl_cart.cart_course_id')
                    ->get();


        $total=0;

        
        if(count($cart)){

            foreach($cart as $item){

                $dataArray[]=[
    
                    'cart_id'=>$item->cart_id,
                    'course_id'=>$item->course_id,
                    'course_name'=>$item->course_name,
                    'course_image'=>asset('public/assets/images/Course/'.$item->course_image),
                    'course_authorname'=>$item->course_authorname,
                    'course_price'=>$item->cart_course_price,
                ];

                $total+=$item->cart_course_price;
            }
    
            return response()->json(array('status'=>'Success','data'=>$dataArray,'total'=>$total));

        }else{

            return response()->json(array('status'=>'Success','data'=>$dataArray=[]));

        }
    }

    public function cartAdd(Request $request)
    {
        if($request->session()->get('loggedUser')){

            $course_id=$request->course_id;
            $coursePrice=Course::where('course_id',$course_id)->first();
            $data=new Cart();
            $data->cart_user_id=$request->session()->get('loggedUser');
            $data->cart_course_id=$course_id;
            $data->cart_course_price=$coursePrice->course_price;
            $data->save();
            return response()->json(array('status'=>'success'));

        }else{

            return response()->json(array('status'=>'login'));

        }
        
    }
    public function cartRemove(Request $request)
    {
        $id=$request->id;
        $data=Cart::where('cart_user_id',$request->session()->get('loggedUser'))
                    ->where('cart_id',$id)
                    ->delete();
        return response()->json(array('status'=>'remove','id'=>$id));
    }
    public function cartToWishList(Request $request)
    {
        $course_id=$request->course_id;
        $coursePrice=Course::where('course_id',$course_id)->first();
        $data=new WishList();
        $data->wishlist_user_id=$request->session()->get('loggedUser');
        $data->wishlist_course_id=$course_id;
        $data->save();

        $cart=Cart::where('cart_user_id',$request->session()->get('loggedUser'))
                        ->where('cart_course_id',$course_id)
                        ->delete();

        return response()->json(array('status'=>'success'));
    }
    public function applyCoupon(Request $request)
    {
        $couponname=$request->couponname;
        $data=Cart::where('cart_user_id',$request->session()->get('loggedUser'))
                ->leftjoin('tbl_course','tbl_course.course_id','tbl_cart.cart_course_id')
                ->leftjoin('tbl_coupon','tbl_coupon.coupon_id','tbl_course.course_coupon_id')
                ->where('coupon_name',$couponname)
                ->get();

        $coupondate=date('Y-m-d');

        $coupon=Coupon::where('coupon_name',$couponname)
                        ->where('coupon_limit','>',0)
                        ->first();
        
        if($coupon){

            if($coupondate>=$coupon->coupon_start_date && $coupondate<=$coupon->coupon_end_date){

                foreach($data as $each_data){

                    $cart=Cart::where('cart_user_id',$request->session()->get('loggedUser'))
                                ->where('cart_course_id',$each_data->course_id)
                                ->update([

                                    'cart_course_price'=>$each_data->cart_course_price-$coupon->coupon_amount
                                ]);

                    Coupon::where('coupon_name',$couponname)
                                
                                ->update(['coupon_limit'=>($coupon->coupon_limit-1)]);
                }

                return response()->json(array('status'=>'success','data'=>$data));                

            }else{

                return response()->json(array('status'=>'expired'));

            }

            

        }else{

            return response()->json(array('status'=>'Invalid','data'=>$coupondate,'couponname'=>$couponname));

        }
        
        
    }
}
