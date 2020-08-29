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
use App\Ratings;
use App\HomePage;
use App\Menues;
use DB;

class RatingsController extends Controller
{
    public function getRatings(Request $request)
    {
        $course_id=$request->course_id;
        $data=Ratings::where('ratings_user_id',$request->session()->get('loggedUser'))
                        ->where('ratings_course_id',$course_id)
                        ->first();
        if($data){

            return response()->json(array('status'=>'got','data'=>$data));

        }else{

            return response()->json(array('status'=>'notfound'));

        }
    }
    public function ratingsInsert(Request $request)
    {
        $ratings=$request->ratings;
        $course_id=$request->course_id;
        $comments=$request->comments;
        $dataCheck=Ratings::where('ratings_user_id',$request->session()->get('loggedUser'))
                        ->where('ratings_course_id',$course_id)
                        ->first();

        if($dataCheck){

            
            $data=Ratings::where('ratings_user_id',$request->session()->get('loggedUser'))->where('ratings_course_id',$course_id)->first();
            $data->ratings_rate=$ratings;
            $data->ratings_comments=$comments;
            $data->save();
            return response()->json(array('status'=>'success'));

        }else{

            
            $data=new Ratings();
            $data->ratings_user_id=$request->session()->get('loggedUser');
            $data->ratings_course_id=$course_id;
            $data->ratings_rate=$ratings;
            $data->ratings_comments=$comments;
            $data->save();
            return response()->json(array('status'=>'success'));

        }
        
    }
}
