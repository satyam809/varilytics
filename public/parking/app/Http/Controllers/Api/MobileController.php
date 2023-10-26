<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Card;
use App\Models\Aboutus;
use App\Models\Condition;
use App\Models\Privacy;
use App\Models\Documents;
use App\Models\Remaindertype;
use App\Models\Remainderdata;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;
use File;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\MessageBag;
use App\Models\City;
use App\Models\State;
use App\Models\UserAddress;
use App\Models\Order;
use App\Models\PurchasedQrCode;
use App\Models\Qrimage;
use App\Models\Setreminder;


class MobileController extends Controller
{

    // register api

    public function index(Request $request)
    {
        // return 'test';
        $mobile = $request->mobile;
        // return $mobile;

        $value = DB::table('users')->where('contact_number', $mobile)->count();
        // return $value;
        if ($value != 0) {
            // $otp =  random_int(1000, 9999);
            $otp = 1234;
            //DB::update('update  users set otp  = ? where  = ?',[$name,$id]);
            // $update = DB::update('update  users SET `otp`  = ? where `contact_number`  = ?',[$otp,$mobile]);
            User::where('contact_number', $mobile)->update(['otp' => $otp]);
            return response()->json(['success' => 'true', 'message' => 'Otp has been sent to your registered mobile succesfully', 'mobile' => $mobile, 'Otp' =>  $otp]);
        } 
        else 
        {
            $number = new User;
            $number->contact_number = $mobile;
            $number->save();
            // return response()->json(['success' => 'false', 'message' => 'mobile not registered']);
            // $otp =  random_int(1000, 9999);
            $otp = 1234;
            //DB::update('update  users set otp  = ? where  = ?',[$name,$id]);
            // $update = DB::update('update  users SET `otp`  = ? where `contact_number`  = ?',[$otp,$mobile]);
            User::where('contact_number', $mobile)->update(['otp' => $otp]);
            return response()->json(['success' => 'true', 'message' => 'Otp has been sent to your registered mobile succesfully', 'mobile' => $mobile, 'Otp' =>  $otp]);
        }
    }


    // validate otp

    public function validate1(Request $request)
    {

        $otp = $request->otp;
        $mobile = $request->mobile;
        // return  $mobile;
        $validate_otp = User::where([
            ['otp', $otp],
            ['contact_number', $mobile]
        ])->first();
        if ($validate_otp) {
            $name = $validate_otp->name;
            $returnid = $validate_otp->id;
            if ($name == '') {
                return response()->json(['success' => 'false', 'id' => $returnid, 'is_register' => 'no']);
            } 
            else 
            {
                return response()->json(['success' => 'true', 'id' => $returnid, 'is_register' => 'yes', 'message' => 'login succesfully', 'otp' =>  $otp, 'mobile' => $mobile]);
            }
        } else {
            return response()->json(['success' => 'false', 'is_register' => 'no', 'message' => 'mobile number not registered']);
        }
    }



    public function Newregister(Request $request)
    {
        // return "Hello";
        // $username = $request->username;

        $name = $request->name;
        // $mobilenu = $request->phone;
        $mail = $request->email;
        $address = $request->address;
        $pincode = $request->pin;
        $state = $request->state;
        $city = $request->city;
        $contact_num = $request->contact;
        $emg = $request->emergency;

        // print_r($name);
        // print_r($mobilenu);
        // print_r($address);
        // print_r($pincode);
        // print_r($state);
        // print_r($city);
        // print_r($contact_num);
        // print_r($emg);
        // print_r($mail);
        // die;

        // $newregistration = new User;
        // $newregistration->name = $name;
        // // $newregistration->username = $username;
        // $newregistration->email = $mail;
        // $newregistration->address = $address;
        // $newregistration->pincode = $pincode;
        // $newregistration->state = $state;
        // $newregistration->city = $city;
        // $newregistration->contact_number = $contact_num;
        // $newregistration->emergency_contact = $emg;
        // $newregistration->save();

        DB::table('users')->updateOrInsert(['contact_number'=>$contact_num],['name'=>$name,'address'=>$address,'email'=>$mail,'pincode'=>$pincode,'state'=>$state,'city'=>$city, 'emergency_contact'=>$emg]);
        
        
        return response()->json(['success' => 'true', 'message' => 'registered successfully']);
    }


