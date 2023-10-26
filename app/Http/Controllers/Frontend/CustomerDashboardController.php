<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Customer;
use App\Models\Infographic;
use App\Models\Slider;

class CustomerDashboardController extends Controller
{

    function index()
    {
        //return 'test';
        return view('user.header') . view('user.dashboards') . view('user.footer');
    }
}
