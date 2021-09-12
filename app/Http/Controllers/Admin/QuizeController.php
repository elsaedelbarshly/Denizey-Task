<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Quize;
use App\Model\Category;
use App\Model\Skill;
class QuizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.quize.index')->with('categories',Category::all())->with('skills',Skill::all());
    }

    public function create()
    {
        return view('admin.quize.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "title"=>"required",
            "description" => "required",
            "level" => "required",
            "duration" => "required",
            "question_num" => "required",
            "price" => "required",
            "timer" => "required",
            "category_id" => "required",
            "skill_id" => "required",
            
        ]);

        $quizes = Quize::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'level'=>$request->level,
            'duration'=>$request->duration,
            'question_num'=>$request->question_num,
            'price'=>$request->price,
            'timer'=>$request->timer,
            'category_id'=>$request->category_id,
            'skill_id'=>$request->skill_id,
        ]);

        $notificatio=array(
            'messege' =>'Quize Create Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->route('show-quize')->with($notificatio);
    }

    public function edit($id)
    {
        $quize = DB::table('quizes')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        $skill = DB::table('skills')->get();
        return view('admin.quize.edit',compact('quize','category','skill'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            "title"=>"required",
            "description" => "required",
            "level" => "required",
            "duration" => "required",
            "question_num" => "required",
            "price" => "required",
            "timer" => "required",
            "category_id" => "required",
            "skill_id" => "required",
        ]);

        $quizes = Quize::where('id',$id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'level'=>$request->level,
            'duration'=>$request->duration,
            'question_num'=>$request->question_num,
            'price'=>$request->price,
            'timer'=>$request->timer,
            'category_id'=>$request->category_id,
            'skill_id'=>$request->skill_id,
            
        ]);

        $notificatio=array(
            'messege' =>'Quize Updated Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->route('show-quize')->with($notificatio);
    }

    public function destroy($id)
    {
        $quize = Quize::find($id);
        $quize->delete();
        $notificatio=array(
            'messege' =>'Quize Deleted Successfuly',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notificatio);
    }
}
