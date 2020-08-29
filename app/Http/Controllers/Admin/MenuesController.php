<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menues;
use App\Pages;

class MenuesController extends Controller
{
    public function menueList(Request $request)
    {
        $menues=Menues::where('menu_parent_id',0)->get();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('Menue.menuelist')
                ->with('menues',$menues)
                ->with('submenues',$submenues);
    }
    public function menueAdd(Request $request)
    {
        $menues=Menues::where('menu_parent_id',0)->get();
        return view('Menue.menueadd')
                ->with('menues',$menues);
    }
    public function menueAddStore(Request $request)
    {
        $request->validate([

            'menuename'=>'required'
        ]);

        $data=new Menues();
        $data->menu_name=$request->menuename;
        $data->menu_parent_id=$request->menueid;
        $data->save();
        Menues::where('menu_id',$data->menu_id)->update(['menu_order_id'=>$data->menu_id]);
        $request->session()->flash('message','Data Inserted');
        return redirect()->route('admin.menueList');
    }
    public function menueEdit(Request $request,$id)
    {
        $data=Menues::where('menu_id',$id)->first();
        $menues=Menues::where('menu_parent_id',0)->get();
        return view('Menue.menueedit')
                ->with('data',$data)
                ->with('menues',$menues);
    }
    public function menueUpdate(Request $request,$id)
    {
        $data=Menues::where('menu_id',$id)->first();
        $data->menu_name=$request->menuename;
        $data->menu_parent_id=$request->menueid;
        $data->save();
        Menues::where('menu_id',$data->menu_id)->update(['menu_order_id'=>$data->menu_id]);
        $request->session()->flash('message','Data Updated');
        return redirect()->route('admin.menueList');
    }
    public function menueDelete(Request $request,$id)
    {
        $data=Menues::where('menu_id',$id)->delete();
        $request->session()->flash('message','Data Deleted');
        return redirect()->route('admin.menueList');
    }
    public function pageList(Request $request)
    {
        $data=Pages::all();
        return view('Page.pagelist')
                ->with('data',$data);
    }
    public function pageAdd(Request $request)
    {
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('Page.pageadd')
                ->with('submenues',$submenues);
    }
    public function pageAddStore(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'link'=>'required',
            'submenu_id'=>'required',
            'description'=>'required',
        ]);

      
        $data=new Pages();
        $data->pages_submenu_id=$request->submenu_id;
        $data->pages_title=$request->title;
        $data->pages_link=$request->link;
        $data->pages_description=$request->description;
        $data->save();
        $request->session()->flash('message','Data Inserted');
        return redirect()->route('admin.pageList');
    }
    public function pageEdit(Request $request,$id)
    {
        $data=Pages::where('pages_id',$id)->first();
        $submenues=Menues::where('menu_parent_id','>',0)->get();
        return view('Page.pageedit')
                ->with('submenues',$submenues)
                ->with('data',$data);
    }
    
    public function pageEditUpdate(Request $request,$id)
    {
        $data=Pages::where('pages_id',$id)->first();
        $data->pages_submenu_id=$request->submenu_id;
        $data->pages_title=$request->title;
        $data->pages_link=$request->link;
        $data->pages_description=$request->description;
        $data->save();
        $request->session()->flash('message','Data Updated');
        return redirect()->route('admin.pageList');
    }
    public function pageDelete(Request $request,$id)
    {
        $data=Pages::where('pages_id',$id)->delete();
        $request->session()->flash('message','Data Deleted');
        return redirect()->route('admin.pageList');
    }
}
