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
use Illuminate\Support\Facades\DB;

class DataCoverageController extends Controller
{
    public function index(Request $r)
    {
        return view('user.header') . view('user.data-coverage') . view('user.footer');
    }
    public function getAllCountries(Request $r)
    {
        //return DB::select('select * from `countries`');
        $result = DB::table('countries')
            ->select('countries.*', DB::raw('(SELECT GROUP_CONCAT(CONCAT(id, ":", name)) FROM topics WHERE parent_id = 0) as main_topic'))
            ->get();
        //return $result;
        $result->each(function ($row) {
            $row->main_topic = array_map(function ($topic) {
                $parts = explode(':', $topic);
                return [
                    'id' => $parts[0],
                    'name' => $parts[1]
                ];
            }, explode(',', $row->main_topic));
        });
        //return $result;

        foreach ($result as $value) {
            foreach ($value->main_topic as &$count) {
                $data = TableTopic::where('main_topic_id', $count['id'])->where('country_id', $value->country_id)->get();
                $count['count'] = count($data);
            }
        }

        return $result;
    }
    public function getCountryStates($id)
    {
        if ($id == 19) {
            $result = DB::table('states')
                ->select('states.*', DB::raw('(SELECT GROUP_CONCAT(CONCAT(id, ":", name)) FROM topics WHERE parent_id = 0) as main_topic'))
                ->get();
            //return $result;
            $result->each(function ($row) {
                $row->main_topic = array_map(function ($topic) {
                    $parts = explode(':', $topic);
                    return [
                        'id' => $parts[0],
                        'name' => $parts[1]
                    ];
                }, explode(',', $row->main_topic));
            });

            foreach ($result as $value) {
                foreach ($value->main_topic as &$count) {
                    $data = TableTopic::where('main_topic_id', $count['id'])->where('state_id', $value->id)->get();
                    $count['count'] = count($data);
                }
            }

            return $result;
        }
    }
    public function getStateDistricts($id)
    {
        $result = DB::table('districts')
            ->select('districts.*', DB::raw('(SELECT GROUP_CONCAT(CONCAT(id, ":", name)) FROM topics WHERE parent_id = 0) as main_topic'))
            ->where('state_id', $id)
            ->get();
        //return $result;
        $result->each(function ($row) {
            $row->main_topic = array_map(function ($topic) {
                $parts = explode(':', $topic);
                return [
                    'id' => $parts[0],
                    'name' => $parts[1]
                ];
            }, explode(',', $row->main_topic));
        });
        //return $result;

        foreach ($result as $value) {
            foreach ($value->main_topic as &$count) {
                $data = TableTopic::where('main_topic_id', $count['id'])->where('district_id', $value->id)->get();
                $count['count'] = count($data);
            }
        }

        return $result;
    }
}
