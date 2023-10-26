<?php

namespace App\Http\Controllers\Admin;

use App\UserRegistration;
use DB;
use App\Models\CountryGroup;
use App\Models\Country;
use App\Models\CountryGroupList;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CountryGroupController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.country-group') . view('admin.footer');
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'organisation' => 'required|unique:country_groups,name',
        ]);

        $organisation = $r->input('organisation');
        $group_list = $r->input('country');
        //return $group_list;
        if ($validator->passes()) {
            $file = $r->file('icon');
            $fileName = null;
            if ($file != '') {
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move(public_path("assets/country_group_icon"), $fileName);
            }
            $org = new CountryGroup;
            $org->name = $organisation;
            $org->icon = $fileName;
            $org->save();
            if (isset($group_list)) {
                foreach ($group_list as $value) {
                    $group = new CountryGroupList;
                    $group->country_group_id = $org->id;
                    $group->country_id = $value;
                    $group->save();
                }
            }
            return array("message" => "Inserted Successfully", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function get()
    {

        $data = DB::select('select * from `country_groups`');
        return DataTables::of($data)->make(true);
    }
    public function delete(Request $r)
    {
        $old_icon = CountryGroup::select('icon')->where('id', $r->input('id'))->first();
        if ($old_icon->icon != null) {
            if (file_exists(public_path('/assets/country_group_icon/' . $old_icon->icon))) {
                unlink(public_path('/assets/country_group_icon/' . $old_icon->icon));
            }
        }
        DB::delete('delete from country_groups where id = ?', array($r->input('id')));

        return array("message" => "Deleted Successfully", "status" => true);
    }
    public function getSingle($id)
    {
        //return CountryGroup::select("*")->where('id', $id)->first();
        return DB::table('country_groups')
            ->leftJoin('country_group_lists', 'country_groups.id', '=', 'country_group_lists.country_group_id')
            ->leftJoin('countries', 'country_group_lists.country_id', '=', 'countries.country_id')
            ->select('country_groups.*', 'country_group_lists.country_id', 'countries.country_name')
            ->where('country_groups.id', $id)
            ->get();
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organisation' => 'required'
        ]);
        //return $organisation;
        $id = $request->input('org_id');
        $organisation = $request->input('organisation');
        $group_list = $request->input('country');
        $file = $request->file('up_icon');
        if ($validator->passes()) {
            if ($request->hasFile('up_icon')) {
                //return 'test';
                $old_icon = CountryGroup::select('icon')->where('id', $id)->first();
                if ($old_icon->icon != null) {
                    if (file_exists(public_path('/assets/country_group_icon/' . $old_icon->icon))) {
                        unlink(public_path('/assets/country_group_icon/' . $old_icon->icon));
                    }
                }
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move(public_path("assets/country_group_icon"), $fileName);
                CountryGroup::where('id', $id)->update([
                    'name' => trim($organisation),
                    'icon' => $fileName
                ]);
                CountryGroupList::where('country_group_id', $id)->delete();
                foreach ($group_list as $value) {
                    $group = new CountryGroupList;
                    $group->country_group_id = $id;
                    $group->country_id = $value;
                    $group->save();
                }
            } else {
                // return $id;
                CountryGroup::where('id', $id)->update([
                    'name' => trim($organisation)
                ]);
                CountryGroupList::where('country_group_id', $id)->delete();
                foreach ($group_list as $value) {
                    $group = new CountryGroupList;
                    $group->country_group_id = $id;
                    $group->country_id = $value;
                    $group->save();
                }
            }

            return response()->json(["message" => "Updated Successfully", "status" => true]);
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function all_country_lists()
    {
        return Country::select("*")->get();
    }
}
