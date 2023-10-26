<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\DataAtlas;
use App\Models\country;
use App\Models\AddTable;
use Validator;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Models\Users;
use App\Mail\DemoMail;

class User extends Controller
{
    public $email;
    public $otp;
    public $username;
    function email()
    {
        $data = array('name' => "Virat Gandhi");

        Mail::send(['text' => 'mail'], $data, function ($message) {
            $message->to('satyamshivam570@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            $message->from('satyam.shivam@corewebconnections.com', 'Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
    function index()
    {
        return view('user.header') . view('user.index') . view('user.footer');
    }
    function agriculture()
    {
        return view('user.agriculture');
    }
    function art_design()
    {
        return view('user.header') . view('user.art_design');
    }
    function education()
    {
        return view('user.header').view('user.education');
    }
    function finance()
    {
        return view('user.header').view('user.finance');
    }
    function statistics()
    {
        return view('user.header') . view('user.statistics');
    }
    function insights()
    {
        return view('user.header') . view('user.insights') . view('user.footer');
    }
    function infographics()
    {
        return view('user.header') . view('user.infographics') . view('user.footer');
    }
    function visuals()
    {
        return view('user.header') . view('user.visuals') . view('user.footer');
    }
    function analytics()
    {
        return view('user.header') . view('user.analytics') . view('user.footer');
    }
    function on_demand_services()
    {
        return view('user.header') . view('user.on_demand_services') . view('user.footer');
    }
    function data_atlas()
    {
        $value = DB::select('select values.val_id,values.value,commodities.comm_name,years.from_date,years.to_date from `commodities` inner join `values` on commodities.comm_id = values.comm_id inner join `years` on years.yr_id=values.yr_id');
        $comm = DB::select('select * from `commodities`');
        $year = DB::select('select * from `years`');
        $topic = DB::select('SELECT * FROM `topics` where `parent_id` = 0');
        // echo "<pre>";
        // print_r($value);
        // die;
        return view('user.header') . view('user.data_atlas', ["comm" => $comm, "year" => $year, "value" => $value, "topic" => $topic, "up_topic" => $topic]) . view('user.footer');
    }

    function data_board()
    {
        return view('user.header') . view('user.data_board') . view('user.footer');
    }
    function simple_search()
    {
        return view('user.simple_search');
    }

    function custom_query()
    {
        return view('user.header') . view('user.custom_query') . view('user.footer');
    }
    function compare_sources()
    {
        return view('user.header') . view('user.compare_sources') . view('user.footer');
    }
    function create()
    {
        return view('user.header') . view('user.create') . view('user.footer');
    }
    function publish()
    {
        return view('user.header') . view('user.publish') . view('user.footer');
    }
    function data_store()
    {
        return view('user.header') . view('user.data_store') . view('user.footer');
    }
    function dashboard()
    {
        return view('user.header') . view('user.dashboard') . view('user.footer');
    }
    function inforgraphic()
    {
        return view('user.header') . view('user.inforgraphic') . view('user.footer');
    }
    function outlooks()
    {
        return view('user.header') . view('user.outlooks') . view('user.footer');
    }
    function publications()
    {
        return view('user.header') . view('user.publications') . view('user.footer');
    }
    function reports()
    {
        return view('user.header') . view('user.reports') . view('user.footer');
    }
    function surveys()
    {
        return view('user.header') . view('user.surveys') . view('user.footer');
    }
    function varisurvey()
    {
        return view('user.header') . view('user.varisurvey') . view('user.footer');
    }
    function data_visuals()
    {
        return view('user.header') . view('user.data_visuals') . view('user.footer');
    }
    function whitepapers()
    {
        return view('user.header') . view('user.whitepapers') . view('user.footer');
    }
    function resources()
    {
        return view('user.header') . view('user.resources') . view('user.footer');
    }
    function compendiums()
    {
        return view('user.header') . view('user.compendiums') . view('user.footer');
    }
    function repositories()
    {
        return view('user.header') . view('user.repositories') . view('user.footer');
    }
    function intelligence_system()
    {
        return view('user.header') . view('user.intelligence_system') . view('user.footer');
    }
    function newsfeed()
    {
        return view('user.header') . view('user.newsfeed') . view('user.footer');
    }
    function blogs()
    {
        return view('user.header') . view('user.blogs') . view('user.footer');
    }
    function subscription()
    {
        return view('user.header') . view('user.subscription') . view('user.footer');
    }

    function registration()
    {
        return view('user.header') . view('user.registration') . view('user.footer');
    }
    function purchase()
    {
        return view('user.header') . view('user.purchase') . view('user.footer');
    }
    function basic_access()
    {
        return view('user.header') . view('user.basic_access') . view('user.footer');
    }
    function professional_access()
    {
        return view('user.header') . view('user.professional_access') . view('user.footer');
    }
    function insights_access()
    {
        return view('user.header') . view('user.insights_access') . view('user.footer');
    }
    function premium_access()
    {
        return view('user.header') . view('user.premium_access') . view('user.footer');
    }
    function contact()
    {
        return view('user.header') . view('user.contact') . view('user.footer');
    }
    function login()
    {
        return view('user.header') . view('user.login') . view('user.footer');
    }
    function data_coverage()
    {
        return view('user.header') . view('user.data_coverage') . view('user.footer');
    }
    function about()
    {
        return view('user.header') . view('user.about') . view('user.footer');
    }
    function industry_themes()
    {
        return view('user.header') . view('user.industry_themes') . view('user.footer');
    }
    function data_process()
    {
        return view('user.header') . view('user.data_process') . view('user.footer');
    }
    function insertContact1(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'suggest' => 'required',
            'want_with_data' => 'required',
            //'source_of_data' => 'required',
            //'file' => 'required'
        ]);
        $contact_id = $r->input('contact_id');
        $name = $r->input('name');
        $email = $r->input('email');
        $suggest = $r->input('suggest');
        $want_with_data = $r->input('want_with_data');
        $source_of_data = $r->input('source_of_data');
        //$fileName = "";


        if ($validator->passes()) {
            // if ($r->hasFile('file')) {
            //     $file = $r->file('file');
            //     $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            //     $file->move(public_path("assets/admin_assets/contact_file"), $fileName);
            // }
            $data = array('contact_id' => $contact_id, "name" => $name, "email" => $email, "suggest" => $suggest, "want_with_data" => $want_with_data, "source_of_data" => $source_of_data);
            if (DB::table('varistats_contact')->insert($data)) {
                return json_encode(array("message" => "Thank You, your request is submitted successfully, we will contact you soon", "status" => true));
            } else {
                return json_encode(array("message" => "Not submitted", "status" => false));
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    function insertContact2(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'request' => 'required'
        ]);
        $contact_id = $r->input('contact_id');
        $name = $r->input('name');
        $email = $r->input('email');
        $subject = $r->input('subject');
        $request = $r->input('request');


        $data = array('contact_id' => $contact_id, "name" => $name, "email" => $email, "subject" => $subject, "request" => $request);

        if ($validator->passes()) {
            if (DB::table('varistats_contact')->insert($data)) {
                return json_encode(array("message" => "Data is successfully added", "status" => true));
            } else {
                return json_encode(array("message" => "Data is not added", "status" => false));
            }
        }
        return response()->json(['error' => $validator->errors()]);
    }
    function forgetPassword()
    {
        return view('user.forget_password');
    }
    function check_email(request $r)
    {
        $otp = $r->input('otp');
        $email = $r->input('email');
        $this->otp = $otp;
        $this->email = $email;
        if ($otp == '') {
            $rand = rand(10000, 100000);
            Users::where('email', $email)->update(['otp' => $rand]);
            $data = array('name' => $rand);
            //return $data['name'];
            Mail::send(['text' => 'mail'], $data, function ($message) use ($email) {
                $message->to($email, 'Varilytics')->subject('Varilytics OTP');
                $message->from('satyam.shivam@corewebconnections.com', 'Varilytics');
            });
            return array('status' => true, 'message' => 'OTP is send  to your mail');
        } else {
            //return $otp;
            $result = Users::select('*')->where('email', $email)->where('otp', $otp)->first();
            // return $result;
            if ($result) {
                $this->username = $result->username;
                return (array('page' => 1, 'email' => $email, 'otp' => $otp));
                //return redirect('change_password');
            } else {
                return (array('status' => false, 'message' => 'OTP did not verified'));
            }
        }
    }
    function change_password(request $r)
    {
        return view('user.change_password');
    }
    function save_password(request $r)
    {
        //return 'test';
        $username = $r->input('username');
        $password = $r->input('password');
        // return $password;
        $pass = md5($password);
        // echo $r->input('email');
        // echo $r->input('otp');
        // die;
        Users::where('email', $r->input('email'))->where('otp', $r->input('otp'))->update(['username' => $username, 'password' => $pass]);
        return array('status' => true, 'message' => 'Passwords updated successfully');
    }
    function topic_data($id)
    {
        $data =  AddTable::with('finalData')->select('*')->where('topic_id', $id)->get();
        // return $data;
        //return $data[0]->finalData[0]->column_name;
        return view('user.header') . view('user.topic_data', ['data' => $data]) . view('user.footer');
        // //return $id;
        // $year = DataAtlas::select('year')->distinct()->get();
        // $country = DB::table('data_atlas')
        //     ->join('countries', 'countries.country_id', '=', 'data_atlas.country_id')
        //     ->select('countries.country_id', 'countries.country_name')
        //     ->distinct()
        //     ->get();
        // $topic_name = Topic::select('name')->where(array('id' => $id))->get();

        // return view('user.header') . view('user.topic_data', ['year' => $year, 'country' => $country, 'id' => $id, 'topic_name' => $topic_name]) . view('user.footer');
    }
}
