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

class NotificationController extends Controller
{
    public function notificationData(Request $request)
    {
        $id=$request->id;
        $notifications=Notification::where('notification_user_id',$request->session()->get('loggedUser'))
                                    ->leftjoin('tbl_course','tbl_course.course_id','tbl_notification.notification_course_id')
                                    ->leftjoin('tbl_course_content','tbl_course_content.course_content_id','tbl_notification.notification_lecture_id')
                                    ->where('notification_id',$id)
                                    ->first();

        return response()->json(array('status'=>'success','data'=>$notifications));
    }
    public function deleteNotification(Request $request)
    {
        $id=$request->id;
        $notifications=Notification::where('notification_user_id',$request->session()->get('loggedUser'))
                                    ->leftjoin('tbl_course','tbl_course.course_id','tbl_notification.notification_course_id')
                                    ->leftjoin('tbl_course_content','tbl_course_content.course_content_id','tbl_notification.notification_lecture_id')
                                    ->where('notification_id',$id)
                                    ->delete();

        return response()->json(array('status'=>'success'));
    }
}
