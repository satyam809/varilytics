<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Permission;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function login(Request $r)
    {
        $username = $r->input('username');
        $password = $r->input('password');
        $r->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $pass = md5($password);
        //return $username.' '.$pass;
        $res = Users::with('permission')->select('*')->where('username', $username)->where('password', $pass)->get();
        if (count($res) == 1) {
            return ['status' => true, 'data' => $res];
        }else{
            return ['status' => false];
        }
        // if (count($res) == 1) {
        //     if ($res[0]->permission == '') {
        //         $r->session()->flash('error', 'Please take permission from the admin.');
        //         return redirect('admin/login');
        //     }
        //     $role = json_decode($res[0]['permission']->role_id);
        //     $arr = array('username' => $res[0]->username, 'name' => $res[0]->name, 'email' => $res[0]->email, 'user_id' => $res[0]->id, 'role' => $role);
        //     //return $arr;
        //     $r->session()->put('login', $arr);
        //     return redirect('admin/index');
        // } else {
        //     $r->session()->flash('error', 'Please enter valid login detail');
        //     return redirect('admin/login');
        // }
    }
}
