<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UserList;

class RegisteredUserController extends Controller
{
    public function userList(Request $request)
    {
        $permission=$request->session()->get('permission');
        $userList=$request->session()->get('userlist');
        $courselist=$request->session()->get('courselist');
    

        if($userList){

            return view('Admin.userlist')
                    ->with('userList',$userList);

        }
        
    }
    public function getUserList(Request $request)
    {
        $permission=$request->session()->get('permission');
        $userEdit=$request->session()->get('useredit');
        $userDelete=$request->session()->get('userdelete');
        $data=UserList::all();
        return response()->json(array('status'=>'success','data'=>$data,'userEdit'=>$userEdit,'userDelete'=>$userDelete));
    }
    public function editUserList(Request $request)
    {
        $id=$request->id;

        $data=UserList::where('signup_id',$id)->first();
        $image=asset('assets/images/users/'.$data->signup_image);

        return response()->json(array('status'=>'success','data'=>$data,'image'=>$image));
    }
    public function insertUserList(Request $request)
    {
        ini_set('memory_limit', -1);

        $id=$request->id;
        $name=$request->name;
        $email=$request->email;
        $address=$request->address;
        $phnnum=$request->phnnum;
        $pass=$request->pass;

        $checkEmail=UserList::where('signup_email',$email)->first();
      

        $data=new UserList();

        $data->signup_name=$name;
        if($checkEmail){

            return response()->json(array('status'=>'exist'));

        }else{

            $data->signup_email=$email;

        }
        
        $data->signup_address=$address;
        $data->signup_phonum=$phnnum;
        $data->signup_password=Hash::make($pass);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $user_image = time().'user-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/users');
            $image->move($location, $user_image);
            $data->signup_image = $user_image;
        }
        $data->save();
        
    }
    public function editUserListUpdate(Request $request)
    {
        ini_set('memory_limit', -1);

        $id=$request->id;
        $name=$request->name;
        $email=$request->email;
        $address=$request->address;
        $phnnum=$request->phnnum;
        $pass=$request->pass;
        $upass=$request->upass;

        $data=UserList::where('signup_id',$id)->first();

        $data->signup_name=$name;
        $data->signup_address=$address;
        $data->signup_phonum=$phnnum;
        if($upass){

            $data->signup_password=Hash::make($upass);

        }else{

            $data->signup_password=$pass;

        }
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $user_image = time().'user-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/users');
            $image->move($location, $user_image);
            $data->signup_image = $user_image;
        }
        $data->save();
        
    }
    public function deleteUserList(Request $request)
    {
        $id=$request->id;
        $data=UserList::where('signup_id',$id)->delete();
        return response()->json(array('status'=>'success'));
    }
}
