<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Models\AddTable;
use App\Models\AddData;
use Validator;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $data = AddTable::get();
        //return $data;
        return view('admin.header') . view('admin.compare', ['tags' => $data]) . view('admin.footer');
    }
    public function get($id)
    {
        $data = AddData::with('work_link', 'user', 'table')->where('table_id', $id)->get();
        return $data;
    }
    public function ApproveData(Request $r)
    {
        $approveData = $r->input('approve');
        AddData::whereIn('id', $approveData)->update(['status' => '2']);
        return json_encode(array("message" => "Updated successfully", "status" => true));
    }
}
