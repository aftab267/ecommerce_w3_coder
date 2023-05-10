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
}
