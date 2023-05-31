<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products=Product::where('Status',1)->latest()->get();
        $lts_p=Product::where('status',1)->latest()->limit(3)->get();
        $categories=Category::where('status',1)->latest()->get();
        return view('pages.index',compact('products','categories','lts_p'));
    }
    //--------------------Product Details-----------------------
    public function productDetails($product_id){
        $product=Product::findOrFail($product_id);
        $category_id=$product->category_id;
        $related_p=Product::where('category_id',$category_id)->where('id','!=',$product_id)->latest()->get();
        return view('pages.product-details',compact('product','related_p'));

    }
}
