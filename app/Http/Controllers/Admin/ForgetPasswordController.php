<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminPasswordMail;
use App\UserList;
use App\CourseCategory;
use App\HomePage;
use App\Menues;
use App\ForgetPassword;
use App\AdminLoginPage;
use App\Admin;
use DB;
use Redirect;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(Request $request)
    {
        $data=AdminLoginPage::orderBy('admin_login_page_id','desc')->first();
        return view('Admin.forgetpass')
                ->with('data',$data);
                
    }
    public function sendMail(Request $request)
    {
        
        $request->validate([

            'email'=>'required'
        ]);
        $email=$request->email;

        

        $data=Admin::where('admin_email',$email)->first();
        if($data){

            $pass=new ForgetPassword();
            $pass->forget_password_mail=$email;
            $pass->forget_password_token=sha1(time());
            $pass->save();

            Mail::to($email)->send(new AdminPasswordMail($pass));
            $request->session()->flash('message','Password reset link is sent to your Email');
            return back();

        }else{

            $request->session()->flash('message','Email is not Valid');
            return back();

        }
    }
    public function getUserPasswordView(Request $request,$token)
    {
        $data=AdminLoginPage::orderBy('admin_login_page_id','desc')->first();
        return view('Admin.passresetlink')
                ->with('data',$data);
                    
    }
    public function resetPassword(Request $request,$token)
    {
        $request->validate([
            'password'=>'required',
            'confirmpassword'=>'required_with:password|same:password|min:6',
        ]);

        $getMail=ForgetPassword::where('forget_password_token',$token)->first();
        if($getMail){

            Admin::where('admin_email',$getMail->forget_password_mail)->update(['admin_password'=>Hash::make($request->password)]);

            $request->session()->flash('message','Password Updated Successfully');
            ForgetPassword::where('forget_password_token',$token)->delete();
            return redirect()->route('admin.loginAdmin');
        }else{

            $request->session()->flash('message','Invalid Token');
            return back();
        }
    }
}
