<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\AdminRole;
use App\CourseOrder;

class CourseOrderController extends Controller
{
    public function courseOrderList(Request $request)
    {
        $data=CourseOrder::leftjoin('tbl_user','tbl_user.signup_id','tbl_order.order_user_id')
                        ->leftjoin('tbl_course','tbl_course.course_id','tbl_order.order_course_id')
                        ->get();

    
        return view('Order.courseorderlist')
                    ->with('data',$data);
    }
    public function orderCourseDelete(Request $request,$id)
    {
        $data=CourseOrder::where('order_id',$id)->update(['order_status'=>1]);
        return back();
    }
    public function activeCourse(Request $request,$id)
    {
        $data=CourseOrder::where('order_id',$id)->update(['order_status'=>1]);
        return back();
    }
    public function deActiveCourse(Request $request,$id)
    {
        $data=CourseOrder::where('order_id',$id)->update(['order_status'=>0]);
        return back();
    }

}
