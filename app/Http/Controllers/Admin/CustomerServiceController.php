<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function index()
    {

        return view('admin.header') . view('admin.customer_service') . view('admin.footer');
    }
    public function show()
    {
        $contact = DB::select('SELECT * FROM `varistats_contact` WHERE contact_id = 3');
        echo json_encode($contact);
    }
    public function delete($id)
    {
        $array = explode(',', $id);
        if (DB::table('varistats_contact')->whereIn('id', $array)->delete()) {
            return json_encode(array('message' => 'Records deleted successfully', 'status' => true));
        } else {
            return json_encode(array('message' => 'Something wrong', 'status' => false));
        }
    }
}
