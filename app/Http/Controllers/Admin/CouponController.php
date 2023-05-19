<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $coupons=Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));
    }
    //----------------store ----------------
    public function storeCoupon(Request $request){
        $request->validate([
            'coupon_name'=>'required|unique:coupons,coupon_name',
        ]);
        Coupon::insert([
            'coupon_name'=> strtoupper($request->coupon_name),
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Coupon Added Successfully');
    }
}
