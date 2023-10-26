<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\State;
use App\Models\District;
use App\Models\SmartCity;
use App\Models\AddTable;
use App\Models\TableTopic;
use App\Models\CountryGroup;
use App\Models\CountryGroupList;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class DataLibraryController extends Controller
{
    public function index(Request $r)
    {
        return view('user.header') . view('user.data_library') . view('user.footer');
    }
    function topic_table(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            $id = $r->query('topic');
            //return $id;
            $data =  TableTopic::with('finalData', 'tableDetails')->select('*')->where('topic_id', $id)->get();
            //return $data[0];
            return view('user.header') . view('user.topic_table', ['data' => $data]) . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    function smart_city_table(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            $id = $r->query('id');
            //return $id;
            $data =  AddTable::with('finalData')->select('*')->where('smartCity_id', $id)->get();
            //return $data;
            // //return $data[0];
            return view('user.header') . view('user.non_topic_table', ['data' => $data]) . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    function state_table(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            $id = $r->query('id');
            //return $id;
            $data =  AddTable::with('finalData')->select('*')->where('state_id', $id)->get();
            //return $data;
            // //return $data[0];
            return view('user.header') . view('user.non_topic_table', ['data' => $data]) . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    function district_table(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            $id = $r->query('id');
            //return $id;
            $data =  AddTable::with('finalData')->select('*')->where('district_id', $id)->get();
            //return $data;
            // //return $data[0];
            return view('user.header') . view('user.non_topic_table', ['data' => $data]) . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    function block_table(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            $id = $r->query('name');
            //return $id;
            $data =  AddTable::with('finalData')->select('*')->where('block', $id)->get();
            //return $data;
            // //return $data[0];
            return view('user.header') . view('user.non_topic_table', ['data' => $data]) . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    public function country_table(Request $r){
        if ($this->checkCustomerLogin() != null) {
            $country = $r->query('country');
            $country_id=Country::select('country_id')->where('country_name', $country)->first();
            $data =  AddTable::with('finalData')->select('*')->where('country_id', $country_id->country_id)->get();
            return view('user.header') . view('user.non_topic_table', ['data' => $data]) . view('user.footer');
        } else {
            return redirect('login');
        }
    } 
    
    function source_table(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            $id = $r->query('id');
            //return $id;
            $data =  AddTable::with('finalData')->select('*')->where('source', $id)->get();
            //return $data;
            // //return $data[0];
            return view('user.header') . view('user.non_topic_table', ['data' => $data]) . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    function checkCustomerLogin()
    {
        return session()->get('login_email');
    }

    public function showStates(Request $r)
    {
        if ($r->input('data') == 1) {
            return State::select('*')->get();
        }
    }
    public function showDistricts(Request $r)
    {
        if ($r->input('data') == 1) {
            return District::select('*')->get();
        }
    }
    public function showSmartCities(Request $r)
    {
        if ($r->input('data') == 1) {
            return SmartCity::select('*')->get();
        }
    }
    public function showBlock(){
        return AddTable::select('block')->where('block','!=',null)->where('block','!=','')->where('table_issued_by',2)->groupBy('block')->get();
    }
    public function sub_topic_list(Request $r)
    {
        $topic = Topic::select('*')->where('id', $r->query('subTopicId'))->first();
        $subTopic = Topic::select('*')->where('parent_id', $r->query('subTopicId'))->get();
        return view('user.header') . view('user.subTopic', ['subTopic' => $subTopic, 'topic' => $topic]) . view('user.footer');
    }
    public function getAllStates(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            $state = State::select('*')->where('id', $r->query('stateId'))->first();
            $allStates = State::select('*')->get();
            $district = District::select('*')->where('state_id', $r->query('stateId'))->get();
            $data =  AddTable::with('finalData')->select('*')->where('state_id', $r->query('stateId'))->get();
            //return $data;
            return view('user.header') . view('user.stateDistrict', ['district' => $district, 'state' => $state, 'allStates' => $allStates, 'data' => $data]) . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    public function showDataSources(Request $r)
    {
        return AddTable::select('source', DB::raw('COUNT(source) as total_source'))->groupBy('source')->where('source', '!=', '')->get();
    }
    public function country_group_list()
    {
        $group = CountryGroup::select('*')->orderBy('name', 'asc')->get();
        $filter = [];
        for ($i = 0; $i < count($group); $i++) {
            $current_char = substr($group[$i]->name, 0, 1);
            $prev_char = $i > 0 ? substr($group[$i - 1]->name, 0, 1) : null;
            if ($current_char == $prev_char) {
                $filter[$prev_char][] = $group[$i];
            } else {
                $filter[$current_char] = [];
                $filter[$current_char][] = $group[$i];
            }
        }
        return $filter;
    }
    public function country_list_group($id)
    {
        //return $id;
        return DB::table('country_groups')
            ->join('country_group_lists', 'country_groups.id', 'country_group_lists.country_group_id')
            ->join('countries', 'country_group_lists.country_id', 'countries.country_id')
            ->where('country_groups.id', $id)
            ->select('countries.*')
            ->get();
    }
    public function get_country_topic($id)
    {
        $data = DB::table('tables')
            ->join('tablesTopics', 'tables.id', 'tablesTopics.table_id')
            ->join('topics', 'tablesTopics.topic_id', 'topics.id')
            ->where('tables.country_id', $id)
            ->select('topics.*')
            ->get();

        $result = [];

        foreach ($data as $key => $value) {
            $parent_id = $value->parent_id;
            while ($parent_id !== 0) {
                $parent_topic = Topic::select('*')->where('topics.id', $parent_id)->first();
                $parent_id = $parent_topic->parent_id;
                if ($parent_id == 0) {
                    $result[] = $parent_topic;
                }
            }
        }

        // Remove duplicate data from result
        $result = array_values(array_unique($result, SORT_REGULAR));

        return $result;
    }
}
