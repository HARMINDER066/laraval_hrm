<?php

namespace App\Http\Controllers\vendor;
use Auth;
use App\Models\Package;
use App\Models\Leave;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DataTables;


class LeaveController extends Controller
{

     public function index(Request $request)
    {
                $admin_id =  Auth::guard('vendor')->user()->id;
        if ($request->ajax()) {
            $data = leave::with(['user','admin'])->where('admin_id',$admin_id)->orderby('id','desc')->select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                     ->addColumn('user', function ($data) {
                            return $data->user->first_name;
                        })
                      ->addColumn('admin', function ($data) {
                            return $data->admin->name;
                        })
                    ->addColumn('status', function ($data) {
                            if ($data->status == 0) {
                                return '<span class="badge bg-primary">Pending</span>';
                            } 
                             if ($data->status == 1) {
                                return '<span class="badge bg-success">Approved</span>';
                            }
                            if ($data->status == 2) {
                                return '<span class="badge bg-danger">Rejected</span>';
                            }
                        })
                    ->addColumn('action', function($data){
     
                           $btn = '<a href="' . route('vendor.leave.edit_leave', ['id' => $data->id]) . '" class="mx-1"><i class="fadeIn animated bx bx-edit-alt"></i></a>';
                             $btn .= '<a href="javascript:void(0)" data-value = "' . route('vendor.leave.delete', ['id' => $data->id]) . '" class="mx-1 delete_package"><i class="fadeIn animated bx bx-trash-alt"></i></a>'; 
                              $btn .= '<a class="mx-1 ajaxviewmodel" href="' . route('vendor.leave.leave_status_change', ['id' => $data->id]) . '"><i class="fadeIn animated bx bx-reset"></i></a>';   
                            return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }
        
        return view('vendor.leave.index');
    }

   
    public function add(){
        $user_id =  Auth::guard('vendor')->user()->id;
        $user= User::where('parent_id',$user_id)->get();
        return view('vendor.leave.add',['user'=>$user]);
    }
    public function store(Request $request){
        $admin_id =  Auth::guard('vendor')->user()->id;

        $request->validate([
        'employee_id' => 'required',
        'leave_reason' => 'required',
        'datefrom' => 'required',
        'dateto' => 'required',
        'description' => 'required',
        'status' => 'required',
    ]);

            $data =$request->all();
            $insert = Leave::create([
            'employee_id' => $data['employee_id'],
             'admin_id' => $admin_id,
            'leave_reason' => $data['leave_reason'],
            'datefrom' => $data['datefrom'],
             'dateto' => $data['dateto'],
             'description' => $data['description'],
             'status' => $data['status'],
        ]);
            if($insert)
            {
                Session::flash('success', 'Leave Succesfully Add');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
       
    }
   

    public function leave_edit($id)
    {
                $user_id =  Auth::guard('vendor')->user()->id;
            $user= User::where('parent_id',$user_id)->get();
                $leave = Leave::with('user')->findorfail($id);
                return view('vendor.leave.edit', ["user"=>$user, "leave"=>$leave]);
    }

    public function leave_edit_save(Request $request, $id)
    {
          $request->validate([
        'employee_id' => 'required',
        'leave_reason' => 'required',
        'datefrom' => 'required',
        'dateto' => 'required',
        'description' => 'required',
        'status' => 'required',
    ]);
                $leave = Leave::findorfail($id);
                $leave->employee_id = $request->employee_id;
                $leave->leave_reason = $request->leave_reason;
                $leave->datefrom = $request->datefrom;
                $leave->dateto = $request->dateto;
                $leave->description = $request->description;
                $leave->status = $request->status;
                $leave->save();
                if($leave)
            {
                Session::flash('success', 'Leave Succesfully Update');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
               // return view('admin.user.edit', ["user"=>$user]);
    }
    public function leave_delete($id){
         $leave = Leave::findorfail($id);
         $leave->delete();
         if($leave)
         {
                return 1;
         }
         else
         {
                 return 0;
         }
       
    }

     public function leave_status_change(Request $request, $id) {
        $data = Leave::where('id', $id)->first();
        if ($request->isMethod('post')) {
            $data->status = $request->status;

            $data->save();
             if($data)
            {
                Session::flash('success', 'Leave Status Change');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
        }
        return view('vendor.leave.changestatus', ['data' => $data]);
    }
 
}
