<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;

class paymentController extends Controller
{
    public function index()
    {
        $designationId = DB::select('select designation_id from `permission` where user_id = ?', array(session('login.user_id')));
        if (session('login.user_id') == 1 || $designationId[0]->designation_id == 1) {
            $data = DB::table('tables')
                ->join('varistats_users', 'varistats_users.id', '=', 'tables.user_id')
                ->join('assign_work_link', 'assign_work_link.id', '=', 'tables.assign_work_link_id')
                ->join('work_links', 'work_links.id', '=', 'assign_work_link.work_link_id')
                ->join('work_fields', 'work_fields.id', '=', 'assign_work_link.work_field_id')
                ->select('tables.id', 'tables.name as table_name', 'tables.rows', 'tables.columns', 'tables.payment_status', 'tables.payment_date', 'tables.invoice', 'varistats_users.name as username', 'work_fields.website', 'work_links.name as link_name')
                ->where('tables.scrape', '=', 0)
                ->where('tables.status', 1)
                ->where('tables.table_issued_by', 2)
                ->get();
        } else {
            $data = DB::table('tables')
                ->join('varistats_users', 'varistats_users.id', '=', 'tables.user_id')
                ->join('assign_work_link', 'assign_work_link.id', '=', 'tables.assign_work_link_id')
                ->join('work_links', 'work_links.id', '=', 'assign_work_link.work_link_id')
                ->join('work_fields', 'work_fields.id', '=', 'assign_work_link.work_field_id')
                ->select('tables.id', 'tables.name as table_name', 'tables.rows', 'tables.columns', 'tables.payment_status', 'tables.payment_date', 'tables.invoice', 'varistats_users.name as username', 'work_fields.website', 'work_links.name as link_name')
                ->where('tables.scrape', '=', 0)
                ->where('varistats_users.id', '=', session('login.user_id'))
                ->where('tables.status', 1)
                ->where('tables.table_issued_by', 2)
                ->get();
        }


        return view('admin.header') . view('admin.payment', ['data' => $data]) . view('admin.footer');
    }
    public function update(Request $r)
    {
        $invoice = "";
        $upId = $r->input('upId');
        $pstatus = $r->input('pstatus');
        $pdate = $r->input('pdate');
        $data = DB::select('select invoice from tables where id = ' . $upId);
        if ($data[0]->invoice == null) {
            if ($r->hasFile('invoice')) {
                $file = $r->file('invoice');
                $invoice = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move(public_path("assets/admin_assets/invoice"), $invoice);
            }
            if (DB::update('update `tables` set payment_status = ?,payment_date = ?,invoice = ? where id = ?', [$pstatus, $pdate, $invoice, $upId])) {
                $r->session()->flash('success', 'Updated successfully');
                return redirect('/admin/payment');
            }
        } else {
            unlink(public_path('assets/admin_assets/invoice/' . $data[0]->invoice));
            if ($r->hasFile('invoice')) {
                $file = $r->file('invoice');
                $invoice = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move(public_path("assets/admin_assets/invoice"), $invoice);
            }
            if (DB::update('update `tables` set payment_status = ?,payment_date = ?,invoice = ? where id = ?', [$pstatus, $pdate, $invoice, $upId])) {
                $r->session()->flash('success', 'Updated successfully');
                return redirect('/admin/payment');
            }
        }
    }
}
