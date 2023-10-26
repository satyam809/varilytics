<?php

namespace App\Http\Controllers\Frontend;

use Google\Client;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Models\CurrentTopic;
use App\Models\Industry;
use App\Models\Infographic;
use Session;

class InfographicsController extends Controller
{
    public function index(Request $r)
    {
        $currentTopic = CurrentTopic::select('*')->get();
        $industries = Industry::select('*')->get();
        $infographics = Infographic::select('*')->get();
        //return $infographics;die;
        return view('user.header') . view('user.infographics',['currentTopic' => $currentTopic,'industries'=>$industries,'infographics'=>$infographics]) . view('user.footer');
    }
    public function filterInfographics(Request $r){
        return Infographic::select('image','pdf')->where('current_topic_id',$r->input('id'))->orWhere('industries_id',$r->input('id'))->get();

    }
}
