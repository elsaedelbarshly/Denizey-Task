<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
      
            $category = Category::create([
                'cat_name' => $request->cat_name
            ]);
            $notificatio=array(
                'messege' =>'Category Created Successfuly',
                'alert-type' => 'success',
            );
           return redirect()->back()->with($notificatio);
   
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {


        $category=Category::where('id',$id)->update([
            'cat_name' => $request->cat_name
        ]);
        
        if($category){
            $notificatio=array(
                    'messege' =>'Category Update Successfuly',
                    'alert-type' => 'success',
                );
                return redirect()->route('show-category')->with($notificatio);
            }
            else
            {
                $notificatio=array(
                    'messege' => 'Nothing To Update',
                    'alert-type' => 'warning',
                );
                return redirect()->route('')->with($notificatio);
            }
    }

    public function destroy($id)
    {

            $category=Category::find($id);
            $category->delete();
            $notificatio=array(
                'messege' =>'Category Deleted Successfuly',
                'alert-type' => 'success',
            );
           return redirect()->back()->with($notificatio);
       
    }
}
