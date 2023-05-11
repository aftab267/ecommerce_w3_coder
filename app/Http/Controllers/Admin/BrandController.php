<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //----------------Index page----------------
    public function index(){
        $brands=Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }
    //----------------store ----------------
    public function store(Request $request){
        $request->validate([
            'brand_name'=>'required|unique:brands,brand_name',
        ]);
        Brand::insert([
            'brand_name'=> $request->brand_name,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Brand Added Successfully');
    }
    //--------------------edit brand-------------------
    public function Edit($id){
        $brand=Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }
    //--------------------update Brand-------------------
    public function updateBra(Request $request){
        $bra_id=$request->id;     
        Brand::find($bra_id)->update([
            'brand_name'=> $request->brand_name,
             'updated_at' =>Carbon::now(),
        ]);
        return Redirect()->route('admin.brand')->with('catUpdated','Brand updated Successfully');
    }
    //--------------------delete brand-------------------
    public function Delete($id){
        Brand::find($id)->delete();
        return Redirect()->back()->with('delete','Brand Deleted Successfully');
    }
    //--------------------Inactive-------------------
    public function Inactive($id){
        Brand::find($id)->update(['status'=>0]);
        return Redirect()->back()->with('success','Brand Inactive Successfully');

    }
    //--------------------Active-------------------
    public function Active($id){
        Brand::find($id)->update(['status'=>1]);
        return Redirect()->back()->with('success','Brand active Successfully');

    }
}
