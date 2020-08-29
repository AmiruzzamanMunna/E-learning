<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\CourseCategory;

class BlogController extends Controller
{
    public function blogList(Request $request)
    {
        $data=Blog::all();
        return view('Blog.bloglist')
                ->with('data',$data);
    }
    public function blogAdd(Request $request)
    {
        $category=CourseCategory::all();
    
        return view('Blog.blogadd')
                ->with('category',$category);
    }
    public function blogInsert(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'authorname'=>'required',
            'description'=>'required',
        ]);
        $data=new Blog();
        $data->blog_title=$request->title;
        $data->blog_category_id=$request->category_id;
        $data->blog_blooger_name=$request->authorname;
        $data->blog_details=$request->description;
        if ($request->hasFile('file')) {
            
            $image = $request->file('file');
            $user_image = time().'blog-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Blog');
            $image->move($location, $user_image);
            $data->blog_image = $user_image;
        }
        $data->blog_date=date('Y-m-d');
        $data->save();
        $request->session()->flash('message','Data Inserted');
        return redirect()->route('admin.blogList');
    }
    public function blogEdit(Request $request,$id)
    {
        $data=Blog::where('blog_id',$id)->first();
        $category=CourseCategory::all();
        return view('Blog.blogedit')
                ->with('category',$category)
                ->with('data',$data);
    }
    public function blogUpdate(Request $request,$id)
    {
        $data=Blog::where('blog_id',$id)->first();
        $data->blog_title=$request->title;
        $data->blog_category_id=$request->category_id;
        $data->blog_blooger_name=$request->authorname;
        $data->blog_details=$request->description;
        if ($request->hasFile('file')) {
            
            $image = $request->file('file');
            $user_image = time().'blog-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Blog');
            $image->move($location, $user_image);
            $data->blog_image = $user_image;
        }
    
        $data->save();
        $request->session()->flash('message','Data Inserted');
        return redirect()->route('admin.blogList');
    }
    public function blogDelete(Request $request,$id)
    {
        $data=Blog::where('blog_id',$id)->delete();
        $request->session()->flash('message','Data Deleted');
        return back();

    }
}
