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
use Illuminate\Support\Facades\Cache;


class mandiPriceController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.scrape.mandi-price') . view('admin.footer');
    }
    public function all_mandi_price_commodity()
    {
        //$cacheKey = 'all_mandi_price_commodity';

        $data = DB::select("SELECT commodity_id, COUNT(*) as total FROM mandiPrices GROUP BY commodity_id");
        foreach ($data as $key => $value) {
            $commName = DB::table('commodities')
                ->where('id', $value->commodity_id)
                ->select('commodities.name')
                ->first();
            $data[$key]->commodityName = $commName->name;
        }

        return DataTables::of($data)->make(true);
    }


    public function check_user_designation()
    {
        $user_id = session('login.user_id');
        if ($user_id != 1) {
            $designation = DB::select('select designation_id from `permission` where user_id = ?', array($user_id));
            return $designation[0]->designation_id;
        } else {
            return 0;
        }
    }
    public function check_table_status($table_id)
    {
        //$table = AddFinalData::select('table_id')->where('id', $table_id)->get();
        $status = AddTable::select('status')->where('id', $table_id)->get();
        return $status[0]->status;
    }
    public function table_issued_by($table_id)
    {
        $table_issued_by = AddTable::select('table_issued_by')->where('id', $table_id)->get();
        return $table_issued_by[0]->table_issued_by;
    }


    public function deleteMandiPriceCommodity(Request $r)
    {
        MandiPrice::where('commodity_id', $r->commodity_id)->delete();
        return ['status' => true, 'message' => 'Deleted Successfully'];
    }
    public function getDataSet(Request $r)
    {
        return DataSet::select('*')->get();
    }
    public function getMandiPriceCommodities(Request $r)
    {
        //    return DB::table('mandiPriceCommodities')
        //     ->join('mandiPrices','mandiPrices.commodity_id', '!=', 'mandiPriceCommodities.id')
        //     ->select('mandiPriceCommodities.*')
        //     ->distinct('mandiPriceCommodities.name')
        //     ->get();
        return DB::select("SELECT * FROM commodities o WHERE NOT EXISTS (SELECT 1 FROM mandiPrices d WHERE o.id = d.commodity_id)");

        //return MandiPriceCommodity::all();
    }
    public function scrapeData(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'url' => 'required',
            'commodity' => 'required'
        ]);
        $commodity_id = $r->commodity;
        if ($validator->passes()) {
            $url = $r->input('url');
            $getData = Http::get(trim($url));
            if ($getData->json()) {
                $response = $getData->json();
                if (isset($response[0])) {
                    foreach ($response[0]['row'] as $key => $value) {
                        if ($key != 0) {
                            $mandiPrice = new MandiPrice;
                            $mandiPrice->commodity_id = $commodity_id;
                            //return $value;
                            $district = District::select('*')->where('name', $value[0])->first();
                            //return $district;
                            if ($district != null) {
                                $state = State::select('*')->where('id', $district['state_id'])->first();
                                $mandiPrice->state = $state['name'];
                                $mandiPrice->district = $value[0];
                                $mandiPrice->market = $value[1];
                                $mandiPrice->variety = $value[3];
                                $mandiPrice->grade = $value[4];
                                $mandiPrice->min_price = $value[5];
                                $mandiPrice->max_price = $value[6];
                                $mandiPrice->modal_price = $value[7];
                                $mandiPrice->price_date = date("Y-m-d", strtotime($value[8]));
                                $mandiPrice->price_arrival = $value[9];
                                $mandiPrice->date_from = date("Y-m-d", strtotime($value[10]));
                                $mandiPrice->date_to = date("Y-m-d", strtotime($value[11]));
                                $mandiPrice->save();
                            } else {
                                return ['status' => true, 'message' => $value[0] . ' district is not exist into your database.'];
                            }
                        }
                    }
                    return ['status' => true, 'message' => 'Data added successfully'];
                } else {
                    return ['status' => false, 'message' => 'No response'];
                }
            } else {
                return ['status' => false, 'message' => 'Json data is incorrect'];
            }
        }
        return response()->json(['error' => $validator->errors()]);
    }

    // public function scrapeData(Request $r)
    // {
    //     $validator = Validator::make($r->all(), [
    //         'url' => 'required',
    //         'commodity' => 'required'
    //     ]);

    //     if ($validator->passes()) {
    //         $url = $r->input('url');

    //         try {
    //             $getData = Http::get(trim($url));

    //             if ($getData->successful()) {
    //                 $response = $getData->json();

    //                 if (isset($response[0])) {
    //                     // Process the data as before
    //                     // ...

    //                     return ['status' => true, 'message' => 'Data added successfully'];
    //                 } else {
    //                     return ['status' => false, 'message' => 'No response data'];
    //                 }
    //             } else {
    //                 return ['status' => false, 'message' => 'Failed to retrieve data from the URL: ' . $getData->status()];
    //             }
    //         } catch (\Exception $e) {
    //             return ['status' => false, 'message' => 'Error retrieving data from the URL: ' . $e->getMessage()];
    //         }
    //     }

    //     return response()->json(['error' => $validator->errors()]);
    // }

    public function test(){
        return view('admin.scrape.test');
    }
}