    public function profileupdate(Request $request)
    {
        // return 'Update profile details';
        $user_id = $request->id;

        $name = $request->name;

        $location  = $request->location;

        $email = $request->email;

        // Store Image In Folder
        $file = $request->file('image');

        $image = $file->getClientOriginalName();

        // return $image;

        $file->move(public_path('/assets/test'), $image);

        if (file_exists(public_path($image =  $file->getClientOriginalName()))) {
            unlink(public_path($image));
        };

        $update_profile = User::find($user_id);

        $update_profile->name = $name;
        $update_profile->location = $location;
        $update_profile->image = $image;
        $update_profile->email = $email;

        $update_profile->save();

        $update_profile = User::find($user_id);
        $value = DB::table('users')->where('id', $user_id)->select('id', 'name', 'location', 'contact_number', 'email', 'image')->get();
        return response()->json(['success' => 'true', 'response' =>  $value]);
    }


    public function userprofile(Request $request)
    {
        // return 'test';
        $user_id = $request->id;
        // return $user_id;

        $getprofile = User::find($user_id);

        if ($getprofile == '') {
            return response()->json(['success' => 'false', 'Message' => 'please enter valid user id']);
        } else {
            $result = DB::table('users')->where('id', $user_id)->select('id', 'name', 'email', 'username', 'location', 'contact_number', 'image')->get();
            return response()->json(['success' => 'true', 'response' =>   $result]);
        }
    }


    public function Addcarddata(Request $request)
    {

        // return 'Add Card Details Here';
        $user_id = $request->user_id;

        $user_cardname = $request->name;
        $card_number = $request->card_number;
        $card_month = $request->month;
        $card_year = $request->year;
        // return $user_id;


        $rules = array(
            'name' => 'required',
            'card_number' => 'required|numeric|digits:16'
        );
        $messages = array(
            'name.required' => 'Please enter card holder name.',
            'card_number.required' => 'Please enter card number.'
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            return response()->json(['success' => 'false', 'message' => $errors]);
        } else {
            $getprofile = User::find($user_id);


            if ($getprofile == '') {
                return response()->json(['success' => 'false', 'message' => 'user id not macthed']);
            } else {
                // return 'user exist';
                $getuserid = DB::table('card_details')->where('user_id', '=', $user_id)->count();
                //return $getuserid;
                if ($getuserid == 0) {
                    $card = new Card;
                    $card->user_id = $user_id;
                    $card->name = $user_cardname;
                    $card->card_number = $card_number;
                    $card->month = $card_month;
                    $card->year = $card_year;
                    $card->save();
                    return response()->json(['success' => 'True', 'message' => 'Card details ddded successfully']);
                } else {
                    return response()->json(['success' => 'True', 'message' => 'Card details already filled']);
                }
            }
        }
    }



    public function qrscannerdata(Request $request)
    {
        // return 'test';
        $number = $request->mobile;
        // return $number;

        $mobile_number = User::select('*')->where('contact_number', $number)->get();
        // return $mobile_number; 

        if (count($mobile_number) != 1) {
            return response()->json(['success' => 'false', 'message' => 'mobile number does not exist']);
        } else {
            $result = DB::table('users')->where('contact_number', $number)->select('id', 'name', 'email', 'username', 'location', 'contact_number', 'image')->get();
            return response()->json(['success' => 'true', 'response' => $result]);
        }
    }




    public function aboutusdata()
    {
        // return 'Raghu pal';
        $aboutus_data = DB::select("select `about` from aboutus");
        // return $aboutus_data;
        if (count($aboutus_data) != 1) {
            return " ";
        } else {
            $result = DB::table('aboutus')->select('about')->get();
            return response()->json(['success' => 'true', 'response' => $result]);
        }
    }


