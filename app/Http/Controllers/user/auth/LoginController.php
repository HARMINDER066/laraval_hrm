<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
      public function __construct()
        {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:user')->except('logout');
        }

        public function showuserLoginForm()
    {
        return view('auth.login', ['url' => 'writer']);
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/writer');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

}
