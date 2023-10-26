<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aboutus;
use App\Models\Condition;
use App\Models\Privacy;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SimpleSoftwareIO\QrCode\Facades\QrCode;




class AboutusController extends Controller
{
    // start conditions for  aboutus 

    public function index()
    {
        // return 'test';
        $aboutus = Aboutus::select('id','about')->first();
        //var_dump($aboutus); die;
        if($aboutus == 'null'){
            return view('admin.header') . view('admin.about_us') . view('admin.footer');
        }else{
            // return $aboutus;
            return view('admin.header') . view('admin.about_us', ['aboutus' =>  $aboutus]) . view('admin.footer');
        }
    }

    public function addAboutDetails(Request $request)
    {
        // return 'test';
        $user_id = $request->input('myvalue');
        if($user_id == 'null'){
            $about = new Aboutus;
            $about->about = $request->about;
        
            $about->save();
            return redirect('admin/aboutus')->with('success', 'Aboutus  Successfully added');
        }
        else
        {
            $name = $request->input('about');
            DB::update('update aboutus set about = ? where id = ?',[$name,$user_id]);
            return redirect('admin/aboutus')->with('success', 'Aboutus  Update successfully');
        }     
    }
    // End conditions for  aboutus 


    // start conditions for  conditions 

    public function Condition()
    {
        // return 'test';
        $condition = Condition::select('id','conditions_value')->first();
        if($condition == 'null'){
            return view('admin.header') . view('admin.terms_conditions') . view('admin.footer');
        }
        else{
            return view('admin.header') . view('admin.terms_conditions', ['condition' =>  $condition]) . view('admin.footer');
        }
        
    }

    public function addConditionDetails(Request $request)
    {
        // return 'Condition controller';
        $condition_id = $request->input('cvalue');
        if($condition_id  == 'null'){
            $about = new Condition;
            $about->conditions_value = $request->conditions_value;
           
            $about->save();
            return redirect('admin/condition')->with('success', 'Term and Conditions  Successfully added'); 
        }
        else
        {
            $name = $request->input('conditions_value');
            DB::update('update conditions set conditions_value = ? where id = ?',[$name,$condition_id]);
            return redirect('admin/condition')->with('success', 'Term and Conditions  Update successfully');
        }
    }

    // End conditions for  conditions 




    // start conditions for  privacy 
    public function Privacy()
    {
        // return 'test';
        // DB::select("select `conditions_value` from conditions");
        $privacyus = Privacy::select('id','privacy')->first();
        // var_dump($privacyus); die;
        // return $privacyus;
        if($privacyus == 'null'){
            return view('admin.header') . view('admin.privacy') . view('admin.footer');
        }else{
            return view('admin.header') . view('admin.privacy', ['privacyus' =>  $privacyus]) . view('admin.footer');
        }  
    }



    public function addPrivacyDetails(Request $request)
    {
        // return 'Privacy controller';

        $privacy_id = $request->input('mypivacy');
        if( $privacy_id  == 'null'){
            $about = new Privacy;
            $about->privacy = $request->privacy;
        
            $about->save();
            return redirect('admin/privacy')->with('success', 'Privacy Policy  Successfully added'); 
        }
        else
        {
            $name = $request->input('privacy');
            DB::update('update privacy set privacy = ? where id = ?',[$name,$privacy_id]);
            return redirect('admin/privacy')->with('success', 'privacy  Update successfully');
        }  
    }
    // End conditions for  privacy   

}
