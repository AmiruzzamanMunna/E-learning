<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\AdminRole;
use App\AdminLoginPage;

class AdminLoginPageController extends Controller
{
    public function loginPageDetails(Request $request)
    {
        // $adminlist=$request->session()->get('adminlist');
        // if($adminlist){
        //     return view('Admin.adminlist');
        // }
        $data=AdminLoginPage::all();
        
        return view('Login.loginpageview')
                    ->with('data',$data);
    }
    public function loginPageAdd(Request $request)
    {
        return view('Login.loginpageadd');
    }
    public function loginPageInsert(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'logo'=>'required',
            'image2'=>'required',
            'image3'=>'required',
        ]);

        $data=new AdminLoginPage();
        $data->admin_login_page_short_title=$request->title;
        if ($request->hasFile('logo')) {
            
            $image = $request->file('logo');
            $user_image = time().'logo-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/admin/img');
            $image->move($location, $user_image);
            $data->admin_login_page_image1 = $user_image;
        }
        if ($request->hasFile('image2')) {
            
            $image = $request->file('image2');
            $user_image = time().'login-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Blog');
            $image->move($location, $user_image);
            $data->admin_login_page_image2 = $user_image;
        }
        
        $data->save();

        $request->session()->flash('message','Data Inserted');
        return redirect()->route('admin.loginPageDetails');
    }
    public function loginPageEdit(Request $request,$id)
    {
        $data=AdminLoginPage::where('admin_login_page_id',$id)->first();
        return view('Login.loginpageedit')
                    ->with('data',$data);
    }
    public function loginPageUpdate(Request $request,$id)
    {
        $data=AdminLoginPage::where('admin_login_page_id',$id)->first();
        $data->admin_login_page_short_title=$request->title;
        if ($request->hasFile('logo')) {
            
            $image = $request->file('logo');
            $user_image = time().'logo-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/admin/img');
            $image->move($location, $user_image);
            $data->admin_login_page_image1 = $user_image;
        }
        if ($request->hasFile('image2')) {
            
            $image = $request->file('image2');
            $user_image = time().'login-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/admin/img');
            $image->move($location, $user_image);
            $data->admin_login_page_image2 = $user_image;
        }
        
        $data->save();

        $request->session()->flash('message','Data Updated');
        return redirect()->route('admin.loginPageDetails');
    }
    public function loginPageDelete(Request $request,$id)
    {
        AdminLoginPage::where('admin_login_page_id',$id)->delete();
        $request->session()->flash('message','Data Deleted');
        return redirect()->route('admin.loginPageDetails');
    }
}
