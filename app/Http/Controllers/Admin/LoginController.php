<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function getLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
         ]);

            if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'))) {
        //    return redirect()->intended(route('admi'));
            return redirect()->route('admin.dashBoard');
        }
        return back()->withInput($request->only('email', 'remember'));
        }





        public function logout(Request $request)
        {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
            return redirect()->route('admin.login')->with( $notification);
        }
}
