<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use DataTables;
use Carbon\Carbon;

class VendorController extends Controller
{

     public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::where('is_super',0)->orderby('id','desc')->select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                            if ($data->status == 1) {
                                return '<input type="checkbox" ' . (($data->status == 1) ? "checked" : "") . '  class="switchery user_status_change"    data-size="small" data-value="' . $data->id . '"  >';
//                                return '<span class="label label-success">Active</span>';
                            } else {
                                return '<input type="checkbox" ' . (($data->status == 1) ? "checked" : "") . '  class="switchery user_status_change"    data-size="small" data-value="' . $data->id . '"  >';
//                                return '<span class="label label-default">Inactive</span>';
                            }
                        })
                    ->addColumn('action', function($data){
     
                           $btn = '<a href="' . route('admin.vendor.edit_vendor', ['id' => $data->id]) . '" class="mx-1"><i class="fadeIn animated bx bx-edit-alt"></i></a>';
                             $btn .= '<a href="javascript:void(0)" data-value = "' . route('admin.vendor.delete', ['id' => $data->id]) . '" class="mx-1 delete_customer"><i class="fadeIn animated bx bx-trash-alt"></i></a>';
                               $btn .= '<a class="mx-1 ajaxviewmodel" href="' . route('admin.vendor.customer_changepassword', ['id' => $data->id]) . '"><i class="fadeIn animated bx bx-reset"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }
        
        return view('admin.vendor.index');
    }
    public function add(){
        return view('admin.vendor.add');
    }
    public function store(Request $request){

        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'phone' => 'required|unique:users',
        'date_of_birth' => 'required',
        'address' => 'required',
        'date_of_birth' => 'required',
        'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb

    ]);

             if( $request->hasFile('image')) {       
            $image = $request->file('image');
            $path = public_path(). '/vendor/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
    }

            $parent_id =  Auth::guard('admin')->user()->id;
            $data =$request->all();
            $insert = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'is_super'=>0,
             'date_of_birth' => $data['date_of_birth'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'type'=>'vendor',
            'status'=>1,
            'address' =>$data['address'],
            'company_name' => $data['company_name'],
            'joining_date' => Carbon::now(),
             'image' => $filename,
        ]);
            if($insert)
            {
                Session::flash('success', 'Vendor Succesfully Add');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
       
    }
    public function status_change(Request $request){
        $user = Admin::findorfail($request->id);
        $user->status = $request->status;
        $user->save();
        if ($user) {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function user_edit($id)
    {
                $user = Admin::findorfail($id);
                return view('admin.vendor.edit', ["user"=>$user]);
    }

    public function user_edit_save(Request $request, $id)
    {
        
                $user = Admin::findorfail($id);
                    if( $request->hasFile('image')) {       
                        $image = $request->file('image');
                        $path = public_path(). '/user/';
                        $filename = time() . '.' . $image->getClientOriginalExtension();
                        $image->move($path, $filename);
                }
                    else
                    {
                        $filename= $user->image;
                    }
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->date_of_birth = $request->date_of_birth;
                $user->company_name = $request->company_name;
                $user->image = $filename;
                $user->save();
                if($user)
            {
                Session::flash('success', 'Vendor Succesfully Update');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
               // return view('admin.user.edit', ["user"=>$user]);
    }
    public function user_delete($id){
         $user = Admin::findorfail($id);
         $user->delete();
         if($user)
         {
                return 1;
         }
         else
         {
                 return 0;
         }
       
    }
   public function customer_changepassword(Request $request, $id) {
        $user = Admin::where('id', $id)->first();
        if ($request->isMethod('post')) {
            $user->password = Hash::make($request->new_password);

            $user->save();
             if($user)
            {
                Session::flash('success', 'Vendor Password Change');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
        }
        return view('admin.vendor.changepassword', ['user' => $user]);
    }
}
