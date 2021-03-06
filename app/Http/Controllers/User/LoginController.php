<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UserList;
use App\CourseCategory;
use App\HomePage;
use App\Menues;
use DB;
use Redirect;

class LoginController extends Controller
{
    public function login(Request $request)
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
        return view('User.login')
                ->with('homePage',$homePage)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('category',$category)
                ->with('subCategory',$subCategory);
    }
    public function loginCheck(Request $request)
    {
        $data=UserList::where('signup_email',$request->email)->first();

        $url=$request->url;
        

        if($data && Hash::check($request->password, $data->signup_password)){

            $request->session()->put('loggedUser',$data->signup_id);

            return Redirect::to($url);

        }else{

            $request->session()->flash('message','Incorrect username & Password');

            return back();
        }
    }
    public function logOut(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route('user.index'));
    }
}
