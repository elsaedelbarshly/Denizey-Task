<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Skill;
class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $skill=Skill::select('skill_name');
        return view('admin.skills.index',compact('skill'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $this->validate($reques,[
            'skill_name'=>'required',
        ]);

        $skill = Skill::create([
            'skill_name'=>$request->ski_name,
        ]);
        $notificatio=array(
            'messege' =>'Skill Created Successfuly',
            'alert-type' => 'success',
        );
       return redirect()->rouet('show-skill')->with($notificatio);

    }

    public function edit($id)
    {
        $skill=Skill::select('Skill_name')->find('id');
        return view('admin.skills.edit',compact('skill'));
    }

    public function update(Request $request,$id)
    {
        $skill = Skill::where('id',$id)->update([
            'skill_name'=>$request->skill_name,
        ]);
        $notificatio=array(
            'messege' =>'Skill Updated Successfuly',
            'alert-type' => 'success',
        );
       return redirect()->rouet('show-skill')->with($notificatio);
    }

    public function destroy($id)
    {
        $skill=Skill::find($id);
        $skill->deleted();
        $notificatio=array(
            'messege' =>'Skill Deleted
             Successfuly',
            'alert-type' => 'warning',
        );
       return redirect()->back()->with($notificatio);
    }
   
}