<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UserList;
use App\CourseCategory;
use DB;

class SignUpController extends Controller
{
    public function signUp(Request $request)
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
        return view('User.signup')
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function signUpStore(Request $request)
    {

        $name=$request->name;
        $email=$request->email;
        $address=$request->address;
        $phnnum=$request->phnnum;
        $password=$request->password;

        $data=UserList::where('signup_email',$email)->first();

        if($data){

            return response()->json(array('status'=>'exist'));

        }else{

            $data=new UserList();
            $data->signup_name=$name;
            $data->signup_email=$email;
            $data->signup_address=$address;
            $data->signup_phonum=$phnnum;
            $data->signup_password=Hash::make($password);
            $data->save();
        
            return response()->json(array('status'=>'success'));

        }

        
    }
}
