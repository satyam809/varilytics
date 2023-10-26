<?php

namespace App\Http\Controllers\Admin;

use App\Models\AddData;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index()
    {
        // if (session('login.user_id') != 1) {
        //     $data = DB::table('data')
        //         ->join('varistats_users', 'data.user_id', '=', 'varistats_users.id')
        //         ->join('work_fields', 'data.web_id', '=', 'work_fields.id')
        //         ->join('work_links', 'data.link_id', '=', 'work_links.id')
        //         ->select('varistats_users.name', 'work_fields.website', 'work_links.name as link_name', 'data.table_name', 'data.column_name', 'data.values')
        //         ->where('varistats_users.id', '=', session('login.user_id'))
        //         ->get();
        // } else {
        //     $data = DB::table('data')
        //         ->join('varistats_users', 'data.user_id', '=', 'varistats_users.id')
        //         ->join('work_fields', 'data.web_id', '=', 'work_fields.id')
        //         ->join('work_links', 'data.link_id', '=', 'work_links.id')
        //         ->select('varistats_users.name', 'work_fields.website', 'work_links.name as link_name', 'data.table_name', 'data.column_name', 'data.values')
        //         ->get();
        // }
        return view('admin.header') . view('admin.data') . view('admin.footer');
    }
    public function get_tables($user_id)
    {
        $data = AddData::with('table')->select('table_id')->distinct()->where('user_id', $user_id)->get();
        return $data;
    }
    public function get_table_data($table_id)
    {
        $data = AddData::with('website', 'work_link', 'user')->select('*')->where('table_id', $table_id)->get();
        return array('data' => $data);
    }
    public function get_paricular_data($data_id)
    {
        $data = AddData::select('id', 'column_name', 'values')->where('id', $data_id)->get();
        return $data;
    }
    public function update_particular_data(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'column' => 'required',
            'unit' => 'required'
        ]);
        $data_id = $r->input('data_id');
        $column = $r->input('column');
        $unit = $r->input('unit');
        if ($validator->passes()) {
            AddData::where('id', $data_id)->update(['column_name' => $column, 'values' => $unit]);
            return json_encode(array("message" => "Updated successfully", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete_particular_data($data_id)
    {
        AddData::where('id', $data_id)->delete();
        return json_encode(array("message" => "Deleted successfully", "status" => true));
    }
}
