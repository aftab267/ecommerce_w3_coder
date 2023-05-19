<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;



class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //--------------Add Product----------------
    public function addProduct(){
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();
        return view('admin.product.add',compact('categories','brands'));
    }
    //--------------store Product----------------
    public function storeProduct(Request $request){
        $request->validate([
            'product_name'=>'required|max:255',
            'product_code'=>'required|max:255',
            'price'=>'required|max:255',
            'product_quantity'=>'required|max:255',            
            'category_id'=>'required|max:255',            
            'brand_id'=>'required|max:255',            
            'short_description'=>'required',
            'long_description'=>'required',
            'image_one'=>'required|mimes:jpg,png,jpeg,gif',
            'image_two'=>'required|mimes:jpg,png,jpeg,gif',
            'image_three'=>'required|mimes:jpg,png,jpeg,gif',            
        ],[
            'category_id.required'=>'select category name',
            'brand_id.required'=>'select brand name',
        ]); 
        $image_one=$request->file('image_one');
        $name_gen=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $image_url1='frontend/img/product/upload/'.$name_gen;

        $image_two=$request->file('image_two');
        $name_gen=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $image_url2='frontend/img/product/upload/'.$name_gen; 

        $image_three=$request->file('image_three');
        $name_gen=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $image_url3='frontend/img/product/upload/'.$name_gen; 
        
        Product::insert([
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'product_slug'=> strtolower(str_replace(' ','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'price'=>$request->price,
            'product_quantity'=>$request->product_quantity,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'image_one'=>$image_url1,
            'image_two'=>$image_url2,
            'image_three'=>$image_url3,
            'created_at'=> Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Product Added Successfully');
    }
     //--------------Manage Product----------------
    public function manageProduct(){
        $products=Product::latest()->get();
        return view('admin.product.manage',compact('products'));
    }
    //--------------edit Product----------------
    public function edit_pro($id){
        $product=Product::findOrFail($id);
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();

        return view('admin.product.edit',compact('product','categories','brands'));
    }
    //--------------Update Product----------------

    public function update_products(Request $request,$id){
        
        $request->validate([
            'product_name'=>'required|max:255',
            'product_code'=>'required|max:255',
            'price'=>'required|max:255',
            'product_quantity'=>'required|max:255',            
            'category_id'=>'required|max:255',            
            'brand_id'=>'required|max:255',            
            'short_description'=>'required',
            'long_description'=>'required',
            ]); 
        
        
        Product::findOrFail($id)->update([
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'product_slug'=> strtolower(str_replace(' ','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'price'=>$request->price,
            'product_quantity'=>$request->product_quantity,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,       
            'updated_at'=> Carbon::now(),
          ]);
         return Redirect()->route('manage-products')->with('success','Product Data Updated Successfully');
    }
    //--------------Update Images----------------
    public function updateImage( Request $request,$id){
            $old_one=$request->img_one;
            $old_two=$request->img_two;
            $old_three=$request->img_three;
            if($request->has('image_one')){
                unlink($old_one);
                $image_one=$request->file('image_one');
                $name_gen=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
                $image_url1='frontend/img/product/upload/'.$name_gen;

                Product::findOrFail($id)->update([
                    'image_one'=> $image_url1,
                    'updated_at'=>Carbon::now(),
                ]); 
                return Redirect()->route('manage-products')->with('success','Image  Updated Successfully');           

            } 
           
            if($request->has('image_two')){
                unlink($old_two);
                $image_two=$request->file('image_two');
                $name_gen=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
                $image_url1='frontend/img/product/upload/'.$name_gen;

                Product::findOrFail($id)->update([
                    'image_two'=> $image_url1,
                    'updated_at'=>Carbon::now(),
                ]); 

                
                return Redirect()->route('manage-products')->with('success','Image  Updated Successfully');           

            } 
            if($request->has('image_three')){
                unlink($old_three);
                $image_three=$request->file('image_three');
                $name_gen=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
                $image_url1='frontend/img/product/upload/'.$name_gen;

                Product::findOrFail($id)->update([
                    'image_three'=> $image_url1,
                    'updated_at'=>Carbon::now(),
                ]); 
                return Redirect()->route('manage-products')->with('success','Image  Updated Successfully');           

            } 
            
    }
     //--------------Delete product----------------
    public function deleteImage($id){
        $image=Product::findOrFail($id);

        $image_one=$image->image_one;
        $image_two=$image->image_two;
        $image_three=$image->image_three;
        unlink($image_one);
        unlink($image_two);
        unlink($image_three);
        Product::findOrFail($id)->delete();
        return Redirect()->back()->with('delete','Product deleted Successfully');

    }

    //--------------Inactive product----------------
    public function Inactive($id){
        Product::findOrFail($id)->update(['status'=>0]);
        return Redirect()->back()->with('success','product Inactive Successfully');
    }
    //--------------active product----------------
    public function active($id){
        Product::findOrFail($id)->update(['status'=>1]);
        return Redirect()->back()->with('success','product Activated Successfully');
    }

}
