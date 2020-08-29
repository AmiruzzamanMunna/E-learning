<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomePage;

class HomePageController extends Controller
{
    public function homePage(Request $request)
    {
        $data=HomePage::all();
        return view('HomePage.homelist')
                ->with('data',$data);
    }
    public function homeAdd(Request $request)
    {
        return view('HomePage.homeadd');
    }
    public function homeAddStore(Request $request)
    {
        $request->validate([
            'headerimage'=>'required',
            'headertitle'=>'required',
            'headerpera'=>'required',
            'middleimage'=>'required',
            'middletitle'=>'required',
            'middlepera'=>'required',
            'footerimage'=>'required',
            'footertitle'=>'required',
            'footerpera'=>'required',
        ]);
        
        $data=new HomePage();
        if ($request->hasFile('headerimage')) {
            
            $image = $request->file('headerimage');
            $user_image = time().'header-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Home');
            $image->move($location, $user_image);
            $data->homePage_header_image = $user_image;
        }
        $data->homePage_header_title=$request->headertitle;
        $data->homepage_header_paragraph=$request->headerpera;
        if ($request->hasFile('middleimage')) {
            
            $image = $request->file('middleimage');
            $user_image = time().'middle-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Home');
            $image->move($location, $user_image);
            $data->homepage_middle_image = $user_image;
        }
        $data->homePage_middle_title=$request->middletitle;
        $data->homepage_middle_paragraph=$request->middlepera;
        if ($request->hasFile('middleimage')) {
            
            $image = $request->file('footerimage');
            $user_image = time().'footer-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Home');
            $image->move($location, $user_image);
            $data->homePage_footer_image = $user_image;
        }
        $data->homePage_footer_title=$request->footertitle;
        $data->homePage_footer_paragraph=$request->footerpera;
        $data->save();
        $request->session()->flash('message','Data Inserted');
        return redirect()->route('admin.homePage');
    }
    public function homePageEdit(Request $request,$id)
    {
        $data=HomePage::where('homepage_id',$id)->first();
        return view('HomePage.homeedit')
                ->with('data',$data);
    }
    public function homePageEditUpdate(Request $request,$id)
    {
        $data=HomePage::where('homepage_id',$id)->first();
        if ($request->hasFile('headerimage')) {
            
            $image = $request->file('headerimage');
            $user_image = time().'header-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Home');
            $image->move($location, $user_image);
            $data->homePage_header_image = $user_image;
        }
        $data->homePage_header_title=$request->headertitle;
        $data->homepage_header_paragraph=$request->headerpera;
        if ($request->hasFile('middleimage')) {
            
            $image = $request->file('middleimage');
            $user_image = time().'middle-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Home');
            $image->move($location, $user_image);
            $data->homepage_middle_image = $user_image;
        }
        $data->homePage_middle_title=$request->middletitle;
        $data->homepage_middle_paragraph=$request->middlepera;
        if ($request->hasFile('middleimage')) {
            
            $image = $request->file('footerimage');
            $user_image = time().'footer-image-1.'.$image->getClientOriginalExtension();
            $location = public_path('assets/Home');
            $image->move($location, $user_image);
            $data->homePage_footer_image = $user_image;
        }
        $data->homePage_footer_title=$request->footertitle;
        $data->homePage_footer_paragraph=$request->footerpera;
        $data->save();
        $request->session()->flash('message','Data Updated');
        return redirect()->route('admin.homePage');
    }
    public function homePageDelete(Request $request,$id)
    {
        $data=HomePage::where('homepage_id',$id)->delete();
        $request->session()->flash('message','Data Updated');
        return redirect()->route('admin.homePage');
    }
}
