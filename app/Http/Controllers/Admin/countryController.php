<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class countryController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.country') . view('admin.footer');
    }
    public function save(Request $r)
    {
        $country = $r->input('country');
        $validator = Validator::make($r->all(), [
            'country' => 'required|unique:countries,country_name'
        ]);
        if ($validator->passes()) {
            //DB::table('countries')->insert(trim($data));
            $ctry = new Country;
            $ctry->country_name = trim($country);
            $ctry->save();
            return ["message" => "Country Added Successfully", "status" => true];
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function get()
    {
        $data = Country::select("*")->get();
        return DataTables::of($data)->make(true);
    }
    public function getSingle($id)
    {
        return Country::select("*")->where('country_id', $id)->first();
    }
    public function update(Request $r)
    {
        //echo json_encode('test');
        $id = $r->input('country_id');
        $country = $r->input('country');
        $validator = Validator::make($r->all(), [
            'country' => 'required'
        ]);
        if ($validator->passes()) {
            Country::where('country_id', $id)->update(['country_name' => trim($country)]);
            return ["message" => "Country Updated Successfully", "status" => true];
        }
        return ['error' => $validator->errors()];
    }
    public function delete($id)
    {
        Country::where('country_id', $id)->delete();
        return ["message" => "Country Deleted Successfully", "status" => true];
    }
}
