<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request,$product_id){
  
        $check=Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
        if($check){
            Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('qty');
            return Redirect()->back()->with('cart','Product Added to cart.');
        }else{
            Cart::insert([
                'product_id'=>$product_id,
                'qty'=>1,
                'price'=>$request->price,
                'user_ip'=>request()->ip(),            
            ]); return Redirect()->back()->with('cart','Product Added to cart.'); 

        }       

    }
}
