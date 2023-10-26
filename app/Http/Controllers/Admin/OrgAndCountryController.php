<?php

namespace App\Http\Controllers\Admin;

use App\UserRegistration;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class OrgAndCountryController extends Controller
{
    public function index()
    {
        $sql_org = "select * from organistation";
        $sql_country = "select * from countries";


        $org = DB::select($sql_org);
        $country = DB::select($sql_country);
        return view('admin.header') . view('admin.OrgAndCountry', ["org" => $org, "country" => $country, "up_org" => $org, "up_country" => $country]) . view('admin.footer');
    }
    public function save(Request $r)
    {
        $orgnization = $r->input('orgnization');
        $country = $r->input('country');

        $validator = Validator::make($r->all(), [
            'orgnization' => 'required|not_in:0',
            'country' => 'required|not_in:0',

        ]);
        $data = array('org_id' => $orgnization, "country_id" => $country);
        if ($validator->passes()) {

            DB::table('org_and_country')->insert($data);
            return json_encode(array("message" => "Inserted", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function get()
    {
        $users = DB::select('select org_and_country.id,countries.country_name,organistation.org_name from countries inner join org_and_country on countries.country_id = org_and_country.country_id inner join organistation on organistation.org_id =org_and_country.org_id');
        //echo  json_encode($users);
        return response()->json($users);
    }
    public function getSingle($id)
    {
        $data = DB::select('select * from `org_and_country` where id = ?', array($id));
        echo json_encode($data);
    }
    public function update(Request $r)
    {
        $id = $r->input('val_id');
        $orgnization = $r->input('orgnization');
        $country = $r->input('country');
        $validator = Validator::make($r->all(), [
            'orgnization' => 'required|not_in:0',
            'country' => 'required|not_in:0'
        ]);
        if ($validator->passes()) {
            DB::update('update `org_and_country` set country_id = ?,org_id = ? where id = ?', [$country, $orgnization, $id]);
            return json_encode(array("message" => "Updated Successfully", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete($id)
    {
        if (DB::delete('delete from org_and_country where id = ?', array($id))) {
            echo json_encode(array('message' => 'deleted', 'status' => true));
        }
    }
}
