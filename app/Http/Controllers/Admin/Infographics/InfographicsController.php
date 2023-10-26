<?php

namespace App\Http\Controllers\Admin\Infographics;

use App\Models\CurrentTopic;
use App\Models\Industry;
use App\Models\Infographic;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class InfographicsController extends Controller
{
    public function current_topics()
    {
        return view('admin.header') . view('admin.infographics.current_topics') . view('admin.footer');
    }
    public function addCurrentTopic(Request $r)
    {
        $name = $r->input('name');
        $validator = Validator::make($r->all(), [
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            $CurrentTopic = new CurrentTopic;
            $CurrentTopic->name = $name;
            $CurrentTopic->save();
            return array("message" => "Current Topic Added Successfully", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function getAllCurrentTopics()
    {
        $data = CurrentTopic::select('*')->get();
        return array('data' => $data);
    }
    public function deleteCurrentTopic(Request $r)
    {
        CurrentTopic::where('id', $r->input('id'))->delete();
        return ['message' => "Current Topic Deleted SuccessFully", "status" => true];
    }
    public function getCurrentTopic(Request $r)
    {
        $data = CurrentTopic::select('*')->where('id', $r->input('id'))->get();
        return $data;
    }
    public function editCurrentTopic(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required'
        ]);
        $id = $r->input('updateId');
        $name = $r->input('name');
        if ($validator->passes()) {
            CurrentTopic::where('id', $id)->update(['name' => $name]);
            return ['message' => 'Current Topic Updated Successfully', 'status' => true];
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function industries()
    {
        return view('admin.header') . view('admin.infographics.industries') . view('admin.footer');
    }
    public function addIndustry(Request $r)
    {
        $name = $r->input('name');
        $validator = Validator::make($r->all(), [
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            $Industry = new Industry;
            $Industry->name = $name;
            $Industry->save();
            return array("message" => "Industry Added Successfully", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function getAllIndustry()
    {
        $data = Industry::select('*')->get();
        return array('data' => $data);
    }
    public function deleteIndustry(Request $r)
    {
        Industry::where('id', $r->input('id'))->delete();
        return ['message' => "Industry Deleted SuccessFully", "status" => true];
    }
    public function getIndustry(Request $r)
    {
        $data = Industry::select('*')->where('id', $r->input('id'))->get();
        return $data;
    }
    public function editIndustry(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required'
        ]);
        $id = $r->input('updateId');
        $name = $r->input('name');
        if ($validator->passes()) {
            Industry::where('id', $id)->update(['name' => $name]);
            return ['message' => 'Industry Updated Successfully', 'status' => true];
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function infographics()
    {
        $currentTopic = CurrentTopic::select('*')->get();
        $industries = Industry::select('*')->get();
        return view('admin.header') . view('admin.infographics.infographics', ['currentTopic' => $currentTopic, 'industries' => $industries]) . view('admin.footer');
    }
    public function addInfographics(Request $r)
    {

        $validator = Validator::make($r->all(), [
            'image' => 'required',
            'pdf' => 'required'
        ]);
        $currentTopic = $r->input('currentTopic');
        $industry = $r->input('industry');
        if ($validator->passes()) {
            if ($r->hasFile('image')) {
                $image = $r->file('image');
                $imageFile = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $image->move(public_path("assets/admin_assets/infographics/images"), $imageFile);
            } else {
                $imageFile = '';
            }
            if ($r->hasFile('pdf')) {
                $pdf = $r->file('pdf');
                $pdfFile = md5($pdf->getClientOriginalName() . time()) . "." . $pdf->getClientOriginalExtension();
                $pdf->move(public_path("assets/admin_assets/infographics/pdf"), $pdfFile);
            } else {
                $pdfFile = '';
            }
            $Infographic = new Infographic;
            $Infographic->current_topic_id = $currentTopic;
            $Infographic->industries_id = $industry;
            $Infographic->image = $imageFile;
            $Infographic->pdf = $pdfFile;
            $Infographic->save();
            return array("message" => "Infographics Added Successfully", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function getAllInfographics()
    {
        $data = Infographic::with('current_topic', 'industry')->select('*')->get();
        return array('data' => $data);
    }
    public function getInfographics(Request $r)
    {
        $data = Infographic::select('*')->where('id', $r->input('id'))->get();
        return $data;
    }
    public function editInfographics(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'image' => '',
            'pdf' => ''
        ]);
        $currentTopic = $r->input('currentTopic');
        $industry = $r->input('industry');
        $data = Infographic::select('image', 'pdf')->where('id', $r->input('upInfographicsId'))->get();
        if ($validator->passes()) {
            if ($r->hasFile('image')) {
                if (file_exists(public_path("assets/admin_assets/infographics/images/".$data[0]->image))) {
                    unlink(public_path("assets/admin_assets/infographics/images/".$data[0]->image));
                }
                $image = $r->file('image');
                $imageFile = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $image->move(public_path("assets/admin_assets/infographics/images"), $imageFile);
            } else {
                $imageFile = $data[0]->image;
            }
            if ($r->hasFile('pdf')) {
                if (file_exists(public_path("assets/admin_assets/infographics/pdf/".$data[0]->pdf))) {
                    unlink(public_path("assets/admin_assets/infographics/pdf/".$data[0]->pdf));
                }
                $pdf = $r->file('pdf');
                $pdfFile = md5($pdf->getClientOriginalName() . time()) . "." . $pdf->getClientOriginalExtension();
                $pdf->move(public_path("assets/admin_assets/infographics/pdf"), $pdfFile);
            } else {
                $pdfFile = $data[0]->pdf;
            }
            Infographic::where('id', $r->input('upInfographicsId'))->update(['current_topic_id' => $currentTopic, 'industries_id' => $industry, 'image' => $imageFile, 'pdf' => $pdfFile]);
            return ['message' => 'Infographics Updated Successfully', 'status' => true];
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function deleteInfographics(Request $r)
    {
        $data = Infographic::select('image', 'pdf')->where('id', $r->input('id'))->get();
        if (file_exists(public_path("assets/admin_assets/infographics/images/".$data[0]->image))) {
            unlink(public_path("assets/admin_assets/infographics/images/".$data[0]->image));
        }
        if (file_exists(public_path("assets/admin_assets/infographics/pdf/".$data[0]->pdf))) {
            unlink(public_path("assets/admin_assets/infographics/pdf/".$data[0]->pdf));
        }
        Infographic::where('id', $r->input('id'))->delete();
        return ['message' => "Infographics Deleted SuccessFully", "status" => true];
    }
    public function infographicsHomePage(Request $r)
    {
        $data = Infographic::select('*')->where('id', $r->input('id'))->get();
        if ($data[0]->homePage == 0) {
            Infographic::where('id', $r->input('id'))->update(['homePage' => 1]);
        } else {
            Infographic::where('id', $r->input('id'))->update(['homePage' => 0]);
        }
        return ['message' => "Updated SuccessFully", "status" => true];
    }
}
