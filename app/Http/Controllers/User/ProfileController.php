<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserList;
use App\UserProfileLinks;
use App\CourseCategory;
use App\CourseOrder;
Use DB;

class ProfileController extends Controller
{
    public function userProfile(Request $request)
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
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))
                        ->first();

                        
        $links=UserProfileLinks::where('user_profilelinks_user_id',$request->session()->get('loggedUser'))
                                ->get();
        return view('User.profile')
                ->with('category',$category)
                ->with('subCategory',$subCategory)
                ->with('links',$links)
                ->with('user',$user);
    }
    public function userProfileUpdate(Request $request)
    {
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))
                        ->update([

                            'signup_name'=>$request->name,
                            'signup_professional_tag'=>$request->ptag,
                            'signup_professionalbio'=>$request->pbio,
                            'signup_wblinks'=>$request->weblink,
                            'signup_fblinks'=>$request->fblink,
                            'signup_ttlinks'=>$request->twlink,
                        ]);


        if(!empty($request->links)){

            $links=$request->links;

            foreach($links as $key=>$val){

                $data = new UserProfileLinks();
                $data->user_profilelinks_user_id=$request->session()->get('loggedUser');
                $data->user_profilelinks_link=$links[$key];
                $data->save();
            }
        }
        if($request->uplinksid){

            $uplinksid=$request->uplinksid;
            $uplinks=$request->uplinks;

            foreach($uplinksid as $key=>$val){

                $data = UserProfileLinks::where('user_profilelinks_user_id',$request->session()->get('loggedUser'))
                                            ->where('user_profilelinks_id',$uplinksid[$key])->update(['user_profilelinks_link'=>$uplinks[$key]]);
            }
        }



        return response()->json(array('status'=>'success'));
    }

    public function deleteUserLinks(Request $request)
    {
        $data=UserProfileLinks::where('user_profilelinks_user_id',$request->session()->get('loggedUser'))
                                ->where('user_profilelinks_id',$request->id)
                                ->delete();

        return response()->json(array('status'=>'success'));

    }
    public function enrollHistory(Request $request)
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
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))
                        ->first();

        $data=CourseOrder::where('order_user_id',$request->session()->get('loggedUser'))
                        ->leftjoin('tbl_course','tbl_course.course_id','tbl_order.order_course_id')
                        ->where('order_status',1)
                        ->paginate(10);
                    
        return view('User.enrollhistory')
                ->with('category',$category)
                ->with('subCategory',$subCategory)
                ->with('data',$data)
                ->with('user',$user);
    }
}
