<?php

namespace App\Http\Controllers\Admin;

use App\UserRegistration;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class changePasswordController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.change_password') . view('admin.footer');
    }
    public function save_change_password(request $r)
    {
        $email = session('login.email');
        $password = $r->input('password');
        $pass = md5($password);
        if (DB::update('update `varistats_users` set password = ? where email = ?', [$pass, $email])) {
            echo json_encode(array('status' => true, 'message' => 'Password is changed'));
        }
    }
}
