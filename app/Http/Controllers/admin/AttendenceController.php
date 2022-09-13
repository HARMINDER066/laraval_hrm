<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Models\Attendence;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use DataTables;


class AttendenceController extends Controller
{

     public function index(Request $request)
    {
       if ($request->ajax()) {
                    $user_id =  Auth::guard('admin')->user()->id;
            $data = Attendence::with(['admin','user'])->where('user_id',$user_id)->select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                     ->addColumn('first_name', function($data){
                            return $data->user->first_name;
                    })
                      ->addColumn('last_name', function($data){
                            return $data->user->last_name;
                    })
                    ->addColumn('admin', function($data){
                            return $data->admin->name;
                    })
                    ->addColumn('action', function($data){
     
                          $btn = '<a class="mx-1 ajaxviewmodel" href="' . route('admin.users.edit_attendence', ['id' => $data->id]) . '"><i class="fadeIn animated bx bx-edit-alt"></i></a>';
                              $btn .= '<a href="javascript:void(0)" data-value = "' . route('admin.users.attendence_delete', ['id' => $data->id]) . '" class="mx-1 delete_customer"><i class="fadeIn animated bx bx-trash-alt"></i></a>';

                              
    
                            return $btn;
                    })
                    ->rawColumns(['action', 'status','first_name','last_name'])
                    ->make(true);
        }
        
        return view('admin.attendence.index');
    }

     public function all_employee_attendence(Request $request)
    {
       if ($request->ajax()) {
            $data = Attendence::with(['admin','user'])->select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                     ->addColumn('first_name', function($data){
                            return $data->user->first_name;
                    })
                      ->addColumn('last_name', function($data){
                            return $data->user->last_name;
                    })
                    ->addColumn('admin', function($data){
                            return $data->admin->name;
                    })
                    ->addColumn('action', function($data){
     
                          $btn = '<a class="mx-1 ajaxviewmodel" href="' . route('admin.users.edit_attendence', ['id' => $data->id]) . '"><i class="fadeIn animated bx bx-edit-alt"></i></a>';
                              $btn .= '<a href="javascript:void(0)" data-value = "' . route('admin.users.attendence_delete', ['id' => $data->id]) . '" class="mx-1 delete_customer"><i class="fadeIn animated bx bx-trash-alt"></i></a>';

                              
    
                            return $btn;
                    })
                    ->rawColumns(['action', 'status','first_name','last_name'])
                    ->make(true);
        }
    }

     public function user_attendence_edit(Request $request, $id)
    {
        $user = Attendence::where('id', $id)->first();
        if ($request->isMethod('post')) {
            $user->time_in =$request->time_in;
            $user->time_out =$request->time_out;
            $user->date =$request->date;
            $user->address =$request->address;
             $user->save();
             if($user)
            {
                Session::flash('success', 'Attendence  Change');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
        }
        return view('vendor.attendence.changeattendence', ['user' => $user]);
    }
    public function attendence_delete($id){
         $user = Attendence::findorfail($id);
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
    
}
