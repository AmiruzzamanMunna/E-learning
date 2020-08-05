<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\CourseCategory;

class CourseCategoryController extends Controller
{
    public function courseCategoryIndex(Request $request)
    {
        $permission=$request->session()->get('permission');
        $courselist=$request->session()->get('coursecatlist');
    

        if($courselist){

            return view('Admin.coursecategory');

        }
        
    }
    public function getSubCategory(Request $request)
    {
        $data=CourseCategory::where('course_category_parent_id',0)->get();
        return response()->json(array('status'=>'success','data'=>$data));
    }
    public function getCategoryCourseList(Request $request)
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

        $courseedit=$request->session()->get('coursecatedit');
        $coursedelete=$request->session()->get('coursecatdelete');
        return response()->json(array('status'=>'success','category'=>$category,'subCategory'=>$subCategory,'courseedit'=>$courseedit,'coursedelete'=>$coursedelete));
    }
    public function insertCourseCategory(Request $request)
    {
        $data=new CourseCategory();
        $data->course_category_name=$request->catname;
        $data->course_category_parent_id=$request->subCat;
        $data->save();
        return response()->json(array('status'=>'success'));
    }
    public function editCourseCategory(Request $request)
    {
        $id=$request->id;

        $data=CourseCategory::where('course_category_id',$id)->first();
        $category=CourseCategory::where('course_category_parent_id',0)->get();

        return response()->json(array('status'=>'success','data'=>$data,'category'=>$category));
    }
    public function editCourseCategoryUpdate(Request $request)
    {
        $id=$request->id;
        $catname=$request->catname;
        $subCat=$request->subcat;
        $data=CourseCategory::where('course_category_id',$id)->update([
            'course_category_name'=>$catname,
            'course_category_parent_id'=>$subCat,
        ]);

        return response()->json(array('status'=>'success'));
    }
    public function deleteCourseCategory(Request $request)
    {
        $id=$request->id;
        $data=CourseCategory::where('course_category_id',$id)->delete();

        return response()->json(array('status'=>'success'));
    }
}
