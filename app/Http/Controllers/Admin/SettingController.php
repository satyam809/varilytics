<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\Users;

class SettingController extends Controller
{
    public function index()
    {
        //return 'test';
        $user_id = session('login.user_id');
        $userDetail = Users::select('*')->where('id',$user_id)->get();
//return $userDetail;
        return view('admin.header') . view('admin.setting',['userDetail'=>$userDetail]) . view('admin.footer');
    }
    public function save_setting(request $r)
    {
        $old_username = $r->input('old_username');
        $name = $r->input('name');
        $address = $r->input('address');
        $pan_no = $r->input('pan_no');
        $account_no = $r->input('account_no');
        $username = $r->input('username');
        $email = $r->input('email');
        $password = $r->input('password');
        $pass = md5($password);
        Users::where('username', $old_username)->update(['name' => $name, 'address' => $address, 'pan_no' => $pan_no,'account_no'=>$account_no,'username'=>$username,'email'=>$email,'password'=>$pass]);
        return array('status' => true, 'message' => 'Updated Successfully');
    }
}
