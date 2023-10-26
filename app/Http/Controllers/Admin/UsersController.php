<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\Permission;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::with('permission')->select('*')->where('id', '!=', 1)->get();
        //return $users;
        return view('admin.header') . view('admin.users',['users'=>$users]) . view('admin.footer');
    }
    public function login()
    {
        return view('user.header') . view('admin.login') . view('user.footer');
    }
    public function registrationPage(){
        return view('user.header') . view('admin.registration') . view('user.footer');
    }
    public function show()
    {
        $users = Users::with('permission')->select('*')->where('id', '!=', 1)->get();
        return $users;
        //$users = DB::select('select * from varistats_users where id != 1');
        //echo  json_encode($users);
    }
    public function registration(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);
        $name = ucwords(strtolower($r->input('name')));
        $email = $r->input('email');
        $username = $r->input('username');
        $password = $r->input('password');
        $pass = md5($password);
        //$data = array('name' => $name, "email" => $email, "password" => $pass);
        if ($validator->passes()) {
            if ($this->check_username($username)) {
                $user = new Users;
                $user->name = $name;
                $user->email = $email;
                $user->username = $username;
                $user->password = $pass;
                $user->save();
                return json_encode(array("message" => $name . "," . "You are registered successfully", "status" => true));
            } else {
                return json_encode(array("message" => "This username is already taken", "status" => false));
            }
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function check_username($username)
    {
        $res = Users::select('*')->where('username', $username)->get();
        if (count($res) != 1) {
            return true;
        }
    }
    public function userLoginSubmit(Request $r)
    {
        $username = $r->input('username');
        $password = $r->input('password');
        $r->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $pass = md5($password);
        //return $username.' '.$pass;
        $res = Users::with('permission')->select('*')->where('username', $username)->where('password', $pass)->get();
        //return $res;
        if (count($res) == 1) {
            if ($res[0]->permission == '') {
                $r->session()->flash('error', 'Please take permission from the admin.');
                return redirect('admin/login');
            }
            $role = json_decode($res[0]['permission']->role_id);
            $arr = array('username' => $res[0]->username, 'name' => $res[0]->name, 'email' => $res[0]->email, 'user_id' => $res[0]->id, 'role' => $role);
            $r->session()->put('login', $arr);
            return redirect('admin/index');
        } else {
            $r->session()->flash('error', 'Please enter valid login detail');
            return redirect('admin/login');
        }
    }
    public function removeSession(Request $r)
    {
        $r->session()->forget('login');
        return redirect('admin/login');
    }
    function save_roles(Request $r)
    {
        $userId = $r->input('userId');
        $role = json_encode($r->input('role'));
        $designation = $r->input('designation');
        $res = Permission::select('user_id')->where('user_id', $userId)->get();
        if (count($res) == 0) {
            $permission = new Permission;
            $permission->user_id = $userId;
            $permission->role_id = $role;
            $permission->designation_id = $designation;
            $permission->save();
            return array('status' => true, 'message' => 'Inserted Successfully');
        } else {
            Permission::where('user_id', $userId)->update(['role_id' => $role, 'designation_id' => $designation, 'user_id' => $userId]);
            return array('status' => true, 'message' => 'Updated Successfully');
        }
    }
    function get_userRole(Request $r, $id)
    {
        $data = Permission::select('*')->where('user_id', $id)->get();
        return $data;
    }

    public function delete($id)
    {
        Users::where('id', $id)->delete();
        return array('message' => 'deleted', 'status' => true);
    }
    public function getUserDetails($id)
    {
        return Users::select('*')->where('id', $id)->get();
    }
    public function changeUserDetails(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);
        $user_id = $r->input('user_id');
        $name = $r->input('name');
        $email = $r->input('email');
        $username = $r->input('username');
        $password = $r->input('password');
        if ($validator->passes()) {
            Users::where('id', $user_id)->update(['name' => $name, 'email' => $email, 'username' => $username, 'password' => md5($password)]);
            return array('status' => true, 'message' => 'Updated Successfully');
        }else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function getInvoiceDetail($user_id, $date)
    {
        $parts = explode('-', $date);
        $year = $parts[0];
        $month = $parts[1];
        //return $year;
        $data = DB::table('varistats_users')
            ->join('tables', 'tables.user_id', '=', 'varistats_users.id')
            // ->distinct('varistats_users.id')
            ->select('varistats_users.id', 'varistats_users.name', 'varistats_users.address', 'varistats_users.pan_no', 'varistats_users.account_no', DB::raw('SUM(tables.rows) AS total_rows'), DB::raw('SUM(tables.columns) AS total_columns'), DB::raw('COUNT(tables.id) AS total_table'))
            ->where('varistats_users.id', $user_id)
            ->where('tables.status', 1)
            ->where('tables.table_issued_by', 2)
            ->whereYear('tables.submission_date', $year)
            ->whereMonth('tables.submission_date', $month)
            ->groupBy('varistats_users.id', 'varistats_users.name', 'varistats_users.address', 'varistats_users.pan_no', 'varistats_users.account_no')
            //->groupBy('tables.id','varistats_users.name')
            ->get();
        return $data;

        // return Users::with('table',function($q){
        //     $q->where('status',1)->get();
        // })->select('*')->where('id', $id)->get();
    }
}
