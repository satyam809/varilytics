<?php

namespace App\Http\Controllers\Admin;

use App\Models\Taging;
use App\Models\Topic;
use App\Models\State;
use App\Models\District;
use App\Models\AddData;
use App\Models\TableTag;
use App\Models\SmartCity;
use DB;
use App\Http\Controllers\Controller;
use App\Models\AddTable;
use Validator;
use Illuminate\Http\Request;

class TagingController extends Controller
{
    public function view()
    {
        $data = Taging::with("topics", "subTopics", "country", "state", "district")->get();
        //return $data;
        return view('admin.header') . view('admin.view_taging', ['tag' => $data]) . view('admin.footer');
    }

    public function index(Request $r)
    {
        return view('admin.header') . view('admin.add_taging') . view('admin.footer');
    }
    public function addTaging(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'topic' => 'required',
            //'topic.*' => 'required|string|distinct|min:1',
            // 'country' => 'required',
            // 'year' => 'required',
            'table_id' => 'required'
        ]);
        $topic_id = $r->input('topic');
        $country_id = $r->input('country');
        $state_id = $r->input('state');
        $district_id = $r->input('district');
        $block = ucwords(strtolower($r->input('block')));
        $year = $r->input('year');
        $table_id = $r->input('table_id');
        if ($validator->passes()) {
            $taging = new Taging;
            $taging->topic_id = end($topic_id);
            $taging->country_id = $country_id;
            $taging->state_id = $state_id;
            $taging->district_id = $district_id;
            $taging->block = $block;
            $taging->year = $year;
            $taging->save();
            foreach ($table_id as $value) {
                $table_tag = new TableTag;
                $table_tag->table_id = $value;
                $table_tag->tag_id = $taging->id;
                $table_tag->save();
            }
            return json_encode(array("message" => "Inserted Successfully", "status" => true));
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function deleteTaging($id)
    {
        Taging::where('id', $id)->delete();
        TableTag::where('tag_id', $id)->delete();
        return response()->json(array("message" => "Deleted Successfully", "status" => true));
    }
    public function getTaging($id)
    {
        $data = Taging::with("topics", "subTopics", "country", "state", "district", "TableTag")->where('id', $id)->get();
        //return $data;
        return view('admin.header') . view('admin.get_taging', ['data' => $data]) . view('admin.footer');
    }
    public function getLastSubTopic($id)
    {
        $data1 = Topic::where('id', $id)->get();
        $data = Topic::where('parent_id', $data1[0]->parent_id)->get();
        return $data;
    }
    public function updateTaging(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'topic_id' => 'required',
            //'topic.*' => 'required|string|distinct|min:1',
            // 'country_id' => 'required',
            // 'year' => 'required',
            'table_id' => 'required'

        ]);
        $id = $r->input('id');
        $topic_id = $r->input('topic_id');
        $country_id = $r->input('country_id');
        $state_id = $r->input('state_id');
        $district_id = $r->input('district_id');
        $block = ucwords(strtolower($r->input('block')));
        $year = $r->input('year');
        $table_id = $r->input('table_id');
        if ($validator->passes()) {
            Taging::where('id', '=', $id)->update(array('topic_id' => $topic_id, 'country_id' => $country_id, 'state_id' => $state_id, 'district_id' => $district_id,'block'=> $block,'year' => $year));
            TableTag::where('tag_id', '=', $id)->delete();
            foreach ($table_id as $value) {
                $TableTag = new TableTag;
                $TableTag->table_id = $value;
                $TableTag->tag_id = $id;
                $TableTag->save();
            }
            return json_encode(array("message" => "Updated Successfully", "status" => true));
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function states()
    {
        $smartCities = SmartCity::getAllSmartCities();
        $data = State::select('*')->get();
        $result['smartCities'] = $smartCities;
        $result['state'] = $data;
        return $result;
    }
    public function districts($id)
    {
        $data = District::where('state_id', $id)->get();
        return $data;
    }
    public function get_tables()
    {
        $data = AddTable::select('*')->where([['status','1'],['table_issued_by','2']])->get();
        return $data;
    }
}
