<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\SmartCity;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class SmartCityController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.smartCity') . view('admin.footer');
    }

    public function get(Request $r)
    {
        $data = SmartCity::select('*')->get();
        return ['data' => $data];
    }

    public function getSingle($id)
    {
        $data = DB::select('select * from `smartCities` where id = ?', array($id));
        echo json_encode($data[0]);
    }
    public function update(Request $r)
    {
        //    echo json_encode('test');
        //dd($r->all());
        // return $r->all();
        $id = $r->input('smartCity_id');
        $smartCity = $r->input('smartCity');
        $validator = Validator::make($r->all(), [
            'smartCity' => 'required'
        ]);
        $file = $r->file('icon');

        if ($validator->passes()) {
            if ($r->hasFile('icon')) {
                $oldFile = SmartCity::select('icon')->where('id', $id)->first();
                if ($oldFile->icon != null) {
                    if (file_exists(public_path('/assets/admin_assets/smartCitiesIcons/' . $oldFile->icon))) {
                        unlink(public_path('/assets/admin_assets/smartCitiesIcons/' . $oldFile->icon));
                    }
                }
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                // print_r($fileName);die;
                $file->move(public_path("assets/admin_assets/smartCitiesIcons"), $fileName);
                DB::table('smartCities')->where('id', $id)->update([
                    'name' => $smartCity,
                    'icon' => $fileName
                ]);
                return json_encode(array("message" => "Smart City is Updated Successfully", "status" => true));
            } else {
                DB::table('smartCities')->where('id', $id)->update([
                    'name' => $smartCity
                ]);
                return json_encode(array("message" => "Smart City is Updated Successfully", "status" => true));
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
}
