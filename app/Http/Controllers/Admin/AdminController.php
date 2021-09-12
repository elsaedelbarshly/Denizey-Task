<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Admin::all();
        return view('admin.Admins.index',compact('admin'));
    }

    public function create()
    {
        return view('admin.Admins.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>required,
            'email'=>required|email|unique,
            'password'=>required,
        ]);
        $admin = Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        $notificatio=array(
            'messege' =>'Admin Created Successfuly',
            'alert-type' => 'success',
        );
       return redirect()->rouet('show-admin')->with($notificatio);
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.Admins.edit',compact('admin'));
    }

    public function update(Request $reques,$id)
    {
        $admin = Admin::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        $notificatio=array(
            'messege' =>'Admin Updated Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->route('show-admin')->with($notificatio);
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        $notificatio=array(
            'messege' =>'Admin Deleted Successfuly',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notificatio);
    }

}
