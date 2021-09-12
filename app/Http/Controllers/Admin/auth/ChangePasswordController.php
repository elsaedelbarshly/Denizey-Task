<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use App\Model\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function changePassword()
    {
        return view('admin.auth.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $password=Auth::user()->password;
        $oldpass=$request->oldpass;
        $newpass=$request->password;
        $confirm=$request->password_confirmation;
        if (Hash::check($oldpass,$password)) {
             if ($newpass === $confirm) {
                        $user=Admin::find(Auth::id());
                        $user->password=Hash::make($request->password);
                        $user->save();
                        Auth::logout();  
                        $notification=array(
                          'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                          'alert-type'=>'success'
                           );
                         return Redirect()->route('admin.login')->with($notification); 
                   }else{
                       $notification=array(
                          'messege'=>'New password and Confirm Password not matched!',
                          'alert-type'=>'error'
                           );
                         return Redirect()->back()->with($notification);
                   }     
        }else{
          $notification=array(
                  'messege'=>'Old Password not matched!',
                  'alert-type'=>'error'
                   );
                 return Redirect()->back()->with($notification);
        }
    }
}
