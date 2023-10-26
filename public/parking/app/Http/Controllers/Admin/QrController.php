<?php

namespace App\Http\Controllers\Admin;


use App\Models\Qrimage;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;





class QrController extends Controller
{
    public function index()
    {
        // return 'test';
        $qrdata = DB::table('qrcode_image')->get();
        // return $qrdata;

        return view('admin.header') . view('admin.qrcodegenrate', ['qrdata' =>  $qrdata]) . view('admin.footer');
    }

    public function createqrcode(Request $request)
    {
        // return 'test';


        $value = $request->qrcode;
        //return $value;
        for ($x = 1; $x <= $value; $x++) {
            // echo "The number is: $x <br>";
            $rand = rand(111111, 999999);
            // echo "The number is: $rand <br>";

            $store = new Qrimage();
            $store->qr_image = $x;
            $image_data = file_get_contents("https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=".$rand);
            //return $image_data;
            file_put_contents('/var/www/html/public/parking/public/assets/qrCode/'.$rand.'.jpg', $image_data);
            $store->kit_number = $rand;
            $store->save();
            //$file = public_path('qr.png');
            //\QRCode::text($rs)->setOutFile($file)->png();
        }
        return redirect('admin/qrcodegenerator')->with('success', 'Vehicle Details Successfully added');
    }
}
