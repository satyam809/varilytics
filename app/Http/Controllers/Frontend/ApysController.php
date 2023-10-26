<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Customer;
use App\Models\AddFinalData;
use App\Models\Season;
use App\Models\State;
use App\Models\District;
use App\Models\Commodity;
use DB;
use Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Validator;
use Yajra\DataTables\DataTables;
use App\Models\CropProduction;

class ApysController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            if ($r->ajax()) {
                $data = CropProduction::join('commodities', 'crop_production.commodity_id', '=', 'commodities.id')
                    ->join('states', 'crop_production.state_id', '=', 'states.id')
                    ->join('districts', 'crop_production.district_id', '=', 'districts.id')
                    ->join('seasons', 'crop_production.season_id', '=', 'seasons.id')
                    ->whereIn('crop_production.year', ['1997-98','1998-99'])
                    ->select('crop_production.*', 'commodities.name as commodity', 'states.name as state', 'districts.name as district', 'seasons.name as season')
                    ->get();
                return DataTables::of($data)->make(true);
            }
            return view('user.header') . view('user.apys') . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    function allApysCommodity()
    {
        return Commodity::whereExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('crop_production')
                ->whereRaw('commodities.id = crop_production.commodity_id');
        })
            ->get();
    }
    function getAllApysState()
    {
        return State::whereExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('crop_production')
                ->whereRaw('states.id = crop_production.state_id');
        })
            ->get();
    }
    function getAllApysDistricts(Request $r)
    {
        // return $r->input('state_id');
        return District::select("*")->where('state_id', $r->input('state_id'))->get();
    }
    function checkCustomerLogin()
    {
        return session()->get('login_email');
    }
    function getAllApysSeason()
    {
        return Season::select('*')->get();
    }
    function getAllApysYears()
    {
        return CropProduction::select('year')->groupBy('year')->orderBy('year', 'asc')->get();
    }
    function apysSearch(Request $r)
    {
        //dd();
        $commodity = $r->input('commodity');
        $state = $r->input('state');
        $district = $r->input('district');
        $year = $r->input('year');
        $season = $r->input('season');
        $validator = Validator::make($r->all(), [
            'year' => 'required'
        ]);

        if ($validator->passes()) {
            //return $year;
            $data = CropProduction::join('commodities', 'crop_production.commodity_id', '=', 'commodities.id')
                ->join('states', 'crop_production.state_id', '=', 'states.id')
                ->join('districts', 'crop_production.district_id', '=', 'districts.id')
                ->join('seasons', 'crop_production.season_id', '=', 'seasons.id');
            if ($commodity != '') {
                $data->where('crop_production.commodity_id', $commodity);
            }
            if ($state != '') {
                $data->where('crop_production.state_id', $state);
            }
            if ($district != '') {
                $data->where('crop_production.district_id', $district);
            }
            if ($year != '') {
                $data->whereIn('crop_production.year', $year);
            }
            if ($season != '') {
                $data->where('crop_production.season_id', $season);
            }

            $data->select('crop_production.id', 'crop_production.year', 'crop_production.area', 'crop_production.production', 'crop_production.yield', 'commodities.name as commodity', 'states.name as state', 'districts.name as district', 'seasons.name as season')
                ->get();

            return DataTables::of($data)->make(true);
        } else {
            return ['status' => false, 'error' => $validator->errors()];
        }
    }
}
