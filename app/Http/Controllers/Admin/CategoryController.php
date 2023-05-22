<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $categories=Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }
    // store Category
    public function storeCat(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories,category_name',
        ]);
        Category::insert([
            'category_name'=> $request->category_name,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Category Added Successfully');
    }
    //--------------------edit categories-------------------
    public function Edit($id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    //--------------------update categories-------------------
    public function updateCat(Request $request){
        $cat_id=$request->id;     
        Category::find($cat_id)->update([
            'category_name'=> $request->category_name,
             'updated_at' =>Carbon::now(),
        ]);
        return Redirect()->route('admin.category')->with('catUpdated','Category updated Successfully');
    }
    //--------------------delete categories-------------------
    public function Delete($id){
        Category::find($id)->delete();
        return Redirect()->back()->with('delete','Category Deleted Successfully');
    }
    //--------------------Inactive-------------------
    public function Inactive($id){
        Category::find($id)->update(['status'=>0]);
        return Redirect()->back()->with('message','Category Inactive Successfully');

    }
    //--------------------Active-------------------
    public function Active($id){
        Category::find($id)->update(['status'=>1]);
        return Redirect()->back()->with('message','Category active Successfully');

    }

}
