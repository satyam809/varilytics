<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;

class messageController extends Controller
{
    public function index()
    {
        $designationId = DB::select('select designation_id from `permission` where user_id = ?', array(session('login.user_id')));
        if (session('login.user_id') == 1 || $designationId[0]->designation_id == 1) {
            $data = DB::table('tables')
                ->join('varistats_users', 'varistats_users.id', '=', 'tables.user_id')
                ->join('assign_work_link', 'assign_work_link.id', '=', 'tables.assign_work_link_id')
                ->join('work_links', 'work_links.id', '=', 'assign_work_link.work_link_id')
                //->join('work_links', 'work_links.id', '=', 'tables.assign_work_link_id')
                ->select('tables.name as table', 'work_links.name as link_name', 'tables.remark', 'varistats_users.name')
                ->where('tables.scrape', '=', 0)
                ->orderBy('tables.id', 'desc')->get();
        } else {
            $data = DB::table('tables')
                ->join('varistats_users', 'varistats_users.id', '=', 'tables.user_id')
                ->join('assign_work_link', 'assign_work_link.id', '=', 'tables.assign_work_link_id')
                ->join('work_links', 'work_links.id', '=', 'assign_work_link.work_link_id')
                //->join('work_links', 'work_links.id', '=', 'tables.assign_work_link_id')
                ->select('tables.name as table', 'work_links.name as link_name', 'tables.remark', 'varistats_users.name')
                ->where('tables.scrape', '=', 0)
                ->where('varistats_users.id', '=', session('login.user_id'))
                ->orderBy('tables.id', 'desc')->get();
        }
        //return $data;
        return view('admin.header') . view('admin.message', ['data' => $data]) . view('admin.footer');
    }
}
