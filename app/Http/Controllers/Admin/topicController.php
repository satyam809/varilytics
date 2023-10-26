<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topic;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class topicController extends Controller
{
    public function index()
    {
        $data = Topic::select('id', 'name', 'parent_id')
            ->where('parent_id', '=', '0')
            ->get();
        return view('admin.header') . view('admin.topic', ['data' => $data]) . view('admin.footer');
    }
    public function checkTopic($topic)
    {
        $data = Topic::select('*')->where('parent_id', 0)->where('name', $topic)->get();
        return $data;
    }
    public function save_topic(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'topic' => 'required'
        ]);
        $data = $this->checkTopic($r->input('topic'));
        //return $data[0];
        if (isset($data[0])) {
            return json_encode(array("message" => "This parent topic is already exist", "status" => true));
        }
        $topic = new Topic;
        $topic->name = ucwords(strtolower($r->input('topic')));
        if ($validator->passes()) {
            $topic->save();
            return json_encode(array("message" => "Topic Added Successfully", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }

    public function get()
    {
        $data = DB::select('select * from `topics`');
        echo  json_encode(array('data' => $data));
    }
    public function delete($id)
    {
        DB::delete('delete from topics where id = ?', array($id));
        DB::delete('delete from topics where parent_id = ?', array($id));
        echo  json_encode(array("message" => "Deleted", "status" => true));
    }
    public function getSingle($id)
    {
        $data = DB::select('select * from `topics` where id = ?', array($id));
        echo json_encode($data);
    }
    public function update_topic(Request $r)
    {
        //return 'test'

        $validator = Validator::make($r->all(), [
            'topic' => 'required'
        ]);
        $id = $r->input('upTopicId');
        $topic = ucwords(strtolower($r->input('topic')));
        $data = $this->checkTopic($topic);
        //return $data[0];
        if (isset($data[0])) {
            return json_encode(array("message" => "This parent topic is already exist", "status" => true));
        }
        if ($validator->passes()) {
            DB::update('update topics set name = ? where id = ?', [$topic, $id]);
            //Topic::where('id', $id)->update(['name' => $topic]);
            return json_encode(array("message" => "Parent Topic Updated Successfully", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function checkSubTopic($parent_id, $sub_topic)
    {
        $data = Topic::select('*')->where('parent_id', $parent_id)->where('name', $sub_topic)->get();
        return $data;
    }
    public function save_subtopic(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'parent_id' => 'required',
            'sub_topic' => 'required'
        ]);
        $topic = new Topic;
        $parent_id = $r->input('parent_id');
        if (end($parent_id) == '') {
            $topic->parent_id = $parent_id[count($parent_id) - 2];
        } else {
            $topic->parent_id = end($parent_id);
        }
        $data = $this->checkSubTopic($topic->parent_id, $r->input('sub_topic'));
        if (isset($data[0])) {
            return json_encode(array("message" => "This sub topic is already exist inside own parent's topic", "status" => true));
        }
        $topic->name = ucwords(strtolower($r->input('sub_topic')));

        if ($validator->passes()) {
            $topic->save();
            return json_encode(array("message" => "Sub Topic Added Successfully", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function addSubtopic(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'parentId' => 'required',
            'sub_topic' => 'required'
        ]);
        $topic = new Topic;
        $parentId = $r->input('parentId');
        $topic->parent_id = $parentId;
        $data = $this->checkSubTopic($parentId, $r->input('sub_topic'));
        if (isset($data[0])) {
            return json_encode(array("message" => "This sub topic is already exist inside own parent's topic", "status" => true));
        }
        $topic->name = ucwords(strtolower($r->input('sub_topic')));

        if ($validator->passes()) {
            $topic->save();
            return json_encode(array("message" => "Sub Topic Added Successfully", "status" => true));
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function update_sub_topic(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'sub_topic' => 'required'
        ]);
        //return 'test';
        //echo json_encode('test');
        $id = $r->input('upSubTopicId');
        //$parentTopic = $r->input('up_parent_id');
        $parent_id = $r->input('up_parent_id');
        $topic = ucwords(strtolower($r->input('sub_topic')));
        // print_r($parent_id);
        // die;
        if ($parent_id[0] == '') {
            if ($validator->passes()) {
                $data = $this->checkSubTopic($id, $topic);
                if (isset($data[0])) {
                    return json_encode(array("message" => "This sub topic is already exist inside own parent's topic", "status" => true));
                }
                //return $id;
                Topic::where('id', $id)->update(['name' => $topic]);
                // DB::update('update topics set name = ? where id = ?', [$topic, $id]);
                return json_encode(array("message" => "Parent Topic Updated Successfully", "status" => true));
            } else {
                return response()->json(['error' => $validator->errors()]);
            }
        } else {
            if ($validator->passes()) {
                if (end($parent_id) == '') {
                    $parent_id = $parent_id[count($parent_id) - 2];
                } else {
                    $parent_id = end($parent_id);
                }
                $data = $this->checkSubTopic($parent_id, $topic);
                if (isset($data[0])) {
                    return json_encode(array("message" => "This sub topic is already exist inside own parent's topic", "status" => true));
                }
                //return $id.' '.$parent_id;
                Topic::where('id', $id)->update(['name' => $topic, 'parent_id' => $parent_id]);
                // DB::update('update topics set name = ? where id = ?', [$topic, $id]);
                return json_encode(array("message" => "Parent Topic Updated Successfully", "status" => true));
            } else {
                return response()->json(['error' => $validator->errors()]);
            }
        }
    }
    public function get_subtopic($parent_id)
    {
        $data = Topic::with('subTopic')->select('id', 'name', 'parent_id')
            ->where('parent_id', '=', $parent_id)
            //->orderBy('parent_id', 'asc')
            ->get();
        echo json_encode($data);
    }
    public function parent_topic()
    {
        $data = Topic::select('id', 'name', 'parent_id')
            ->where('parent_id', '=', '0')
            ->get();
        echo json_encode($data);
    }
    public function up_parent_topic($parent_id)
    {
        $data = Topic::select('parent_id')
            ->where('id', '=', $parent_id)
            ->get();
        $parent = Topic::select('id', 'name', 'parent_id')
            ->where('parent_id', '=', $data[0]->parent_id)
            ->get();
        echo json_encode($parent);
    }
    public function get_subsubtopic(Request $r){
        $parent_id = $r->input('subSubParentId');
        //return $parent_id;
        $r->session()->put('subSubParentId','');
        $r->session()->put('subSubParentId',$parent_id);
    }
}
