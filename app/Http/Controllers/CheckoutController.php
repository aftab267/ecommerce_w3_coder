<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
   public function index(){
    if(Auth::check()){
        return view('pages.checkout');
    }else{
        return redirect()->route('login');
    }
    
   }
}
