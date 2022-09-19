<?php

namespace App\Http\Controllers\admin\auth;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

     public function __construct()
        {
           $this->middleware('guest')->except('logout');
            $this->middleware('guest:admin')->except('logout');

        }

     public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'is_super' => 1])) {
            Session::flash('success', 'Login Success');
            return redirect()->route('admin.useradd');
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
    return redirect()->route('admin.login');
}
}
