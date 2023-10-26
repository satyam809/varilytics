<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\WorkFile;
use App\Models\WorkField;
use App\Models\Users;
use Yajra\DataTables\DataTables;


class WorkFileController extends Controller
{
    public function index()
    {
        $web = WorkField::select('*')->get();
        $totalPdf = Users::sum('pdfCount');
        return view('admin.header') . view('admin.work_files', ['web' => $web, 'totalPdf' => $totalPdf]) . view('admin.footer');
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'website' => 'required',
            'link' => 'required',
            'name' => 'required'
            //'download_excel' => 'required'
        ]);
        $website = $r->input('website');
        $link = $r->input('link');
        $name = ucwords(strtolower($r->input('name')));
        $description = ucwords(strtolower($r->input('description')));
        $download_excel = $r->input('download_excel');

        if ($validator->passes()) {
            $workFile = new WorkFile;
            $workFile->web_id = $website;
            $workFile->link = $link;
            $workFile->name = $name;
            $workFile->description = $description;
            $workFile->download_excel = $download_excel;
            $workFile->save();
            return array("message" => "Inserted", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }

    public function get(Request $r)
    {
        if ($r->ajax()) {
            $data = WorkFile::join('work_fields', 'work_links.web_id', 'work_fields.id')
                ->select('work_fields.website', 'work_links.link', 'work_links.name', 'work_links.description', 'work_links.id')
                ->get();
            return DataTables::of($data)->make(true);
        }
    }
    public function getSingle($id)
    {
        $data = WorkFile::select('*')->where('id', $id)->get();
        return $data;
    }
    public function update(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'website' => 'required',
            'link' => 'required',
            'name' => 'required'
            //'download_excel' => 'required'

        ]);
        $id = $r->input('val_id');
        $website = $r->input('website');
        $link = $r->input('link');
        $name = ucwords(strtolower($r->input('name')));
        $description = ucwords(strtolower($r->input('description')));
        $download_excel = $r->input('download_excel');

        if ($validator->passes()) {
            WorkFile::where('id', $id)->update(['web_id' => $website, 'link' => $link, 'name' => $name, 'description' => $description, 'download_excel' => $download_excel]);
            return array("message" => "Updated Successfully", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function delete($id)
    {
        //return $id;
        WorkFile::where('id', $id)->delete();
        return array('message' => 'deleted', 'status' => true);
    }
    public function upload_workFile(Request $r)
    {
        $excelData = Excel::toArray([], $r->file('file')->store('temp'));
        // echo "<pre>";
        // print_r($excelData);die;
        foreach ($excelData[0] as $key => $value) {
            $workFile = new WorkFile;
            if ($key != 0) {
                $web_id = WorkField::select('id')->where('website', trim($value[0]))->get();
                //return $web_id;
                if (isset($web_id[0])) {
                    if ($this->UniqueWorkLink($value[1])) {
                        $workFile->web_id = $web_id[0]->id;
                        $workFile->link = $value[1];
                        $workFile->name = ucwords(strtolower($value[2]));

                        if (!empty($value[3])) {
                            $workFile->description = ucwords(strtolower($value[3]));
                        } else {
                            $workFile->description = '';
                        }

                        $workFile->save();
                    } else {
                        // $r->session()->flash('DataUpload', 'You can not upload same website with same link and file name');
                        //    $r->session()->flash('DataUpload', $value[1].', this is duplicate.');
                        //     return redirect('admin/work_file/');
                        continue;
                    }
                } else {
                    // $r->session()->flash('DataUpload', 'Website url may be incorrect or not in work field module');
                    $r->session()->flash('DataUpload', $value[0] . ', This does not exist');
                    return redirect('admin/work_file/');
                }
            }
        }
        //die;

        $r->session()->flash('DataUpload', 'File is uploaded successfully');
        return redirect('admin/work_file/');
    }
    public function UniqueWorkLink($link)
    {
        $data = WorkFile::select('id')->where('link', $link)->get();
        //return $data;
        if (isset($data[0]->id)) {
            return false;
        } else {
            return true;
        }
    }
}
