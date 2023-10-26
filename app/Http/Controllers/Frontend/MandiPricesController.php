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
use App\Models\AddTable;
use App\Models\State;
use App\Models\District;
use App\Models\MandiPrice;
use App\Models\Commodity;
use DB;
use Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Validator;
use Yajra\DataTables\DataTables;

class MandiPricesController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $r)
    {
        if ($this->checkCustomerLogin() != null) {
            return view('user.header') . view('user.mandiPrices') . view('user.footer');
        } else {
            return redirect('login');
        }
    }
    // public function yearSearch(Request $r)
    // {
    //     $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
    //     $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
    //     $page = $r->input('page');
    //     $results_per_page = 10;
    //     $offset = ($page - 1) * $results_per_page;
    //     //return $r->all();
    //     if (($r->input('toYear') - $r->input('fromYear')) <= 2) {

    //         //return $state;
    //         $data = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->offset($offset)
    //             ->limit($results_per_page)
    //             ->get();
    //         $result = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->get();
    //         $number_of_page = ceil(count($result) / $results_per_page);
    //         return ['status' => true, 'data' => $data, 'totalPages' => $number_of_page];
    //     } else {
    //         return ['status' => false, 'message' => 'Customers can not filter more than 2 years'];
    //     }
    // }
    // public function dataSearch(Request $r)
    // {
    //     $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
    //     $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
    //     $state = $r->input('state');
    //     $district = $r->input('district');
    //     $market = $r->input('market');
    //     $commodity = $r->input('commodity');
    //     //return $commodity;
    //     $minPrice = $r->input('minPrice');
    //     $maxPrice = $r->input('maxPrice');
    //     $page = $r->input('page');
    //     $results_per_page = 10;
    //     $offset = ($page - 1) * $results_per_page;
    //     if (isset($state) && !isset($district)) {
    //         $data = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->where('mandiPrices.state', $state)
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->offset($offset)
    //             ->limit($results_per_page)
    //             ->get();
    //         $result = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->where('mandiPrices.state', $state)
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->get();
    //     } else if (isset($district)) {
    //         $data = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->where('mandiPrices.district', $district)
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->offset($offset)
    //             ->limit($results_per_page)
    //             ->get();
    //         $result = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->where('mandiPrices.district', $district)
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->get();
    //     } else if (isset($market)) {
    //         $marketValue = array();
    //         foreach ($market as $key => $value) {
    //             $marketValue[] = $value;
    //         }
    //         $data = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->whereIn('mandiPrices.market', $marketValue)
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->offset($offset)
    //             ->limit($results_per_page)
    //             ->get();
    //         $result = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->whereIn('mandiPrices.market', $marketValue)
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->get();
    //     } else if (isset($commodity) && !isset($minPrice) && !isset($maxPrice)) {
    //         $commodityValue = array();
    //         foreach ($commodity as $key => $value) {
    //             $commodityValue[] = $value;
    //         }
    //         $data = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->whereIn('mandiPrices.commodity_id', $commodityValue)
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->offset($offset)
    //             ->limit($results_per_page)
    //             ->get();
    //         $result = DB::table("mandiPrices")
    //             ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
    //             ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
    //             ->whereIn('mandiPrices.commodity_id', $commodityValue)
    //             ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
    //             ->get();
    //         //return count($result);
    //     } else if (isset($maxPrice) && isset($minPrice) && isset($commodity)) {
    //         $getResult = $this->commMaxMinPrice($fromYear, $toYear, $maxPrice, $minPrice, $commodity, $results_per_page, $offset);
    //         //return $getResult;
    //         $data = $getResult['filterData'];
    //         $result = $getResult['totalData'];
    //     }
    //     $number_of_page = ceil(count($result) / $results_per_page);
    //     return ['tableData' => $data, 'totalPages' => $number_of_page];
    //     //return $data;
    // }
    public function dataSearch(Request $r)
    {
        //return $r->input('market3');
        $commodity = $r->input('commodity3');
        $market = $r->input('market3');
        $fromDate = $r->input('fromDate');
        $toDate = $r->input('toDate');
        $fromYear = date('Y', strtotime($fromDate));
        $toYear = date('Y', strtotime($toDate));
        //return 'commodity='.$commodity.' market='.$market;
        $validator = Validator::make($r->all(), [
            'fromDate' => 'required|date',
            'toDate' => 'required|date'
        ]);

        if ($validator->passes()) {
            if (($toYear - $fromYear == 1) || ($toYear - $fromYear == 0)) {
                if (($commodity != '') && ($market != '')) {
                    // return 'test';
                    $data = DB::table("mandiPrices")
                        ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                        ->where('mandiPrices.commodity_id', $commodity)
                        ->whereIn('mandiPrices.market', $market)
                        ->whereBetween('mandiPrices.price_date', [$fromDate, $toDate])
                        ->select('mandiPrices.*', 'commodities.name as comm_name')
                        ->get();
                    //return $data;
                    return DataTables::of($data)->make(true);
                } else if ($commodity != '' && $market == '') {
                    //return 'test1';
                    $data = DB::table("mandiPrices")
                        ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                        ->where('mandiPrices.commodity_id', $commodity)
                        ->whereBetween('mandiPrices.price_date', [$fromDate, $toDate])
                        ->select('mandiPrices.*', 'commodities.name as comm_name')
                        ->get();
                    //return $data;
                    return DataTables::of($data)->make(true);
                } else if ($market != '' && $commodity == '') {
                    // return 'test2';
                    $data = DB::table("mandiPrices")
                        ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
                        ->whereIn('mandiPrices.market', $market)
                        ->whereBetween('mandiPrices.price_date', [$fromDate, $toDate])
                        ->select('mandiPrices.*', 'commodities.name as comm_name')
                        ->get();
                    //return $data;
                    return DataTables::of($data)->make(true);
                } else {
                    //return 'test3';
                    //return $fromDate . ' ' . $toDate;
                    // $data = DB::table("mandiPrices")
                    //     ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', '=', 'mandiPriceCommodities.id')
                    //     ->whereBetween('mandiPrices.price_date', [$fromDate, $toDate])
                    //     ->select('mandiPrices.*', 'mandiPriceCommodities.name as comm_name')
                    //     ->dd();
                    // ->get();

                    //dd($data->toSql());
                    // dd(DB::getQueryLog());
                    //return DataTables::of($data)->make(true);
                    return ['status' => false, 'message' => 'Select Commodity or Market'];
                }
            } else {
                return ['status' => false, 'message' => 'Customer can not see more than two years of data. Please go to contact us to see it.'];
            }
        } else {
            return ['status' => false, 'error' => $validator->errors()];
        }
    }

    function getMandiPriceData()
    {
        $data = DB::table("mandiPrices")
            ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
            ->where('mandiPrices.commodity_id', 1)
            ->where('mandiPrices.market', "Adoni")
            ->whereBetween('mandiPrices.price_date', ["2016-01-01","2018-12-31"])
            ->select('mandiPrices.*', 'commodities.name as comm_name')
            ->get();
        //return $data;
        return DataTables::of($data)->make(true);
    }


    // max min commodity price
    public function commMaxMinPrice($fromYear, $toYear, $maxPrice, $minPrice, $commodity, $results_per_page, $offset)
    {
        $commodityValue = array();
        foreach ($commodity as $key => $value) {
            $commodityValue[] = $value;
        }
        $data = DB::table("mandiPrices")
            ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
            ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
            ->whereBetween('mandiPrices.modal_price', [$minPrice, $maxPrice])
            ->whereIn('mandiPrices.commodity_id', $commodityValue)
            ->select('mandiPrices.*', 'commodities.name as comm_name')
            ->offset($offset)
            ->limit($results_per_page)
            ->get();
        $result = DB::table("mandiPrices")
            ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
            ->whereBetween('mandiPrices.modal_price', [$minPrice, $maxPrice])
            ->whereIn('mandiPrices.commodity_id', $commodityValue)
            ->select('mandiPrices.*', 'commodities.name as comm_name')
            ->get();

        return ['filterData' => $data, 'totalData' => $result];
    }

    function checkCustomerLogin()
    {
        return session()->get('login_email');
    }
    public function paginate($items, $perPage = 100, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        //return $items;
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function getStates(Request $r)
    {
        $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
        $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
        //return $fromYear;
        $data = DB::table("mandiPrices")
            ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
            ->select('mandiPrices.state')
            ->groupBy('mandiPrices.state')
            ->get();
        return $data;
    }

    public function getAllMarket(Request $r)
    {
        $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
        $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
        //return $fromYear;
        $data = DB::table("mandiPrices")
            ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
            ->select('mandiPrices.market')
            ->groupBy('mandiPrices.market')
            ->get();
        return $data;
    }
    public function getAllCommodity(Request $r)
    {
        $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
        $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
        //return $fromYear;
        $data = DB::table("mandiPrices")
            ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
            ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
            ->select('commodities.*')
            ->groupBy('commodities.name')
            ->get();
        return $data;
    }

    public function getStateDistrict(Request $r)
    {
        $state = $r->input('stateName');
        $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
        $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
        //return $fromYear;
        $data = DB::table("mandiPrices")
            ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
            ->where('mandiPrices.state', $state)
            ->select('mandiPrices.district')
            ->groupBy('mandiPrices.district')
            ->get();
        return $data;
    }
    public function getAllDistrict(Request $r)
    {
        $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
        $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
        //return $fromYear;
        $data = DB::table("mandiPrices")
            ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
            ->select('mandiPrices.district')
            ->groupBy('mandiPrices.district')
            ->get();
        return $data;
    }
    public function getDistrictMarket(Request $r)
    {
        $district = $r->input('districtName');
        $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
        $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
        //return $fromYear;
        $data = DB::table("mandiPrices")
            ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
            ->where('mandiPrices.district', $district)
            ->select('mandiPrices.market')
            ->groupBy('mandiPrices.market')
            ->get();
        return $data;
    }
    public function getMarketCommodity(Request $r)
    {
        $market = $r->input('marketName');
        $fromYear = date('Y-m-d', strtotime($r->input('fromYear') . '-01-01'));
        $toYear = date('Y-m-d', strtotime($r->input('toYear') . '-12-31'));
        //return $fromYear;
        $data = DB::table("mandiPrices")
            ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
            ->whereBetween('mandiPrices.price_date', [$fromYear, $toYear])
            ->where('mandiPrices.market', $market)
            ->select('commodities.*')
            ->groupBy('commodities.id')
            ->get();
        return $data;
    }

    public function checkCustomerDetails($email)
    {
        return Customer::select('plan')->where('email', $email)->first();
    }
    public function commodityYearPriceGraph(Request $r)
    {
        $customerEmail = $this->checkCustomerLogin();
        $plan = $this->checkCustomerDetails($customerEmail);
        $validator = Validator::make($r->all(), [
            'commodity' => 'required',
            'years' => 'required'
        ]);
        if ($validator->passes()) {
            \DB::statement("SET SQL_MODE=''");
            $commodity_id = $r->commodity;
            $data = [];
            $comm = [];
            foreach ($commodity_id as $key => $value) {
                foreach ($r->years as $year) {
                    $comm_name = Commodity::select('name')->where('id', $value)->first();
                    $comm[] = $comm_name->name . ' Price Series';
                    $data[] = DB::table("mandiPrices")
                        ->select(DB::raw('YEAR(mandiPrices.price_date) as year'), 'mandiPrices.modal_price as ' . $comm_name->name . ' Price Series')
                        ->where('mandiPrices.commodity_id', $value)
                        ->where('mandiPrices.price_date', 'like', '%' . $year . '%')
                        ->groupBy('year')
                        ->orderBy('year', 'asc')
                        ->get();
                }
            }
            //return $data;

            $result = [];

            // Loop through each sub-array and add its values to the corresponding year in the result array
            foreach (json_decode(json_encode($data), true) as $array) {
                foreach ($array as $item) {
                    $year = $item['year'];
                    $price_name = array_keys($item)[1];
                    $price_value = $item[$price_name];

                    if (isset($result[$year])) {
                        $result[$year][$price_name] = $price_value;
                    } else {
                        $result[$year] = ['year' => $year, $price_name => $price_value];
                    }
                }
            }

            // Loop through the result array and set default values for any missing price types
            foreach ($result as &$item) {
                //return $item;
                // $price_names = ['Ajwan price', 'Ambada Seed price'];
                foreach ($comm as $name) {
                    if (!isset($item[$name])) {
                        $item[$name] = '0';
                    }
                }
            }
            $res = array_values($result);
            //return $result;
            return ['status' => true, 'data' => $res, 'title' => 'Commodity with year wise price', 'plan' => $plan['plan']];
        } else {
            return ['error' => $validator->errors()];
        }
    }
    public function getCommodityMarket(Request $r)
    {
        $commodity_id = $r->commodity;
        $data = DB::table("mandiPrices")
            ->where('commodity_id', $commodity_id)
            ->select('market')
            ->groupBy('market')
            ->get();
        return $data;
    }
    public function getAllMandiPriceGrade()
    {
        return DB::table("mandiPrices")->select('grade')->groupBy('grade')->get();
    }
    public function AllMandiPriceCommodity()
    {
        return Commodity::all();
    }
    public function commodityMandiGraph(Request $r)
    {
        $customerEmail = $this->checkCustomerLogin();
        $plan = $this->checkCustomerDetails($customerEmail);
        $validator = Validator::make($r->all(), [
            'commodity2' => 'required',
            'market' => 'required',
            'years2' => 'required'
        ]);
        if ($validator->passes()) {
            \DB::statement("SET SQL_MODE=''");
            $market = $r->market;
            $data = [];
            foreach ($market as $key => $value) {
                foreach ($r->years2 as $year) {
                    $data[] = DB::table("mandiPrices")
                        ->select(DB::raw('YEAR(mandiPrices.price_date) as year'), 'mandiPrices.modal_price as ' . $value)
                        ->where('mandiPrices.commodity_id', $r->commodity2)
                        ->where('mandiPrices.market', $value)
                        ->where('mandiPrices.price_date', 'like', '%' . $year . '%')
                        ->groupBy('year')
                        ->orderBy('year', 'asc')
                        ->get();
                }
            }
            $result = [];

            // Loop through each sub-array and add its values to the corresponding year in the result array
            foreach (json_decode(json_encode($data), true) as $array) {
                foreach ($array as $item) {
                    $year = $item['year'];
                    $price_name = array_keys($item)[1];
                    $price_value = $item[$price_name];

                    if (isset($result[$year])) {
                        $result[$year][$price_name] = $price_value;
                    } else {
                        $result[$year] = ['year' => $year, $price_name => $price_value];
                    }
                }
            }

            // Loop through the result array and set default values for any missing price types
            foreach ($result as &$item) {
                //return $item;
                // $price_names = ['Ajwan price', 'Ambada Seed price'];
                foreach ($market as $name) {
                    if (!isset($item[$name])) {
                        $item[$name] = '0';
                    }
                }
            }
            $res = array_values($result);
            //return $result;
            return ['status' => true, 'data' => $res, 'title' => 'Markets with year wise price', 'plan' => $plan['plan']];
        } else {
            return ['error' => $validator->errors()];
        }
    }
    public function compareMarket(Request $r)
    {
        $customerEmail = $this->checkCustomerLogin();
        $plan = $this->checkCustomerDetails($customerEmail);
        if ($plan['plan'] == 2 || $plan['plan'] == 3 || $plan['plan'] == 4) {
            $validator = Validator::make($r->all(), [
                'commodity3' => 'required',
                'market1' => 'required',
                'market2' => 'required',
                'grade' => 'required',
                'date' => 'required'
            ]);
            if ($validator->passes()) {
                // $page = $r->input('page');
                // $results_per_page = 10;
                // $offset = ($page - 1) * $results_per_page;
                $market1 = DB::table('mandiPrices')
                    ->join('commodities', 'mandiPrices.commodity_id', 'commodities.id')
                    ->where('mandiPrices.commodity_id', $r->commodity3)
                    ->where('mandiPrices.market', $r->market1)
                    ->where('mandiPrices.grade', $r->grade)
                    ->where('mandiPrices.price_date', $r->date)
                    ->select('mandiPrices.*', 'commodities.name as commName')
                    //->offset($offset)
                    //->limit($results_per_page)
                    ->get();
                $market2 = DB::table('mandiPrices')
                    ->join('commodities', 'mandiPrices.commodity_id', 'commodities.id')
                    ->where('mandiPrices.commodity_id', $r->commodity3)
                    ->where('mandiPrices.market', $r->market2)
                    ->where('mandiPrices.grade', $r->grade)
                    ->where('mandiPrices.price_date', $r->date)
                    ->select('mandiPrices.*', 'commodities.name as commName')
                    //->offset($offset)
                    //->limit($results_per_page)
                    ->get();
                return ['status' => true, 'market1' => $market1, 'market2' => $market2];
                //return $data;
                // $result = DB::table('mandiPrices')
                //     ->join('mandiPriceCommodities', 'mandiPrices.commodity_id', 'mandiPriceCommodities.id')
                //     ->where('mandiPrices.commodity_id', $r->commodity)
                //     ->select('mandiPrices.*', 'mandiPriceCommodities.name as commName')
                //     ->get();
                // // return $data;
                // $number_of_page = ceil(count($result) / $results_per_page);
                // return ['tableData' => $data, 'totalPages' => $number_of_page];
            } else {
                return ['error' => $validator->errors()];
            }
        } else {
            return ['status' => false, 'redirect' => 'subscription', 'message' => 'Please Subscribe Our Plan'];
        }
    }
    public function mandiPriceYear(Request $r)
    {
        \DB::statement("SET SQL_MODE=''");
        $data = DB::table("mandiPrices")
            ->select(DB::raw('YEAR(mandiPrices.price_date) as year'))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();
        return $data;
    }
    public function getAllMandiPriceMarket()
    {
        $data = DB::table("mandiPrices")
            ->select('mandiPrices.market')
            ->groupBy('mandiPrices.market')
            ->get();
        return $data;
    }
}
