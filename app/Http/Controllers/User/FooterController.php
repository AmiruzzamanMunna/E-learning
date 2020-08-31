<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menues;
use App\Pages;
use App\CourseCategory;
use App\HomePage;
use App\UserList;
use DB;

class FooterController extends Controller
{
    public function footerIndex(Request $request,$link)
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
        $data=Pages::leftjoin('tbl_menu','tbl_menu.menu_id','tbl_pages.pages_submenu_id')
                    ->where('menu_name',$link)
                    ->first();
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        
        return view('User.allpages')
                ->with('user',$user)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('homePage',$homePage)
                ->with('category',$category)
                ->with('subCategory',$subCategory)
                ->with('data',$data);
    }
}
