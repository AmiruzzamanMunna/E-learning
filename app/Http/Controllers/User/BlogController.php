<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\Cart;
use App\WishList;
use App\UserList;
use App\Coupon;
use App\Blog;
use App\HomePage;
use App\Menues;
use DB;

class BlogController extends Controller
{
    public function allBlog(Request $request)
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
        
      
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $homePage=HomePage::orderBy('homepage_id','desc')
                            ->first();

        $mostPopular=Blog::orderBy('blog_id','desc')
                            ->leftjoin('tbl_course_category','tbl_course_category.course_category_id','tbl_blog.blog_category_id')
                            ->get();
        $designDeveloment=Blog::orderBy('blog_id','desc')
                            ->leftjoin('tbl_course_category','tbl_course_category.course_category_id','tbl_blog.blog_category_id')
                            ->where('course_category_name','like','%'.'web design'.'%')
                            ->orwhere('course_category_name','like','%'.'development'.'%')
                            ->get();
        $itSoftware=Blog::orderBy('blog_id','desc')
                            ->leftjoin('tbl_course_category','tbl_course_category.course_category_id','tbl_blog.blog_category_id')
                            ->where('course_category_name','like','%'.'IT & Software'.'%')
                            ->get();
        
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('User.allblog')
                ->with('menues',$menues) 
                ->with('submenues',$submenues) 
                ->with('itSoftware',$itSoftware) 
                ->with('mostPopular',$mostPopular) 
                ->with('designDeveloment',$designDeveloment) 
                ->with('user',$user) 
                ->with('homePage',$homePage)
                ->with('category',$category) 
                ->with('subCategory',$subCategory);
    }
    public function blogDetails(Request $request,$id)
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
        
        $data=Blog::where('blog_id',$id)->first();
        $user=UserList::where('signup_id',$request->session()->get('loggedUser'))->first();
        $homePage=HomePage::orderBy('homepage_id','desc')->first();
        $relatedBlog=Blog::where('blog_category_id',$data->blog_category_id)
                            ->whereNotIn('blog_id',[$data->blog_id])
                            ->leftjoin('tbl_course_category','tbl_course_category.course_category_id','tbl_blog.blog_category_id')
                            ->get();
        
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();

        return view('User.blogdetails')
                ->with('user',$user) 
                ->with('homePage',$homePage)
                ->with('menues',$menues)
                ->with('submenues',$submenues)
                ->with('relatedBlog',$relatedBlog) 
                ->with('category',$category) 
                ->with('data',$data) 
                ->with('subCategory',$subCategory);
    }
}
