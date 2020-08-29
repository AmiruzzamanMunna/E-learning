<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\AdminRole;
use App\AdminLoginPage;
use App\RolePermission;

class LoginController extends Controller
{
    public function loginAdmin(Request $request)
    {
        $data=AdminLoginPage::orderBy('admin_login_page_id','desc')->first();
        return view('Admin.login')
                ->with('data',$data);
    }
    public function loginAdminCheck(Request $request)
    {
        $email=$request->email;
        $pass=$request->password;

        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $data=Admin::where('admin_email',$email)->first();

        if($data && Hash::check($pass, $data->admin_password)){

            $request->session()->put('loggedAdmin',$data->admin_id);

            $permission=RolePermission::where('role_permission_role_id',$data->admin_role_id)
                                        ->get();

            

            foreach($permission as $val){

                if($val->role_permission_per_id==2){

                    $request->session()->put('userlist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==3){

                    $request->session()->put('useradd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==4){

                    $request->session()->put('useredit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==5){

                    $request->session()->put('userdelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==7){

                    $request->session()->put('coursecatlist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==8){

                    $request->session()->put('coursecatadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==9){

                    $request->session()->put('coursecatedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==10){

                    $request->session()->put('coursecatdelete',$val->role_permission_per_id);
                    
                }
                
                if($val->role_permission_per_id==12){

                    $request->session()->put('rolelist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==13){

                    $request->session()->put('roleadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==14){

                    $request->session()->put('roleedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==15){

                    $request->session()->put('roledelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==16){

                    $request->session()->put('roleper',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==18){

                    $request->session()->put('couponlist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==19){

                    $request->session()->put('couponadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==20){

                    $request->session()->put('couponedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==21){

                    $request->session()->put('coupondelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==23){

                    $request->session()->put('adminlist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==24){

                    $request->session()->put('adminadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==25){

                    $request->session()->put('adminedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==26){

                    $request->session()->put('admindelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==28){

                    $request->session()->put('courselist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==29){

                    $request->session()->put('courseadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==30){

                    $request->session()->put('courseedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==31){

                    $request->session()->put('coursedelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==33){

                    $request->session()->put('coursecontentlist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==34){

                    $request->session()->put('coursecontentadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==35){

                    $request->session()->put('coursecontentedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==36){

                    $request->session()->put('coursecontentdelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==38){

                    $request->session()->put('lecturefilelist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==39){

                    $request->session()->put('lecturefileadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==40){

                    $request->session()->put('lecturefileedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==41){

                    $request->session()->put('lecturefiledelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==43){

                    $request->session()->put('modulelist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==44){

                    $request->session()->put('moduleadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==45){

                    $request->session()->put('moduleedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==46){

                    $request->session()->put('moduledelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==48){

                    $request->session()->put('orderactive',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==49){

                    $request->session()->put('orderdelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==51){

                    $request->session()->put('Blogadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==52){

                    $request->session()->put('Blogedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==53){

                    $request->session()->put('Blogdelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==54){

                    $request->session()->put('Bloglist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==56){

                    $request->session()->put('loginlist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==57){

                    $request->session()->put('loginadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==58){

                    $request->session()->put('loginedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==59){

                    $request->session()->put('logindelete',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==61){

                    $request->session()->put('homepagelist',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==62){

                    $request->session()->put('homepageadd',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==63){

                    $request->session()->put('homepageedit',$val->role_permission_per_id);
                    
                }
                if($val->role_permission_per_id==64){

                    $request->session()->put('homepagedelete',$val->role_permission_per_id);
                    
                }

                
            }

            

            $request->session()->put('permission',$permission);
            

            return redirect()->route('admin.index');

        }else{
            $request->session()->flash('message','Invalid login Details');
            return redirect()->back();
        }

    }
    public function adminLogout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('admin.loginAdmin');
    }
}
