<?php

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;
use Smalot\PdfParser\Parser;
use App\Models\Users;
use App\Models\AddData;
use App\Models\Topic;
use App\Models\AddFinalData;
use App\Models\AddTable;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\TableTopic;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Mail;
use Google\Client;
use Google\Service\Drive;
//use Google\Service\Drive\Permission;
use Google\Drive\Service;
use Illuminate\Support\Facades\Session;


class ReviewWorkController extends Controller
{
    public function check_user_designation()
    {
        $user_id = session('login.user_id');
        if ($user_id != 1) {
            $designation = DB::select('select designation_id from `permission` where user_id = ?', array($user_id));
            return $designation[0]->designation_id;
        } else {
            return 0;
        }
    }
    public function check_table_status($table_id)
    {
        //$table = AddFinalData::select('table_id')->where('id', $table_id)->get();
        $status = AddTable::select('status')->where('id', $table_id)->get();
        return $status[0]->status;
    }
    public function get_table_id($id)
    {
        $table = AddFinalData::select('table_id')->where('data_id', $id)->get();
        return $table[0]->table_id;
    }
    public function table_issued_by($table_id)
    {
        $table_issued_by = AddTable::select('table_issued_by')->where('id', $table_id)->get();
        return $table_issued_by[0]->table_issued_by;
    }
    public function ReviewWork(Request $r)
    {
        \DB::statement("SET SQL_MODE=''");
        $status = $r->get('status');
        //return $status;
        $designation = $this->check_user_designation();
        $data = session('login.user_id');
        $users = DB::select("select * from `varistats_users` where id !='1'");

        if ($designation == 0 || $designation == 1) {

            $work = DB::table('assign_work_link')
                ->join('assign_work', 'assign_work_link.assign_work_id', '=', 'assign_work.id')
                ->join('varistats_users', 'assign_work.users', '=', 'varistats_users.id')
                ->join('work_fields', 'assign_work.work_field_id', '=', 'work_fields.id')
                ->join('work_links', 'assign_work_link.work_link_id', '=', 'work_links.id')
                ->join('tables', 'tables.assign_work_link_id', '=', 'assign_work_link.id')
                ->select('assign_work_link.id', 'varistats_users.name', 'work_fields.website', 'work_links.name as link_name', 'assign_work.assigned_date')
                ->selectRaw('count(tables.assign_work_link_id) as total_table')
                ->orderBy('assign_work.assigned_date', 'DESC')
                //->where('tables.status', '=', $status)
                ->groupBy('assign_work_link.id')
                // ->distinct()
                // ->count('tables.assign_work_link_id')
                ->get();
            foreach ($work as $key => $value) {
                $approvedTable = [];
                $disapprovedTable = [];
                $data = DB::table('tables')->select('status')->where('assign_work_link_id', $value->id)->get();
                foreach ($data as $key1 => $value1) {
                    if ($value1->status == 1) {
                        $approvedTable[] = $value1->status;
                    } else if ($value1->status == 0) {
                        $disapprovedTable[] = $value1->status;
                    }
                }
                $value->approvedTable = count($approvedTable);
                $value->disapprovedTable = count($disapprovedTable);
                //return $data;
            }
            if ($status == '') {
                return view('admin.header') . view('admin.review_work', ['review' => $work, 'users' => $users]) . view('admin.footer');
            }
            $newWork = [];
            foreach ($work as $key => $value) {
                //return $value;
                if ($status == 1 && ($value->total_table == $value->approvedTable)) {
                    $newWork[] = $value;
                } else if ($status == 0 && ($value->total_table == $value->disapprovedTable)) {
                    $newWork[] = $value;
                } else if ($status == 2 && ($value->total_table != $value->approvedTable) && ($value->total_table != $value->disapprovedTable)) {
                    $newWork[] = $value;
                }
            }
            //return $newWork;
            return view('admin.header') . view('admin.review_work', ['review' => $newWork, 'users' => $users]) . view('admin.footer');
            //return $work;

        } else {
            $work = DB::table('assign_work_link')
                ->join('assign_work', 'assign_work_link.assign_work_id', '=', 'assign_work.id')
                ->join('varistats_users', 'assign_work.users', '=', 'varistats_users.id')
                ->join('work_fields', 'assign_work.work_field_id', '=', 'work_fields.id')
                ->join('work_links', 'assign_work_link.work_link_id', '=', 'work_links.id')
                ->leftJoin('tables', 'tables.assign_work_link_id', '=', 'assign_work_link.id')
                ->select('assign_work_link.id', 'varistats_users.name', 'work_fields.website', 'work_links.name as link_name', 'assign_work.assigned_date')
                ->selectRaw('count(tables.assign_work_link_id) as total_table')
                ->groupBy('assign_work_link.id')
                ->orderBy('assign_work.assigned_date', 'DESC')
                ->where('varistats_users.id', '=', $data)

                ->get();
            //return $work;
            foreach ($work as $key => $value) {
                $approvedTable = [];
                $disapprovedTable = [];
                $data = DB::table('tables')->select('status')->where('assign_work_link_id', $value->id)->get();
                foreach ($data as $key1 => $value1) {
                    if ($value1->status == 1) {
                        $approvedTable[] = $value1->status;
                    } else if ($value1->status == 0) {
                        $disapprovedTable[] = $value1->status;
                    }
                }
                $value->approvedTable = count($approvedTable);
                $value->disapprovedTable = count($disapprovedTable);
                //return $data;
            }
            if ($status == '') {
                return view('admin.header') . view('admin.review_work', ['review' => $work, 'users' => $users]) . view('admin.footer');
            }
            $newWork = [];
            foreach ($work as $key => $value) {
                //return $value;
                if ($status == 1 && ($value->total_table == $value->approvedTable)) {
                    $newWork[] = $value;
                } else if ($status == 0 && ($value->total_table == $value->disapprovedTable)) {
                    $newWork[] = $value;
                } else if ($status == 2 && ($value->total_table != $value->approvedTable) && ($value->total_table != $value->disapprovedTable)) {
                    $newWork[] = $value;
                }
            }
            return view('admin.header') . view('admin.review_work', ['review' => $newWork, 'users' => $users]) . view('admin.footer');
        }
        //return $work;



    }
    public function update(Request $r)
    {
        $workId = $r->input('workId');
        $linkId = $r->input('linkId');
        $status = $r->input('status');
        $start_date = $r->input('start_date');
        $complete_date = $r->input('complete_date');
        if (DB::update('update `assign_work_link` set status = ?,start_date = ?, complete_date = ? where assign_work_id = ? and work_link_id = ?', [$status, $start_date, $complete_date, $workId, $linkId])) {
            return json_encode(array("message" => "Updated Successfully", "status" => true));
        }
    }

