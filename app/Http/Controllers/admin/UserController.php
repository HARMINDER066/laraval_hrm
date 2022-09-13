<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use DataTables;


class UserController extends Controller
{

     public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('admin')->select('*');
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
                    ->addColumn('admin', function($data){
                            return $data->admin->name;
                    })
                    ->addColumn('action', function($data){
     
                           $btn = '<a href="' . route('admin.user.edit_user', ['id' => $data->id]) . '" class="mx-1"><i class="fadeIn animated bx bx-edit-alt"></i></a>';
                             $btn .= '<a href="javascript:void(0)" data-value = "' . route('admin.users.delete', ['id' => $data->id]) . '" class="mx-1 delete_customer"><i class="fadeIn animated bx bx-trash-alt"></i></a>';
                               $btn .= '<a class="mx-1 ajaxviewmodel" href="' . route('admin.users.customer_changepassword', ['id' => $data->id]) . '"><i class="fadeIn animated bx bx-reset"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }
        
        return view('admin.user.index');
    }
    public function add(){
        return view('admin.user.add');
    }
    public function store(Request $request){

        $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'phone' => 'required|unique:users',
        'address' => 'required',
        'organization' => 'required',
        'department' => 'required',
        'account_type' => 'required',
        'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb

    ]);

             if( $request->hasFile('image')) {       
            $image = $request->file('image');
            $path = public_path(). '/user/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
    }

            $parent_id =  Auth::guard('admin')->user()->id;
            $data =$request->all();
            $insert = User::create([
            'parent_id' => $parent_id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
             'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'type'=>'Employee',
            'status'=>1,
            'address' =>$data['address'],
            'organization' => $data['organization'],
            'department' => $data['department'],
            'account_type' => $data['account_type'],
             'image' => $filename,
        ]);
            if($insert)
            {
                Session::flash('success', 'Employee Succesfully Add');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
       
    }
    public function status_change(Request $request){
        $user = User::findorfail($request->id);
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
                $user = User::findorfail($id);
                return view('admin.user.edit', ["user"=>$user]);
    }

    public function user_edit_save(Request $request, $id)
    {
        
                $user = User::findorfail($id);
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
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->organization = $request->organization;
                $user->department = $request->department;
                $user->account_type = $request->account_type;
                $user->image = $filename;
                $user->save();
                if($user)
            {
                Session::flash('success', 'Employee Succesfully Update');
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
         $user = User::findorfail($id);
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
        $user = User::where('id', $id)->first();
        if ($request->isMethod('post')) {
            $user->password = Hash::make($request->new_password);

            $user->save();
             if($user)
            {
                Session::flash('success', 'Employee Password Change');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
        }
        return view('admin.user.changepassword', ['user' => $user]);
    }
}
