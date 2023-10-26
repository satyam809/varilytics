<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Models\Users;
use App\Models\Permission;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        //return 'test';
        $data = Testimonial::select('*')->get();
       // return $data;
        return view('admin.header') . view('admin.testimonial.index',['data'=>$data]) . view('admin.footer');
    }
    public function save(Request $r){
        Testimonial::where('id',$r->input('id'))->update(['partners'=>$r->input('partners'),'corporates'=>$r->input('corporates')]);
        return array('status'=>true,'message'=>'Updated Successfully');
    }
    
}
