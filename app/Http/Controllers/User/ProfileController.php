<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserList;
use App\UserProfileLinks;
use App\CourseCategory;
use App\CourseOrder;
use App\UserSubmitFile;
use App\UserFiles;
use App\HomePage;
use App\Notification;
use App\Menues;
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
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $submittedform=UserSubmitFile::where('user_submit_form_user_id',$request->session()->get('loggedUser'))
                                        ->leftjoin('tbl_course_content','tbl_course_content.course_content_id','tbl_user_submit_form.user_submit_form_lecture_id')
                                        ->leftjoin('tbl_course','tbl_course.course_id','tbl_course_content.course_content_course_id')
                                        ->get();
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $notifications=Notification::where('notification_user_id',$request->session()->get('loggedUser'))
                                    ->leftjoin('tbl_course','tbl_course.course_id','tbl_notification.notification_course_id')
                                    ->leftjoin('tbl_course_content','tbl_course_content.course_content_id','tbl_notification.notification_lecture_id')
                                    ->paginate(10);
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.profile')
                ->with('notifications',$notifications)
                ->with('homePage',$homePage)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('submittedform',$submittedform)
                ->with('user',$user)
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
        
        $keywordSort=CourseOrder::where('order_user_id',$request->session()->get('loggedUser'))
                                ->leftjoin('tbl_course','tbl_course.course_id','tbl_order.order_course_id')
                                ->leftjoin('tbl_course_category','tbl_course_category.course_category_id','tbl_course.course_category_id')
                                ->where('order_status',1)
                                ->get();

        

        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $homePage=HomePage::orderBy('homepage_id','desc')->first(); 
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.enrollhistory')
                ->with('keywordSort',$keywordSort)
                ->with('homePage',$homePage)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('user',$user)
                ->with('category',$category)
                ->with('subCategory',$subCategory)
                ->with('data',$data)
                ->with('user',$user);
    }
    public function keyWordFiltering(Request $request)
    {
        $id=$request->id;

        $data=CourseOrder::where('order_user_id',$request->session()->get('loggedUser'))
                        ->leftjoin('tbl_course','tbl_course.course_id','tbl_order.order_course_id')
                        ->leftjoin('tbl_course_category','tbl_course_category.course_category_id','tbl_course.course_category_id')
                        ->where('order_course_id',$id)
                        ->where('order_status',1)
                        ->get();
        if(count($data)>0){

            $dataarray=[];

            foreach($data as $item){

                $dataarray[]=[

                    'image'=>asset('public/assets/images/Course/'.$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'order_amount'=>$item->order_amount,
                    'order_date'=>date('d F, Y',strtotime($item->order_date)),
                    'link'=>route('user.courseDemo',$item->order_course_id)
                ];
            }
            return response()->json(array('status'=>'ok','data'=>$dataarray));

        }else{

            return response()->json(array('status'=>'nodata','data'=>$dataarray=[]));

        }

        
    }
    public function categoryFiltering(Request $request)
    {
        $id=$request->id;

        $data=CourseOrder::where('order_user_id',$request->session()->get('loggedUser'))
                        ->leftjoin('tbl_course','tbl_course.course_id','tbl_order.order_course_id')
                        ->leftjoin('tbl_course_category','tbl_course_category.course_category_id','tbl_course.course_category_id')
                        ->where('tbl_course_category.course_category_id',$id)
                        ->where('order_status',1)
                        ->get();
  
        if(count($data)>0){

            $dataarray=[];

            foreach($data as $item){

                $dataarray[]=[

                    'image'=>asset('public/assets/images/Course/'.$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'order_amount'=>$item->order_amount,
                    'order_date'=>date('d F, Y',strtotime($item->order_date)),
                    'link'=>route('user.courseDemo',$item->order_course_id)
                ];
            }
            return response()->json(array('status'=>'ok','data'=>$dataarray));

        }else{

            return response()->json(array('status'=>'nodata','data'=>$dataarray=[]));

        }

        
    }
    public function submittedForm(Request $request)
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

        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();

        $submittedform=UserSubmitFile::where('user_submit_form_user_id',$request->session()->get('loggedUser'))
                                        ->leftjoin('tbl_course_content','tbl_course_content.course_content_id','tbl_user_submit_form.user_submit_form_lecture_id')
                                        ->leftjoin('tbl_course','tbl_course.course_id','tbl_course_content.course_content_course_id')
                                        ->get();
        $homePage=HomePage::orderBy('homepage_id','desc')->first(); 
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();           
        return view('User.submittedform')
                ->with('homePage',$homePage)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('user',$user)
                ->with('submittedform',$submittedform)
                ->with('category',$category)
                ->with('subCategory',$subCategory)
                ->with('data',$data)
                ->with('user',$user);
    }
}
