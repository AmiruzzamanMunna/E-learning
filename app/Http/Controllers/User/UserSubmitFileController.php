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
use App\UserSubmitFile;
use App\UserFiles;
use App\HomePage;
use App\Menues;
use DB;

class UserSubmitFileController extends Controller
{
    public function formInsert(Request $request)
    {

        
        $request->validate([
            'name'=>'required',
            'lesson'=>'required',
            'message'=>'required',
            
        ]);

        $url=$request->url;
        
        $data=new UserSubmitFile();
        $data->user_submit_form_user_id=$request->session()->get('loggedUser');
        $data->user_submit_form_lecture_id=$request->lesson;
        $data->user_submit_form_description=$request->message;
        $data->save();
        if ($request->hasFile('myFile')) {
            $i=0;
            foreach($request->myFile as $file){
                $i++;
                $attachment= new UserFiles();
                $filename = time()+$i . 'files.'. $file->getClientOriginalExtension();
                $location = public_path('assets/UserFiles');
                // Image::make($image1->getRealPath())->resize(280, 280)->save(public_path('images/product'.$filename1));
                $file->move($location, $filename);
                $attachment->user_submit_file_form_id = $data->user_submit_form_id;
                $attachment->user_submit_file_files = $filename;
                $attachment->save();
            }
        }
        $request->session()->flash('message','Data Submitted');
        return redirect($url);
    }
}
