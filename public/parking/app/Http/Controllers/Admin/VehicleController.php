<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicle;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SimpleSoftwareIO\QrCode\Facades\QrCode;




class VehicleController extends Controller
{
    // public function index()
    // {
    //     // return 'test';
    //     // return view('admin.header') . view('admin.vehicle') . view('admin.footer');


    //     // $username = User::select('*')->whereNotIn('id', [18])->get();
    //     $username = DB::table('users')->whereNotIn('id', [18])->get();
    //     // echo $username; die;
    //     // $vehicle = DB::table('vehicle')->get();

    //     $vehicle = DB::table('vehicle')
    //     ->join('users', 'vehicle.owner_name' , 'users.name')
    //     ->select('vehicle.*', 'users.contact_number')->get();
    //     // echo $vehicle; die;
        
    //     return view('admin.header') . view('admin.vehicle', ['vehicle' =>  $vehicle], ['users' => $username]) . view('admin.footer');
    // }


    public function vehiclergistration()
    {
        // return "hello";
        $registration = DB::table('vehicle')->get();
        // return $registration;
        return view('admin.header') . view('admin.vehicle', ['registration' =>  $registration]) . view('admin.footer');
    }



    public function addVehicleDetails(Request $request){
        // echo "hello";

            $vehicle_details = new Vehicle;
            $vehicle_details->owner_name = $request->owner_name;
            $vehicle_details->registration_no = $request->registration_no;
            $vehicle_details->registration_date = $request->registration_date;
            $vehicle_details->Chassis_no = $request->Chassis_no;
            $vehicle_details->engine_name = $request->engine_name;
            $vehicle_details->fuel_type = $request->fuel_type;
            $vehicle_details->model_name = $request->model_name;
            $vehicle_details->vehicle_class = $request->vehicle_class;



            $vehicle_details->save();
            return redirect('admin/vehicle')->with('success', 'Vehicle Details Successfully added'); 
    }
    




    public function delete($id)
    {
        DB::delete('delete from vehicle where id = ?',[$id]);
        // return array('message' => 'deleted', 'status' => true);
        // echo "Record deleted successfully.<br/>";
        return redirect('admin/vehicle')->with('success', 'Vehicle Details Successfully Deleted');
    }


    public function changeVehicleDetails(Request $r)
    {
        // echo 'hello'; die;
        $vehicle_id = $r->input('vehicleid');
        // print($vehicle_id); die;
        $vehicle = Vehicle::find($vehicle_id);
        // print_r($student); die;
       
        $name = $r->input('owner_name');
        $registration = $r->input('registration_no');
        $date = $r->input('registration_date');
        $Chassis = $r->input('Chassis_no');

        $engine = $r->input('engine_name');
        $fuel = $r->input('fuel_type');
        $model = $r->input('model_name');
        $vehicle = $r->input('vehicle_class');


        //if ($validator->passes()) {
            Vehicle::where('id', $vehicle_id)->update(['owner_name' => $name, 'registration_no' => $registration, 'registration_date' => $date, 'Chassis_no' => $Chassis, 'engine_name'=> $engine, 'fuel_type'=>  $fuel, 'model_name'=> $model, 'vehicle_class'=> $vehicle, ]);
            return redirect('admin/vehicle')->with('success', 'Vehicle Details Successfully updated'); 
        // }else {
        //     return response()->json(['error' => $validator->errors()]);
        // }
    }

       
}