    public function conditionsdata()
    {
        // return 'condition';
        $condition_data = DB::select("select `conditions_value` from conditions");
        // return $condition_data;
        if (count($condition_data) != 1) {
            return " ";
        } else {
            $result = DB::table('conditions')->select('conditions_value')->get();
            return response()->json(['success' => 'true', 'response' => $result]);
        }
    }


    public function privacydata()
    {
        // return "Privacy";
        $privacy_data = DB::select("select `privacy` from privacy");
        // return $result;
        if (count($privacy_data) != 1) {
            // row not found, do stuff...
            return " ";
        } else {
            // do other stuff...
            $result = DB::table('privacy')->select('privacy')->get();
            return response()->json(['success' => 'true', 'response' => $result]);
        }
    }


    public function Documentsdata(Request $request)
    {
        // return "Documents";
        $user_id = $request->id;

        $find_user = User::find($user_id);
        //   return $find_user;
        if ($find_user == '') {
            return ['success' => 'false', 'message' => 'user not found'];
        } else {
            $files = array();
            if ($request->hasfile('documents')) {
                //return $user_id;
                foreach ($request->file('documents') as $file) {
                    $upload = new Documents();
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    //return $name;
                    $file->move(public_path('/assets/images'), $name);
                    $files[] = $name;
                    $upload->user_id = $user_id;
                    $upload->documents = $name;
                    $upload->save();
                    return ['success' => 'true', 'message' => 'documents uploaded successfully'];
                }
            }
        }
    }


    public function Getdocumentsdata(Request $request)
    {
        // return "Documents";
        $userid = $request->id;
        //return $userid;

        $user_documents = User::select('*')->where('id', $userid)->get();
        //return $user_documents; 

        if (count($user_documents) != 1) {
            return response()->json(['success' => 'false', 'message' => 'user does not exist']);
        } else {
            $result = DB::table('user_documents')->where('user_id', $userid)->select('documents')->get();
            return response()->json(['success' => 'true', 'response' => $result]);
        }
    }



    public function Getreminderdata()
    {
        // return "Test";
        $user_documents = Remaindertype::select('id', 'type_remainder as type')->get();
        // return $user_documents;
        if ($user_documents == '') {
            return " ";
        } else {
            return response()->json(['success' => 'true', 'response' => $user_documents]);
        }
    }


    public function Savereminderdata(Request $request)
    {
        // return "Save reminder data based on user id";
        $user_id = $request->id;
        $type_id = $request->type;
        $expiry = $request->exdate;


        if (User::where('id', $user_id)->exists()) {
            if (Remaindertype::where('id', $type_id)->exists()) {
                // return "user found";
                $reminder = new Remainderdata;
                $reminder->user_id = $user_id;
                $reminder->remainder_type = $type_id;
                $reminder->expiry_date = $expiry;
                $reminder->save();
                return response()->json(['success' => 'true', 'message' => 'remainder added succesfully']);
            } else {
                return ['success' => 'false', 'message' => 'selected type not found'];
            }
        } else {
            return ['success' => 'false', 'message' => 'user not found'];
        }
    }


    public function Userreminderdata()
    {
        // return "Hello";
    }


    // notification reminder
        public function setreminder(Request $request){
            // return "Hello";
            $user_id = $request->id;
            $user_reminder = $request->reminder;
            $remin_date = $request->date;
            
            // print_r($user_id);
            // print_r($user_reminder);

            if (User::where('id', $user_id)->exists()) 
            {
                // echo "user not found";
                $reminder = new Setreminder;
                $reminder->user_id = $user_id;
                $reminder->reminder_text = $user_reminder;
                $reminder->reminder_date = date("d-m-Y", strtotime($remin_date));  ;
                $reminder->save();
                return response()->json(['success' => 'true', 'message' => 'Reminder set']);
            } 
            else 
            {
                return ['success' => 'false', 'message' => 'user not found'];
            }
        }

