<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
   public function index(){
    $carts=Cart::where('user_ip',request()->ip())->latest()->get();
        $subtotal=Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
        });       
    return view('pages.checkout',compact('carts','subtotal')); 
    if(Auth::check()){
        return view('pages.checkout');
    }else{
        return redirect()->route('login');
    }    
   }

}
