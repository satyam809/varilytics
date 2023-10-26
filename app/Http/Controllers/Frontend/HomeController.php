<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Customer;
use App\Models\Infographic;
use App\Models\Slider;

class HomeController extends Controller
{

    function index()
    {
        //return phpinfo();
        $testimonial = Testimonial::select('*')->get();
        $customer = Customer::select('*')->get();
        $infographics = Infographic::with('current_topic', 'industry')->select('*')->where('homePage', 1)->get();
        $slider = Slider::select('*')->get();
        //return $infographics;
        return view('user.header') . view('user.index', ['testimonial' => $testimonial, 'customer' => $customer, 'infographics' => $infographics,'slider'=>$slider]) . view('user.footer');
    }
}
