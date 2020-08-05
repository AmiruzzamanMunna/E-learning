<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $category=CourseCategory::where('course_category_parent_id',0)->get();
        $data=DB::select("
                SELECT 
                    tbl_course_category.course_category_id,
                    COUNT(course_id) AS totalcourse,
                    course_category_name,
                    course_category_parent_id
                FROM
                    tbl_course_category
                        LEFT JOIN
                    (SELECT 
                        course_id, course_category_id
                    FROM
                        tbl_course) AS tbl_course ON tbl_course.course_category_id = tbl_course_category.course_category_id
                WHERE
                    course_category_parent_id = 0
                GROUP BY tbl_course_category.course_category_id
    
        ");
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

        $allCourses=Course::all();
        $freeCourses=Course::where('course_free_course',1)->get();
        
        return view('User.index')
                ->with('allCourses',$allCourses)
                ->with('freeCourses',$freeCourses)
                ->with('data',$data)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
}
