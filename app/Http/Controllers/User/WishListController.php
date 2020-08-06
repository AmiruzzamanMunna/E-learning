<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\WishList;
use App\Cart;
use DB;

class WishListController extends Controller
{
    public function wishListIndex(Request $request)
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

        return view('User.wishlist')
                
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }

    public function wishListItem(Request $request)
    {
        $wishlist=WishList::where('wishlist_user_id',$request->session()->get('loggedUser'))
                    ->leftjoin('tbl_course','tbl_course.course_id','tbl_wishlist.wishlist_course_id')
                    ->get();

        if(count($wishlist)>0){

            foreach($wishlist as $item){

                $dataArray[]=[
    
                    'wishlist_id'=>$item->wishlist_id,
                    'course_id'=>$item->course_id,
                    'course_name'=>$item->course_name,
                    'course_image'=>asset('assets/images/Course/'.$item->course_image),
                    'course_authorname'=>$item->course_authorname,
                    'course_price'=>$item->course_price,
                ];
            }
    
            return response()->json(array('status'=>'Success','data'=>$dataArray));

        }else{

            return response()->json(array('status'=>'Success','data'=>$dataArray=[]));

        }

    }
    public function wishListAdd(Request $request)
    {
        if($request->session()->get('loggedUser')){

            $data= new WishList();
            $data->wishlist_user_id=$request->session()->get('loggedUser');
            $data->wishlist_course_id=$request->course_id;
            $data->save();
            return response()->json(array('status'=>'success'));

        }else{

            return response()->json(array('status'=>'login'));

        }
        
    }
    public function wishToCart(Request $request)
    {
        $course_id=$request->course_id;
        $coursePrice=Course::where('course_id',$course_id)->first();
        $data=new Cart();
        $data->cart_user_id=$request->session()->get('loggedUser');
        $data->cart_course_id=$course_id;
        $data->cart_course_price=$coursePrice->course_price;
        $data->save();

        $wishlist=WishList::where('wishlist_user_id',$request->session()->get('loggedUser'))
                            ->where('wishlist_course_id',$course_id)
                            ->delete();

        return response()->json(array('status'=>'success'));
    }
    public function wishListRemove(Request $request)
    {
        $wishlist=WishList::where('wishlist_user_id',$request->session()->get('loggedUser'))
                            ->where('wishlist_id',$request->id)
                            ->delete();

        return response()->json(array('status'=>'remove'));
    }
}
