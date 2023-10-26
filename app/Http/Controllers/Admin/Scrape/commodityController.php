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


class commodityController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.scrape.commodity') . view('admin.footer');
    }
    public function allCommodity(Request $r)
    {
        if ($r->ajax()) {
            $data = DB::table('commodities')
            ->leftJoin('categories', 'categories.id', '=', 'commodities.category_id')
            ->select('commodities.*', 'categories.name as category_name')
            ->get();
            return DataTables::of($data)->make(true);
        }
        // $data = MandiPriceCommodity::all();
        // return ['data' => $data];
    }
    public function getCommodity(Request $r)
    {
        return Commodity::select('*')->where('id', $r->commodity_id)->first();
    }

    public function addCommodity(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'commodity' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->passes()) {
            $mandiPiceComm = new Commodity;
            $mandiPiceComm->name = $r->commodity;
            $mandiPiceComm->category_id = $r->category_id;
            $mandiPiceComm->save();
            return ['status' => true, 'message' => 'Commodity added successfully'];
        } else {
            return ['error' => $validator->errors()];
        }
    }

    public function updateCommodity(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'upCommodity' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->passes()) {
            Commodity::where('id', $r->upId)->update(['name' => $r->upCommodity, 'category_id' => $r->category_id]);
            return ['status' => true, 'message' => 'Commodity updated successfully'];
        } else {
            return ['error' => $validator->errors()];
        }
    }
    public function deleteCommodity(Request $r)
    {
        //return $r->id;
        Commodity::where('id', $r->commodity_id)->delete();
        return ['status' => true, 'message' => 'Commodity deleted successfully'];
    }
}
