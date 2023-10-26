<?php

namespace App\Http\Controllers\Admin;

use App\Models\AssignWork;
use App\Models\AssignWorkLink;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class AssignWorkController extends Controller
{
    public function AssignWork()
    {
        // echo "assign_work";
        $users = DB::table('permission')
            ->join('varistats_users', 'permission.user_id', '=', 'varistats_users.id')
            ->select('varistats_users.id', 'varistats_users.name')
            ->where('permission.designation_id', 2)->get();

        $work_field = DB::select("select * from `work_fields`");
        $work_link = DB::select("select * from `work_links`");
        // echo "<pre>";
        // print_r($users);die();
        // echo "</pre>";
        return view('admin.header') . view('admin.assign_work', ['users' => $users, 'work_field' => $work_field, 'work_link' => $work_link]) . view('admin.footer');
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'users' => 'required',
            'website' => 'required',
            'link' => 'required'
        ]);
        $link = array();
        $users = $r->input('users');
        $website = $r->input('website');
        $link = $r->input('link');

        if ($validator->passes()) {
            $assignWork = new AssignWork;
            $assignWork->assigned_by = session('login.user_id');
            $assignWork->users = $users;
            $assignWork->work_field_id = $website;
            $assignWork->assigned_date = date("Y-m-d");
            $assignWork->save();
            $lastId = $assignWork->id;
            foreach ((array) $link as $val) {
                $assignWorkLink = new AssignWorkLink;
                $assignWorkLink->assign_work_id = $lastId;
                $assignWorkLink->work_field_id = $website;
                $assignWorkLink->work_link_id = $val;
                $assignWorkLink->save();
            }
            return array("message" => "Inserted", "status" => true);
        }


        return response()->json(['error' => $validator->errors()]);
    }

    public function get()
    {
        $data = DB::table('assign_work')
            ->join('varistats_users', 'assign_work.users', '=', 'varistats_users.id')
            ->join('work_fields', 'work_fields.id', '=', 'assign_work.work_field_id')
            ->select('assign_work.id', 'assign_work.work_field_id', 'assign_work.assigned_by','assign_work.assigned_date', 'varistats_users.name', 'work_fields.website')
            ->orderBy('assign_work.assigned_date','DESC')
            ->get();

        foreach ($data as $value) {
            $value->link_name = array();
            $value->assignId = array();
            $link = DB::select('select id as assignId, work_link_id from assign_work_link where assign_work_id =' . $value->id);
            foreach ($link as $val) {
                $name = DB::select('select name from work_links where id =' . $val->work_link_id);
                $value->link_name[] = $name[0]->name;
                $value->assignId[] = $val->assignId;
            }
        }

        echo  json_encode(array('data' => $data));
    }
    public function getSingle($id, $work_field_id)
    {
        $data = DB::table('assign_work')
            ->join('varistats_users', 'assign_work.users', '=', 'varistats_users.id')
            ->join('work_fields', 'work_fields.id', '=', 'assign_work.work_field_id')
            ->join('assign_work_link', 'assign_work_link.assign_work_id', '=', 'assign_work.id')
            ->join('work_links', 'work_links.id', '=', 'assign_work_link.work_link_id')
            ->select('assign_work.id as assignedId', 'assign_work.assigned_date', 'varistats_users.name', 'varistats_users.id as userId', 'work_fields.id as work_fieldId', 'work_fields.website', 'work_fields.acronym', 'work_fields.org_name', 'work_fields.sector', 'work_fields.domain', 'assign_work_link.work_link_id as workId', 'work_links.name as link_name')
            ->where('assign_work.id', '=', $id)
            ->get();
        $link = $this->get_link($work_field_id);

        echo json_encode(array('assign_work' => $data, 'link' => $link));
    }
    public function update(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'users' => 'required',
            'website' => 'required',
            //'description' => 'required',
            'link' => 'required'
        ]);
        $link = array();
        $id = $r->input('val_id');
        $users = $r->input('users');
        $website = $r->input('website');
        $link = $r->input('link');

        if ($validator->passes()) {
            AssignWork::where('id', $id)->update(['users' => $users, 'work_field_id' => $website, 'assigned_date' => date("Y-m-d")]);
            if (DB::delete('delete from `assign_work_link` where assign_work_id = ?', [$id])) {
                foreach ((array) $link as $val) {
                    $assignWorkLink = new AssignWorkLink;
                    $assignWorkLink->assign_work_id = $id;
                    $assignWorkLink->work_field_id = $website;
                    $assignWorkLink->work_link_id = $val;
                    $assignWorkLink->save();
                }
            }
            return json_encode(array("message" => "Updated Successfully", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete($id)
    {
        if (DB::delete('delete from assign_work where id = ?', array($id))) {
            echo json_encode(array('message' => 'deleted', 'status' => true));
        }
    }
    public function delete_single($id)
    {
        if (DB::delete('delete from assign_work_link where id = ?', array($id))) {
            echo json_encode(array('message' => 'deleted', 'status' => true));
        }
    }
    public function getField(request $r)
    {
        $website_id = $r->input('website_id');
        $data = DB::select('select * from work_fields where id=' . $website_id);
        $data1 = $this->get_link($website_id);
        echo json_encode(array('data' => $data, 'work_link' => $data1));
    }

    public function assignWork_upload(Request $r)
    {

        $file = $r->file('file');

        $handle = fopen($file, "r");
        $c = 0;

        while (($filesop = fgetcsv($handle)) !== false) {
            $user = DB::select('select id from `varistats_users` where name = ?', array($filesop[0]));
            //print_r($user);
            $userId = $user[0]->id;

            $website = DB::select('select id from `work_fields` where website = ?', array($filesop[1]));

            $websiteId = $website[0]->id;

            $assigned_date = date("Y-m-d", strtotime($filesop[2]));
            // $remark = $filesop[3];
            $description = $filesop[3];
            // $work_link = DB::select('select id from `work_links` where web_id = ?', array($websiteId));
            // $arr = array();
            // foreach ($work_link as $val) {
            //     $arr[] = $val->id;
            // }
            //print_r($work_link);
            //die;
            $data = array(
                'users' => $userId,
                'work_field_id' => $websiteId,
                'assigned_date' => $assigned_date,
                //'remark' => $remark,
                'description' => $description
                //'work_link_ids' => implode(",", $arr)
            );
            DB::table('assign_work')->insert($data);
            $c = $c + 1;
        }
        //$r->session()->flash('assignWorkMessage', 'Data is uploaded successfully');
        return redirect('/admin/assign_work');
    }

    public function get_link($website_id)
    {
        $link = DB::select('select work_link_id from assign_work_link where work_field_id =' . $website_id);
        $linkData = array();
        foreach ($link as $val) {
            $linkData[] = $val->work_link_id;
        }
        $str = implode(",", $linkData);
        $data = DB::select('select * from work_fields where id=' . $website_id);
        if ($str != '') {
            $data1 = DB::select('select * from work_links where web_id = ' . $data[0]->id . ' and id not in(' . $str . ')');
        } else {
            $data1 = DB::select('select * from work_links where web_id = ' . $data[0]->id);
        }
        return $data1;
    }
}
