<?php

use Google\Client;
use Google\Service\Drive;
//use Google\Service\Drive\Permission;
use Google\Drive\Service;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AddFinalData;
use App\Models\AddTable;
use App\Models\AddData;
use App\Models\Permission;
use App\Models\Users;
use App\Models\Customer;
use Validator as valid;
use App\Http\Controllers\Frontend\SubscriptionController;


Route::post('upload_single_sheet', function (Request $r) {
    $validator = Validator::make($r->all(), [
        'excel' => 'required|mimes:csv,xls,xlsx'
    ]);
    $assignLinkId = $r->input('assignLinkId');
    if ($validator->passes()) {
        $excelData = Excel::toArray([], $r->file('excel')->store('temp'));
        $fileName = md5($r->file('excel')->getClientOriginalName() . time()) . "." . $r->file('excel')->getClientOriginalExtension();
        $r->file('excel')->move(public_path("assets/admin_assets/excelUpload"), $fileName);

        // drive
        $client = new Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->setRedirectUri(url('/') . '/admin/get_work');
        $client->setScopes([
            'https://www.googleapis.com/auth/drive',
            'https://www.googleapis.com/auth/drive.file',
        ]);
        $access_token = $r->input('access_token');

        $client->setAccessToken($access_token);
        $service = new Google\Service\Drive($client);
        $file = new Google\Service\Drive\DriveFile();

        DEFINE("TESTFILE", public_path("assets/admin_assets/excelUpload/") . $fileName);
        if (!file_exists(TESTFILE)) {
            $fh = fopen(TESTFILE, 'w');
            fseek($fh, 1024 * 1024);
            fwrite($fh, "!", 1);
            fclose($fh);
        }

        $file->setName($fileName);
        $fileID = $service->files->create(
            $file,
            array(
                'data' => file_get_contents(TESTFILE),
                'mimeType' => 'application/octet-stream',
                'uploadType' => 'multipart',
                'fields' => 'id'
            )
        );

        $ownerPermission = new Google_Service_Drive_Permission();
        $ownerPermission->setEmailAddress('varilyticsexcelfiletable@gmail.com'); // password varilytics@123
        $ownerPermission->setType('user');
        $ownerPermission->setRole('writer');
        $ownerPermission->pendingOwner = true;

        $service->permissions->create($fileID->id, $ownerPermission);

        $managerEmail = Permission::with('User')->select('user_id')->where('designation_id', 1)->get();

        $mangerPermission = new Google_Service_Drive_Permission();
        $mangerPermission->setEmailAddress($managerEmail[0]['user']->email);
        //$mangerPermission->setEmailAddress('satyam.shivam@corewebconnections.com');
        $mangerPermission->setType('user');
        $mangerPermission->setRole('reader');
        $service->permissions->create($fileID->id, $mangerPermission);


        $blankRow = 0;
        $source = "";
        $arrReturn = array();

        $data = $excelData[0];
        //echo json_encode($data);die;
        // echo count($data);die;
        for ($i = 0; $i < count($data); $i++) {

            if ($blankRow == 2) {
                $blankRow = 0;
                $source = $data[$i][0];
            } else if ($data[$i][0] != '') {
                $arrReturn[$source][] = $data[$i];
                $blankRow = 0;
            }
            if ($data[$i][0] == '') {
                $blankRow += 1;
            }
        }
        //echo json_encode($arrReturn);die;
        // echo count($arrReturn);die;
        foreach ($arrReturn as $key => $val) {
            $data = array("source" => $key, "table_name" => "", "unit" => "", "val" => "");
            $data["table_name"] = $val[0][0];
            $data["unit"] = $val[1][0];
            $data["val"] = $val;
            //echo json_encode($val[1]);die;
            $addTable = new AddTable;
            $addTable->user_id = session('login.user_id');
            $addTable->assign_work_link_id = $assignLinkId;
            $addTable->name = $data['table_name'];
            $addTable->unit = $data['unit'];
            $addTable->source = $data['source'];
            $addTable->file_name = $fileName;
            $addTable->driveFileId = $fileID->id;

            $addTable->table_issued_by = 0;

            $addTable->save();
            $last_id = $addTable->id;
            // print_r($data['val']);die;
            foreach ($data['val'] as $key => $value) {
                $addData = new AddData;
                $addData->table_id = $last_id;
                if ($key != 0 && $key != 1) {
                    $addData->values = json_encode($value);
                    $addData->save();
                    $addDataLastId = $addData->id;
                    $addFinalData = new AddFinalData;
                    $addFinalData->data_id = $addDataLastId;
                    // $addFinalData->user_id = session('login.user_id');
                    $addFinalData->table_id = $last_id;
                    $addFinalData->values = json_encode($value);
                    $addFinalData->save();
                }
            }
        }



        // if (File::exists(public_path('assets/admin_assets/excelUpload/' . $fileName))) {
        //     File::delete(public_path('assets/admin_assets/excelUpload/' . $fileName));
        // }
        if (file_exists(public_path('/assets/admin_assets/excelUpload/' . $fileName))) {
            unlink(public_path('/assets/admin_assets/excelUpload/' . $fileName));
        }
        //return redirect()->back()->with(['success' => 'Added Successfully', 'fileId' => $fileID->id, 'accessToken' => $access_token]);
        return array('status' => true, 'message' => 'Added Successfully');
        //return redirect()->back()->with(['success' => 'Added Successfully']);
    } else {
        return response()->json(['error' => $validator->errors()]);
    }
});
Route::post('upload_multiple_sheet', function (Request $r) {
    $validator = valid::make($r->all(), [
        'excel' => 'required|mimes:csv,xls,xlsx|max:5120'
    ]);
    $assignLinkId = $r->input('assignLinkId');

    //echo $r->file('excel');die;
    //$designationId = $this->check_user_designation();
    if ($validator->passes()) {
        $excelData = Excel::toArray([], $r->file('excel')->store('temp'));
        //print_r($excelData);die;
        // echo json_encode($excelData);
        // die;
        $fileName = md5($r->file('excel')->getClientOriginalName() . time()) . "." . $r->file('excel')->getClientOriginalExtension();

        $r->file('excel')->move(public_path("assets/admin_assets/excelUpload"), $fileName);

        //drive
        $client = new Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->setRedirectUri(url('/') . '/admin/get_work');
        $client->setScopes([
            'https://www.googleapis.com/auth/drive',
            'https://www.googleapis.com/auth/drive.file',
        ]);
        $access_token = $r->input('access_token');

        $client->setAccessToken($access_token);
        $service = new Google\Service\Drive($client);
        $file = new Google\Service\Drive\DriveFile();

        DEFINE("TESTFILE", public_path("assets/admin_assets/excelUpload/") . $fileName);
        if (!file_exists(TESTFILE)) {
            $fh = fopen(TESTFILE, 'w');
            fseek($fh, 1024 * 1024);
            fwrite($fh, "!", 1);
            fclose($fh);
        }

        $file->setName($fileName);
        $fileID = $service->files->create(
            $file,
            array(
                'data' => file_get_contents(TESTFILE),
                'mimeType' => 'application/octet-stream',
                'uploadType' => 'multipart',
                'fields' => 'id'
            )
        );

        $ownerPermission = new Google_Service_Drive_Permission();
        $ownerPermission->setEmailAddress('varilyticsexcelfiletable@gmail.com');
        $ownerPermission->setType('user');
        $ownerPermission->setRole('writer');
        $ownerPermission->pendingOwner = true;

        $service->permissions->create($fileID->id, $ownerPermission);
        $managerEmail = Permission::with('User')->select('user_id')->where('designation_id', 1)->get();
        $mangerPermission = new Google_Service_Drive_Permission();
        $mangerPermission->setEmailAddress($managerEmail[0]['user']->email);
        //$mangerPermission->setEmailAddress('satyam.shivam@corewebconnections.com');
        $mangerPermission->setType('user');
        $mangerPermission->setRole('reader');
        $service->permissions->create($fileID->id, $mangerPermission);

        //print_r($excelData[0]);die;
        //echo count($excelData);die;
        for ($k = 0; $k < count($excelData); $k++) {
            //echo $k;
            $arrData = array("source" => "", "table_name" => "", "unit" => "", "value" => []);
            $addTable = new AddTable;
            $addTable->user_id = session('login.user_id');
            $addTable->assign_work_link_id = $assignLinkId;
            $addTable->file_name = $fileName;
            $addTable->driveFileId = $fileID->id;
            $addTable->save();
            $lastId = $addTable->id;
            //print_r($excelData[0]);die;
            foreach ($excelData[$k] as $key => $item) {
                //print_r($item);
                if ($key == 0) {
                    $arrData["source"] = $item[0];
                    AddTable::where('id', $lastId)->update(['source' => $arrData['source']]);
                } else if ($key == 1) {
                    $arrData["table_name"] = $item[0];
                    AddTable::where('id', $lastId)->update(['name' => $arrData["table_name"]]);
                } else if ($key == 2) {
                    $arrData["unit"] = $item[0];
                    AddTable::where('id', $lastId)->update(['unit' => $arrData["unit"]]);
                } else {
                    $arrData["value"][] = $item;
                }
            }
            //echo json_encode($arrData["value"][0]);die;
            foreach ($arrData["value"] as $key => $item) {
                $addData = new AddData;
                $addData->table_id = $lastId;
                $addData->values = json_encode($item);
                $addData->save();
                $addDataLastId = $addData->id;
                $addFinalData = new AddFinalData;
                $addFinalData->data_id = $addDataLastId;
                $addFinalData->table_id = $lastId;
                $addFinalData->values = json_encode($item);
                $addFinalData->save();
            }
        }
        // if (File::exists(public_path('assets/admin_assets/excelUpload/' . $fileName))) {
        //     File::delete(public_path('assets/admin_assets/excelUpload/' . $fileName));
        // }
        if (file_exists(public_path('/assets/admin_assets/excelUpload/' . $fileName))) {
            unlink(public_path('/assets/admin_assets/excelUpload/' . $fileName));
        }
        //return redirect()->back()->with(['success' => 'Added Successfully', 'fileId' => $fileID->id, 'accessToken' => $access_token]);
        //return redirect()->back()->with(['success' => 'Added Successfully']);
        return array('status' => true, 'message' => 'Added Successfully');
    } else {
        return response()->json(['error' => $validator->errors()]);
    }
});
Route::get('google_login', function (Request $r) {
    //return $r->code;die;
    if (isset($r->code)) {
        $client = new Client();
        $client = new Client();
        $client->setClientId('1016165829239-ndo0vg766jenqnp629rv0o5ufngtgn8s.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(url('/') . '/google_login');
        $token = $client->fetchAccessTokenWithAuthCode($r->code);
        //print_r($token);die;

        if (!isset($token["error"])) {

            $client->setAccessToken($token['access_token']);

            // getting profile information
            $google_oauth        = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            // Storing data into database
            $id          = $google_account_info->id;
            $full_name   = trim($google_account_info->name);
            $email       = $google_account_info->email;
            $profile_pic = $google_account_info->picture;

            // checking user already exists or not
            // $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
            $get_user = Customer::select('*')->where('google_id', $id)->get();
            if (count($get_user) > 0) {
                Session::put('login_email', $get_user[0]->email);
                //$_SESSION['login_id'] = $id;
                //header('Location: home.php');
                return redirect('');
                //exit;
            } else {

                // if user not exists we will insert the user
                // $insert = mysqli_query($db_connection, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");
                $customer = new Customer;
                $customer->google_id = $id;
                $customer->name = $full_name;
                $customer->email = $email;
                $customer->profile_image = $profile_pic;
                $customer->save();
                Session::put('login_id', $id);
                return redirect('/login');
                //exit;
                // if ($insert) {
                //     Session::put('login_id', $id);
                //     redirect(url('/'));
                //     exit;
                // } else {
                //     echo "Sign up failed!(Something went wrong).";
                // }
            }
        }
    }
});

Route::get('CustomerLogout', 'App\Http\Controllers\Frontend\CustomerController@customerLogout');
Route::post('check_customer', 'App\Http\Controllers\Frontend\CustomerController@check_customer');

Route::post('pdfCount', 'App\Http\Controllers\Admin\ReviewWorkController@count_pdf');
Route::get('email', 'App\Http\Controllers\User@email');
Route::get('', 'App\Http\Controllers\Frontend\HomeController@index');
Route::get('index', 'App\Http\Controllers\Frontend\HomeController@index');
Route::get('agriculture', 'App\Http\Controllers\User@agriculture');
Route::get('art_design', 'App\Http\Controllers\User@art_design');
Route::get('education', 'App\Http\Controllers\User@education');
Route::get('finance', 'App\Http\Controllers\User@finance');
Route::get('statistics', 'App\Http\Controllers\User@statistics');
Route::get('insights', 'App\Http\Controllers\User@insights');

Route::get('infographics', 'App\Http\Controllers\Frontend\InfographicsController@index');
Route::post('filterInfographics', 'App\Http\Controllers\Frontend\InfographicsController@filterInfographics');

Route::get('visuals', 'App\Http\Controllers\User@visuals');
Route::get('analytics', 'App\Http\Controllers\User@analytics');
Route::get('dashboards', 'App\Http\Controllers\Frontend\CustomerDashboardController@index');
Route::get('on_demand_services', 'App\Http\Controllers\User@on_demand_services');

Route::get('data_library', 'App\Http\Controllers\Frontend\DataLibraryController@index');
Route::get('data-coverage', 'App\Http\Controllers\Frontend\DataCoverageController@index');
Route::get('getAllCountries', 'App\Http\Controllers\Frontend\DataCoverageController@getAllCountries');
Route::get('getCountryStates/{id}', 'App\Http\Controllers\Frontend\DataCoverageController@getCountryStates');
Route::get('getStateDistricts/{id}', 'App\Http\Controllers\Frontend\DataCoverageController@getStateDistricts');
Route::get('sub_topic_list', 'App\Http\Controllers\Frontend\DataLibraryController@sub_topic_list');
Route::post('showStates', 'App\Http\Controllers\Frontend\DataLibraryController@showStates');
Route::post('showDistricts', 'App\Http\Controllers\Frontend\DataLibraryController@showDistricts');
Route::post('showSmartCities', 'App\Http\Controllers\Frontend\DataLibraryController@showSmartCities');
Route::post('showBlock', 'App\Http\Controllers\Frontend\DataLibraryController@showBlock');
Route::get('showDataSources', 'App\Http\Controllers\Frontend\DataLibraryController@showDataSources');
Route::get('state', 'App\Http\Controllers\Frontend\DataLibraryController@getAllStates');
Route::get('country-group-list', 'App\Http\Controllers\Frontend\DataLibraryController@country_group_list');
Route::get('country-list-group/{id}', 'App\Http\Controllers\Frontend\DataLibraryController@country_list_group');
Route::get('get-country-topic/{id}', 'App\Http\Controllers\Frontend\DataLibraryController@get_country_topic');

Route::get('data_board', 'App\Http\Controllers\User@data_board');
Route::get('data_coverage', 'App\Http\Controllers\User@data_coverage');
Route::get('simple_search', 'App\Http\Controllers\User@simple_search');
Route::get('custom_query', 'App\Http\Controllers\User@custom_query');
Route::get('compare_sources', 'App\Http\Controllers\User@compare_sources');
Route::get('create', 'App\Http\Controllers\User@create');
Route::get('publish', 'App\Http\Controllers\User@publish');
Route::get('data_store', 'App\Http\Controllers\User@data_store');
Route::get('dashboard', 'App\Http\Controllers\User@dashboard');
Route::get('inforgraphic', 'App\Http\Controllers\User@inforgraphic');
Route::get('outlooks', 'App\Http\Controllers\User@outlooks');
Route::get('publications', 'App\Http\Controllers\User@publications');
Route::get('reports', 'App\Http\Controllers\User@reports');
Route::get('surveys', 'App\Http\Controllers\User@surveys');
Route::get('varisurvey', 'App\Http\Controllers\User@varisurvey');
Route::get('data_visuals', 'App\Http\Controllers\User@data_visuals');
Route::get('whitepapers', 'App\Http\Controllers\User@whitepapers');
Route::get('resources', 'App\Http\Controllers\User@resources');
Route::get('compendiums', 'App\Http\Controllers\User@compendiums');
Route::get('repositories', 'App\Http\Controllers\User@repositories');
Route::get('intelligence_system', 'App\Http\Controllers\User@intelligence_system');
Route::get('newsfeed', 'App\Http\Controllers\User@newsfeed');
Route::get('blogs', 'App\Http\Controllers\User@blogs');
Route::get('subscription', 'App\Http\Controllers\Frontend\SubscriptionController@index');
Route::post('razorpay-payment', [SubscriptionController::class, 'store'])->name('razorpay.payment.store');
Route::get('registration', 'App\Http\Controllers\User@registration');
Route::get('purchase', 'App\Http\Controllers\User@purchase');
Route::get('basic_access', 'App\Http\Controllers\User@basic_access');
Route::get('professional_access', 'App\Http\Controllers\User@professional_access');
Route::get('insights_access', 'App\Http\Controllers\User@insights_access');
Route::get('premium_access', 'App\Http\Controllers\User@premium_access');

Route::get('contact', 'App\Http\Controllers\User@contact');
Route::get('login', 'App\Http\Controllers\Frontend\CustomerController@loginPage');
Route::get('about', 'App\Http\Controllers\User@about');
Route::get('industry_themes', 'App\Http\Controllers\User@industry_themes');
Route::get('data_process', 'App\Http\Controllers\User@data_process');
Route::post('insertContact1', 'App\Http\Controllers\User@insertContact1');
Route::post('insertContact2', 'App\Http\Controllers\User@insertContact2');

Route::get('forget_password', 'App\Http\Controllers\User@forgetPassword');
Route::post('check_email', 'App\Http\Controllers\User@check_email');
Route::get('change_password/', 'App\Http\Controllers\User@change_password');
Route::post('save_password', 'App\Http\Controllers\User@save_password');

Route::post('customerReg', 'App\Http\Controllers\Frontend\CustomerController@registration');
Route::post('customerLogin', 'App\Http\Controllers\Frontend\CustomerController@login');
Route::post('registration', 'App\Http\Controllers\Admin\UsersController@registration');

Route::post('userLoginSubmit', 'App\Http\Controllers\Admin\UsersController@userLoginSubmit');

Route::get('admin/login', 'App\Http\Controllers\Admin\UsersController@login');
Route::get('admin/registration', 'App\Http\Controllers\Admin\UsersController@registrationPage');

Route::post('admin/userLoginSubmit', 'App\Http\Controllers\Admin\UsersController@userLoginSubmit');
Route::get('admin/logout', 'App\Http\Controllers\Admin\UsersController@removeSession');
Route::get('front_parent_topic', 'App\Http\Controllers\Admin\topicController@parent_topic');
Route::get('front_get_subtopic/{parentId}', 'App\Http\Controllers\Admin\topicController@get_subtopic');
Route::get('data_library/topic', 'App\Http\Controllers\Frontend\DataLibraryController@topic_table');
Route::get('data_library/smart-city', 'App\Http\Controllers\Frontend\DataLibraryController@smart_city_table');
Route::get('data_library/state', 'App\Http\Controllers\Frontend\DataLibraryController@state_table');
Route::get('data_library/district', 'App\Http\Controllers\Frontend\DataLibraryController@district_table');
Route::get('data_library/block', 'App\Http\Controllers\Frontend\DataLibraryController@block_table');
Route::get('data_library/country', 'App\Http\Controllers\Frontend\DataLibraryController@country_table');
Route::get('data_library/source', 'App\Http\Controllers\Frontend\DataLibraryController@source_table');
Route::get('get_all_organisation', 'App\Http\Controllers\Admin\organizationController@get');

Route::get('mandi-prices', 'App\Http\Controllers\Frontend\MandiPricesController@index');
Route::get('allMandiPrices', 'App\Http\Controllers\Frontend\MandiPricesController@allMandiPrices');
Route::post('yearSearch', 'App\Http\Controllers\Frontend\MandiPricesController@yearSearch');
Route::post('getStates', 'App\Http\Controllers\Frontend\MandiPricesController@getStates');
Route::post('getStateDistrict', 'App\Http\Controllers\Frontend\MandiPricesController@getStateDistrict');
Route::post('getAllDistrict', 'App\Http\Controllers\Frontend\MandiPricesController@getAllDistrict');
//Route::get('getMarket', 'App\Http\Controllers\Frontend\MandiPricesController@getMarket');
Route::post('getAllMarket', 'App\Http\Controllers\Frontend\MandiPricesController@getAllMarket');
Route::post('getAllCommodity', 'App\Http\Controllers\Frontend\MandiPricesController@getAllCommodity');
Route::post('dataSearch', 'App\Http\Controllers\Frontend\MandiPricesController@dataSearch');
Route::post('getMandiDataPrice', 'App\Http\Controllers\Frontend\MandiPricesController@getMandiDataPrice');
Route::post('getDistrictMarket', 'App\Http\Controllers\Frontend\MandiPricesController@getDistrictMarket');
Route::post('getMarketCommodity', 'App\Http\Controllers\Frontend\MandiPricesController@getMarketCommodity');
Route::post('commodityYearPriceGraph', 'App\Http\Controllers\Frontend\MandiPricesController@commodityYearPriceGraph');
Route::post('getCommodityMarket', 'App\Http\Controllers\Frontend\MandiPricesController@getCommodityMarket');
Route::get('AllMandiPriceCommodity', 'App\Http\Controllers\Frontend\MandiPricesController@AllMandiPriceCommodity');
Route::post('commodityMandiGraph', 'App\Http\Controllers\Frontend\MandiPricesController@commodityMandiGraph');
Route::post('compareMarket', 'App\Http\Controllers\Frontend\MandiPricesController@compareMarket');
Route::get('mandiPriceYear', 'App\Http\Controllers\Frontend\MandiPricesController@mandiPriceYear');
Route::get('getAllMandiPriceMarket', 'App\Http\Controllers\Frontend\MandiPricesController@getAllMandiPriceMarket');
Route::get('getAllMandiPriceGrade', 'App\Http\Controllers\Frontend\MandiPricesController@getAllMandiPriceGrade');
Route::get('getMandiPriceData', 'App\Http\Controllers\Frontend\MandiPricesController@getMandiPriceData');

Route::get('apys', 'App\Http\Controllers\Frontend\ApysController@index');
Route::get('all-apys-commodity', 'App\Http\Controllers\Frontend\ApysController@allApysCommodity');
Route::get('getAllApysState', 'App\Http\Controllers\Frontend\ApysController@getAllApysState');
Route::post('getAllApysDistricts', 'App\Http\Controllers\Frontend\ApysController@getAllApysDistricts');
Route::get('getAllApysSeason', 'App\Http\Controllers\Frontend\ApysController@getAllApysSeason');
Route::get('getAllApysYears', 'App\Http\Controllers\Frontend\ApysController@getAllApysYears');
Route::post('apysSearch', 'App\Http\Controllers\Frontend\ApysController@apysSearch');
Route::get('static-dashboards', 'App\Http\Controllers\Frontend\DashboardsController@staticDashboard');
Route::get('own-dashborad', 'App\Http\Controllers\Frontend\DashboardsController@ownDashboard');
Route::post('createOwnDashboard', 'App\Http\Controllers\Frontend\DashboardsController@createOwnDashboard');
Route::get('getCategoryCommodity/{id}', 'App\Http\Controllers\Frontend\DashboardsController@getCategory');
Route::get('/dashboardAllCategory', 'App\Http\Controllers\Frontend\DashboardsController@allCategory');

Route::group(['middleware' => ['userAuth']], function () {

    Route::get('admin', 'App\Http\Controllers\Admin\HomeController@index');
    Route::get('admin/index', 'App\Http\Controllers\Admin\HomeController@index');
    Route::get('getTotalTopicsAndTagTopics', 'App\Http\Controllers\Admin\HomeController@getTotalTopicsAndTagTopics');

    Route::get('admin/data_source', 'App\Http\Controllers\Admin\DataSourceController@index');
    Route::get('admin/data_source_data', 'App\Http\Controllers\Admin\DataSourceController@show');
    Route::get('admin/data_source_delete/{id}', 'App\Http\Controllers\Admin\DataSourceController@delete');

    Route::get('admin/data_submission', 'App\Http\Controllers\Admin\DataSubmissionController@index');
    Route::get('admin/data_submission_data', 'App\Http\Controllers\Admin\DataSubmissionController@show');
    Route::post('admin/data_submission_delete/{id}', 'App\Http\Controllers\Admin\DataSubmissionController@delete');

    Route::get('admin/customer_service', 'App\Http\Controllers\Admin\CustomerServiceController@index');
    Route::get('admin/customer_service_data', 'App\Http\Controllers\Admin\CustomerServiceController@show');
    Route::post('admin/customer_service_delete/{id}', 'App\Http\Controllers\Admin\CustomerServiceController@delete');

    Route::get('admin/users', 'App\Http\Controllers\Admin\UsersController@index');
    Route::get('admin/allusers', 'App\Http\Controllers\Admin\UsersController@show');
    Route::post('save_roles', 'App\Http\Controllers\Admin\UsersController@save_roles');
    Route::post('get_userRole/{id}', 'App\Http\Controllers\Admin\UsersController@get_userRole');
    Route::post('deleteUsers/{id}', 'App\Http\Controllers\Admin\UsersController@delete');
    Route::get('getUserDetails/{id}', 'App\Http\Controllers\Admin\UsersController@getUserDetails');
    Route::post('changeUserDetails', 'App\Http\Controllers\Admin\UsersController@changeUserDetails');
    Route::get('getInvoiceDetail/{id}', 'App\Http\Controllers\Admin\UsersController@getInvoiceDetail');

    Route::get('admin/customers', 'App\Http\Controllers\Admin\CustomersController@index');
    Route::post('deleteCustomer/{id}', 'App\Http\Controllers\Admin\CustomersController@delete');
    Route::post('changeCustomerPassword', 'App\Http\Controllers\Admin\CustomersController@changeCustomerPassword');

    Route::get('admin/organization_countries', 'App\Http\Controllers\Admin\OrgAndCountryController@index');
    Route::post('save_orgAndCountry', 'App\Http\Controllers\Admin\OrgAndCountryController@save');
    Route::post('update_orgAndCountry', 'App\Http\Controllers\Admin\OrgAndCountryController@update');
    Route::get('allOrgAndCountry', 'App\Http\Controllers\Admin\OrgAndCountryController@get');
    Route::post('deleteOrgAndCountry/{id}', 'App\Http\Controllers\Admin\OrgAndCountryController@delete');
    Route::post('get_orgAndCountry/{id}', 'App\Http\Controllers\Admin\OrgAndCountryController@getSingle');

    Route::get('admin/commodityYearValue', 'App\Http\Controllers\Admin\commYrValueController@index');
    Route::post('save_commYrValue', 'App\Http\Controllers\Admin\commYrValueController@save');
    Route::post('update_commYrVal', 'App\Http\Controllers\Admin\commYrValueController@update');
    Route::post('deleteCommYrValue/{id}', 'App\Http\Controllers\Admin\commYrValueController@delete');
    Route::get('allCommodityYearValue', 'App\Http\Controllers\Admin\commYrValueController@get');
    Route::post('get_commYrVal/{id}', 'App\Http\Controllers\Admin\commYrValueController@getSingle');

    Route::get('admin/country-group', 'App\Http\Controllers\Admin\CountryGroupController@index');
    Route::get('get-all-country-group', 'App\Http\Controllers\Admin\CountryGroupController@get');
    Route::post('save-country-group', 'App\Http\Controllers\Admin\CountryGroupController@save');
    Route::post('update-country-group', 'App\Http\Controllers\Admin\CountryGroupController@update');
    Route::get('get-country-group/{id}', 'App\Http\Controllers\Admin\CountryGroupController@getSingle');
    Route::post('delete-country-group', 'App\Http\Controllers\Admin\CountryGroupController@delete');
    Route::get('all_country_lists', 'App\Http\Controllers\Admin\CountryGroupController@all_country_lists');

    Route::get('admin/country', 'App\Http\Controllers\Admin\countryController@index');
    Route::post('save_country', 'App\Http\Controllers\Admin\countryController@save');
    Route::get('get_all_country', 'App\Http\Controllers\Admin\countryController@get');
    Route::get('get_country/{id}', 'App\Http\Controllers\Admin\countryController@getSingle');
    Route::post('update_country', 'App\Http\Controllers\Admin\countryController@update');
    Route::post('delete_country/{id}', 'App\Http\Controllers\Admin\countryController@delete');

    Route::get('admin/states', 'App\Http\Controllers\Admin\StateController@index');
    Route::get('get_state', 'App\Http\Controllers\Admin\StateController@get');
    Route::post('get_state/{id}', 'App\Http\Controllers\Admin\StateController@getSingle');
    Route::post('update_state', 'App\Http\Controllers\Admin\StateController@update');
    Route::post('save_state', 'App\Http\Controllers\Admin\StateController@save');
    Route::post('delete_state', 'App\Http\Controllers\Admin\StateController@delete');

    Route::get('admin/districts', 'App\Http\Controllers\Admin\DistrictController@index');
    Route::get('getAllDistrict', 'App\Http\Controllers\Admin\DistrictController@get');
    Route::post('get_district', 'App\Http\Controllers\Admin\DistrictController@getSingle');
    Route::post('save_district', 'App\Http\Controllers\Admin\DistrictController@save');
    Route::post('update_district', 'App\Http\Controllers\Admin\DistrictController@update');
    Route::post('delete_district', 'App\Http\Controllers\Admin\DistrictController@delete');
    Route::post('getStateDistricts', 'App\Http\Controllers\Admin\DistrictController@getStateDistricts');

    Route::get('admin/smartCities', 'App\Http\Controllers\Admin\SmartCityController@index');
    Route::get('get_smartCity', 'App\Http\Controllers\Admin\SmartCityController@get');
    Route::post('get_smartCity/{id}', 'App\Http\Controllers\Admin\SmartCityController@getSingle');
    Route::post('update_smartCity', 'App\Http\Controllers\Admin\SmartCityController@update');

    // Route::get('admin/commodity', 'App\Http\Controllers\Admin\commodityController@index');
    // Route::post('save_commodity', 'App\Http\Controllers\Admin\commodityController@save');
    // Route::get('get_commodity', 'App\Http\Controllers\Admin\commodityController@get');
    // Route::post('get_commodity/{id}', 'App\Http\Controllers\Admin\commodityController@getSingle');
    // Route::post('update_commodity', 'App\Http\Controllers\Admin\commodityController@update');
    // Route::post('delete_commodity/{id}', 'App\Http\Controllers\Admin\commodityController@delete');

    Route::get('admin/year', 'App\Http\Controllers\Admin\yearController@index');
    Route::post('save_year', 'App\Http\Controllers\Admin\yearController@save');
    Route::get('get_year', 'App\Http\Controllers\Admin\yearController@get');
    Route::post('get_year/{id}', 'App\Http\Controllers\Admin\yearController@getSingle');
    Route::post('update_year', 'App\Http\Controllers\Admin\yearController@update');
    Route::post('delete_year/{id}', 'App\Http\Controllers\Admin\yearController@delete');

    Route::get('/admin/topic', 'App\Http\Controllers\Admin\topicController@index');
    Route::post('save_topic', 'App\Http\Controllers\Admin\topicController@save_topic');
    Route::post('update_topic', 'App\Http\Controllers\Admin\topicController@update_topic');
    Route::post('update_sub_topic', 'App\Http\Controllers\Admin\topicController@update_sub_topic');
    Route::get('get_topic', 'App\Http\Controllers\Admin\topicController@get');
    Route::post('get_topic/{id}', 'App\Http\Controllers\Admin\topicController@getSingle');
    Route::post('delete_topic/{id}', 'App\Http\Controllers\Admin\topicController@delete');
    Route::post('save_subtopic', 'App\Http\Controllers\Admin\topicController@save_subtopic');
    Route::post('addSubtopic', 'App\Http\Controllers\Admin\topicController@addSubtopic');
    Route::get('get_subtopic/{parentId}', 'App\Http\Controllers\Admin\topicController@get_subtopic');
    Route::get('parent_topic', 'App\Http\Controllers\Admin\topicController@parent_topic');
    Route::get('up_parent_topic/{parentId}', 'App\Http\Controllers\Admin\topicController@up_parent_topic');
    Route::post('get_subsubtopic', 'App\Http\Controllers\Admin\topicController@get_subsubtopic');

    Route::get('admin/assign_work', 'App\Http\Controllers\Admin\AssignWorkController@AssignWork');
    Route::post('save_assignwork', 'App\Http\Controllers\Admin\AssignWorkController@save');
    Route::post('update_assignwork', 'App\Http\Controllers\Admin\AssignWorkController@update');
    Route::get('allassignwork', 'App\Http\Controllers\Admin\AssignWorkController@get');
    Route::post('deleteassignwork/{id}', 'App\Http\Controllers\Admin\AssignWorkController@delete');
    Route::post('deleteSingleAssignwork/{id}', 'App\Http\Controllers\Admin\AssignWorkController@delete_single');
    Route::post('get_assignwork/{id}/{work_field_id}', 'App\Http\Controllers\Admin\AssignWorkController@getSingle');
    Route::post('admin/assignWork_upload', 'App\Http\Controllers\Admin\AssignWorkController@assignWork_upload');
    Route::post('getField/{id}', 'App\Http\Controllers\Admin\AssignWorkController@getField');
    Route::post('getLink/{id}', 'App\Http\Controllers\Admin\AssignWorkController@getLink');

    Route::get('admin/work_field', 'App\Http\Controllers\Admin\WorkFieldController@index');
    Route::post('save_work_field', 'App\Http\Controllers\Admin\WorkFieldController@save');
    Route::post('update_work_field', 'App\Http\Controllers\Admin\WorkFieldController@update');
    Route::get('allWorkField', 'App\Http\Controllers\Admin\WorkFieldController@get');
    Route::post('delete_work_field/{id}', 'App\Http\Controllers\Admin\WorkFieldController@delete');
    Route::post('get_work_field/{id}', 'App\Http\Controllers\Admin\WorkFieldController@getSingle');
    Route::post('upload_workField', 'App\Http\Controllers\Admin\WorkFieldController@upload_workField');


    Route::get('admin/work_file', 'App\Http\Controllers\Admin\WorkFileController@index');
    Route::post('save_work_file', 'App\Http\Controllers\Admin\WorkFileController@save');
    Route::post('update_work_file', 'App\Http\Controllers\Admin\WorkFileController@update');
    Route::get('allWorkFile', 'App\Http\Controllers\Admin\WorkFileController@get');
    Route::post('delete_work_file/{id}', 'App\Http\Controllers\Admin\WorkFileController@delete');
    Route::post('get_work_file/{id}', 'App\Http\Controllers\Admin\WorkFileController@getSingle');
    Route::post('upload_workFile', 'App\Http\Controllers\Admin\WorkFileController@upload_workFile');


    Route::get('admin/review_work', 'App\Http\Controllers\Admin\ReviewWorkController@ReviewWork');
    Route::get('admin/get_work', 'App\Http\Controllers\Admin\ReviewWorkController@get_work');
    Route::get('admin/showTables', 'App\Http\Controllers\Admin\ReviewWorkController@showTables');
    Route::post('searchTag', 'App\Http\Controllers\Admin\ReviewWorkController@showTables');
    Route::post('searchStatus', 'App\Http\Controllers\Admin\ReviewWorkController@showTables');
    Route::post('searchIssueBy', 'App\Http\Controllers\Admin\ReviewWorkController@showTables');
    Route::post('view_work', 'App\Http\Controllers\Admin\ReviewWorkController@view_work');
    Route::post('update_reviewWorkStatus', 'App\Http\Controllers\Admin\ReviewWorkController@update');
    Route::post('get_review_work/{id}/{work_link_id}', 'App\Http\Controllers\Admin\ReviewWorkController@getSingle');
    Route::post('addTable', 'App\Http\Controllers\Admin\ReviewWorkController@addTable');
    Route::post('get_table/{id}', 'App\Http\Controllers\Admin\ReviewWorkController@getTable');
    Route::get('deleteTable/{table_id}', 'App\Http\Controllers\Admin\ReviewWorkController@deleteTable');
    Route::post('updateTable', 'App\Http\Controllers\Admin\ReviewWorkController@updateTable');
    Route::post('addRemark', 'App\Http\Controllers\Admin\ReviewWorkController@addRemark');
    Route::get('viewRemark/{table_id}', 'App\Http\Controllers\Admin\ReviewWorkController@viewRemark');
    Route::post('upload_work', 'App\Http\Controllers\Admin\ReviewWorkController@upload_work');
    Route::post('upload_pdf', 'App\Http\Controllers\Admin\ReviewWorkController@upload_pdf');
    Route::post('upload_excel', 'App\Http\Controllers\Admin\ReviewWorkController@upload_excel');
    Route::post('upload_single_sheet_excel', 'App\Http\Controllers\Admin\ReviewWorkController@upload_single_sheet_excel');
    Route::post('publish', 'App\Http\Controllers\Admin\ReviewWorkController@publish');
    Route::get('admin/table_data', 'App\Http\Controllers\Admin\ReviewWorkController@get_table_data');
    Route::get('getSingleData/{data_id}', 'App\Http\Controllers\Admin\ReviewWorkController@getSingleData');
    Route::post('updateData', 'App\Http\Controllers\Admin\ReviewWorkController@updateData');
    Route::get('deleteData/{data_id}', 'App\Http\Controllers\Admin\ReviewWorkController@deleteData');
    Route::post('ApproveTable', 'App\Http\Controllers\Admin\ReviewWorkController@ApproveTable');
    Route::post('UnapproveTable', 'App\Http\Controllers\Admin\ReviewWorkController@UnapproveTable');
    Route::post('DeleteAll', 'App\Http\Controllers\Admin\ReviewWorkController@DeleteAll');
    Route::post('changeTableStatus', 'App\Http\Controllers\Admin\ReviewWorkController@changeTableStatus');
    Route::get('admin/tabular', 'App\Http\Controllers\Admin\ReviewWorkController@tabular');
    Route::get('admin/tabularData/{tableId}', 'App\Http\Controllers\Admin\ReviewWorkController@tabularData');
    Route::get('admin/view_pdf', 'App\Http\Controllers\Admin\ReviewWorkController@view_pdf');
    Route::post('addTopicTag', 'App\Http\Controllers\Admin\ReviewWorkController@addTopicTag');
    Route::get('viewTopicTag/{table_id}', 'App\Http\Controllers\Admin\ReviewWorkController@viewTopicTag');
    Route::post('updateTopicTag', 'App\Http\Controllers\Admin\ReviewWorkController@updateTopicTag');
    Route::get('deleteTopicTag/{table_id}', 'App\Http\Controllers\Admin\ReviewWorkController@deleteTopicTag');
    Route::post('deleteSubTopic', 'App\Http\Controllers\Admin\ReviewWorkController@deleteSubTopic');


    Route::get('admin/setting', 'App\Http\Controllers\Admin\SettingController@index');
    Route::post('save_setting', 'App\Http\Controllers\Admin\SettingController@save_setting');
    // Route::get('admin/change_password', 'App\Http\Controllers\Admin\changePasswordController@index');
    // Route::post('/save_change_password', 'App\Http\Controllers\Admin\changePasswordController@save_change_password');
    Route::get('admin/message', 'App\Http\Controllers\Admin\messageController@index');
    Route::post('/save_change_password', 'App\Http\Controllers\Admin\changePasswordController@save_change_password');

    Route::get('admin/message', 'App\Http\Controllers\Admin\messageController@index');

    Route::get('admin/payment', 'App\Http\Controllers\Admin\paymentController@index');
    Route::post('paymentDate', 'App\Http\Controllers\Admin\paymentController@update');

    Route::get('admin/data', 'App\Http\Controllers\Admin\DataController@index');
    Route::get('alldata', 'App\Http\Controllers\Admin\DataController@get');
    //Route::get('alldata', 'App\Http\Controllers\Admin\DataController@get');
    Route::get('get_tables/{user_id}', 'App\Http\Controllers\Admin\DataController@get_tables');
    Route::get('get_table_data/{table_id}', 'App\Http\Controllers\Admin\DataController@get_table_data');
    Route::get('get_paricular_data/{data_id}', 'App\Http\Controllers\Admin\DataController@get_paricular_data');
    Route::post('update_particular_data', 'App\Http\Controllers\Admin\DataController@update_particular_data');
    Route::get('delete_particular_data/{data_id}', 'App\Http\Controllers\Admin\DataController@delete_particular_data');

    Route::get('admin/add_tagging', 'App\Http\Controllers\Admin\TagingController@index');
    Route::post('addTaging', 'App\Http\Controllers\Admin\TagingController@addTaging');
    Route::post('deleteTag/{id}', 'App\Http\Controllers\Admin\TagingController@deleteTaging');
    Route::get('admin/getTagging/{id}', 'App\Http\Controllers\Admin\TagingController@getTaging');
    Route::get('last_sub_topic/{id}', 'App\Http\Controllers\Admin\TagingController@getLastSubTopic');
    Route::get('admin/view_tagging', 'App\Http\Controllers\Admin\TagingController@view');
    Route::post('updateTaging', 'App\Http\Controllers\Admin\TagingController@updateTaging');
    Route::get('get_states', 'App\Http\Controllers\Admin\TagingController@states');
    Route::get('get_districts/{id}', 'App\Http\Controllers\Admin\TagingController@districts');
    Route::get('get_tables', 'App\Http\Controllers\Admin\TagingController@get_tables');

    Route::get('admin/compare', 'App\Http\Controllers\Admin\CompareController@index');
    Route::post('get_data/{id}', 'App\Http\Controllers\Admin\CompareController@get');
    Route::post('ApproveData', 'App\Http\Controllers\Admin\CompareController@ApproveData');

    Route::get('admin/combine', 'App\Http\Controllers\Admin\CombineController@index');
    Route::post('get_combine_data', 'App\Http\Controllers\Admin\CombineController@get_combine_data');
    Route::post('combine_data', 'App\Http\Controllers\Admin\CombineController@combine_data');
    Route::get('getDataTable/{data_id}', 'App\Http\Controllers\Admin\CombineController@getDataTable');
    Route::post('updateDataTable', 'App\Http\Controllers\Admin\CombineController@updateDataTable');
    Route::get('delete_merge_data/{data_id}', 'App\Http\Controllers\Admin\CombineController@delete_merge_data');
    Route::post('approveMergeTableAndData', 'App\Http\Controllers\Admin\CombineController@approveMergeTableAndData');
    Route::post('unApproveMergeTableAndData', 'App\Http\Controllers\Admin\CombineController@unApproveMergeTableAndData');

    Route::get('admin/test', 'App\Http\Controllers\Admin\Scrape\mandiPriceController@test');
    Route::get('admin/mandi-price', 'App\Http\Controllers\Admin\Scrape\mandiPriceController@index');
    Route::get('all_mandi_price_commodity', 'App\Http\Controllers\Admin\Scrape\mandiPriceController@all_mandi_price_commodity');
    Route::post('mandiPriceScrapeData', 'App\Http\Controllers\Admin\Scrape\mandiPriceController@scrapeData');
    // Route::get('getDataSet', 'App\Http\Controllers\Admin\scrapeController@getDataSet');
    // Route::post('add_website', 'App\Http\Controllers\Admin\scrapeController@add_website');
    // Route::post('upload_scraping_excel', 'App\Http\Controllers\Admin\scrapeController@upload_scraping_excel');
    // Route::post('updateScrappingTable', 'App\Http\Controllers\Admin\scrapeController@updateScrappingTable');
    // Route::get('admin/economy', 'App\Http\Controllers\Admin\scrapeController@economy');
    // Route::post('economy_data', 'App\Http\Controllers\Admin\scrapeController@economy_data');
    Route::post('deleteMandiPriceCommodity', 'App\Http\Controllers\Admin\Scrape\mandiPriceController@deleteMandiPriceCommodity');
    Route::get('getMandiPriceCommodities', 'App\Http\Controllers\Admin\Scrape\mandiPriceController@getMandiPriceCommodities');

    Route::get('admin/mandi-price-data', 'App\Http\Controllers\Admin\Scrape\mandiPriceControllerData@index');
    Route::get('getMandiPriceCommodityData', 'App\Http\Controllers\Admin\Scrape\mandiPriceControllerData@mandiPriceData');
    // Route::post('getMandiPriceCommodityData', 'App\Http\Controllers\Admin\Scrape\mandiPriceControllerData@getMandiPriceCommodityData');
    Route::post('getMandiPriceCommoditySearch', 'App\Http\Controllers\Admin\Scrape\mandiPriceControllerData@getMandiPriceCommoditySearch');
    Route::post('getCommodityNameMarket', 'App\Http\Controllers\Admin\Scrape\mandiPriceControllerData@getCommodityNameMarket');
    Route::post('getCommodityNameGrade', 'App\Http\Controllers\Admin\Scrape\mandiPriceControllerData@getCommodityNameGrade');

    Route::get('admin/commodities', 'App\Http\Controllers\Admin\Scrape\commodityController@index');
    Route::get('/allCommodity', 'App\Http\Controllers\Admin\Scrape\commodityController@allCommodity');
    Route::post('/getCommodity', 'App\Http\Controllers\Admin\Scrape\commodityController@getCommodity');
    Route::post('/updateCommodity', 'App\Http\Controllers\Admin\Scrape\commodityController@updateCommodity');
    Route::post('/addCommodity', 'App\Http\Controllers\Admin\Scrape\commodityController@addCommodity');
    Route::post('/deleteCommodity', 'App\Http\Controllers\Admin\Scrape\commodityController@deleteCommodity');

    // category
    Route::get('admin/category', 'App\Http\Controllers\Admin\Scrape\categoryController@index');
    Route::get('/allCategory', 'App\Http\Controllers\Admin\Scrape\categoryController@allCategory');
    Route::get('/getCategory/{id}', 'App\Http\Controllers\Admin\Scrape\categoryController@getCategory');
    Route::post('/updateCategory', 'App\Http\Controllers\Admin\Scrape\categoryController@updateCategory');
    Route::post('/addCategory', 'App\Http\Controllers\Admin\Scrape\categoryController@addCategory');
    Route::get('/deleteCategory/{id}', 'App\Http\Controllers\Admin\Scrape\categoryController@deleteCategory');
    Route::get('/category/changeStatus/{id}', 'App\Http\Controllers\Admin\Scrape\categoryController@changeStatus');

    Route::get('admin/crop-production', 'App\Http\Controllers\Admin\Scrape\cropProductionController@index')->name('cropProduction.show');
    Route::post('save-crop-production', 'App\Http\Controllers\Admin\Scrape\cropProductionController@save');
    Route::post('deleteCrop', 'App\Http\Controllers\Admin\Scrape\cropProductionController@delete');
    Route::get('getAllCommodities', 'App\Http\Controllers\Admin\Scrape\cropProductionController@getAllCommodities');
    Route::get('admin/crop-production-data', 'App\Http\Controllers\Admin\Scrape\cropProductionDataController@index');
    Route::get('getCropProductionData', 'App\Http\Controllers\Admin\Scrape\cropProductionDataController@getCropProductionData');
    Route::get('getAllSeason', 'App\Http\Controllers\Admin\Scrape\cropProductionController@getAllSeason');
    Route::post('cropProductionSearch', 'App\Http\Controllers\Admin\Scrape\cropProductionDataController@cropProductionSearch');


    Route::get('admin/testimonial', 'App\Http\Controllers\Admin\Testimonial\TestimonialController@index');
    Route::post('save_testimonial', 'App\Http\Controllers\Admin\Testimonial\TestimonialController@save');

    Route::get('admin/slider', 'App\Http\Controllers\Admin\Slider\SliderController@slider');
    Route::get('getAllSliders', 'App\Http\Controllers\Admin\Slider\SliderController@getAllSliders');
    Route::post('addSlider', 'App\Http\Controllers\Admin\Slider\SliderController@addSlider');
    Route::post('getSlider', 'App\Http\Controllers\Admin\Slider\SliderController@getSlider');
    Route::post('editSlider', 'App\Http\Controllers\Admin\Slider\SliderController@editSlider');
    Route::post('deleteSlider', 'App\Http\Controllers\Admin\Slider\SliderController@deleteSlider');

    Route::get('admin/current_topics', 'App\Http\Controllers\Admin\Infographics\InfographicsController@current_topics');
    Route::get('admin/industries', 'App\Http\Controllers\Admin\Infographics\InfographicsController@industries');
    Route::get('admin/infographics', 'App\Http\Controllers\Admin\Infographics\InfographicsController@infographics');

    Route::post('addCurrentTopic', 'App\Http\Controllers\Admin\Infographics\InfographicsController@addCurrentTopic');
    Route::get('getAllCurrentTopics', 'App\Http\Controllers\Admin\Infographics\InfographicsController@getAllCurrentTopics');
    Route::post('deleteCurrentTopic', 'App\Http\Controllers\Admin\Infographics\InfographicsController@deleteCurrentTopic');
    Route::post('getCurrentTopic', 'App\Http\Controllers\Admin\Infographics\InfographicsController@getCurrentTopic');
    Route::post('editCurrentTopic', 'App\Http\Controllers\Admin\Infographics\InfographicsController@editCurrentTopic');

    Route::post('addIndustry', 'App\Http\Controllers\Admin\Infographics\InfographicsController@addIndustry');
    Route::get('getAllIndustry', 'App\Http\Controllers\Admin\Infographics\InfographicsController@getAllIndustry');
    Route::post('deleteIndustry', 'App\Http\Controllers\Admin\Infographics\InfographicsController@deleteIndustry');
    Route::post('getIndustry', 'App\Http\Controllers\Admin\Infographics\InfographicsController@getIndustry');
    Route::post('editIndustry', 'App\Http\Controllers\Admin\Infographics\InfographicsController@editIndustry');

    Route::post('addInfographics', 'App\Http\Controllers\Admin\Infographics\InfographicsController@addInfographics');
    Route::get('getAllInfographics', 'App\Http\Controllers\Admin\Infographics\InfographicsController@getAllInfographics');
    Route::post('deleteInfographics', 'App\Http\Controllers\Admin\Infographics\InfographicsController@deleteInfographics');
    Route::post('getInfographics', 'App\Http\Controllers\Admin\Infographics\InfographicsController@getInfographics');
    Route::post('editInfographics', 'App\Http\Controllers\Admin\Infographics\InfographicsController@editInfographics');
    Route::post('infographicsHomePage', 'App\Http\Controllers\Admin\Infographics\InfographicsController@infographicsHomePage');
});
