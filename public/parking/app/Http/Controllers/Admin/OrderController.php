<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\UserAddress;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SimpleSoftwareIO\QrCode\Facades\QrCode;




class OrderController extends Controller
{
    public function Ordered(){
        // return 'Hello';


        $shares = DB::table('orders')
        ->JOIN('users', 'users.id', '=', 'orders.user_id')
        ->JOIN('users_address', 'users_address.user_id', '=', 'users.id')
        ->JOIN('purchasedQrCodes', 'purchasedQrCodes.order_id', '=', 'orders.id')
        ->JOIN('qrcode_image','qrcode_image.id','=', 'purchasedQrCodes.qr_code_id')
        ->select('users.*', 'users.name', 'users_address.*', 'users_address.address', 'orders.*','qrcode_image.kit_number')->get();

        // print_r($shares);
        // die;
        return view('admin.header').  view('admin.order', ['shares' =>  $shares]) . view('admin.footer');
    }

    
       
}
