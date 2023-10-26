<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Models\AddTable;
use App\Models\AddFinalData;
use Validator;
use Illuminate\Http\Request;

class CombineController extends Controller
{
    public function index()
    {
        $data = AddTable::select('id', 'name')->where('table_issued_by',2)->get();
        return view('admin.header') . view('admin.combine', ['tables' => $data]) . view('admin.footer');
    }
    public function get_table_status($data_id)
    {
        $table_id = AddFinalData::select('table_id')->where('id', $data_id)->get();
        $merged_id = AddTable::select('merged_table')->where('id', $table_id[0]->table_id)->get();
        return ['table_id'=>$table_id[0]->table_id,'merged_id'=>$merged_id[0]->merged_table];
    }
    public function get_combine_data(Request $r)
    {
        $table_id = $r->input('tables');
        $data = AddFinalData::select('*')->whereIn('table_id', $table_id)->get();
        return array('data' => $data);
    }
    public function combine_data(Request $r)
    {
        $table_name = $r->input('new_table_name');
        $data_id = $r->input('table_data');
        $array = explode(',', $data_id[0]);
        //return $array[1];
        //return count($array);
        $addTable = new AddTable;
        $addTable->name = $table_name;
        $addTable->table_issued_by = 2;
        $addTable->merged_table = 1;
        $addTable->save();
        $last_id = $addTable->id;

        for ($i = 0; $i < count($array); $i++) {
            $data = AddFinalData::select('column_name', 'values', 'status')->where('data_id', $array[$i])->get();
            $addData = new AddFinalData;
            $addData->user_id =  session('login.user_id');
            $addData->table_id = $last_id;
            $addData->column_name = $data[0]->column_name;
            $addData->values = $data[0]->values;
            $addData->status = 0;
            $addData->issued_by = 2;
            $addData->save();
        }
        return json_encode(['message' => 'Inserted successfully', 'status' => true]);
    }
    public function getDataTable($data_id)
    {
        $data = AddFinalData::select('*')->where('id', $data_id)->get();
        $table = AddTable::select('id', 'name')->where('id', $data[0]->table_id)->get();
        return json_encode(['data' => $data, 'table' => $table]);
    }
    public function updateDataTable(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'tableName' => 'required',
            'column' => 'required',
            'unit' => 'required'
        ]);
        $data_id = $r->input('data_id');
        $table_id = $r->input('table_id');
        $table = $r->input('tableName');
        $column = $r->input('column');
        $unit = $r->input('unit');
        if ($validator->passes()) {
            AddFinalData::where('id', $data_id)->update(['column_name' => $column, 'values' => $unit]);
            AddTable::where('id', $table_id)->update(['name' => $table]);
            return json_encode(array("message" => "Updated successfully", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete_merge_data($data_id){
        AddFinalData::where('id',$data_id)->delete();
        return json_encode(["message" => "Deleted successfully", "status" => true]);
    }
    public function approveMergeTableAndData(Request $r){
        $approveData = $r->input('approve');
        $data_id = $approveData[0];
        $table = $this->get_table_status($data_id);
        if($table['merged_id'] == 1){
            AddFinalData::whereIn('id', $approveData)->update(['status'=>'1','issued_by' => '2']);
            AddTable::where('id',$table['table_id'])->update(['status'=>'1','table_issued_by'=>'2']);
            return json_encode(array("message" => "Approved table data successfully", "status" => true));
        }else{
            AddFinalData::whereIn('id', $approveData)->update(['status'=>'1','issued_by' => '2']);
            AddTable::where('id',$table['table_id'])->update(['status'=>'1','table_issued_by'=>'2']);
            return json_encode(array("message" => "Approved table data successfully", "status" => true));
        }
        
    }
    public function unApproveMergeTableAndData(Request $r){
        $unapproveData = $r->input('unapprove');
        $data_id = $unapproveData[0];
        $table = $this->get_table_status($data_id);
        if($table['merged_id'] == 1){
            AddFinalData::whereIn('id', $unapproveData)->update(['status'=>'0','issued_by' => '2']);
            AddTable::where('id',$table['table_id'])->update(['status'=>'0','table_issued_by'=>'2']);
            return json_encode(array("message" => "Disapproved table data successfully", "status" => true));
        }else{
            AddFinalData::whereIn('id', $unapproveData)->update(['status'=>'0','issued_by' => '0']);
            AddTable::where('id',$table['table_id'])->update(['status'=>'0','table_issued_by'=>'0']);
            return json_encode(array("message" => "Disapproved table data successfully", "status" => true));
        }
        
    }
}
