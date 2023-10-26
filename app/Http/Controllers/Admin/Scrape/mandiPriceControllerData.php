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
use App\Models\MandiPrice;
use Http;
use Yajra\DataTables\DataTables;

class mandiPriceControllerData extends Controller
{
    public function index(Request $r)
    {
        return view('admin.header') . view('admin.scrape.mandi-price-data') . view('admin.footer');
    }
    public function mandiPriceData(Request $r)
    {
        $commodityId = Commodity::select('id')->where('name', $r->query('commodity'))->first();
        $data = DB::table("mandiPrices")
            ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
            ->where('mandiPrices.commodity_id', $commodityId->id)
            ->select('mandiPrices.*', 'commodities.name as comm_name')
            ->get();
        return DataTables::of($data)->make(true);
    }
    public function getMandiPriceCommoditySearch(Request $r)
    {

        $commodityId = Commodity::select('id')->where('name', $r->input('commodity'))->first();
        $market = $r->input('market');
        $grade = $r->input('grade');
        $minPrice = $r->input('minPrice');
        $maxPrice = $r->input('maxPrice');
        $fromDate = $r->input('fromDate');
        $toDate = $r->input('toDate');
        if ($market !== 'Select Market') {
            //return $market;
            //$market = $r->input('market');

            $data = DB::table("mandiPrices")
                ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                ->where('mandiPrices.commodity_id', $commodityId->id)
                ->where('mandiPrices.market', $market)
                ->select('mandiPrices.*', 'commodities.name as comm_name')
                ->get();
            return DataTables::of($data)->make(true);
        } else if ($grade !== 'Select Grade') {
            //return $grade;
            $data = DB::table("mandiPrices")
                ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                ->where('mandiPrices.commodity_id', $commodityId->id)
                ->where('mandiPrices.grade', $grade)
                ->select('mandiPrices.*', 'commodities.name as comm_name')
                ->get();
            return DataTables::of($data)->make(true);
        } else if ($minPrice != '' && $maxPrice != '') {
            $data = DB::table("mandiPrices")
                ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                ->where('mandiPrices.commodity_id', $commodityId->id)
                ->whereBetween('mandiPrices.modal_price', [intval($minPrice), intval($maxPrice)])
                ->select('mandiPrices.*', 'commodities.name as comm_name')
                ->get();
            return DataTables::of($data)->make(true);
        } else if ($minPrice != '') {
            // return $minPrice;
            $data = DB::table("mandiPrices")
                ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                ->where('mandiPrices.commodity_id', $commodityId->id)
                ->where('mandiPrices.modal_price', '>=', intval($minPrice))
                ->select('mandiPrices.*', 'commodities.name as comm_name')
                ->get();
            return DataTables::of($data)->make(true);
        } else if ($maxPrice != '') {
            // return $minPrice;
            $data = DB::table("mandiPrices")
                ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                ->where('mandiPrices.commodity_id', $commodityId->id)
                ->where('mandiPrices.modal_price', '<=', intval($maxPrice))
                ->select('mandiPrices.*', 'commodities.name as comm_name')
                ->get();
            return DataTables::of($data)->make(true);
        } else if ($fromDate != '' && $toDate != '') {
            $data = DB::table("mandiPrices")
                ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                ->where('mandiPrices.commodity_id', $commodityId->id)
                ->whereBetween('mandiPrices.price_date', [$fromDate, $toDate])
                ->select('mandiPrices.*', 'commodities.name as comm_name')
                ->get();
            return DataTables::of($data)->make(true);
        } else {
            $data = DB::table("mandiPrices")
                ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                ->where('mandiPrices.commodity_id', $commodityId->id)
                ->select('mandiPrices.*', 'commodities.name as comm_name')
                ->get();
            return DataTables::of($data)->make(true);
        }
    }
    public function getCommodityNameMarket(Request $r)
    {
        $commodityId = Commodity::select('id')->where('name', $r->input('commodity'))->first();
        $data = DB::table("mandiPrices")
            ->where('commodity_id', $commodityId->id)
            ->select('market')
            ->groupBy('market')
            ->get();
        return $data;
    }
    public function getCommodityNameGrade(Request $r)
    {
        $commodityId = Commodity::select('id')->where('name', $r->input('commodity'))->first();
        $data = DB::table("mandiPrices")
            ->where('commodity_id', $commodityId->id)
            ->select('grade')
            ->groupBy('grade')
            ->get();
        return $data;
    }
}
