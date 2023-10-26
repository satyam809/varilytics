<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomersController extends Controller
{
    public function index(Request $r)
    {
        if ($r->ajax()) {
            $data = Customer::all();
            return DataTables::of($data)->make(true);
        }
        //$customers = Customer::select('*')->get();
        return view('admin.header') . view('admin.customers') . view('admin.footer');
    }
    public function delete($id)
    {
        Customer::where('id', $id)->delete();
        return array('message' => 'deleted', 'status' => true);
    }
    public function changeCustomerPassword(Request $r){
        Customer::where('id', $r->upId)->update(['password' => $r->password]);
        return['message' => 'Password Changed', 'status' => true];
    }
    
}
