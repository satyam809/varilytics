<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.index') . view('admin.footer');
    }
}
