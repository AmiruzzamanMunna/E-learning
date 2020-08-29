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
use DB;

class ExamController extends Controller
{
    public function submitAnswer(Request $request)
    {
        $examtypeid=$request->examtypeid;

        if($examtypeid==2){

            $lectureid=$request->lectureid;
            $hidden_exam_id=$request->hidden_exam_id;
            $ansradio=$request->ansradio;

            $oldResult=ExamResult::where('exam_answer_user_id',$request->session()->get('loggedUser'))
                        ->where('exam_answer_lecture_id',$lectureid)
                        ->delete();
            foreach($hidden_exam_id as $key=>$val){

                $data=new ExamResult();
                $data->exam_answer_lecture_id=$lectureid;
                $data->exam_answer_user_id=$request->session()->get('loggedUser');
                $data->exam_answer_exam_id=$hidden_exam_id[$key];
                $data->exam_answer_answer_name=$ansradio[$key];
                $marks=MCQExam::where('mcq_exam_id',$hidden_exam_id[$key])->first();
                if($ansradio[$key]==$marks->tbl_mcq_exam_answer){

                    $data->exam_answer_marks=$marks->tbl_mcq_exam_marks;

                }else{

                    $data->exam_answer_marks=0;

                }

                $data->save();
            }
        }
        if($examtypeid==1){

            $lectureid=$request->lectureid;
            $hidden_exam_id=$request->hidden_exam_id;
            $ans_name=$request->ans_name;
            $oldResult=ExamResult::where('exam_answer_user_id',$request->session()->get('loggedUser'))
                        ->where('exam_answer_lecture_id',$lectureid)
                        ->delete();
            foreach($hidden_exam_id as $key=>$val){

                $data=new ExamResult();
                $data->exam_answer_lecture_id=$lectureid;
                $data->exam_answer_user_id=$request->session()->get('loggedUser');
                $data->exam_answer_exam_id=$hidden_exam_id[$key];
                $data->exam_answer_answer_name=$ans_name[$key];
                $marks=FillExam::where('fill_exam_id',$hidden_exam_id[$key])->first();
                if(strtolower($ans_name[$key])==strtolower($marks->fill_exam_answer)){

                    $data->exam_answer_marks=$marks->fill_exam_marks;

                }else{

                    $data->exam_answer_marks=0;

                }

                $data->save();
            }
        }
        
        
        return response()->json(array('status'=>'success'));
    }
}