        public function notifyreminder()
        {
            // echo "notifyreminder";
            $register_date = Setreminder::select('reminder_date','user_id')->get();
            //  return $register_date[0]->user_id;
            
            $today = date("d-m-Y");
            // return $today;
            // $date = date("-2 day", strtotime($register_date));
            // return $date; 


            if($today == $register_date[0]->reminder_date)
            {
                // return "hello";
                $result = DB::table('save_reminder')->select('user_id','reminder_text')->where('user_id', $register_date[0]->user_id)->get();
                return response()->json(['success' => 'true', 'response' => $result]);
            }
            else{
                // return response()->json(['success' => 'false', 'message' => 'reminder not set']);
                $date = date_create($register_date[0]->reminder_date);
                date_sub($date,date_interval_create_from_date_string("2 days"));
                $result = DB::table('save_reminder')->select('user_id','reminder_text')->where('user_id', $register_date[0]->user_id)->get();
                return response()->json(['success' => 'true', 'response' => $date , 'message' => $result]);
                
            }
        }
    // end notification reminder


    public function Vehicleregister(Request $request)
    {
        // return "hello";

        $user_id = $request->id;
        $vehicle_num = $request->vehiclenumber;
        $owner = $request->owner;
        $type = $request->vehicletype;
        $color = $request->vehiclecolor;
        $kit_num = $request->vehiclekit;
        $checkKitNo = $this->kitNumber($kit_num);
        if ($checkKitNo == true) {
            if (User::where('id', $user_id)->exists()) {
                $vehicleregistration = new Vehicle;

                $vehicleregistration->user_id = $user_id;

                $vehicleregistration->owner_name = $owner;

                $vehicleregistration->vehicle_number = $vehicle_num;

                $vehicleregistration->vehicle_type = $type;

                $vehicleregistration->vehicle_color = $color;

                $vehicleregistration->kit_number = $kit_num;

                $vehicleregistration->save();

                return response()->json(['success' => 'true', 'message' => 'vehicle registration successfully']);
            } else {
                return response()->json(['success' => 'false', 'message' => 'user does not exist']);
            }
        }else{
            return ['success' => false,'message' => 'This kit number is already registered'];
        }
    }

    public function kitNumber($kitNo)
    {
        $data = Vehicle::select('*')->where('kit_number', $kitNo)->get();
        if (count($data) > 0) {
            return false;
        } else {
            return true;
        }
    }


    // vehicle registerdetails
    public function Vehicleregisterdetails(Request $request)
    {
        // return "get vehicle details";
        // return "Documents";
        $userid = $request->id;
        //return $userid;

        // $vehicle_details = Vehicle::select('*')->where('user_id', $userid)->get();
        // return $vehicle_details; 

        if (Vehicle::where('user_id', $userid)->exists()) {
            $result = DB::table('vehicle')->where('user_id', $userid)->select('owner_name', 'vehicle_number', 'vehicle_type', 'vehicle_color', 'kit_number')->get();
            return response()->json(['success' => 'true', 'response' => $result]);
        } else {
            return response()->json(['success' => 'false', 'message' => 'user does not exist']);
        }
    }

    // save address
    public function saveAddress(Request $r)
    {
        $user_id = $r->user_id;
        $name = $r->name;
        $address = $r->address;
        $state_id = $r->state_id;
        $city_id = $r->city_id;
        $pincode = $r->pincode;
        $mobile_no = $r->mobile_no;
        $userAddress = new UserAddress;
        $userAddress->user_id = $user_id;
        $userAddress->name = $name;
        $userAddress->address = $address;
        $userAddress->state_id = $state_id;
        $userAddress->city_id = $city_id;
        $userAddress->pincode = $pincode;
        $userAddress->mobile_no = $mobile_no;
        $userAddress->save();
        return ['success' => true, 'data' => $userAddress, 'message' => 'Address Add Successfully'];
    }
    // get user address list
    public function getUserAddressList(Request $r)
    {
        $user_id = $r->user_id;
        $data = UserAddress::select('*')->where('user_id', $user_id)->get();
        return ['success' => true, 'data' => $data];
    }



