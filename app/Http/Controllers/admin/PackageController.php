<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use DataTables;


class PackageController extends Controller
{

     public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Package::orderby('id','desc')->select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                            if ($data->status == 1) {
                                return '<input type="checkbox" ' . (($data->status == 1) ? "checked" : "") . '  class="switchery package_status_change"    data-size="small" data-value="' . $data->id . '"  >';
//                                return '<span class="label label-success">Active</span>';
                            } else {
                                return '<input type="checkbox" ' . (($data->status == 1) ? "checked" : "") . '  class="switchery package_status_change"    data-size="small" data-value="' . $data->id . '"  >';
//                                return '<span class="label label-default">Inactive</span>';
                            }
                        })
                    ->addColumn('action', function($data){
     
                           $btn = '<a href="' . route('admin.package.edit_package', ['id' => $data->id]) . '" class="mx-1"><i class="fadeIn animated bx bx-edit-alt"></i></a>';
                             $btn .= '<a href="javascript:void(0)" data-value = "' . route('admin.package.delete', ['id' => $data->id]) . '" class="mx-1 delete_package"><i class="fadeIn animated bx bx-trash-alt"></i></a>';    
                            return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }
        
        return view('admin.package.index');
    }
    public function add(){
        return view('admin.package.add');
    }
    public function store(Request $request){

        $request->validate([
        'title' => 'required',
        'price' => 'required',
        'time' => 'required',
        'feature' => 'required',
        'no_employee' => 'required',
    ]);

            $data =$request->all();
            $insert = Package::create([
            'title' => $data['title'],
            'price' => $data['price'],
             'time' => $data['time'],
             'feature' => $data['feature'],
             'no_employee' => $data['no_employee'],
             'status' => 1,
        ]);
            if($insert)
            {
                Session::flash('success', 'Package Succesfully Add');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
       
    }
    public function status_change(Request $request){
        $package = Package::findorfail($request->id);
        $package->status = $request->status;
        $package->save();
        if ($package) {
            return 1;
        }
        else
        {
                return 0;
        }
    }

    public function package_edit($id)
    {
                $package = Package::findorfail($id);
                return view('admin.package.edit', ["package"=>$package]);
    }

    public function package_edit_save(Request $request, $id)
    {
         $request->validate([
        'title' => 'required',
        'price' => 'required',
        'time' => 'required',
        'feature' => 'required',
        'no_employee' => 'required',
    ]);
                $package = Package::findorfail($id);
                $package->title = $request->title;
                $package->price = $request->price;
                $package->time = $request->time;
                $package->feature = $request->feature;
                $package->no_employee = $request->no_employee;
                $package->save();
                if($package)
            {
                Session::flash('success', 'Package Succesfully Update');
               return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Some thing is wrong. Please try again');
            }
                 return redirect()->back();
               // return view('admin.user.edit', ["user"=>$user]);
    }
    public function package_delete($id){
         $package = Package::findorfail($id);
         $package->delete();
         if($package)
         {
                return 1;
         }
         else
         {
                 return 0;
         }
       
    }
 
}
