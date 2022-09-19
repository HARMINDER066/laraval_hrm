<?php

namespace App\Http\Controllers\vendor\auth;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
        {
             $this->middleware('guest')->except('logout');
            $this->middleware('guest:vendor')->except('logout');

        }

    public function showvendorLoginForm()
    {
        return view('vendor.auth.login');
    }

    public function vendorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'is_super' =>0, 'type' => 'vendor'])) {
            Session::flash('success', 'Login Success');
            return redirect()->route('vendor.useradd');
        }
         Session::flash('error', 'Credential Not Found');
        return back()->withInput($request->only('email', 'remember'));
    }
       public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    Session::flash('success', 'Admin Logout');
    return redirect()->route('vendor.login');
}
}
