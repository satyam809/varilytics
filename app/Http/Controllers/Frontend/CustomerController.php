<?php

namespace App\Http\Controllers\Frontend;

use Google\Client;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Models\Customer;
use Session;

class CustomerController extends Controller
{
    public function loginPage(Request $r)
    {
        return view('user.header') . view('user.login') . view('user.footer');
    }
    public function login(Request $r)
    {
        $email = $r->input('email');
        $password = $r->input('password');
        $r->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $res = Customer::select('*')->where('email', $email)->where('password', $password)->get();
        //return $res;
        //echo $email;die;
        if (count($res) == 1) {
            $r->session()->put('login_email', $res[0]->email);
            return redirect('');
        } else {
            $r->session()->flash('error', 'Please enter valid login detail');
            return redirect('login');
        }
    }
    public function registration(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $name = ucwords(strtolower($r->input('name')));
        $email = $r->input('email');
        $password = $r->input('password');
        //$data = array('name' => $name, "email" => $email, "password" => $pass);
        if ($validator->passes()) {
            if ($this->check_email($email)) {
                $customer = new Customer;
                $customer->name = $name;
                $customer->email = $email;
                $customer->password = $password;
                $customer->save();
                return json_encode(array("message" => $name . "," . "You are registered successfully", "status" => true));
            } else {
                return json_encode(array("message" => "This username is already taken", "status" => false));
            }
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function customerLogout()
    {
        //return 'test';
        Session::forget('login_email');
        return redirect('login');
    }
    public function check_email($email)
    {
        $res = Customer::select('*')->where('email', $email)->get();
        if (count($res) != 1) {
            return true;
        }
    }
    public function check_customer(Request $r)
    {
        $res = Customer::select('*')->where('email', $r->email)->whereIn('plan', [2, 3, 4])->get();
        if (count($res) == 1) {
            return ['status' => true, 'data' => $res];
        } else {
            return ['status' => false, 'data' => $res];
        }
    }
}
