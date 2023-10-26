<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataSourceController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.data_source') . view('admin.footer');
    }
    public function show()
    {
        $contact = DB::select('SELECT * FROM `varistats_contact` WHERE contact_id = 1');
        return DataTables::of($contact)->make(true);
    }
    public function delete($id)
    {
        if (DB::table('varistats_contact')->where('id', $id)->delete()) {
            return ['message' => 'Records deleted successfully', 'status' => true];
        } else {
            return ['message' => 'Something wrong', 'status' => false];
        }
    }
}
