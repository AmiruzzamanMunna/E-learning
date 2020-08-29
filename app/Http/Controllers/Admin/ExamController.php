<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExamType;
use App\LectureExamType;
use App\MCQExam;
use App\MCQExamOption;
use App\FillExam;

class ExamController extends Controller
{
    public function examIndex(Request $request,$id)
    {

        $data=LectureExamType::where('lecture_exam_lecture_id',$id)->get();
        
        return view('Exam.exam')
                ->with('data',$data)
                ->with('id',$id);
    }
    public function examAdd(Request $request)
    {
        $data=ExamType::all();
        
        return view('Exam.examadd')
                ->with('data',$data);
    }
    public function examAddInsert(Request $request,$id)
    {
        $exam_type_id=$request->exam_type_id;

        if($exam_type_id==2){

            $hidden_question_name_id=$request->hidden_question_name_id;
            $hidden_question_option_id=$request->hidden_question_option_id;

        

            $question_name=$request->question_name;
            $exammarks=$request->exammarks;
            $option_name=$request->option_name;
            $answer=$request->option_name_check;

            $totalQuestion=count($question_name);

        
            $examtype=new LectureExamType();
            $examtype->lecture_exam_lecture_id=$id;
            $examtype->lecture_exam_title=$request->examtitle;
            $examtype->lecture_exam_question_type_id=$exam_type_id;
            $examtype->lecture_exam_marks=$exammarks;
            $examtype->save();
            
            $question_id=[];

            foreach($question_name as $key=>$name){

                $mcq=new MCQExam();
                $mcq->mcq_exam_lecture_id=$id;
                $mcq->mcq_exam_name=$question_name[$key];
                $mcq->tbl_mcq_exam_answer=$answer[$key];
                $mcq->tbl_mcq_exam_marks=$exammarks/$totalQuestion;
                $mcq->save();

                foreach($option_name as $optionKey=>$name){

                    $mcqoption=new MCQExamOption();
                    
                    if($hidden_question_name_id[$key]==$hidden_question_option_id[$optionKey]){

                        $mcqoption->mcq_option_mcq_exam_id=$mcq->mcq_exam_id;
                        $mcqoption->mcq_option_name=$option_name[$optionKey];
                        $mcqoption->save();

                    }
                    
                }

            }
        
        
            $request->session()->flash('message','Data Inserted');
            return redirect()->route('admin.examIndex',$id);

        }elseif($exam_type_id==1){

            $question_name=$request->question_name;
            $ans_name=$request->ans_name;
            $exammarks=$request->exammarks;
            

            $totalQuestion=count($question_name);
            
            $examtype=new LectureExamType();
            $examtype->lecture_exam_lecture_id=$id;
            $examtype->lecture_exam_title=$request->examtitle;
            $examtype->lecture_exam_question_type_id=$exam_type_id;
            $examtype->lecture_exam_marks=$exammarks;
            $examtype->save();

            foreach($question_name as $key=>$name){

                $fill=new FillExam();
                $fill->fill_exam_lecture_id=$id;
                $fill->tbl_fill_exam_name=$question_name[$key];
                $fill->fill_exam_answer=$ans_name[$key];
                $fill->fill_exam_marks=$exammarks/$totalQuestion;
                $fill->save();


            }

            $request->session()->flash('message','Data Inserted');
            return redirect()->route('admin.examIndex',$id);

        }else{

            return 0;
        }

    }
    public function examEdit(Request $request,$id)
    {
        
        $data=ExamType::all();
        $lecturedata=LectureExamType::where('lecture_exam_id',$id)->first();
        
        if($lecturedata){


            if($lecturedata->lecture_exam_question_type_id==1){


                $examData=FillExam::where('fill_exam_lecture_id',$lecturedata->lecture_exam_lecture_id)->get();
                
                
            }
            if($lecturedata->lecture_exam_question_type_id==2){
    
                $examDataMcQ=MCQExam::where('mcq_exam_lecture_id',$lecturedata->lecture_exam_lecture_id)->get();
                $option=MCQExamOption::all();
                $examData=[];
            
                
            }else{

                $examDataMcQ=[];
                $option=[];
                
                
            }

        }

    
        
        
        return view('Exam.examedit')
                ->with('examDataMcQ',$examDataMcQ)
                ->with('option',$option)
                ->with('examData',$examData)
                ->with('data',$data)
                ->with('lecturedata',$lecturedata);
    }
    public function examEditUpdate(Request $request,$id)
    {
        $url=$request->url;
        
        $examtitle=$request->examtitle;
        $exammarks=$request->exammarks;

        $dataCheck=LectureExamType::where('lecture_exam_id',$id)->first();
       

        $lecturedata=LectureExamType::where('lecture_exam_id',$id)->update(['lecture_exam_title'=>$examtitle]);
        if($dataCheck->lecture_exam_question_type_id==2){

            $hidden_question_name_id=$request->hidden_question_name_id;
            $question_name=$request->question_name;

            $hidden_question_option_id=$request->hidden_question_option_id;
            $option_name=$request->option_name;

            

            

            foreach($hidden_question_name_id as $key=>$data){

                $data=MCQExam::where('mcq_exam_id',$hidden_question_name_id[$key])->update(['mcq_exam_name'=>$question_name[$key]]);
                
            }

            foreach($hidden_question_option_id as $key=>$val){

                $optiondata=MCQExamOption::where('mcq_option_id',$hidden_question_option_id[$key])->update(['mcq_option_name'=>$option_name[$key]]);
                
                
            }
            
        }
        if($dataCheck->lecture_exam_question_type_id==1){

            $hidden_fill_exam_id=$request->hidden_fill_exam_id;
            $question_name=$request->question_name;
            $ans_name=$request->ans_name;

            foreach($hidden_fill_exam_id as $key=>$val){

                $fillExam=FillExam::where('fill_exam_id',$hidden_fill_exam_id[$key])
                                    ->update([
                                        'tbl_fill_exam_name'=>$question_name[$key],
                                        'fill_exam_answer'=>$ans_name[$key]]
                                    );
            }
        }
        
        $request->session()->flash('message','Data Updated');
        return redirect($url);
        
    }
    public function deleteExam(Request $request,$id)
    {
        $data=LectureExamType::where('lecture_exam_id',$id)->delete();
        $request->session()->flash('message','Data Deleted');
        return back();
    }

        
}
