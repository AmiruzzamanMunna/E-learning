<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserList;
use App\CourseCategory;
use App\Course;
use App\Blog;
use App\HomePage;
use App\CourseContent;
use App\CourseOrder;
use App\Menues;
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
        if(count($allCourses)>0){

            foreach($allCourses as $item){

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
        }else{

            $allCourses=[];
            $allRatings=[];

        }

     

        $freeCourses=Course::where('course_free_course',1)->get();

        if(count($freeCourses)>0){
            foreach($freeCourses as $item){

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

            

                $allFreeRatings[]=[

                    'ratings'=>(!empty($ratingsFreeCheck)?$eachRatings=$ratingsFreeCheck[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($ratingsFreeCheck)?$totalUser=$ratingsFreeCheck[0]->totaluser:$totalUser=0),
                ];
            }
        }else{

            $allCourses=[];
            $allFreeRatings=[];

        }

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
            $featuredEachRatings=[];

        } 

        $bestSelling=DB::select("

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
                order_course_id,
                COUNT(order_course_id) AS totalCount
            FROM
                tbl_order
                    LEFT JOIN
                (SELECT 
                    *
                FROM
                    tbl_course) AS course ON course.course_id = tbl_order.order_course_id
                    LEFT JOIN
                tbl_difficulty_level ON tbl_difficulty_level.difficulty_level_id = course.course_defficultylevel
            GROUP BY order_course_id
            ORDER BY totalCount DESC
    
        ");

        
        if(count($bestSelling)>0){

            foreach($bestSelling as $item){


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

               

                $bestSellingRatings=DB::select(
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
                

                $bestSellingRatingsEachRatings[]=[

                    'ratings'=>(!empty($bestSellingRatings)?$eachRatings=$bestSellingRatings[0]->ratings:$eachRatings=0),
                    'totaluser'=>(!empty($bestSellingRatings)?$totalUser=$bestSellingRatings[0]->totaluser:$totalUser=0),
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

            $bestSellingRatingsEachRatings=[];

        }

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
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();

        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        
        
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
       
        return view('User.index')
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('homePage',$homePage)
                ->with('allRatings',$allRatings)
                ->with('allFreeRatings',$allFreeRatings)
                ->with('bestSellingRatingsEachRatings',$bestSellingRatingsEachRatings)
                ->with('featuredEachRatings',$featuredEachRatings)
                ->with('user',$user)
                ->with('allCourses',$allCourses)
                ->with('bestSelling',$bestSelling)
                ->with('freeCourses',$freeCourses)
                ->with('featuredCourse',$featuredCourse)
                ->with('data',$data)
                ->with('dataBlog',$dataBlog)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
}
