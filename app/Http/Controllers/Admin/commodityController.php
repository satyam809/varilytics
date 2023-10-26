<?php

namespace App\Http\Controllers\Admin;

use App\UserRegistration;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class commodityController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.commodity') . view('admin.footer');
    }
    public function save(Request $r)
    {
        $commodity = $r->input('commodity');
        $validator = Validator::make($r->all(), [
            'commodity' => 'required'

        ]);
        $data = array('comm_name' => $commodity);
        if ($validator->passes()) {
            DB::table('commodities')->insert($data);
            return json_encode(array("message" => "Inserted", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function get()
    {

        $users = DB::select('select * from `commodities`');
        echo  json_encode(array("message" => $users, "status" => true));
    }
    public function getSingle($id)
    {
        $data = DB::select('select * from `commodities` where comm_id = ?', array($id));
        echo json_encode($data);
    }
    public function update(Request $r)
    {
        //echo json_encode('test');
        $id = $r->input('comm_id');
        $commodity = $r->input('commodity');
        $validator = Validator::make($r->all(), [
            'commodity' => 'required'
        ]);
        if ($validator->passes()) {
            DB::update('update commodities set comm_name = ? where comm_id = ?', [$commodity, $id]);
            return json_encode(array("message" => "Updated", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete($id)
    {
        if (DB::delete('delete from commodities where comm_id = ?', array($id))) {
            echo  json_encode(array("message" => "Deleted", "status" => true));
        }
    }
}
