<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function couponIndex(Request $request)
    {
        $couponlist=$request->session()->get('couponlist');

        if($couponlist){

            return view('Admin.coupon');
        }
        
    }
    public function getCouponList(Request $request)
    {
        $data=Coupon::all();
        $couponedit=$request->session()->get('couponedit');
        $coupondelete=$request->session()->get('coupondelete');
        return response()->json(array('status'=>'success','data'=>$data,'couponedit'=>$couponedit,'coupondelete'=>$coupondelete));
    }
    public function insertCoupon(Request $request)
    {
        $data=new Coupon();
        $data->coupon_name=$request->name;
        $data->coupon_limit=$request->limit;
        $data->coupon_amount=$request->amount;
        $data->coupon_start_date=$request->startdate;
        if($request->enddate>$request->startdate){

            $data->coupon_end_date=$request->enddate;

        }else{

            return response()->json(array('status'=>'error'));

        }
        
        $data->save();
        return response()->json(array('status'=>'success'));
    }
    public function editCoupon(Request $request)
    {
        $data=Coupon::where('coupon_id',$request->id)->first();
        return response()->json(array('status'=>'success','data'=>$data));
    }
    public function editCouponUpdate(Request $request)
    {
        $data=Coupon::where('coupon_id',$request->id)->first();
        $data->coupon_name=$request->name;
        $data->coupon_limit=$request->limit;
        $data->coupon_amount=$request->amount;
        $data->coupon_start_date=$request->startdate;
        if($request->enddate>$request->startdate){

            $data->coupon_end_date=$request->enddate;

        }else{

            return response()->json(array('status'=>'error'));

        }
        $data->save();
        return response()->json(array('status'=>'success'));
    }
    public function deleteCoupon(Request $request)
    {
        $data=Coupon::where('coupon_id',$request->id)->delete();
    }
}
