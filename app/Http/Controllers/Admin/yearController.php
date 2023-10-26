<?php

namespace App\Http\Controllers\Admin;

use App\UserRegistration;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class yearController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.year') . view('admin.footer');
    }
    public function save(Request $r)
    {
        $from_date = $r->input('from_date');
        $to_date = $r->input('to_date');
        $validator = Validator::make($r->all(), [
            'from_date' => 'required',
            'to_date' => 'required'
        ]);
        $data = array('from_date' => $from_date, 'to_date' => $to_date);
        if ($validator->passes()) {
            DB::table('years')->insert($data);
            return json_encode(array("message" => "Inserted", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function get()
    {
        $users = DB::select('select * from `years`');
        echo  json_encode(array("message" => $users, "status" => true));
    }
    public function getSingle($id)
    {
        $data = DB::select('select * from `years` where yr_id = ?', array($id));
        echo json_encode($data);
    }
    public function update(Request $r)
    {
        //echo json_encode('test');
        $id = $r->input('yr_id');
        $from_date = $r->input('from_date');
        $to_date = $r->input('to_date');
        $validator = Validator::make($r->all(), [
            'from_date' => 'required',
            'to_date' => 'required'
        ]);
        //$data = array('org_name' => $organisation);
        if ($validator->passes()) {
            DB::update('update years set from_date = ?,to_date = ? where yr_id = ?', [$from_date, $to_date, $id]);
            return json_encode(array("message" => "Updated", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete($id)
    {
        if (DB::delete('delete from years where yr_id = ?', array($id))) {
            echo  json_encode(array("message" => "Deleted", "status" => true));
        }
    }
}
