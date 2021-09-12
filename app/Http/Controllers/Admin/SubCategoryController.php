<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SubCategory;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.subcategory.index')->with('subcategories',SubCategory::all())->with('categories',Category::all());
    }
    public function create()
    {
        return view('admin.subcategory.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "subcat_name"=>"required",
            "category_id" => "required",
        ]);

        $subcategory = SubCategory::create([
            'subcat_name'=>$request->subcat_name,
            'category_id'=>$request->category_id
        ]);

        $notificatio=array(
            'messege' =>'Sub Category Create Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->route('store-subcategory')->with($notificatio);

    }

    public function edit($id)
    {
        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('admin.subcategory.edit',compact('subcategory','category'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            "subcat_name"=>"required",
            "category_id" => "required",
        ]);

        $subcategory = SubCategory::where('id',$id)->update([
            'category_id'=>$request->category_id,
            'subcat_name'=>$request->subcat_name,
            
        ]);

        $notificatio=array(
            'messege' =>'Sub Category Updated Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->route('show-subcategory')->with($notificatio);

    }

    public function destroy($id)
    {
        
        $subcategory = subCategory::find($id);
        $subcategory->delete();
        $notificatio=array(
            'messege' =>'Sub Category Deleted Successfuly',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notificatio);
    }
}
