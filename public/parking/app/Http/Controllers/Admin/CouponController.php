<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SimpleSoftwareIO\QrCode\Facades\QrCode;




class CouponController extends Controller
{
    public function index()
    {
        // return 'test';
        return view('admin.header') . view('admin.coupon') . view('admin.footer');
        
    }


    public function addcoupondetails(Request $request){

        // return 'test';
        
        // $coupon_details = new Coupon;
        // $coupon_details->coupon = $request->coupon;
        // $coupon_details->discount = $request->discount;
       
        //  $coupon_details->save();
        // return redirect('admin/coupon')->with('success', 'Vehicle Details Successfully added'); 
	}


    public function Getcoupondetails(Request $r)
    {
        return Coupon::select('*')->where('id', $r->id)->get();
    }
	
	
}
