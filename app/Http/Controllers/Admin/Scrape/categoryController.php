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
use App\Models\Category;
use App\Models\MandiPrice;
use Http;
use Yajra\DataTables\DataTables;


class categoryController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.scrape.category') . view('admin.footer');
    }
    public function allCategory(Request $r)
    {
        $data = Category::all();
        return DataTables::of($data)->make(true);
    }
    public function getCategory($id)
    {
        return Category::select('*')->where('id', $id)->first();
    }

    public function addCategory(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required'
        ]);
        if ($validator->passes()) {
            $Category = new Category;
            $Category->name = $r->name;
            $Category->save();
            return ['status' => true, 'message' => 'Category added successfully'];
        } else {
            return ['error' => $validator->errors()];
        }
    }

    public function updateCategory(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required'
        ]);
        if ($validator->passes()) {
            Category::where('id', $r->id)->update(['name' => $r->name]);
            return ['status' => true, 'message' => 'Category updated successfully'];
        } else {
            return ['error' => $validator->errors()];
        }
    }
    public function deleteCategory($id)
    {
        Category::where('id', $id)->delete();
        return ['status' => true, 'message' => 'Category deleted successfully'];
    }
    public function changeStatus($id)
    {
        $result = Category::select('status')->where('id', $id)->first();
        if ($result->status == 0) {
            Category::where('id', $id)->update(['status' => 1]);
        } else {
            Category::where('id', $id)->update(['status' => 0]);
        }
        return ['status' => true, 'message' => 'Status changed successfully'];
    }
}
