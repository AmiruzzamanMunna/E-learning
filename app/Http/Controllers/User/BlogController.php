<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\Cart;
use App\WishList;
use App\Coupon;
use App\Blog;
use DB;

class BlogController extends Controller
{
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

        return view('User.blogdetails')
                
                ->with('category',$category) 
                ->with('data',$data) 
                ->with('subCategory',$subCategory);
    }
}
