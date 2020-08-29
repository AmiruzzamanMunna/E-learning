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
use DB;
use PDF;

class CertificateController extends Controller
{
    public function CourseCertificate(Request $request,$id)
    {
        if(!$request->session()->get('loggedUser')){

            $request->session()->flash('message','You need to log in');
        }else{

            $orderCheck=CourseOrder::where('order_user_id',$request->session()->get('loggedUser'))
                                    ->where('order_course_id',$id)
                                    ->where('order_status',1)
                                    ->first();
            
            
            if($orderCheck){

                $userid=$request->session()->get('loggedUser');

                $resultCheck=DB::select("

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

            

            $totalPassmark=0;
            $totalMarks=0;

            foreach($resultCheck as $result){

                $totalPassmark+=$result->passmark;
                $totalMarks+=$result->totalmarks;
            }

            if($totalMarks>=$totalPassmark){

                $courseDetails=Course::where('course_id',$id)->first();
                $user=UserList::where('signup_id',$userid)->first();
                $pdf = PDF::loadView('Pdf.certificate',compact('courseDetails','user'));
                return $pdf->download('certificate.pdf');
                

            }else{

                $request->session()->flash('message','Sorry You Need to Pass this Course');
                return back();

            }

            }else{

                $request->session()->flash('message','Sorry You have to Purchase this Course');
                return back();

            }
        }
    }
}
