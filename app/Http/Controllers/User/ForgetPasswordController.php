<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserPasswordMail;
use App\UserList;
use App\CourseCategory;
use App\HomePage;
use App\Menues;
use App\ForgetPassword;
use DB;
use Redirect;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(Request $request)
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
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.forgetpassword')
                ->with('homePage',$homePage)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function sendMail(Request $request)
    {
        $request->validate([
            'email'=>'required'
        ]);
        $email=$request->email;

    

        $data=UserList::where('signup_email',$email)->first();
        if($data){

            $pass=new ForgetPassword();
            $pass->forget_password_mail=$email;
            $pass->forget_password_token=sha1(time());
            $pass->save();

            Mail::to($email)->send(new UserPasswordMail($pass));
            $request->session()->flash('message','Password reset link is sent to your Email');
            return back();

        }else{

            $request->session()->flash('message2','Email is not Valid');
            return back();

        }
    }
    public function getUserPasswordView(Request $request,$token)
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
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.passwordreset')
                    ->with('homePage',$homePage)
                    ->with('menues',$menues)
                    ->with('submenues',$submenues)
                    ->with('category',$category)
                    ->with('subCategory',$subCategory);
    }
    public function resetPassword(Request $request,$token)
    {
        $request->validate([
            'password'=>'required',
            'confirmpassword'=>'required_with:password|same:password|min:6',
        ]);

        $getMail=ForgetPassword::where('forget_password_token',$token)->first();
        if($getMail){

            UserList::where('signup_email',$getMail->forget_password_mail)->update(['signup_password'=>Hash::make($request->password)]);

            $request->session()->flash('message','Password Updated Successfully');
            ForgetPassword::where('forget_password_token',$token)->delete();
            return redirect()->route('user.login');
        }else{

            $request->session()->flash('message2','Invalid Token');
            return back();
        }
    }
}
