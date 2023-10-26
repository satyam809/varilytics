<?php

namespace App\Http\Controllers\Admin;

use App\UserRegistration;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class commYrValueController extends Controller
{
    public function index()
    {
        $sql_topic = "select * from topics";
        $sql_comm = "select * from commodities";
        $sql_yrs = "select * from years";
        // $data = DB::select('select values.val_id,values.value,commodities.comm_name,years.year from `commodities` inner join `values` on commodities.comm_id = values.comm_id inner join `years` on years.yr_id=values.yr_id');
        $topic = DB::select($sql_topic);
        $comm = DB::select($sql_comm);
        $years = DB::select($sql_yrs);
        return view('admin.header') . view('admin.commYrValue', ["topic" => $topic, "comm" => $comm, "years" => $years, "up_comm" => $comm, "up_years" => $years, "up_topic" => $topic]) . view('admin.footer');
    }
    public function save(Request $r)
    {
        $topic = $r->input('topic');
        $commodity = $r->input('commodity');
        $year = $r->input('year');
        $value = $r->input('value');

        $validator = Validator::make($r->all(), [
            'topic' => 'required|not_in:0',
            'commodity' => 'required|not_in:0',
            'year' => 'required|not_in:0',
            'value' => 'required'
        ]);
        $data = array('topic_id' => $topic, 'comm_id' => $commodity, "yr_id" => $year, 'value' => $value);
        if ($validator->passes()) {
            DB::table('values')->insert($data);
            return json_encode(array("message" => "Inserted", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function get()
    {
        $users = DB::select('select values.topic_id,values.val_id,values.value,commodities.comm_name,years.from_date,years.to_date,topics.name as topic_name from `commodities` inner join `values` on commodities.comm_id = values.comm_id inner join `years` on years.yr_id=values.yr_id inner join `topics` on topics.id = values.topic_id');
        echo  json_encode($users);
    }
    public function getSingle($id)
    {
        //echo json_encode('test');
        //die;
        $data = DB::select('select * from `values` where val_id = ?', array($id));
        echo json_encode($data);
    }
    public function update(Request $r)
    {
        $id = $r->input('val_id');
        $topic = $r->input('topic');
        $commodity = $r->input('commodity');
        $year = $r->input('year');
        $value = $r->input('value');
        //echo $id . '<br>' . $commodity . '<br>' . $year . '<br>' . $value;
        //die;
        $validator = Validator::make($r->all(), [
            'topic' => 'required|not_in:0',
            'commodity' => 'required|not_in:0',
            'year' => 'required|not_in:0',
            'value' => 'required'

        ]);
        if ($validator->passes()) {
            DB::update('update `values` set topic_id = ?,comm_id = ?,yr_id = ?,value=? where val_id = ?', [$topic, $commodity, $year, $value, $id]);
            return json_encode(array("message" => "Updated", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete($id)
    {

        if (DB::delete('delete from `values` where val_id = ?', array($id))) {
            echo json_encode(array('message' => 'deleted', 'status' => true));
        }
    }
}
