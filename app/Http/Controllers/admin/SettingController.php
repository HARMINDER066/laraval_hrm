<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use DataTables;


class SettingController extends Controller
{

    
    public function add(){
        $basicinfo = Setting::first();
        return view('admin.setting.add', compact('basicinfo'));
    }
    public function store(Request $request){

       $basicinfo = Setting::first();
      if($request->hasFile('header_logo')){
         @unlink('assets/front/img/'. $basicinfo->header_logo);
         $file = $request->file('header_logo');
         $extension = $file->getClientOriginalExtension();
         $header_logo = 'header_logo_'.time().rand().'.'.$extension;
         $file->move('assets/front/img/', $header_logo);
         $basicinfo->header_logo = $header_logo;
     }
     
      if($request->hasFile('fav_icon')){
         @unlink('assets/front/img/'. $basicinfo->fav_icon);
         $file = $request->file('fav_icon');
         $extension = $file->getClientOriginalExtension();
         $fav_icon = 'fav_icon_'.time().rand().'.'.$extension;
         $file->move('assets/front/img/', $fav_icon);
         $basicinfo->fav_icon = $fav_icon;
     }

     
       $basicinfo->website_title = $request->website_title;
       $basicinfo->sidebar_color = $request->currency_direction;
        $sidebar_color = $request->sidebar_color;
       $navbar_color = $request->navbar_color;
       $navbar_hover_color = $request->navbar_hover_color;
       $navbar_link_color = $request->navbar_link_color;


       $basicinfo->sidebar_color = $sidebar_color;
       $basicinfo->navbar_color = $navbar_color;
       $basicinfo->navbar_hover_color = $navbar_hover_color;
       $basicinfo->navbar_link_color = $navbar_link_color;

       $basicinfo->save();

            if($basicinfo)
            {
                Session::flash('success', 'Setting Succesfully Add');
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
       
    }
 
}
