<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Models\TableTopic;
use App\Models\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.index') . view('admin.footer');
    }
    public function getTotalTopicsAndTagTopics()
    {
        $taggedTopic = TableTopic::select('topic_id')
        ->distinct()
        ->count('topic_id');
        $count = Topic::select('parent_id')
        ->distinct()
        ->count('parent_id');
        $total = Topic::select('id')
        ->distinct()
        ->count('id');
        //return [$count, $total];
        return ["taggedTopic"=>$taggedTopic,"totaTopic"=>$total - $count];
    }
}
