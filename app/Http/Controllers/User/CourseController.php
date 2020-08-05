<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\CourseContent;
use App\CourseModule;
use App\CourseOrder;
use DB;

class CourseController extends Controller
{
    public function allCourse(Request $request)
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

        $data=Course::all();
        $freeCourse=Course::where('course_free_course',1)
                            ->get();
        

        return view('User.allcourse')
                ->with('data',$data)
                ->with('freeCourse',$freeCourse)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function courseDetails(Request $request,$id)
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

        $data=Course::where('course_id',$id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();
        
        
        $lecture=CourseContent::where('course_content_course_id',$id)->count();
        $alllecture=CourseContent::where('course_content_course_id',$id)->get();

        $courseModule=CourseModule::where('course_module_course_id',$id)->get();
        return view('User.coursedetails')
                ->with('courseModule',$courseModule)
                ->with('id',$id)
                ->with('data',$data)
                ->with('alllecture',$alllecture)
                ->with('lecture',$lecture)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function courseDemo(Request $request,$id)
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

        $data=DB::select("

            SELECT 
                course_content_id,
                course_content_title,
                (COUNT(course_content_course_video) + COUNT(course_content_audio) + COUNT(course_content_pdf)) AS total
            FROM
                tbl_course_content
            WHERE
                course_content_course_id = $id
            GROUP BY course_content_id
        ");

        $course=Course::where('course_id',$id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();

        $checkUserCourse=CourseOrder::where('order_user_id',$request->session()->get('loggedUser'))
                                    ->where('order_course_id',$id)
                                    ->first();
        
        return view('User.coursedemo')
                ->with('id',$id)
                ->with('data',$data)
                ->with('course',$course)
                ->with('checkUserCourse',$checkUserCourse)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function courseDemoFile(Request $request,$course_id,$id,$checkid)
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

        $data=DB::select("

            SELECT 
                course_content_id,
                course_content_title,
                (COUNT(course_content_course_video) + COUNT(course_content_audio) + COUNT(course_content_pdf)) AS total
            FROM
                tbl_course_content
            WHERE
                course_content_course_id = $course_id
            GROUP BY course_content_id
        ");

        if($checkid==1){
            $course=Course::where('course_id',$course_id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();

            $content=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first();

            $contentVideo=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first([
                                        'course_content_video_title',
                                        'course_content_course_video',
                                        'course_content_video_poster',
                                        'course_content_video_summary',
                                        'course_content_video_excercise',
                                    ]);
            

            
            return view('User.coursedemofile')
                    ->with('checkid',$checkid)
                    ->with('id',$course_id)
                    ->with('content',$content)
                    ->with('contentVideo',$contentVideo)
                    ->with('data',$data)
                    ->with('course',$course)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
        }
        if($checkid==2){
            $course=Course::where('course_id',$course_id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();

            $content=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first();

            $contentVideo=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first([
                                        'course_content_pdf_title',
                                        'course_content_pdf',
                                        'course_content_pdfdescription',
                                    ]);
            

            
            return view('User.coursedemofile')
                    ->with('checkid',$checkid)
                    ->with('id',$course_id)
                    ->with('content',$content)
                    ->with('contentVideo',$contentVideo)
                    ->with('data',$data)
                    ->with('course',$course)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
        }
        if($checkid==3){
            $course=Course::where('course_id',$course_id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();

            $content=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first();

            $contentVideo=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first([
                                        'course_content_audio_title',
                                        'course_content_audio',
                                        'course_content_audio_description',
                                    ]);
            

            
            return view('User.coursedemofile')
                    ->with('checkid',$checkid)
                    ->with('id',$course_id)
                    ->with('content',$content)
                    ->with('contentVideo',$contentVideo)
                    ->with('data',$data)
                    ->with('course',$course)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
        }
        if($checkid==4){
            $course=Course::where('course_id',$course_id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();

            $content=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first();

            $contentVideo=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first([
                                        'course_content_online_test',
                                    ]);
            

            
            return view('User.coursedemofile')
                    ->with('checkid',$checkid)
                    ->with('id',$course_id)
                    ->with('content',$content)
                    ->with('contentVideo',$contentVideo)
                    ->with('data',$data)
                    ->with('course',$course)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
        }
        if($checkid==5){
            $course=Course::where('course_id',$course_id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();

            $content=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first();

            $contentVideo=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first([
                                        'course_content_result',
                                    ]);
            

            
            return view('User.coursedemofile')
                    ->with('checkid',$checkid)
                    ->with('id',$course_id)
                    ->with('content',$content)
                    ->with('contentVideo',$contentVideo)
                    ->with('data',$data)
                    ->with('course',$course)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
        }
        if($checkid==6){
            $course=Course::where('course_id',$course_id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();

            $content=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first();

            $contentVideo=CourseContent::where('course_content_course_id',$course_id)
                                    ->where('course_content_id',$id)
                                    ->first([
                                        'course_content_contactform',
                                    ]);
            

            
            return view('User.coursedemofile')
                    ->with('checkid',$checkid)
                    ->with('id',$course_id)
                    ->with('content',$content)
                    ->with('contentVideo',$contentVideo)
                    ->with('data',$data)
                    ->with('course',$course)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
        }
    }
    
}
