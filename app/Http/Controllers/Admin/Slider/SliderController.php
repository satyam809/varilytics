<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function slider()
    {
        return view('admin.header') . view('admin.slider.slider') . view('admin.footer');
    }
    public function addSlider(Request $r)
    {

        $validator = Validator::make($r->all(), [
            'heading' => 'required',
            'paragraph' => 'required',
            'image' => 'required'
        ]);
        $heading = $r->input('heading');
        $paragraph = $r->input('paragraph');
        if ($validator->passes()) {
            if ($r->hasFile('image')) {
                $image = $r->file('image');
                $imageFile = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $image->move(public_path("assets/admin_assets/slider"), $imageFile);
            } else {
                $imageFile = '';
            }
            $Slider = new Slider;
            $Slider->heading = $heading;
            $Slider->paragraph = $paragraph;
            $Slider->image = $imageFile;
            $Slider->save();
            return array("message" => "Slider Added Successfully", "status" => true);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function getAllSliders()
    {
        $data = Slider::select('*')->get();
        return array('data' => $data);
    }
    public function getSlider(Request $r)
    {
        $data = Slider::select('*')->where('id', $r->input('id'))->get();
        return $data;
    }
    public function editSlider(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'heading' => 'required',
            'paragraph' => 'required',
            'image' => ''
        ]);
        $heading = $r->input('heading');
        $paragraph = $r->input('paragraph');
        $data = Slider::select('image')->where('id', $r->input('upSliderId'))->get();
        if ($validator->passes()) {
            if ($r->hasFile('image')) {
                if (file_exists(public_path("assets/admin_assets/slider/".$data[0]->image))) {
                    unlink(public_path("assets/admin_assets/slider/".$data[0]->image));
                }
                $image = $r->file('image');
                $imageFile = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $image->move(public_path("assets/admin_assets/slider/"), $imageFile);
            } else {
                $imageFile = $data[0]->image;
            }
            Slider::where('id', $r->input('upSliderId'))->update(['heading' => $heading, 'paragraph' => $paragraph, 'image' => $imageFile]);
            return ['message' => 'Slider Updated Successfully', 'status' => true];
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function deleteSlider(Request $r)
    {
        $data = Slider::select('image')->where('id', $r->input('id'))->get();
        if (file_exists(public_path("assets/admin_assets/slider/".$data[0]->image))) {
            unlink(public_path("assets/admin_assets/slider/".$data[0]->image));
        }
        Slider::where('id', $r->input('id'))->delete();
        return ['message' => "Slider Deleted SuccessFully", "status" => true];
    }
}
