<?php

namespace App\Http\Controllers\Admin;

use App\Models\WorkField;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WorkFieldController extends Controller
{
    public function index()
    {
        return view('admin.header') . view('admin.work_fields') . view('admin.footer');
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'website' => 'required',
            'acronym' => 'required',
            'org_name' => 'required',
            'sector' => 'required',
            'domain' => 'required'
        ]);
        $website = $r->input('website');
        $acronym = strtoupper($r->input('acronym'));
        $org_name = ucwords(strtolower($r->input('org_name')));
        $sector = ucwords(strtolower($r->input('sector')));
        $domain = ucwords(strtolower($r->input('domain')));


        if ($validator->passes()) {
            $workField = new WorkField;
            $workField->website = $website;
            $workField->acronym = $acronym;
            $workField->org_name = $org_name;
            $workField->sector = $sector;
            $workField->domain = $domain;
            $workField->save();

            return array("message" => "Inserted", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }

    public function get()
    {
        $data = WorkField::select('*')->get();
        return array('data' => $data);
    }
    public function getSingle($id)
    {
        $data = WorkField::select('*')->where('id', $id)->get();
        return $data;
    }
    public function update(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'website' => 'required',
            'acronym' => 'required',
            'org_name' => 'required',
            'sector' => 'required',
            'domain' => 'required'
        ]);
        $id = $r->input('val_id');
        $website = $r->input('website');
        $acronym = strtoupper($r->input('acronym'));
        $org_name = ucwords(strtolower($r->input('org_name')));
        $sector = ucwords(strtolower($r->input('sector')));
        $domain = ucwords(strtolower($r->input('domain')));

        if ($validator->passes()) {
            WorkField::where('id', $id)->update(['website' => $website, 'acronym' => $acronym, 'org_name' => $org_name, 'sector' => $sector, 'domain' => $domain]);
            return array("message" => "Updated Successfully", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete($id)
    {
        WorkField::where('id', $id)->delete();
        return array('message' => 'deleted', 'status' => true);
    }
    public function upload_workField(Request $r)
    {
        $excelData = Excel::toArray([], $r->file('file')->store('temp'));
        foreach ($excelData[0] as $key => $value) {
            $workField = new WorkField;
            if ($key != 0) {
                $workField->website = $value[0];
                $workField->acronym = strtoupper($value[1]);
                $workField->org_name = ucwords(strtolower($value[2]));
                $workField->sector = ucwords(strtolower($value[3]));
                $workField->domain = ucwords(strtolower($value[4]));
                $workField->save();
            }
        }
        // echo "<pre>";
        // print_r($excelData[0]);
        // die;

        $r->session()->flash('DataUpload', 'File is uploaded successfully');
        return redirect('admin/work_field/');
    }
}