    public function view_work(Request $r)
    {
        $id = $r->input('id');
        Session::put('id', '');
        Session::put('id', $id);
    }

    // count pdf pages
    function count_pdf(Request $r)
    {
        //echo "test";die;
        $page = $r->input('pdfPageCount');
        $data = Users::select('pdfCount')->where('id', session('login.user_id'))->get();
        $total = $page + $data[0]->pdfCount;
        Users::where('id', session('login.user_id'))->update(['pdfCount' => $total]);
        //return $page;
    }

    public function get_work(Request $r)
    {
        $totalPdf = Users::sum('pdfCount');
        //$path = 'https://agricoop.nic.in/sites/default/files/Annual_rpt_201617_E.pdf';
        //$totalPdf = $this->count_pdf($path);


        //return $r->all();die;
        //dd(session()->all());
        $id = $r->session()->get('id');
        $work = DB::table('assign_work_link')
            ->join('work_links', 'assign_work_link.work_link_id', '=', 'work_links.id')
            ->join('assign_work', 'assign_work_link.assign_work_id', '=', 'assign_work.id')
            ->join('work_fields', 'assign_work.work_field_id', '=', 'work_fields.id')
            ->join('varistats_users', 'assign_work.users', '=', 'varistats_users.id')
            ->select('varistats_users.name as username', 'work_fields.website', 'work_fields.acronym', 'work_fields.org_name', 'work_fields.sector', 'work_fields.domain', 'work_links.link', 'work_links.name as link_name', 'work_links.description', 'work_links.download_excel', 'assign_work.assigned_date')
            ->where('assign_work_link.id', '=', $id)
            ->get();
        //return $work;


        $client = new Client();
        $client->setClientId('1016165829239-ndo0vg766jenqnp629rv0o5ufngtgn8s.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(url('/') . '/admin/get_work');
        $code = $r->code;
        $access_token = $client->fetchAccessTokenWithAuthCode($code);
        if (isset($access_token['access_token'])) {
            $accessToken = $access_token['access_token'];
        } else {
            $accessToken = '';
        }
        //return $table;
        return view('admin.header') . view('admin.get_work', ['work' => $work, "assignLinkId" => $id, 'accessToken' => $accessToken, 'totalPdf' => $totalPdf]) . view('admin.footer');
    }
    public function showTables(Request $r)
    {
        $id = $r->session()->get('id');
        $searchTag = $r->input('searchTag');
        //return $searchTag;die;
        $searchStatus = $r->input('searchStatus');
        $searchIssueBy = $r->input('searchIssueBy');
        // if($searchTag == 0){
        //     return AddTable::with('tableTopic')->select('*')->where('assign_work_link_id', $id)->get();
        // }else if($searchTag == 1){
        //     return AddTable::with('tableTopicExist')->select('*')->where('assign_work_link_id', $id)->get();
        // }
        if ($searchStatus != '') {
            return AddTable::with('tableTopic')->select('*')->where('assign_work_link_id', $id)->where('status', $searchStatus)->get();
        }
        if ($searchIssueBy != '') {
            return AddTable::with('tableTopic')->select('*')->where('assign_work_link_id', $id)->where('table_issued_by', $searchIssueBy)->get();
        }
        if ($searchTag != '' && $searchTag == 1) {

            $data = DB::select('select * from tables WHERE EXISTS (select * from tablesTopics where tables.id=tablesTopics.table_id and tables.assign_work_link_id = ?)', [$id]);
            foreach ($data as $key => $value) {
                $data[$key]->table_topic = ['1'];
            }
            return $data;
        } else if ($searchTag != '' && $searchTag == 0) {
            $data = DB::select('select * from tables where id not in (select table_id from tablesTopics) and assign_work_link_id = ?', [$id]);
            foreach ($data as $key => $value) {
                $data[$key]->table_topic = [];
            }
            return $data;
        }
        return AddTable::with('tableTopic')->select('*')->where('assign_work_link_id', $id)->get();
        //return $table;
    }

    public function addTable(Request $r)
    {
        $work_field = $r->input('work_field');
        $workId = $r->input('work');
        $linkId = $r->input('link');
        $name = $r->input('name');
        $rows = $r->input('rows');
        $columns = $r->input('columns');

        $r->validate([
            'name' => 'required',
            'rows' => 'required|numeric',
            'columns' => 'required|numeric'
        ]);
        $data = array('assign_work_id' => $workId, 'work_field_id' => $work_field, 'work_link_id' => $linkId, 'name' => $name, 'rows' => $rows, 'columns' => $columns);
        DB::table('tables')->insert($data);
        return redirect('admin/get_work/' . $workId . '/' . $linkId);
    }
    public function getTable(Request $r, $id)
    {
        $data = DB::select("select * from tables where id=?", array($id));
        echo json_encode($data);
    }

    public function addRemark(Request $r)
    {
        $id = $r->input('table_id');
        $email = $r->input('email');
        $remark = $r->input('remark');
        //return $remark;
        if (DB::update("update `tables` set `remark` = ? where `id` =?", [$remark, $id])) {
            // $data = array('name' => $remark);

            // Mail::send(['text' => 'mail'], $data, function ($message) use ($email) {
            //     $message->to('satyam.shivam@corewebconnections.com', 'Varilytics')->subject('Varilytics Remark');
            //     $message->from('satyamshivam570@gmail.com', 'Varilytics');
            // });
            //echo "Basic Email Sent. Check your inbox."; 
            return redirect('admin/table_data?table_id=' . $id);
        }
    }
    public function viewRemark($table_id)
    {
        $data = DB::select('select `remark` from `tables` where `id` = ?', [$table_id]);
        echo json_encode($data);
    }
    public function deleteTable($table_id)
    {
        $status = $this->check_table_status($table_id);
        $designation = $this->check_user_designation();
        $issued_by = $this->table_issued_by($table_id);
        if ($designation == 2  && $status == 0 && $issued_by == 0) { // by data operato) {
            AddTable::where('id', $table_id)->delete();
            AddData::where('table_id', $table_id)->delete();
            AddFinalData::where('table_id', $table_id)->delete();
            echo json_encode(array('message' => 'Table Deleted Successfully', 'status' => true));
        } else if ($designation == 1  && $status == 1 && $issued_by == 0) { // by manager
            AddTable::where('id', $table_id)->delete();
            AddData::where('table_id', $table_id)->delete();
            AddFinalData::where('table_id', $table_id)->delete();
            echo json_encode(array('message' => 'Table Deleted Successfully', 'status' => true));
        } else if ($designation == 0  && $status == 1 && ($issued_by == 1 || $issued_by == 2)) {
            AddTable::where('id', $table_id)->delete();
            AddData::where('table_id', $table_id)->delete();
            AddFinalData::where('table_id', $table_id)->delete();
            echo json_encode(array('message' => 'Table Deleted Successfully', 'status' => true));
        } else {
            echo json_encode(array('message' => 'You have no permission to delete this', 'status' => true));
        }
    }


    public function updateTable(Request $r)
    {
        // $workId = $r->input('work');
        // $webId = $r->input('web');
        // $linkId = $r->input('link');
        $table_id = $r->input('upId');
        $name = $r->input('name');
        $rows = $r->input('rows');
        $columns = $r->input('columns');
        $source = $r->input('source');

        $status = $this->check_table_status($table_id);
        $issued_by = $this->table_issued_by($table_id);
        $designationId = $this->check_user_designation();
        if ($designationId == 2  && $status == 0) { // by data operator
            $data = array('name' => $name, 'rows' => $rows, 'columns' => $columns, 'source' => $source, 'id' => $table_id);
            AddTable::where('id', $table_id)->update($data);
            return ['status' => true, 'message' => 'Table Updated Successfully'];
        } elseif ($designationId == 1 && $status == 1 && $issued_by == 0) { // by manager
            $data = array('name' => $name, 'rows' => $rows, 'columns' => $columns, 'source' => $source, 'id' => $table_id);
            AddTable::where('id', $table_id)->update($data);
            return ['status' => true, 'message' => 'Table Updated Successfully'];
        } elseif ($designationId == 0 && $status == 1 && ($issued_by == 1 || $issued_by == 2)) { // by admin
            $data = array('name' => $name, 'rows' => $rows, 'columns' => $columns, 'source' => $source, 'id' => $table_id);
            AddTable::where('id', $table_id)->update($data);
            return ['status' => true, 'message' => 'Table Updated Successfully'];
        } else {
            return ['status' => true, 'message' => 'Now you have no permission to update table'];
        }
    }
    public function publish(Request $r)
    {
        $web_id = $r->input('web_id');
        $link_id = $r->input('link_id');
        $status_id = $r->input('status_id');
        //DB::table('data')->update(array('status_id' => $status_id));
        DB::table('data')->where('web_id', $web_id)
            ->where('link_id', $link_id)
            ->update(array('status' => $status_id));
        echo json_encode(array('status' => true));
    }

    public function upload_pdf(Request $r)
    {
        $pdf = $r->file('pdf');


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://text-stock.com/pdf-to-xlx',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('pdf' => $pdf),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    public function get_table_data(Request $r)
    {
        $table_id = $r->query('table_id');
        $designationId = $this->check_user_designation();
        if ($designationId == 2) {
            $data = AddData::with('table', 'user', 'finalData')->select('*')->where('table_id', $table_id)->get();
        } else {
            $data = AddFinalData::with('table', 'user')->select('*')->where('table_id', $table_id)->get();
        }
        //return $data;
        //return $data[0]['finalData']->status;
        return view('admin.header') . view('admin.table_data', ['data' => $data]) . view('admin.footer');
        //return array('data' => $data);
    }
    public function getSingleData($data_id)
    {
        if ($this->check_user_designation() == 2) {
            $data = AddData::select('id', 'values')->where('id', $data_id)->get();
        } else {
            $data = AddFinalData::select('id', 'values')->where('id', $data_id)->get();
        }
        return json_encode(['data' => $data]);
    }
    public function updateData(Request $r)
    {
        // $validator = Validator::make($r->all(), [
        //     'values' => 'required'
        // ]);
        $data_id = $r->input('data_id');
        $unit = $r->input('values');
        $designation = $this->check_user_designation();
        $table_id = $r->input('table_id');
        $status = $this->check_table_status($table_id);
        $issued_by = $this->table_issued_by($table_id);
        //return $table_id;
        //if ($validator->passes()) {

        if (($designation == 2) && $status == 0) { // data operator
            AddData::where('id', $data_id)->update(['values' => json_encode($unit)]);
            AddFinalData::where('data_id', $data_id)->update(['values' => json_encode($unit)]);
            return json_encode(array("message" => "Updated Table Data Successfully", "status" => true));
        } elseif ($designation == 1  && $status == 1 && $issued_by == 0) { // by manager
            AddFinalData::where('id', $data_id)->update(['values' => json_encode($unit)]);
            return json_encode(array("message" => "Updated Table Data Successfully", "status" => true));
        } elseif ($designation == 0  && $status == 1 && $issued_by == 1) { // admin
            AddFinalData::where('id', $data_id)->update(['values' => json_encode($unit)]);
            return json_encode(array("message" => "Updated Table Data Successfully", "status" => true));
        } else {
            return json_encode(array("message" => "You have no permission to update this", "status" => true));
        }
        // }
        // return response()->json(['error' => $validator->errors()]);
    }
    public function deleteData($data_id)
    {
        $designation = $this->check_user_designation();
        $table_id = $this->get_table_id($data_id);
        $status = $this->check_table_status($table_id);
        $issued_by = $this->table_issued_by($table_id);
        if (($designation == 0 && $status == 1 && $issued_by == 1) || $issued_by == 2) { // by admin
            //AddData::where('id', $data_id)->delete();
            AddFinalData::where('data_id', $data_id)->delete();
            return json_encode(array("message" => "Deleted successfully", "status" => true));
        } elseif ($designation == 2 && $status == 0) { // by operator
            AddData::where('id', $data_id)->delete();
            AddFinalData::where('data_id', $data_id)->delete();
            return json_encode(array("message" => "Deleted successfully", "status" => true));
        } else {
            return json_encode(array("message" => "You have no permission to delete this", "status" => true));
        }
    }
    public function checkMergeAndScrape($tableId)
    {
        return AddTable::select('merged_table', 'scrape')->where('id', $tableId)->get();
    }
    public function ApproveTable(Request $r)
    {
        $table_id = $r->input('approve');
        $mergeAndScrape = $this->checkMergeAndScrape($table_id);
        $merge = $mergeAndScrape[0]->merged_table;
        $scrape = $mergeAndScrape[0]->scrape;
        $designation = $this->check_user_designation();
        $status = $this->check_table_status($table_id);
        $issued_by = $this->table_issued_by($table_id);
        $this->sendAdminMail($table_id, $status, $designation, $issued_by);
        if ($merge == 0 && $scrape == 0) {
            if ($designation == 2 && $status == 0) { // by operator
                AddTable::where('id', $table_id)->update(['status' => '1', 'table_issued_by' => '0', 'submission_date' => date('Y-m-d H:i:s')]);
                return json_encode(array("message" => "Table Approved Successfully", "status" => true));
            } elseif ($designation == 0 && $status == 1 && $issued_by == 1) { // by admin
                AddTable::where('id', $table_id)->update(['table_issued_by' => '2']);
                return json_encode(array("message" => "Table Approved Successfully", "status" => true));
            } elseif ($designation == 1 && $status == 1 && $issued_by == 0) { // by manager
                AddTable::where('id', $table_id)->update(['table_issued_by' => 1]);
                return json_encode(array("message" => "Table Approved Successfully", "status" => true));
            } else {
                return json_encode(array("message" => "Now you have no permission to approve this table", "status" => true));
            }
        } else {
            AddTable::where('id', $table_id)->update(['table_issued_by' => '2', 'status' => 1]);
            return json_encode(array("message" => "Table Approved Successfully", "status" => true));
        }
    }
    public function sendAdminMail($table_id, $status, $designation, $issued_by)
    {
        $baseUrl = url('/');
        $url = $baseUrl . '/admin/table_data?table_id=' . $table_id;
        if ($status == 1 && $designation == 1 && $issued_by == 0) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://rapidprod-sendgrid-v1.p.rapidapi.com/mail/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'personalizations' => [
                        [
                            'to' => [
                                [
                                    'email' => 'sanvali.kaushik@gmail.com'
                                ]
                            ],
                            'subject' => 'Varilytics'
                        ]
                    ],
                    'from' => [
                        'email' => 'info@varilytics.com'
                    ],
                    'content' => [
                        [
                            'type' => 'text/plain',
                            'value' => $url
                        ]
                    ]
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: rapidprod-sendgrid-v1.p.rapidapi.com",
                    "X-RapidAPI-Key: 1c84057cf9mshc304b2d7a25e130p10193bjsnebd1575b6168",
                    "content-type: application/json"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
        }
    }
    public function UnapproveTable(Request $r)
    {
        $table_id = $r->input('unapprove');
        $designation = $this->check_user_designation();
        $status = $this->check_table_status($table_id);
        $mergeAndScrape = $this->checkMergeAndScrape($table_id);
        $merge = $mergeAndScrape[0]->merged_table;
        $scrape = $mergeAndScrape[0]->scrape;
        $issued_by = $this->table_issued_by($table_id);
        // return json_encode($approveData);
        if ($merge == 0 && $scrape == 0) {
            if ($designation == 0 && $status == 1 && ($issued_by == 1 || $issued_by == 2)) { // by admin
                AddTable::where('id', $table_id)->update(['status' => '1', 'table_issued_by' => '0']);
                return json_encode(array("message" => "Table Disapproved Successfully", "status" => true));
            } elseif ($designation == 1 && $status == 1 && $issued_by == 0) { // by manager
                AddTable::where('id', $table_id)->update(['status' => '0', 'table_issued_by' => '0']);
                return json_encode(array("message" => "Table Disapproved Successfully", "status" => true));
            } else {
                return json_encode(array("message" => "Now you have no permission to dissapprove this table", "status" => true));
            }
        } else {
            AddTable::where('id', $table_id)->update(['table_issued_by' => '1', 'status' => 0]);
            return json_encode(array("message" => "Table Disapproved Successfully", "status" => true));
        }
    }
    public function DeleteAll(Request $r)
    {
        $data = $r->input('deleteAll');
        //print_r($data[0]);die;
        $table_id = $this->get_table_id($data[0]);
        //return $table_id;die;
        $status = $this->check_table_status($table_id);
        $issued_by = $this->table_issued_by($table_id);
        $designation = $this->check_user_designation();
        if (($designation == 0 && $status == 1 && $issued_by == 1) || ($designation == 2 && $status == 0)) {
            AddFinalData::whereIn('data_id', $data)->delete();
            AddData::whereIn('id', $data)->delete();
            return json_encode(array("message" => "Deleted Successfully", "status" => true));
        } else {
            return json_encode(array("message" => "You have no permission to delete this data.", "status" => true));
        }
    }
    public function changeTableStatus(Request $r)
    {
        $table_id = $r->input('table_id');
        $table_status = $r->input('status');
        $designation = $this->check_user_designation();
        $table_issued_by = $this->table_issued_by($table_id);
        //return "status={$table_status} designation={$designation} table_issued_by={$table_issued_by}";

        if ($table_status == 1 && $designation == 0 && $table_issued_by == 1) { //admin
            AddTable::where('id', $table_id)->update(['status' => '0', 'table_issued_by' => '1']);
            return json_encode(array("message" => "Table Status Changed Successfully", "status" => true));
        } elseif ($table_status == 1 && $designation == 1) { // manager

            AddTable::where('id', $table_id)->update(['status' => '0', 'table_issued_by' => '0']);
            return json_encode(array("message" => "Table Status Changed Successfully", "status" => true));
        } elseif ($table_status == 0 && $designation == 2) { // operator
            AddTable::where('id', $table_id)->update(['status' => '1', 'submission_date' => date('Y-m-d H:i:s')]);
            return json_encode(array("message" => "Table Status Changed Successfully", "status" => true));
        } else {
            return json_encode(array("message" => "Now you have no permission to change table status", "status" => true));
        }
    }

