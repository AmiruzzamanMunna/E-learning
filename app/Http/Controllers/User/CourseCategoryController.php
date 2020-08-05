<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use DB;

class CourseCategoryController extends Controller
{
    public function courseCategory(Request $request,$id)
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

        $data=Course::where('course_category_id',$id)->get();
        $freeCourse=Course::where('course_category_id',$id)
                            ->where('course_free_course',1)
                            ->get();
        

        return view('User.allcourse')
                ->with('data',$data)
                ->with('freeCourse',$freeCourse)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
}
