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
            'discount'=> $request->discount,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Coupon Added Successfully');
    }
    public function coupomEdit($id){
        $coupon=Coupon::findOrFail($id);
        return view('admin.coupon.edit',compact('coupon'));
    }
    //--------------------update Brand-------------------
    public function updateCoupon(Request $request,$id){
        
        Coupon::find($id)->update([
            'coupon_name'=> strtoupper($request->coupon_name),
            'discount'=> $request->discount,
             'updated_at' =>Carbon::now(),
        ]);
        return Redirect()->route('admin.coupon')->with('catUpdated','Coupon updated Successfully');
    }
    //--------------------delete Coupon-------------------
    public function Delete($id){
        Coupon::find($id)->delete();
        return Redirect()->back()->with('delete','Coupon Deleted Successfully');
    }
     //--------------------Inactive-------------------
     public function Inactive($id){
        Coupon::find($id)->update(['status'=> 0]);
        return Redirect()->back()->with('success','Coupon Inactive Successfully');

    }
    //--------------------Active-------------------
    public function Active($id){
        Coupon::find($id)->update(['status'=>1]);
        return Redirect()->back()->with('success','Coupon active Successfully');

    }
}
