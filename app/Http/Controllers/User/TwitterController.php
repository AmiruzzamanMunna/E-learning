<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\UserList;
use App\CourseCategory;
use App\HomePage;
use DB;

class TwitterController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('twitter')->user();

        // $user->token;



        $checkEmail=UserList::where('signup_email',$user->getEmail())->first();

        if($checkEmail){

            $request->session()->put('loggedUser',$checkEmail->signup_id);
            return redirect()->route('user.index');

        }else{

            $data=new UserList();
            $data->signup_name=$user->getName();
            $data->signup_email=$user->getEmail();
            $data->signup_social_type=1;
            $data->save();
            $request->session()->put('loggedUser',$data->signup_id);
            return redirect()->route('user.index');

        }

        
        
    }
}
