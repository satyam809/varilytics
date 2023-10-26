<?php

namespace App\Http\Controllers\Admin\Scrape;

use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AddData;
use App\Models\AddFinalData;
use App\Models\AddTable;
use App\Models\DataSet;
use App\Models\State;
use App\Models\District;
use App\Models\Commodity;
use App\Models\CropProduction;
use Http;
use Yajra\DataTables\DataTables;

class cropProductionDataController extends Controller
{
    public function index(Request $r)
    {
        return view('admin.header') . view('admin.scrape.crop-production-data') . view('admin.footer');
    }
    public function getCropProductionData(Request $r)
    {
        $data = CropProduction::join('commodities', 'crop_production.commodity_id', '=', 'commodities.id')
            ->join('states', 'crop_production.state_id', '=', 'states.id')
            ->join('districts', 'crop_production.district_id', '=', 'districts.id')
            ->join('seasons', 'crop_production.season_id', '=', 'seasons.id')
            ->where('crop_production.commodity_id', $r->query('commodityId'))
            ->select('crop_production.*', 'commodities.name as commodity', 'states.name as state', 'districts.name as district', 'seasons.name as season')
            ->get();

        return DataTables::of($data)->make(true);
    }
    public function cropProductionSearch(Request $r)
    {
        $commodity = $r->input('commodity');
        $state = $r->input('state');
        $district = $r->input('district');
        $year = $r->input('year');
        $season = $r->input('season');
        $data = CropProduction::join('commodities', 'crop_production.commodity_id', '=', 'commodities.id')
            ->join('states', 'crop_production.state_id', '=', 'states.id')
            ->join('districts', 'crop_production.district_id', '=', 'districts.id')
            ->join('seasons', 'crop_production.season_id', '=', 'seasons.id')
            ->where('crop_production.commodity_id', $commodity);
        if ($state != '') {
            $data->where('crop_production.state_id', $state);
        }
        if ($district != '') {
            $data->where('crop_production.district_id', $district);
        }
        if ($year != '') {
            $data->where('crop_production.year', 'like', '%' . $year . '%');
        }
        if ($season != '') {
            $data->where('crop_production.season_id', $season);
        }

        $data->select('crop_production.id','crop_production.year','crop_production.area','crop_production.production','crop_production.yield', 'commodities.name as commodity', 'states.name as state', 'districts.name as district', 'seasons.name as season')
            ->get();

        return DataTables::of($data)->make(true);
    }
}
