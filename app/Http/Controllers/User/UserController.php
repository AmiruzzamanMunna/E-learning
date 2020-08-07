<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\Blog;
use Str;
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

        $blogs=Blog::all();

        if(count($blogs)>0){

            $stringCount=0;
            $strlimit=0;

            $dataBlog=[];
            foreach($blogs as $item){

                $stringCount=strlen(strip_tags($item->blog_details));
                $strlimit=$stringCount*3/100;

                $dataBlog[]=[

                    'blog_id'=>$item->blog_id,
                    'blog_title'=>$item->blog_title,
                    'blog_image'=>asset('public/assets/Blog/'.$item->blog_image),
                    'blog_blooger_name'=>$item->blog_blooger_name,
                    'blog_details'=>Str::limit(strip_tags($item->blog_details), $limit=round($strlimit), '...'),
                    'blog_date'=>$item->blog_date,
                ];
            }

            

        }else{

            $dataBlog=[];

        }
        
        return view('User.index')
                ->with('allCourses',$allCourses)
                ->with('freeCourses',$freeCourses)
                ->with('data',$data)
                ->with('dataBlog',$dataBlog)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
}
