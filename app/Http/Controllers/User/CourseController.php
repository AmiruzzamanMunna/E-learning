<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\CourseContent;
use App\CourseModule;
use App\CourseOrder;
use App\ExamType;
use App\LectureExamType;
use App\MCQExam;
use App\MCQExamOption;
use App\FillExam;
use App\ExamResult;
use App\UserList;
use App\HomePage;
use App\Menues;
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

        $allCategory=CourseCategory::all();

        $data=Course::all();
        $freeCourse=Course::where('course_free_course',1)
                            ->get();
        
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $featuredCourse=DB::select("
                SELECT 
                    course_id,
                    course_category_id,
                    course_short_title,
                    course_name,
                    course_image,
                    course_authorname,
                    course_credithour,
                    course_defficultylevel,
                    course_price,
                    difficulty_level_name,
                    COUNT(course_content_course_id) AS total
                FROM
                    tbl_course_content
                        LEFT JOIN
                    tbl_course ON tbl_course.course_id = tbl_course_content.course_content_course_id
                        LEFT JOIN
                    tbl_difficulty_level ON tbl_difficulty_level.difficulty_level_id = tbl_course.course_defficultylevel
                
                HAVING COUNT(course_id) > 0
                ORDER BY total DESC
                LIMIT 1
        ");
        
        $difficultyLevel=DB::select("
                SELECT 
                *
            FROM
                tbl_difficulty_level
        ");
        

        if(count($featuredCourse)>0){

            foreach($featuredCourse as $item){


                $featuredExam=DB::select("
                        SELECT 
                        course_category_id, course_id, course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");
                
                
                $featuredlecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $featuredenroll=CourseOrder::where('order_course_id',$item->course_id)->first();

                $featuredcountItem[]=[

                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                ];
                $featuredRatings=DB::select(
                    "

                            SELECT 
                    *,
                    COUNT(ratings_user_id) AS totaluser,
                    SUM(ratings_rate) AS rate,
                    round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                FROM
                    tbl_ratings
                WHERE
                    ratings_course_id = $item->course_id
                GROUP BY ratings_user_id , ratings_course_id
                ");
                

                $featuredEachRatings[]=[

                    'ratings'=>(!empty($featuredRatings)?$eachRatings=$featuredRatings[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($featuredRatings)?$totalUser=$featuredRatings[0]->totaluser:$totalUser=0),
                ];

            }

        }else{

            $featuredCourse=[];
            $featuredcountItem=[];

        } 
        $listcourse=Course::leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                            ->paginate(5);

        if(count($listcourse)>0){

            $countItem=[];
            $count=0;
            $countExam=0;
            $enrollcount=0;
            
            foreach($listcourse as $countitem){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $countitem->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $countitem->course_id
            
                ");

                
                
                $lecture=CourseContent::where('course_content_course_id',$countitem->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$countitem->course_id)->first();

                $countItem[]=[

                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$countitem->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$countitem->course_id)->count():$enrollcount=0),
                ];
            }
        }else{

            $countItem=[];
        }

        $homePage=HomePage::orderBy('homepage_id','desc')->first();

        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.allcourse')
                ->with('countItem',$countItem)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('featuredRatings',$featuredRatings)
                ->with('difficultyLevel',$difficultyLevel)
                ->with('homePage',$homePage)
                ->with('listcourse',$listcourse)
                ->with('featuredCourse',$featuredCourse)
                ->with('featuredcountItem',$featuredcountItem)
                ->with('user',$user)
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

        
        $ratingsDataCheck=DB::select("

                        SELECT 
                            *,
                            COUNT(ratings_user_id) AS totaluser,
                            SUM(ratings_rate) AS rate,
                            round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
                0),2) AS ratings
                        FROM
                            tbl_ratings
                        WHERE
                            ratings_course_id = $data->course_id
                        GROUP BY ratings_user_id , ratings_course_id
        ");
    
                
    
        $dataRatings[]=[

            'ratings'=>(!empty($ratingsDataCheck)?$eachRatings=$ratingsDataCheck[0]->ratings:$eachRatings=0),
            'totaluser'=>(!empty($ratingsDataCheck)?$totalUser=$ratingsDataCheck[0]->totaluser:$totalUser=0),
        ];

      
        
        $enroll=CourseOrder::where('order_course_id',$id)->count();
        
        
        $lecture=CourseContent::where('course_content_course_id',$id)->count();
        $alllecture=CourseContent::where('course_content_course_id',$id)->get();

        $exam=0;
        $countExam=[];

        foreach($alllecture as $key=>$each_exam){
            
            $individualExam=LectureExamType::where('lecture_exam_lecture_id',$each_exam->course_content_id)->first();
            
            $countExam[]=(!empty($individualExam))?1:0;

            $exam=array_sum($countExam);

        }

        $courseModule=CourseModule::where('course_module_course_id',$id)->get();

        $mergedContent=DB::select("

                SELECT 
                course_credithour,
                COUNT(course_content_id) AS lecture,
                (COUNT(course_content_course_video) + COUNT(course_content_course_video) + COUNT(course_content_pdf)) AS resources,
                IF(course_content_video_excercise != '',
                    'Assignment',
                    'No Assignment') AS assignment,
                IF(course_content_online_test != 0,
                    'Exam',
                    'No Exam') AS exam,
                IF(course_content_online_test = 1,
                    'Certificate',
                    '') AS certificate
            FROM
                tbl_course
                    LEFT JOIN
                tbl_course_content ON tbl_course_content.course_content_course_id = tbl_course.course_id
            WHERE
                course_id = $id
            GROUP BY course_id
        ");

        

    
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.coursedetails')
                ->with('exam',$exam)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('dataRatings',$dataRatings)
                ->with('enroll',$enroll)
                ->with('homePage',$homePage)
                ->with('user',$user)
                ->with('mergedContent',$mergedContent)
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
        
        $userid=$request->session()->get('loggedUser');
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
        
        

        if($userid){

            $data=DB::select("

                SELECT 
                course_content_id,
                course_content_title,
                (COUNT(course_content_course_video) + COUNT(course_content_audio) + COUNT(course_content_pdf)) AS total,
                IFNULL(totalmarks, 0) AS totalmarks,
                IFNULL(((lecture_exam_marks) * 80 / 100), 80) AS passmark
            FROM
                tbl_course_content
                    LEFT JOIN
                (SELECT 
                    exam_answer_lecture_id,
                        lecture_exam_marks,
                        SUM(exam_answer_marks) AS totalmarks
                FROM
                    tbl_exam_answer
                LEFT JOIN tbl_lecture_exam ON tbl_lecture_exam.lecture_exam_lecture_id = tbl_exam_answer.exam_answer_lecture_id
                WHERE
                    exam_answer_user_id = $userid
                GROUP BY exam_answer_lecture_id) AS markscheck ON markscheck.exam_answer_lecture_id = tbl_course_content.course_content_id
            WHERE
                course_content_course_id = $id
            GROUP BY course_content_id
            ");

        }else{

            $data=DB::select("

                    SELECT 
                    course_content_id,
                    course_content_title,
                    (COUNT(course_content_course_video) + COUNT(course_content_audio) + COUNT(course_content_pdf)) AS total,
                    IFNULL(totalmarks, 0) AS totalmarks,
                    IFNULL(((lecture_exam_marks) * 80 / 100), 80) AS passmark
                FROM
                    tbl_course_content
                        LEFT JOIN
                    (SELECT 
                        exam_answer_lecture_id,
                            lecture_exam_marks,
                            SUM(exam_answer_marks) AS totalmarks
                    FROM
                        tbl_exam_answer
                    LEFT JOIN tbl_lecture_exam ON tbl_lecture_exam.lecture_exam_lecture_id = tbl_exam_answer.exam_answer_lecture_id
                    WHERE
                        exam_answer_user_id = 0
                    GROUP BY exam_answer_lecture_id) AS markscheck ON markscheck.exam_answer_lecture_id = tbl_course_content.course_content_id
                WHERE
                    course_content_course_id = $id
                GROUP BY course_content_id
            ");

        }
    
        

        $dataArray=[];
        foreach($data as $eachdata){
            
            $dataArray[]=[
                "course_content_id" => $eachdata->course_content_id,
                "course_content_title"=>$eachdata->course_content_title,
                "total"=>$eachdata->total,
                "totalmarks"=>(!empty($eachdata->totalmarks))?$eachdata->totalmarks:0,
                "passmark"=>(!empty($eachdata->passmark)?$eachdata->passmark:80),
            ];
        }
        

        $course=Course::where('course_id',$id)
                    ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->first();

        $checkUserCourse=CourseOrder::where('order_user_id',$request->session()->get('loggedUser'))
                                    ->where('order_course_id',$id)
                                    ->where('order_status',1)
                                    ->first();
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.coursedemo')
                ->with('user',$user)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('homePage',$homePage)
                ->with('id',$id)
                ->with('data',$dataArray)
                ->with('course',$course)
                ->with('checkUserCourse',$checkUserCourse)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function courseDemoFile(Request $request,$course_id,$id,$checkid)
    {

        $userid=$request->session()->get('loggedUser');
        $category=CourseCategory::where('course_category_parent_id',0)->get();
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
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
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
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
            

            $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
            return view('User.coursedemofile')
                    ->with('user',$user)
                    ->with('menues',$menues)
                    ->with('submenues',$submenues)
                    ->with('checkid',$checkid)
                    ->with('homePage',$homePage)
                    ->with('id',$course_id)
                    ->with('lectureid',$id)
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
            

            $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
            return view('User.coursedemofile')
                    ->with('user',$user)
                    ->with('menues',$menues)
                    ->with('submenues',$submenues)
                    ->with('checkid',$checkid)
                    ->with('homePage',$homePage)
                    ->with('id',$course_id)
                    ->with('lectureid',$id)
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
            

            $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
            return view('User.coursedemofile')
                    ->with('user',$user)
                    ->with('menues',$menues)
                    ->with('submenues',$submenues)
                    ->with('checkid',$checkid)
                    ->with('homePage',$homePage)
                    ->with('id',$course_id)
                    ->with('lectureid',$id)
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

            $examType=LectureExamType::where('lecture_exam_lecture_id',$id)->first();

            $examResultCheck=DB::select("
                SELECT 
                course_content_id,
                course_content_title,
                (COUNT(course_content_course_video) + COUNT(course_content_audio) + COUNT(course_content_pdf)) AS total,
                IFNULL(totalmarks, 0) AS totalmarks,
                IFNULL(((lecture_exam_marks) * 80 / 100), 80) AS passmark
            FROM
                tbl_course_content
                    LEFT JOIN
                (SELECT 
                    exam_answer_lecture_id,
                        lecture_exam_marks,
                        SUM(exam_answer_marks) AS totalmarks
                FROM
                    tbl_exam_answer
                LEFT JOIN tbl_lecture_exam ON tbl_lecture_exam.lecture_exam_lecture_id = tbl_exam_answer.exam_answer_lecture_id
                WHERE
                    exam_answer_user_id = $userid
                GROUP BY exam_answer_lecture_id) AS markscheck ON markscheck.exam_answer_lecture_id = tbl_course_content.course_content_id
            WHERE
                course_content_course_id = $course_id
                and course_content_id=$id
            GROUP BY course_content_id
            limit 1
            ");

            
            if(count($examResultCheck)>0){

                $totalExamMarks=$examResultCheck[0]->totalmarks;
            }else{
                $totalExamMarks=0;
            }

            

            
            
            if($examType){

                if($examType->lecture_exam_question_type_id==2){

                    $question=MCQExam::where('mcq_exam_lecture_id',$id)->get();
                    $examOption=MCQExamOption::all();
                    $examCheck=ExamResult::where('exam_answer_lecture_id',$id)
                                        ->where('exam_answer_user_id',$request->session()->get('loggedUser'))
                                        ->first();
                    
                    
                }elseif($examType->lecture_exam_question_type_id==1){

                    $question=FillExam::where('fill_exam_lecture_id',$id)->get();
                    $examCheck=ExamResult::where('exam_answer_lecture_id',$id)
                                        ->where('exam_answer_user_id',$request->session()->get('loggedUser'))
                                        ->first();
                    $examOption=[];

                }else{
                    
                    $examType=[];
                    $question=[];
                    $examOption=[];
                }

            }else{

                $examType=[];
                $examCheck=[];
                $question=[];
                $examOption=[];

            }
            
            
        
            $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
            return view('User.coursedemofile')
                    ->with('user',$user)
                    ->with('menues',$menues)
                    ->with('submenues',$submenues)
                    ->with('examCheck',$examCheck)
                    ->with('totalExamMarks',$totalExamMarks)
                    ->with('homePage',$homePage)
                    ->with('examType',$examType)
                    ->with('question',$question)
                    ->with('examOption',$examOption)
                    ->with('checkid',$checkid)
                    ->with('id',$course_id)
                    ->with('lectureid',$id)
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
            
            $result=DB::select("

                SELECT 
                    course_content_id,
                    course_content_title,
                    (COUNT(course_content_course_video) + COUNT(course_content_audio) + COUNT(course_content_pdf)) AS total,
                    IFNULL(totalmarks, 0) AS totalmarks,
                    IFNULL(((lecture_exam_marks) * 80 / 100), 80) AS passmark
                FROM
                    tbl_course_content
                        LEFT JOIN
                    (SELECT 
                        exam_answer_lecture_id,
                            lecture_exam_marks,
                            SUM(exam_answer_marks) AS totalmarks
                    FROM
                        tbl_exam_answer
                    LEFT JOIN tbl_lecture_exam ON tbl_lecture_exam.lecture_exam_lecture_id = tbl_exam_answer.exam_answer_lecture_id
                    WHERE
                        exam_answer_user_id = $userid
                            AND exam_answer_lecture_id = $id
                    GROUP BY exam_answer_lecture_id) AS markscheck ON markscheck.exam_answer_lecture_id = tbl_course_content.course_content_id
                WHERE
                    course_content_course_id = $course_id
                        AND exam_answer_lecture_id = $id
                GROUP BY course_content_id
                ");
                
            
            $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
            return view('User.coursedemofile')
                    ->with('user',$user)
                    ->with('homePage',$homePage)
                    ->with('menues',$menues)
                    ->with('submenues',$submenues)
                    ->with('checkid',$checkid)
                    ->with('result',$result)
                    ->with('id',$course_id)
                    ->with('lectureid',$id)
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
            
            
            $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
            return view('User.coursedemofile')
                    ->with('homePage',$homePage)
                    ->with('menues',$menues)
                    ->with('submenues',$submenues)
                    ->with('user',$user)
                    ->with('checkid',$checkid)
                    ->with('id',$course_id)
                    ->with('lectureid',$id)
                    ->with('content',$content)
                    ->with('contentVideo',$contentVideo)
                    ->with('data',$data)
                    ->with('course',$course)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
        }
    }
    public function courseSearch(Request $request)
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

        $allCategory=CourseCategory::all();

        $allAuthor=Course::all();

        $data=Course::where('course_name','like','%'.$request->search.'%')->get();
        $allRatings=[];
        $eachRatings=0;
        foreach($data as $item){

            $ratingsCheck=DB::select("

                            SELECT 
                    *,
                    COUNT(ratings_user_id) AS totaluser,
                    SUM(ratings_rate) AS rate,
                    round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                FROM
                    tbl_ratings
                WHERE
                    ratings_course_id = $item->course_id
                GROUP BY ratings_user_id , ratings_course_id
            ");

            

            $allRatings[]=[

                'ratings'=>(!empty($ratingsCheck)?$eachRatings=$ratingsCheck[0]->ratings:$eachRatings=0),
                'totaluser'=>(!empty($ratingsCheck)?$totalUser=$ratingsCheck[0]->totaluser:$totalUser=0),
            ];
        }

        $freeCourse=Course::where('course_free_course',1)
                            ->get();


        foreach($freeCourse as $item){

            $ratingsFreeCheck=DB::select("

                            SELECT 
                    *,
                    COUNT(ratings_user_id) AS totaluser,
                    SUM(ratings_rate) AS rate,
                    round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                FROM
                    tbl_ratings
                WHERE
                    ratings_course_id = $item->course_id
                GROUP BY ratings_user_id , ratings_course_id
            ");

            

            $freeRatings[]=[

                'ratings'=>(!empty($ratingsFreeCheck)?$eachRatings=$ratingsFreeCheck[0]->ratings:$eachRatings=0),
                'totaluser'=>(!empty($ratingsFreeCheck)?$totalUser=$ratingsFreeCheck[0]->totaluser:$totalUser=0),
            ];
        }
        


        $difficultyLevel=DB::select("
                SELECT 
                *
            FROM
                tbl_difficulty_level
        ");
        
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $featuredCourse=DB::select("
                SELECT 
                    course_id,
                    course_category_id,
                    course_short_title,
                    course_name,
                    course_image,
                    course_authorname,
                    course_credithour,
                    course_free_course,
                    course_defficultylevel,
                    course_price,
                    difficulty_level_name,
                    COUNT(course_content_course_id) AS total
                FROM
                    tbl_course_content
                        LEFT JOIN
                    tbl_course ON tbl_course.course_id = tbl_course_content.course_content_course_id
                        LEFT JOIN
                    tbl_difficulty_level ON tbl_difficulty_level.difficulty_level_id = tbl_course.course_defficultylevel
                
                HAVING COUNT(course_id) > 0
                ORDER BY total DESC
                LIMIT 1
        ");

        

        
        

        if(count($featuredCourse)>0){

            foreach($featuredCourse as $item){


                $featuredExam=DB::select("
                        SELECT 
                        course_category_id, course_id, course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");
               

                $featuredRatings=DB::select(
                    "

                            SELECT 
                    *,
                    COUNT(ratings_user_id) AS totaluser,
                    SUM(ratings_rate) AS rate,
                    round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                FROM
                    tbl_ratings
                WHERE
                    ratings_course_id = $item->course_id
                GROUP BY ratings_user_id , ratings_course_id
                ");
                

                $featuredEachRatings[]=[

                    'ratings'=>(!empty($featuredRatings)?$eachRatings=$featuredRatings[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($featuredRatings)?$totalUser=$featuredRatings[0]->totaluser:$totalUser=0),
                ];

                
                $featuredlecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $featuredenroll=CourseOrder::where('order_course_id',$item->course_id)->first();

                $featuredcountItem[]=[

                    'count'=>(!empty($featuredlecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($featuredExam)?$countExam=$featuredExam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($featuredenroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                ];

                

            }

        }else{

            $featuredCourse=[];
            $featuredcountItem=[];
            $featuredRatings=[];

        } 

        $listcourse=Course::where('course_name','like','%'.$request->search.'%')->paginate(10);
        

        if(count($listcourse)>0){

            $countItem=[];
            $count=0;
            $countExam=0;
            $enrollcount=0;
            
            foreach($listcourse as $countitem){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $countitem->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $countitem->course_id
            
                ");

                
                
                $lecture=CourseContent::where('course_content_course_id',$countitem->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$countitem->course_id)->first();

                $countItem[]=[

                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$countitem->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$countitem->course_id)->count():$enrollcount=0),
                ];
               


                $ratingsListCheck=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $countitem->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

            

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsListCheck)?$eachRatings=$ratingsListCheck[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsListCheck)?$totalUser=$ratingsListCheck[0]->totaluser:$totalUser=0),
                ];
            }
        }else{

            $countItem=[];
        }

       

        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.allcourse')
                ->with('allAuthor',$allAuthor)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('allCategory',$allCategory)
                ->with('allRatings',$allRatings)
                ->with('featuredRatings',$featuredRatings)
                ->with('freeRatings',$freeRatings)
                ->with('listRatings',$listRatings)
                ->with('difficultyLevel',$difficultyLevel)
                ->with('countItem',$countItem)
                ->with('homePage',$homePage)
                ->with('listcourse',$listcourse)
                ->with('featuredCourse',$featuredCourse)
                ->with('featuredcountItem',$featuredcountItem)
                ->with('user',$user)
                ->with('data',$data)
                ->with('freeCourse',$freeCourse)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }

    public function courseFiltering(Request $request)
    {
        $filter=$request->filter;
        if($filter==2){

            $data=Course::where('course_free_course',1)
                            ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                            ->get();
            $dataarray=[];
            $count=0;
            $countExam=0;

            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));
        }
        if($filter==0){

            $data=Course::leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                            ->orderBy('course_id','asc')
                            ->get();
            $dataarray=[];
            $count=0;
            $countExam=0;

            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));
        }
        if($filter==1){

            $data=Course::leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                            ->orderBy('course_id','desc')
                            ->get();
            $dataarray=[];
            $count=0;
            $countExam=0;

            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));
        }
    }
    public function skillFiltering(Request $request)
    {
        $id=$request->id;
        $data=Course::leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                            ->where('course_defficultylevel',$id)
                            ->get();

      
        $dataarray=[];
        $count=0;
        $countExam=0;

        if(count($data)>0){

            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));

        }else{

            $dataarray=[];

            return response()->json(array('data'=>$dataarray=[]));
        }

        
    }
    public function priceFiltering(Request $request)
    {
        $filter=$request->filter;
        if($filter==1){

            $data=Course::where('course_free_course',1)
                            ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                            ->get();
            $dataarray=[];
            $count=0;
            $countExam=0;

        
            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

            

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));
        }else{

            $data=Course::where('course_price','>',0)
                        ->where('course_free_course',0)
                        ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                        ->get();
            $dataarray=[];
            $count=0;
            $countExam=0;

            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));

        }

        
    }
    public function topicsFiltering(Request $request)
    {
        $filter=$request->filter;
        $data=Course::where('course_category_id',$filter)
                            ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                            ->get();
            $dataarray=[];
            $count=0;
            $countExam=0;

        if(count($data)>0){

            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));

        }else{


            return response()->json(array('data'=>$dataarray=[],'listRatings'=>$listRatings=[]));
        }
        
    }
    public function autorFiltering(Request $request)
    {
        $filter=$request->filter;
        $data=Course::where('course_authorname',$filter)
                            ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                            ->get();
            $dataarray=[];
            $count=0;
            $countExam=0;

        if(count($data)>0){

            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));

        }else{


            return response()->json(array('data'=>$dataarray=[],'listRatings'=>$listRatings=[]));
        }
        
    }
    public function ratingsFiltering(Request $request)
    {
        $filter=$request->id;
        $data=Course::leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
                    ->leftjoin('tbl_ratings','tbl_ratings.ratings_course_id','tbl_course.course_id')
                    ->where('ratings_rate',$filter)
                    ->groupBy('course_id')
                    ->get();
            $dataarray=[];
            $count=0;
            $countExam=0;

        if(count($data)>0){

            foreach($data as $item){

                $exam=DB::select("
                        SELECT 
                        course_category_id, course_id, ifnull(course_exam,0) as course_exam
                    FROM
                        tbl_course
                            LEFT JOIN
                        (SELECT 
                            course_content_course_id, COUNT(countexam) AS course_exam
                        FROM
                            tbl_course_content
                        LEFT JOIN (SELECT 
                            lecture_exam_lecture_id,
                                COUNT(lecture_exam_lecture_id) AS countexam
                        FROM
                            tbl_lecture_exam
                        GROUP BY lecture_exam_lecture_id) AS exam ON exam.lecture_exam_lecture_id = tbl_course_content.course_content_id
                        WHERE
                            course_content_course_id = $item->course_id
                        GROUP BY course_content_course_id) AS totalexam ON totalexam.course_content_course_id = tbl_course.course_id
                    WHERE
                        course_id = $item->course_id
            
                ");

                $lecture=CourseContent::where('course_content_course_id',$item->course_id)->first();
                $enroll=CourseOrder::where('order_course_id',$item->course_id)->first();


                $dataarray[]=[

                    'image'=>asset("public/assets/images/Course/".$item->course_image),
                    'course_name'=>$item->course_name,
                    'course_authorname'=>$item->course_authorname,
                    'course_free_course'=>$item->course_free_course,
                    'route'=>route('user.courseDetails',$item->course_id),
                    'difficulty_level_name'=>$item->difficulty_level_name,
                    'course_credithour'=>$item->course_credithour,
                    'course_price'=>$item->course_price,
                    'count'=>(!empty($lecture)?$count=CourseContent::where('course_content_course_id',$item->course_id)->count():$count=0),
                    'exam'=>(!empty($exam)?$countExam=$exam[0]->course_exam:$countExam=0),
                    'enroll'=>(!empty($enroll)?$enrollcount=CourseOrder::where('order_course_id',$item->course_id)->count():$enrollcount=0),
                    
                ];

                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        round(IFNULL((ratings_rate) / COUNT(ratings_user_id),
            0),2) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $item->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
            return response()->json(array('data'=>$dataarray,'listRatings'=>$listRatings));

        }else{


            return response()->json(array('data'=>$dataarray=[],'listRatings'=>$listRatings=[]));
        }
        
    }
    
}