    // save order
    public function saveOrder(Request $r)
    {
        $user_id = $r->user_id;
        $user_address_id = $r->user_address_id;
        $product_id = $r->product_id;
        $quantity = $r->quantity;
        $grand_total = $r->grand_total;
        $payment_method = $r->payment_method;
        $transaction_id = $r->transaction_id;
        $order_status = $r->order_status;
        // $qrcode = DB::table('qrcode_image')
        //         ->join('purchasedQrCodes', 'purchasedQrCodes.qr_code_id', '!=', 'qrcode_image.id');
        $sql = "SELECT *
        FROM   `qrcode_image` 
        WHERE  `id` NOT IN (SELECT `qr_code_id` FROM `purchasedQrCodes`)";
        $qrcode = DB::select($sql);
        
        $available_qrcode = count($qrcode);
        if($available_qrcode == 0)
        {
            return response()->json(['success' => 'false', 'message' => 'No qrcode avialabel']);
        }
        else
        {
            if($quantity > $available_qrcode){
                return response()->json(['success' => 'false', 'message' => 'No qrcode avialabel']);
            }
            else
            {
                $order = new Order;
                $order->user_id = $user_id;
                $order->user_address_id = $user_address_id;
                $order->product_id = $product_id;
                $order->quantity = $quantity;
                $order->grand_total = $grand_total;
                $order->payment_method = $payment_method;
                $order->transaction_id = $transaction_id;
                $order->order_status = $order_status;
                if($order->save())
                {
                    $order_id = $order->id;
                    $sql = "SELECT *
                    FROM   `qrcode_image` 
                    WHERE  `id` NOT IN (SELECT `qr_code_id` FROM `purchasedQrCodes`) LIMIT $quantity";
                    $remaining_qrcodes = DB::select($sql);
                    //$remaining_qrcodes = $qrcode->limit($quantity)->get();
                    foreach($remaining_qrcodes as $remaining_qrcode)
                    {
                        $purchase = new PurchasedQrCode;
                        $purchase->order_id = $order_id;
                        $purchase->qr_code_id = $remaining_qrcode->id;
                        $purchase->save();
                        // if($purchase->save())
                        // {
                        //     return ['success' => true, 'data' => $order_id, 'message' => 'Added Successfully'];
                        // }
                        // else
                        // {
                        //     return response()->json(['success' => 'false', 'message' => 'Something went wrong.']);
                        // }
                    }
                    return ['success' => true, 'data' => $order_id, 'message' => 'Ordered Placed Successfully'];
                }
                else
                {
                    return response()->json(['success' => 'false', 'message' => 'Something Went wrong']);
                }
            }
        }

        // if($quantity > $available_qrcode){
        //     return response()->json(['success' => 'false', 'message' => 'Excced Quntitiy']);
        // }
         
    }



    // save purchase qr code
    // public function purchasedQrCode(Request $r)
    // {
    //     $order_id = $r->order_id;
    //     $qr_code_id = $r->qr_code_id;


    //     if (PurchasedQrCode::where('qr_code_id', $qr_code_id)->exists())
    //     {
    //         return response()->json(['success' => 'false', 'message' => 'qrcode already purchased']);
    //     }
    //     else
    //     {
    //         $purchasedQrCode = new PurchasedQrCode;
    //         $purchasedQrCode->order_id = $order_id;
    //         $purchasedQrCode->qr_code_id = $qr_code_id;
    //         $purchasedQrCode->save();

    //         return ['success' => true, 'data' => $purchasedQrCode, 'message' => 'Added Successfully'];
    //     }



    // }


    // check kit number exist or not
    public function checkKitNoExist(Request $r)
    {
        $kitNo = $r->kitNo;
        $data = Vehicle::select('*')->where('kit_number', $kitNo)->get();
        if (count($data) > 0) {
            return ['success' => false, 'message' => 'This kit number is already in use'];
        } else {
            return ['success' => true, 'message' => 'You can use this kit number'];
        }
    }

    // get all states
    public function getAllStates()
    {
        $data = State::all();
        return ['success' => true, 'data' => $data, 'message' => 'All states'];
    }
    
    // get state cities
    public function getStateCities(Request $r)
    {
        $state_id = $r->state_id;
        $data = City::select('*')->where('state_id', $state_id)->get();
        return ['success' => true, 'data' => $data];
    }
}