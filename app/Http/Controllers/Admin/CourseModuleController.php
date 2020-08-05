<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseModule;

class CourseModuleController extends Controller
{
    public function moduleList(Request $request,$id)
    {
        $modulelist=$request->session()->get('modulelist');

        if($modulelist){

            $data=CourseModule::where('course_module_course_id',$id)
                                ->get();

            return view('CourseModule.modulelist')
                    ->with('id',$id)
                    ->with('data',$data);
        }
        
    }
    public function moduleAdd(Request $request,$id)
    {
        $moduleadd=$request->session()->get('moduleadd');

        if($moduleadd){

            return view('CourseModule.moduleadd');
                    
        }
    }
    public function moduleInsert(Request $request,$id)
    {
        
        $request->validate([
            'module_name'=>'required',
            'description' => 'required_without:file',
            'file' => 'required_without:description',
            
        ]);

        $data=new CourseModule();
        $data->course_module_course_id=$id;
        $data->course_module_name=$request->module_name;
        $data->course_module_description=$request->description;
        if ($request->hasFile('file')) {

            $image = $request->file('file');
            $user_image = time().'course-Module-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/CourseModule');
            $image->move($location, $user_image);
            $data->course_module_file = $user_image;
        }
        $data->save();

        $request->session()->flash('message','Data Inserted');
    
        return redirect()->route('admin.moduleList',$id);
    }
    public function editModule(Request $request,$id)
    {
        $moduleedit=$request->session()->get('moduleedit');

        if($moduleedit){

            $data=CourseModule::where('course_module_id',$id)->first();
            return view('CourseModule.moduleedit')
                    ->with('data',$data);
                    
        }
    }
    public function editModuleUpdate(Request $request,$id)
    {
        $data=CourseModule::where('course_module_id',$id)->first();
        $data->course_module_name=$request->module_name;
        $data->course_module_description=$request->description;
        if ($request->hasFile('file')) {

            $image = $request->file('file');
            $user_image = time().'course-Module-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/CourseModule');
            $image->move($location, $user_image);
            $data->course_module_file = $user_image;
        }

        $data->save();
        $request->session()->flash('message','Data Updated');
    
        return redirect()->route('admin.moduleList',$data->course_module_course_id);

    }
    public function courseModuleDelete(Request $request,$id)
    {
        $delete=CourseModule::where('course_module_id',$id)->first();
        $data=CourseModule::where('course_module_id',$id)->delete();
        $request->session()->flash('message','Data Deleted');
        return redirect()->route('admin.moduleList',$delete->course_module_course_id);
    }
}
