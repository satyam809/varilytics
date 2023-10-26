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
use App\Models\Season;
use App\Models\Commodity;
use App\Models\MandiPrice;
use Http;
use App\Models\CropProduction;
use Yajra\DataTables\DataTables;


class cropProductionController extends Controller
{
    public function index(Request $r)
    {
        if ($r->ajax()) {
            $data = CropProduction::join('commodities', 'crop_production.commodity_id', '=', 'commodities.id')
                ->select('crop_production.commodity_id', 'commodities.name')
                ->groupBy('crop_production.commodity_id')
                ->get();
            return DataTables::of($data)->make(true);
        }
        return view('admin.header') . view('admin.scrape.crop-production') . view('admin.footer');
    }
    public function getAllCommodities()
    {
        return DB::select("SELECT * FROM commodities o WHERE NOT EXISTS (SELECT 1 FROM crop_production d WHERE o.id = d.commodity_id)");
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'commodity' => 'required|not_in:0',
            'file' => 'required|mimes:xlsx, xls',
        ]);
        if ($validator->passes()) {
            $excelData = Excel::toArray([], $r->file('file')->store('temp'));
            // print_r($excelData[0]);
            foreach ($excelData[0] as $key => $val) {
                if ($key != 0) {
                    $state = State::select('id')->where('name', trim($val[0]))->first();
                    if ($state == null) {
                        return ['status' => false, 'message' => trim($val[0]) . ', correct this state name'];
                    }
                    $district = District::select('id')->where('name', trim($val[1]))->first();
                    if ($district == null) {
                        return ['status' => false, 'message' => trim($val[1]) . ', correct this district name'];
                    }
                    $season = Season::select('id')->where('name', trim($val[3]))->first();
                    if ($season == null) {
                        return ['status' => false, 'message' => trim($val[3]) . ', correct this season name'];
                    }
                    $crop = new CropProduction;
                    $crop->commodity_id = $r->input('commodity');
                    $crop->state_id = $state->id;
                    $crop->district_id = $district->id;
                    $crop->season_id = $season->id;
                    $crop->year = trim($val[2]);
                    $crop->area = trim($val[4]);
                    $crop->production = trim($val[5]);
                    $crop->yield = trim($val[6]);
                    $crop->save();
                }
            }
            return ['status' => true, 'message' => 'File uploaded successfully'];
        } else {
            return ['error' => $validator->errors()];
        }
    }
    public function delete(Request $r)
    {
        CropProduction::where('commodity_id', $r->input('commodity_id'))->delete();
        return ['status' => true, 'message' => 'Deleted successfully'];
    }
    public function getAllSeason(){
        return Season::select('*')->get();
    }
}
