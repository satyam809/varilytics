<?php

namespace App\Http\Controllers\Admin;

use App\UserRegistration;
use DB;
use App\Models\District;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class DistrictController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.district') . view('admin.footer');
    }

    public function get(Request $r)
    {
        $data = District::with('stateName')->select('*')->get();
        return DataTables::of($data)->make(true);
    }
    public function getStateDistricts(Request $r)
    {
        return District::select('*')->where('state_id', $r->input('state_id'))->get();
    }

    public function getSingle(Request $r)
    {
        return District::with('stateName')->select('*')->where('id', $r->id)->first();
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'district' => 'required',
            'state_id' => 'required'
        ]);
        $state_id = $r->input('state_id');
        $district_name = $r->input('district');
        $file = $r->file('icon');
        if ($validator->passes()) {
            if ($r->hasFile('icon')) {
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                // print_r($fileName);die;
                $district = new District;
                $district->name = $district_name;
                $district->state_id = $state_id;
                $district->icon = $fileName;
                $district->save();
                $file->move(public_path("assets/admin_assets/districtsIcons"), $fileName);
                return json_encode(array("message" => "District Added Successfully", "status" => true));
            } else {
                $district = new District;
                $district->name = $district_name;
                $district->state_id = $state_id;
                $district->save();
                return json_encode(array("message" => "District Added Successfully", "status" => true));
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function update(Request $r)
    {
        $district_id = $r->districtId;
        $district = $r->input('upDistrict');
        $state_id = $r->input('upState_id');
        $validator = Validator::make($r->all(), [
            'upDistrict' => 'required',
            'upState_id' => 'required'
        ]);
        $file = $r->file('upIcon');
        //return $file;
        if ($validator->passes()) {
            if (isset($file)) {
                $oldFile = District::select('icon')->where('id', $district_id)->first();
                if (isset($oldFile->icon)) {
                    if (file_exists(public_path('/assets/admin_assets/districtsIcons/' . $oldFile->icon))) {
                        unlink(public_path('/assets/admin_assets/districtsIcons/' . $oldFile->icon));
                    }
                }
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                //return $district_id;
                // print_r($fileName);die;
                DB::table('districts')->where('id', $district_id)->update([
                    'state_id' => $state_id,
                    'name' => $district,
                    'icon' => $fileName
                ]);
                $file->move(public_path("assets/admin_assets/districtsIcons"), $fileName);
                return ["message" => "District is Updated Successfully", "status" => true];
            } else {
                //return 'test1';
                DB::table('districts')->where('id', $district_id)->update([
                    'state_id' => $state_id,
                    'name' => $district
                ]);
                return json_encode(array("message" => "District is Updated Successfully", "status" => true));
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function delete(Request $r)
    {
        $oldFile = District::select('icon')->where('id', $r->id)->first();
        if (isset($oldFile->icon)) {
            if (file_exists(public_path('/assets/admin_assets/districtsIcons/' . $oldFile->icon))) {
                unlink(public_path('/assets/admin_assets/districtsIcons/' . $oldFile->icon));
            }
        }
        District::where('id', $r->id)->delete();
        return ['status' => true, 'message' => 'District is Deleted Successfully'];
    }
}
