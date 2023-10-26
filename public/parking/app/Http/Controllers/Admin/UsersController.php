<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::select('*')->whereNotIn('id', [18])->get();
        // $users = DB::table('users')->get();
        // echo $users; die;
        // return view('admin/users', ['users' => $users]);
        return view('admin.header') . view('admin.users', ['users' => $users]) . view('admin.footer');
    }



    public function login()
    {
        return view('login');
    }


    
    public function check_username($username)
    {
        $res = User::select('*')->where('username', $username)->get();
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
        $res = User::select('*')->where('username', $username)->where('password', $pass)->get();
        //return $res;
        if (count($res) == 1) {
            $arr = array('username' => $res[0]->username, 'name' => $res[0]->name, 'email' => $res[0]->email, 'user_id' => $res[0]->id);
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
    
    

    public function delete($id)
    {
        DB::delete('delete from users where id = ?',[$id]);
        // return array('message' => 'deleted', 'status' => true);
        // echo "Record deleted successfully.<br/>";
        return redirect('admin/users');
    }


    public function getUserDetails(Request $r)
    {
        return User::select('*')->where('id', $r->id)->get();
    }



    public function changeUserDetails(Request $r)
    {
        // echo 'hello'; die;
        $user_id = $r->input('userid');
        // print($user_id); die;
        $student = User::find($user_id);
        // print_r($student); die;
       
        $name = $r->input('name');
        $email = $r->input('email');
        $username = $r->input('username');
        $password = $r->input('password');
        //if ($validator->passes()) {
            User::where('id', $user_id)->update(['name' => $name, 'email' => $email, 'username' => $username, 'password' => md5($password)]);
            return redirect('admin/users')->with('success', 'User Details Successfully updated'); 
        // }else {
        //     return response()->json(['error' => $validator->errors()]);
        // }
    }



    public function addUserDetails(Request $request){
        // echo "hello";
        
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->contact_number = $request->contact_number;
            $user->emergency_contact = $request->emergency_contact;
            $user->password = $request->password;
            $user->save();
            return redirect('admin/users')->with('success', 'User Details Successfully added');   
    } 
   
}




