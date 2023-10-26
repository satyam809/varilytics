<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Customer;

class SubscriptionController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('user.header') . view('user.subscription') . view('user.footer');
    }
    public function store(Request $request)
    {
        if ($this->checkCustomerLogin() != null) {
            $input = $request->all();
            //return session()->get('login_email');
            //return $input;

            $api = new Api('rzp_test_dg3dxMbRbLOILJ', 'GNCZidmnJWdatpl3FAli9ZJk');

            $payment = $api->payment->fetch($input['razorpay_payment_id']);

            if (count($input)  && !empty($input['razorpay_payment_id'])) {
                try {
                    $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                } catch (Exception $e) {
                    return  $e->getMessage();
                    //Session::put('error', $e->getMessage());
                    return redirect()->back->with('error',$e->getMessage());
                }
            }
            Customer::where('email', session()->get('login_email'))->update(['plan' => $input['plan']]);
            //Session::put('success', 'Payment successful');
            return redirect()->back()->with('successMessage', 'Thank You For Taking Our Subscription');
        } else {
            return redirect('login');
        }
    }
    function checkCustomerLogin()
    {
        return session()->get('login_email');
    }
}