    public function tabular(Request $r)
    {
        $tableId = $r->tableId;
        $data =  AddTable::with('finalData')->select('*')->where('id', $tableId)->first();
        return view('admin.tabular', ['data' => $data]);
    }
    public function tabularData($tableId)
    {
        //$table_id = $r->tableId;
        $data =  AddTable::with('finalData')->select('*')->where('id', $tableId)->get();
        return $data;
    }
    public function addTopicTag(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'topic' => 'array|min:1',
            'topic.*' => 'distinct|min:1',
        ]);
        $table_id = $r->input('table_id');
        $topic_id = $r->input('topic');
        //return $topic_id;
        $country_id = $r->input('country');
        $state_id = $r->input('state');
        $district_id = $r->input('district');
        $block = ucwords(strtolower($r->input('block')));
        $yearMonth = $r->input('yearMonth');
        $fromYear = $r->input('fromYear');
        $toYear = $r->input('toYear');
        $smartCity_id = $r->input('smartCity');
        //return $topic_id;die;
        $status = $this->check_table_status($table_id);
        $issued_by = $this->table_issued_by($table_id);
        $designationId = $this->check_user_designation();
        if ($designationId == 0 || $designationId == 1) {
            if ($status == 1 && $issued_by == 2) {
                if ($validator->passes()) {
                    AddTable::where('id', $table_id)->update(['country_id' => $country_id, 'state_id' => $state_id, 'district_id' => $district_id, 'block' => $block, 'smartCity_id' => $smartCity_id, 'yearMonth' => $yearMonth, 'fromYear' => $fromYear, 'toYear' => $toYear]);

                    //return count($topic_id);
                    //return $topic_id;
                    if ($topic_id != null) {
                        foreach ($topic_id as $key => $value) {
                            $topicTable = new TableTopic;
                            $topicTable->topic_id = $value;
                            $topicTable->main_topic_id = $r->input('main_topic');
                            $topicTable->table_id = $table_id;
                            $topicTable->country_id = $country_id;
                            $topicTable->state_id = $state_id;
                            $topicTable->district_id = $district_id;
                            $topicTable->save();
                        }
                    }
                    return json_encode(array("message" => "Tagged successfully", "status" => true));
                } else {
                    //return response()->json(['error' => $validator->errors()]);
                }
            } else {
                return ["message" => "Table is not complete", "status" => true];
            }
        } else {
            return ["message" => "You have no permission for tagging", "status" => true];
        }
    }
    public function viewTopicTag($table_id)
    {
        $topic = AddTable::with('topic', 'country', 'state', 'district', 'smartCity')->where('id', $table_id)->get();
        $parent_topic = TableTopic::with('topic')->select('*')->where('table_id', $topic[0]->id)->get();
        foreach ($parent_topic as $key => $value) {
            $parentId = $value->topic[0]->parent_id;
            $data = Topic::select('*')->where('id', $parentId)->first();
            $value->topic[0]->mainParent = $data->name;
        }
        return ['topic' => $topic, 'parent_topic' => $parent_topic];
    }
    public function updateTopicTag(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'topic' => 'required'
        ]);
        $table_id = $r->input('table_id');
        $topic_id = $r->input('topic');
        $designationId = $this->check_user_designation();
        if ($designationId == 0 || $designationId == 1) {
            if ($validator->passes()) {
                AddTable::where('id', $table_id)->update(['topic_id' => $topic_id]);
                return json_encode(array("message" => "Tag updated successfully", "status" => true));
            } else {
                return response()->json(['error' => $validator->errors()]);
            }
        } else {
            return ["message" => "You have no permission for tagging", "status" => true];
        }
    }
    public function deleteTopicTag($table_id)
    {
        $designationId = $this->check_user_designation();
        if ($designationId == 0 || $designationId == 1) {
            AddTable::where('id', $table_id)->update(['country_id' => null, 'state_id' => null, 'district_id' => null, 'yearMonth' => null, 'block' => null]);
            TableTopic::where('table_id', $table_id)->delete();
            return ['message' => 'Tag removed successfully', 'status' => true];
        } else {
            return ["message" => "You have no permission for tagging", "status" => true];
        }
    }
    public function deleteSubTopic(Request $r)
    {
        $id = $r->input('id');
        TableTopic::where('id', $id)->delete();
        return ['status' => true, 'message' => 'Sub Topic deleted successfully'];
    }
}
