<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\CourseContent;
use App\UserList;
use App\LectureExamType;
use App\CourseOrder;
use App\HomePage;
use App\Menues;
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

        if(count($data)>0){

            foreach($data as $item){

                $ratingsCheck=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        ifnull((ratings_rate) / COUNT(ratings_user_id),0) AS ratings
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
        }else{

            $allRatings=[];

        }
        $listcourse=Course::where('course_category_id',$id)
                            ->leftjoin('tbl_difficulty_level','tbl_difficulty_level.difficulty_level_id','tbl_course.course_defficultylevel')
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
                $ratingsList=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        ifnull((ratings_rate) / COUNT(ratings_user_id),0) AS ratings
                    FROM
                        tbl_ratings
                    WHERE
                        ratings_course_id = $countitem->course_id
                    GROUP BY ratings_user_id , ratings_course_id
                ");

                

                $listRatings[]=[

                    'ratings'=>(!empty($ratingsList)?$eachRatings=$ratingsList[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsList)?$totalUser=$ratingsList[0]->totaluser:$totalUser=0),
                ];
            }
        }else{

            $countItem=[];
            $listRatings=[];
        }


        
        
        $freeCourse=Course::where('course_category_id',$id)
                            ->where('course_free_course',1)
                            ->get();
        if(count($freeCourse)>0){

            foreach($freeCourse as $item){

                $ratingsFreeCheck=DB::select("

                    SELECT 
                        *,
                        COUNT(ratings_user_id) AS totaluser,
                        SUM(ratings_rate) AS rate,
                        ifnull((ratings_rate) / COUNT(ratings_user_id),0) AS ratings
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

        }else{

            $freeRatings=[];

        }
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
                    ifnull((ratings_rate) / COUNT(ratings_user_id),0) AS ratings
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

        
        $difficultyLevel=DB::select("
            SELECT 
             *
            FROM
                tbl_difficulty_level
        ");
        $allCategory=CourseCategory::all();
        $allAuthor=Course::all();
        
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        
        return view('User.allcourse')
                ->with('allRatings',$allRatings)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('freeRatings',$freeRatings)
                ->with('listRatings',$listRatings)
                ->with('featuredRatings',$featuredRatings)
                ->with('difficultyLevel',$difficultyLevel)
                ->with('allCategory',$allCategory)
                ->with('allAuthor',$allAuthor)
                ->with('homePage',$homePage)
                ->with('countItem',$countItem)
                ->with('featuredCourse',$featuredCourse)
                ->with('featuredcountItem',$featuredcountItem)
                ->with('user',$user)
                ->with('data',$data)
                ->with('listcourse',$listcourse)
                ->with('freeCourse',$freeCourse)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
}
