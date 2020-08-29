<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LectureUpload;
use App\Course;
use App\CourseCategory;
use App\CourseContent;
use App\LectureFiles;
use App\Coupon;
use App\CourseOrder;
use App\UserList;
use App\Notification;
use DB;


class CourseController extends Controller
{
    public function courseListIndex(Request $request)
    {
        $courselist=$request->session()->get('courselist');

        if($courselist){

            return view('Admin.course');
        }
    }

    public function courseAdd(Request $request)
    {
        $courseadd=$request->session()->get('courseadd');

        if($courseadd){
            $coupon=Coupon::all();
            return view('Admin.courseadd')
                    ->with('coupon',$coupon);
        }
    }
    public function courseEdit(Request $request,$id)
    {
        $courseedit=$request->session()->get('courseedit');

        if($courseedit){

            $data=Course::where('course_id',$id)->first();
            $image=asset('assets/images/Course/'.$data->course_image);
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

            $level=DB::select("

                    SELECT 
                    *
                FROM
                    tbl_difficulty_level
            ");

            $coupon=Coupon::all();
            

            return view('Admin.courseedit')
                    ->with('coupon',$coupon)
                    ->with('data',$data)
                    ->with('image',$image)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
        }
    }

    public function getCourseList(Request $request)
    {
        $data=Course::leftjoin('tbl_course_category','tbl_course_category.course_category_id','tbl_course.course_category_id')
                    ->get();

        foreach($data as $item){
            $dataarray[]=[

                'course_id'=>$item->course_id,
                'course_name'=>$item->course_name,
                'course_category_name'=>$item->course_category_name,
                'course_authorname'=>$item->course_authorname,
                'course_credithour'=>$item->course_credithour,
                'course_price'=>$item->course_price,
                'edit'=>route('admin.courseEdit',$item->course_id),
                'delete'=>route('admin.deleteCourse',$item->course_id),
                'structure'=>route('admin.courseStructure',$item->course_id),
            ];
        }
        $courseedit=$request->session()->get('courseedit');
        $coursedelete=$request->session()->get('coursedelete');
        $modulelist=$request->session()->get('modulelist');
        return response()->json(array('status'=>'success','data'=>$dataarray,'courseedit'=>$courseedit,'coursedelete'=>$coursedelete,'modulelist'=>$modulelist));
    }
    public function getCategoryList(Request $request)
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

        $level=DB::select("

                SELECT 
                *
            FROM
                tbl_difficulty_level
        ");

        
        return response()->json(array('status'=>'success','category'=>$category,'subCategory'=>$subCategory,'level'=>$level));
    }
    public function insertCourse(Request $request)
    {


        $data= new Course();
        $data->course_category_id=$request->subCat;
        $data->course_name=$request->coursename;
        $data->course_short_title=$request->coursetitle;
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $user_image = time().'course-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/Course');
            $image->move($location, $user_image);
            $data->course_image = $user_image;
        }
        if ($request->hasFile('coursevideo')) {

            $image = $request->file('coursevideo');
            $user_image = time().'course-video-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/Course');
            $image->move($location, $user_image);
            $data->course_video = $user_image;
        }
        $data->course_authorname=$request->authorname;
        $data->course_credithour=$request->credithour;
        $data->course_description=$request->coursedescription;
        $data->course_defficultylevel=$request->level;
        $data->course_free_course=$request->freecourse;
        $data->course_requirement=$request->courserequire;
        $data->course_price=$request->courseprice;
        $data->course_coupon_id=$request->couponid;
        $data->save();

        return response()->json(array('status'=>'success'));
    }
    public function editCourse(Request $request)
    {
        $data=Course::where('course_id',$request->id)->first();
        $image=asset('assets/images/Course/'.$data->course_image);
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

        $level=DB::select("

                SELECT 
                *
            FROM
                tbl_difficulty_level
        ");

        return response()->json(array('status'=>'success','data'=>$data,'image'=>$image,'category'=>$category,'subCategory'=>$subCategory,'level'=>$level));
    }
    public function editCourseUpdate(Request $request)
    {
        
        $data=Course::where('course_id',$request->id)->first();
        $data->course_category_id=$request->subCat;
        $data->course_name=$request->coursename;
        $data->course_short_title=$request->coursetitle;
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $user_image = time().'course-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/Course');
            $image->move($location, $user_image);
            $data->course_image = $user_image;
        }
        if ($request->hasFile('coursevideo')) {

            $image = $request->file('coursevideo');
            $user_image = time().'course-video-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/Course');
            $image->move($location, $user_image);
            $data->course_video = $user_image;
        }
        $data->course_authorname=$request->authorname;
        $data->course_credithour=$request->credithour;
        $data->course_free_course=$request->freecourse;
        $data->course_description=$request->coursedescription;
        $data->course_defficultylevel=$request->level;
        $data->course_requirement=$request->courserequire;
        $data->course_price=$request->courseprice;
        $data->course_coupon_id=$request->couponid;
        $data->save();

        return response()->json(array('status'=>'success'));
    }
    public function deleteCourse(Request $request)
    {
        $data=Course::where('course_id',$request->id)->delete();
    }
    public function courseStructure(Request $request,$id)
    {

        $modulelist=$request->session()->get('modulelist');
        
        $data=Course::where('course_id',$id)->first();
            return view('CourseStructure.course')
                    ->with('id',$id)
                    ->with('data',$data);
        
    }

    public function courseContentIndex(Request $request,$id)
    {

        
        $coursecontentlist=$request->session()->get('coursecontentlist');

        if($coursecontentlist){

            $data=CourseContent::leftjoin('tbl_course','tbl_course.course_id','tbl_course_content.course_content_course_id')
                            ->where('course_content_course_id',$id)
                            ->get();
    
            return view('Admin.coursecontent')
                    ->with('id',$id)
                    ->with('data',$data);
        }
    }
    public function lectureAdd(Request $request,$id)
    {
        
        $coursecontentadd=$request->session()->get('coursecontentadd');
        if($coursecontentadd){

            return view('Lecture.lectureadd')
                    ->with('id',$id);
        }
        
    }
    public function lectureAddInsert(Request $request,$id)
    {

        ini_set("memory_limit", "200M");
        ini_set('post_max_size', '200M');
        ini_set('upload_max_filesize', '200M');
        
        $data= new CourseContent();
        $data->course_content_title=$request->contentname;
        $data->course_content_description=$request->udescription;
        $data->course_content_course_id=$id;
        $data->course_content_video_title=$request->lecturevideotitle;
        
        if ($request->hasFile('lectureVideo')) {
            
            $image = $request->file('lectureVideo');
            $user_image = time().'lecture-video-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/lecture');
            $image->move($location, $user_image);
            $data->course_content_course_video = $user_image;
        }
        if ($request->hasFile('lectureVideoposter')) {

            $image = $request->file('lectureVideoposter');
            $user_image = time().'course-video-poster-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/lecture');
            $image->move($location, $user_image);
            $data->course_content_video_poster = $user_image;
        }
        $data->course_content_video_summary=$request->videosummary;
        $data->course_content_video_excercise=$request->videoexcercise;
        $data->course_content_pdf_title=$request->lecturepdftitle;
        if ($request->hasFile('lecturepdf')) {

            $image = $request->file('lecturepdf');
            $user_image = time().'pdf-file-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/lecture');
            $image->move($location, $user_image);
            $data->course_content_pdf = $user_image;
        }
        $data->course_content_pdfdescription=$request->pdfdescription;
        $data->course_content_audio_title=$request->lectureaudiotitle;
        if ($request->hasFile('lectureaudio')) {

            $image = $request->file('lectureaudio');
            $user_image = time().'course-audio-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/lecture');
            $image->move($location, $user_image);
            $data->course_content_audio = $user_image;
        }
        $data->course_content_audio_description=$request->audiodescription;
        $data->course_content_online_test=$request->exam;
        $data->course_content_result=$request->result;
        $data->course_content_contactform=$request->contactform;
        $data->save();
        $request->session()->flash('message','Data Inserted');

        $getUser=CourseOrder::where('order_course_id',$id)->get();

        if(count($getUser)>0){

            foreach($getUser as $eachuser){

                $userMail=UserList::where('signup_id',$eachuser->order_user_id)->first();
                Mail::to($userMail->signup_email)->send(new LectureUpload($data));

                $notification=new Notification();
                $notification->notification_course_id=$id;
                $notification->notification_lecture_id=$data->course_content_id;
                $notification->notification_user_id=$eachuser->order_user_id;
                $notification->save();
            }

        }
        
        return redirect()->route('admin.courseContentIndex',$id);
    }
    public function lectureEdit(Request $request,$id)
    {
        $coursecontentedit=$request->session()->get('coursecontentedit');

        if($coursecontentedit){

            $data=CourseContent::where('course_content_id',$request->id)->first();
            $courselist=Course::all();
            
            return view('Lecture.lectureedit')
                    ->with('courselist',$courselist)
                    ->with('data',$data)
                    ->with('id',$id);
        }
        
    }
    public function lectureUpdate(Request $request,$id)
    {
        
        $data= CourseContent::where('course_content_id',$request->id)->first();
        $data->course_content_title=$request->contentname;
        $data->course_content_description=$request->udescription;
        $data->course_content_video_title=$request->lecturevideotitle;
        
        if ($request->hasFile('lectureVideo')) {
            
            $image = $request->file('lectureVideo');
            $user_image = time().'lecture-video-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/lecture');
            $image->move($location, $user_image);
            $data->course_content_course_video = $user_image;
        }
        if ($request->hasFile('lectureVideoposter')) {

            $image = $request->file('lectureVideoposter');
            $user_image = time().'course-video-poster-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/lecture');
            $image->move($location, $user_image);
            $data->course_content_video_poster = $user_image;
        }
        $data->course_content_video_summary=$request->videosummary;
        $data->course_content_video_excercise=$request->videoexcercise;
        $data->course_content_pdf_title=$request->lecturepdftitle;
        if ($request->hasFile('lecturepdf')) {

            $image = $request->file('lecturepdf');
            $user_image = time().'pdf-file-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/lecture');
            $image->move($location, $user_image);
            $data->course_content_pdf = $user_image;
        }
        $data->course_content_pdfdescription=$request->pdfdescription;
        $data->course_content_audio_title=$request->lectureaudiotitle;
        if ($request->hasFile('lectureaudio')) {

            $image = $request->file('lectureaudio');
            $user_image = time().'course-video-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/lecture');
            $image->move($location, $user_image);
            $data->course_content_audio = $user_image;
        }
        $data->course_content_audio_description=$request->audiodescription;
        $data->course_content_online_test=$request->exam;
        $data->course_content_result=$request->result;
        $data->course_content_contactform=$request->contactform;
        $data->save();
        $request->session()->flash('message','Data Updated');
        return redirect()->route('admin.courseContentIndex',$data->course_content_course_id);
    }
    public function lectureDelete(Request $request,$id)
    {
        
        $delete= CourseContent::where('course_content_id',$request->id)->first();
        $data= CourseContent::where('course_content_id',$request->id)->delete();
        $request->session()->flash('message','Data Delete');
        return redirect()->route('admin.courseContentIndex',$delete->course_content_course_id);
    }
    public function getCourseContentList(Request $request)
    {
        $data=CourseContent::leftjoin('tbl_course','tbl_course.course_id','tbl_course_content.course_content_course_id')
                            ->get();

        foreach($data as $item){

            $dataarray[]=[

                'course_content_id'=>$item->course_content_id,
                'course_content_title'=>$item->course_content_title,
                'course_name'=>$item->course_name,
                'course_content_description'=>$item->course_content_description,
                'edit'=>route('admin.lectureEdit',$item->course_content_id),
                
            ];
        }

        $courseedit=$request->session()->get('coursecontentedit');
        $coursedelete=$request->session()->get('coursecontentdelete');
        $lecturefilelist=$request->session()->get('lecturefilelist');
        
        return response()->json(array('status'=>'success','data'=>$dataarray,'courseedit'=>$courseedit,'coursedelete'=>$coursedelete,'lecturefilelist'=>$lecturefilelist));
    }
    
    public function editCourseContent(Request $request)
    {
        $data=CourseContent::where('course_content_id',$request->id)->first();
        $courselist=Course::all();
        return response()->json(array('status'=>'success','data'=>$data,'courselist'=>$courselist));
    }
    
    
    public function lectureWiseFiles(Request $request)
    {
        $data=LectureFiles::where('lecture_files_content_id',$request->id)
                            ->leftjoin('tbl_course_content','tbl_course_content.course_content_id','tbl_lecture_files.lecture_files_content_id')
                            ->get();
        
        if(count($data)>0){

            foreach($data as $item){

                $arrayData[]=[
    
                    'lecture_files_id'=>$item->lecture_files_id,
                    'course_content_title'=>$item->course_content_title,
                    'file'=>asset('assets/images/Course/files/'.$item->lecture_files_files),
    
                ];
            }
    
            $delete=$request->session()->get('lecturefiledelete');
    
            return response()->json(array('status'=>'success','data'=>$arrayData,'delete'=>$delete));

        }else{

            $delete=$request->session()->get('lecturefiledelete');

            return response()->json(array('status'=>'success','data'=>$arrayData=[],'delete'=>$delete));

        }

        
    }
    public function insertLectureFiles(Request $request)
    {
        if ($request->hasFile('file')) {
            $i=0;
            foreach($request->file as $file){
                $i++;
                $attachment= new LectureFiles();
                $filename = time()+$i . 'pdf.'. $file->getClientOriginalExtension();
                $location = public_path('assets/images/Course/files');
                // Image::make($image1->getRealPath())->resize(280, 280)->save(public_path('images/product'.$filename1));
                $file->move($location, $filename);
                $attachment->lecture_files_content_id = $request->coursecontent;
                $attachment->lecture_files_files = $filename;
                $attachment->save();
            }
        }
        if ($request->hasFile('video')) {
            $i=0;
            foreach($request->video as $file){
                $i++;
                $attachment= new LectureFiles();
                $filename = time()+$i . 'video.'. $file->getClientOriginalExtension();
                $location = public_path('assets/images/Course/files');
                // Image::make($image1->getRealPath())->resize(280, 280)->save(public_path('images/product'.$filename1));
                $file->move($location, $filename);
                $attachment->lecture_files_content_id = $request->coursecontent;
                $attachment->lecture_files_files = $filename;
                $attachment->save();
            }
        }

        return back();
    }
    public function fileDelete(Request $request)
    {
        $getData=LectureFiles::where('lecture_files_id',$request->id)->first();
        $id=$getData->lecture_files_content_id;
        $data=LectureFiles::where('lecture_files_id',$request->id)->delete();
        
        return response()->json(array('status'=>'success','id'=>$id));
    }
}
