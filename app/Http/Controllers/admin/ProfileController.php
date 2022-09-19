<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use DataTables;


class ProfileController extends Controller
{

    
    public function add(){
        $user_id =  Auth::guard('admin')->user()->id;
        $user = Admin::where('id',$user_id)->first();
        return view('admin.profile.index', compact('user'));
    }
    public function store(Request $request, $id){
                 $admin = Admin::findorfail($id);
    if($request->hasFile('image')){
         @unlink('assets/user/'. $admin->image);
         $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
         $image = 'image'.time().rand().'.'.$extension;
         $file->move('assets/user/', $image);
         $admin->image = $image;
     }
     else
     {
         $admin->image = $admin->image;
     }
      $admin->name = $request->name;
      $admin->email = $request->email;
      $admin->phone = $request->phone;
      $admin->address = $request->address;
      $admin->company_name = $request->company_name;
   $admin->save();

            if($admin)
            {
                Session::flash('success', 'Admin Profile Updated');
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();

    }
    public function passwordsave(Request $request, $id){
                 $admin = Admin::findorfail($id);
                 if($request->password != $request->repeat_password)
                 {
                    Session::flash('error', 'Some thing is wrong. Please try again');
                      return redirect()->back();

                 }
                 else
                 {    
                    $admin->password = Hash::make($request->password);
                    $admin->save();

                        if($admin)
                        {
                            Session::flash('success', 'Admin Profile Updated');
                        }
                        else
                        {
                            Session::flash('error', 'Some thing is wrong. Please try again');
                        }
                             return redirect()->back();
                 }

    }

   
 
}
