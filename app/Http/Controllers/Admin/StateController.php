<?php

namespace App\Http\Controllers\Admin;

use App\UserRegistration;
use DB;
use App\Models\State;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.state') . view('admin.footer');
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'state' => 'required'
        ]);
        $state = $r->input('state');
        if ($validator->passes()) {
            $file = $r->file('icon');
            $fileName = "";
            if ($file) {
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move(public_path("assets/admin_assets/statesIcons"), $fileName);
                $data = array('name' => $state, "icon" => $fileName);
            } else {
                $data = array('name' => $state);
            }
            // $state = new State;
            // $state->name = $state;
            // $state->icon = $fileName;
            // $state->save();


            DB::table('states')->insert($data);
            return array("message" => "Inserted", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function get(Request $r)
    {
        $data = State::select('*')->get();
        return ['data' => $data];
    }
    public function delete(Request $r)
    {
        State::where("id", $r->input("id"))->delete();
        return ['status' => true, 'message' => 'State deleted successfully'];
    }
    public function getSingle($id)
    {
        $data = DB::select('select * from `states` where id = ?', array($id));
        echo json_encode($data[0]);
    }
    public function update(Request $r)
    {
        //    echo json_encode('test');
        //dd($r->all());
        $id = $r->input('state_id');
        $state = $r->input('state');
        $up_icon = $r->input('up_icon');
        $validator = Validator::make($r->all(), [
            'state' => 'required'
        ]);
        $file = $r->file('icon');

        if ($validator->passes()) {
            if ($r->hasFile('icon')) {
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                // print_r($fileName);die;
                $file->move(public_path("assets/admin_assets/statesIcons"), $fileName);
                DB::table('states')->where('id', $id)->update([
                    'name' => $state,
                    'icon' => $fileName
                ]);
                return json_encode(array("message" => "State is Updated Successfully", "status" => true));
            } else {
                DB::table('states')->where('id', $id)->update([
                    'name' => $state
                ]);
                return json_encode(array("message" => "State is Updated Successfully", "status" => true));
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }

        /*$fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                // print_r($fileName);die;
                $file->move(public_path("assets/admin_assets/icon"), $fileName);
                DB::table('organistation')->where('org_id',$id)->update([
                    'org_name'=>$organisation,
                    'icon'=>$fileName
                ]);*/

        /*if ($validator->passes()) {
            $file = $r->file('icon');
            
            if (file_exists(public_path("assets/admin_assets/icon/.$up_icon"))) {
                unlink(public_path("assets/admin_assets/icon/.$up_icon"));
                //print_r($up_icon);die;
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                // print_r($fileName);die;
                $file->move(public_path("assets/admin_assets/icon"), $fileName);
                DB::update('update `organistation` set org_name = ?,icon=? where org_id = ?', [$organisation, $fileName, $id]);
                return json_encode(array("message" => "Updated", "status" => true));
            }
        }
        return response()->json(['error' => $validator->errors()]);*/
    }
}
