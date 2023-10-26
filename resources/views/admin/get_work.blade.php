<?php header('Access-Control-Allow-Origin: *'); ?>

<?php

$userId = session('login.user_id');
$designation = DB::select('select designation_id from `permission` where user_id = ?', array($userId));
if (isset($designation[0])) {
    $designationId = $designation[0]->designation_id;
    //echo $designationId;die;
}

?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<style>
    /* th {
            white-space: nowrap;
         } */

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    .dropdown-toggle::after {
        margin-top: 10px;
        float: right;
    }

    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .multiselect-container>li>a>label {
        padding: 3px 3px 0px 15px !important;
    }
</style>
<div class="content-wrapper" id="upScroll">
    <!-- Content Header (Page header) -->
    <?php if (Session::has('DataUpload')) { ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('DataUpload') }}
        </div>
    <?php } ?>
    <?php if (Session::has('updateTable')) { ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('updateTable') }}
        </div>
    <?php } ?>

    <?php if ($message = Session::get('fileId')) {
        $fileId = $message;

    ?>

    <?php } else {
        $fileId = '';
    } ?>
    <?php if ($message = Session::get('accessToken')) {
        $AccessToken = $message;

    ?>

    <?php } else {
        $AccessToken = '';
    } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4" style="text-align: center;">
                    <p style="color: red;">Do not refresh this page otherwise excel will not upload</p>

                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Review Work</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-body" id='update'>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>User</label>
                                <input type="text" class="form-control select2" name="username" value="<?php echo ucwords(strtolower($work[0]->username)); ?>" readonly="readonly">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Source</label>
                                <input type="text" class="form-control select2" name="website" value="<?php echo $work[0]->website; ?>" readonly="readonly">
                                <span class="text-danger error-text website_err assignerror"></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Acronym</label>
                                <input type="text" class="form-control select2" name="acronym" value="<?php echo strtoupper($work[0]->acronym); ?>" readonly="readonly">
                                <span class="text-danger error-text acronym_err assignerror"></span>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Organisation Name</label>
                                <input type="text" class="form-control select2" name="org_name" value="<?php echo $work[0]->org_name; ?>" readonly="readonly">
                                <span class="text-danger error-text org_name_err assignerror"></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sector</label>
                                <input type="text" class="form-control select2" name="sector" value="<?php echo $work[0]->sector; ?>" readonly="readonly">
                                <span class="text-danger error-text agri_sec_err assignerror"></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Domain/Topic</label>
                                <input type="text" class="form-control select2" name="domain" value="<?php echo $work[0]->domain; ?>" readonly="readonly">

                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Assigned Date</label>
                                <input type="date" class="form-control select2" name="assigned_date" value="<?php echo $work[0]->assigned_date; ?>" readonly="readonly">

                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control select2" name="description" readonly="readonly" value="<?php echo $work[0]->description; ?>">
                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Work File Link</label>

                                <input type="text" class="form-control select2" name="link" value="<?php echo $work[0]->link; ?>" readonly="readonly">

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Work File Name</label>
                                <input type="text" class="form-control select2" name="link_name" value="<?php echo ucwords(strtolower($work[0]->link_name)); ?>" readonly="readonly">

                            </div>

                        </div>
                    </div>

                    <?php
                    //echo $designationId;die;
                    if ($designationId != 0 && $designationId != 1) { ?>
                        <hr>
                        <div>
                            <div class="row">
                                <!-- <div class="col-md-2 mt-2">
                                    <button class="btn btn-primary" id="addFile">Add New Table

                                    </button>

                                </div> -->
                                <div class="col-md-3 mt-2">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#uploadExcel">Upload Multiple Worksheet Excel</button>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#uploadExcelSingleSheet">Upload Single WorkSheet Excel</button>
                                </div>
                                <!-- <div class="col-md-3 mt-2">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#pdfUpload">Convert To Excel</button>
                                </div> -->

                                <div class="col-md-3 mt-2">
                                    <a href="{{ $work[0]->download_excel }}" class="btn btn-success">Download</a>

                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="uploadExcelSingleSheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload Single Worksheet Excel</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div>
                                                <span style="font-size:15px;padding-left:30%;">Excel Formatting Rules</span>
                                                <ul>
                                                    <li>Each table must be seperate with two rows</li>
                                                    <li>First row of each table must be source</li>
                                                    <li>Second row of each table must be table name</li>
                                                    <li>Third row of each table must be column name</li>
                                                    <li>Remaining rows of each table must be data based on third row of each table columns</li>
                                                    <!-- <li>There must be no any merged columns in sheet</li> -->
                                                    <li>Excel file must be only single sheet</li>
                                                </ul>
                                            </div>
                                            <form id="uploadSingleSheet" _method="POST" _action="{{ url('upload_single_sheet')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="access_token" value="{{ $accessToken}}">
                                                <input type="hidden" name="assignLinkId" value="{{ $assignLinkId}}">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="file" class="form-control" name="excel" id="singleFile" style="border:none;" required _accept=".xlsx, .xls, .csv" />
                                                        <span class="text-danger error-text excel_err"></span>
                                                    </div>

                                                </div>
                                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success" id="submitSingleExcelFile">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="uploadExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload Multiple Worksheet Excel</h5>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div>
                                                <span style="font-size:15px;padding-left:30%;">Excel formatting rules</span>
                                                <ul>
                                                    <li>Each table must be in each worksheet</li>
                                                    <li>First row of each worksheet must be source</li>
                                                    <li>Second row of each worksheet must be table name</li>
                                                    <li>Third row of each worksheet must be column name</li>
                                                    <li>Remaining rows must be data based on third row columns</li>
                                                    <!-- <li>There must be no any merged columns in sheet</li> -->
                                                </ul>
                                            </div>


                                            <form id="upload_multiple_sheet" _method="POST" _action="{{ url('upload_multiple_sheet')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="access_token" value="{{ $accessToken}}">
                                                <input type="hidden" name="assignLinkId" value="{{ $assignLinkId}}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="file" class="form-control" name="excel" id="multipleFile" style="border:none;" required accept=".xlsx, .xls, .csv" />
                                                        <span class="text-danger error-text excel_err"></span>
                                                    </div>

                                                </div>
                                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success" id="submitExcelFile">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    <?php } ?>

                </div>

                <!-- Edit Table -->
                <div class="modal fade" id="editTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Table</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form _action="{{url('/updateTable') }}" _method="post" enctype="multipart/form-data" id="updateTable">
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="upId" id="upId">
                                    <input type="hidden" name="file" id="file">
                                    <div class="form-group">
                                        <label for="name">Name of Table</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                    <span style="color:red;">
                                        @error('up_name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label for="rows">No Of Rows</label>
                                        <input type="number" class="form-control" name="rows" id="rows" required>
                                    </div>
                                    <span style="color:red;">
                                        @error('up_rows')
                                        {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label for="columns">No Of Columns</label>
                                        <input type="number" class="form-control" name="columns" id="columns" required>
                                    </div>
                                    <span style="color:red;">
                                        @error('up_columns')
                                        {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label for="source">Source</label>
                                        <input type="text" class="form-control" name="source" id="source">
                                    </div>


                                    <!-- <div class="form-group">
                                        <label>File</label>
                                        <input type="file" class="form-control" name="up_file" id="up_file" style="border:none;">
                                    </div> -->

                                </div>
                                <div class="modal-footer" style="justify-content:unset;">
                                    <input type="submit" class="btn btn-success" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>




        </div>
    </section>
    <style>

    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" id="searchTag" name="searchTag">
                        <option value="">All Tag</option>
                        <option value="1">Tagged</option>
                        <option value="0">Not Tagged</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="searchStatus" name="searchStatus">
                        <option value="">All Status</option>
                        <option value="1">Approved</option>
                        <option value="0">Disapproved</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="searchIssueBy" name="searchIssueBy">
                        <option value="">All Issue By</option>
                        <option value="0">Operator</option>
                        <option value="1">Manager</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search .." title="Type in a name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x:auto;">
                            <table _class="table table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th style="max-width:30%;">Table Name</th>
                                        <th>Rows</th>
                                        <th>Columns</th>
                                        <th>Submission Date</th>
                                        <th style="max-width:30%;"> Source</th>
                                        <th colspan="3" style="text-align:center;">Action</th>
                                        <th>Feedback</th>
                                        <th>Status</th>
                                        <th>Issue By</th>

                                        <th colspan="4" style="text-align:center;">Tag</th>

                                    </tr>
                                </thead>


                                <tbody id="showAllTables">
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<!-- view Remark -->
<div class="modal fade" id="viewRemark" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" name="remark" id="showRemark" readonly></textarea>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Add tag -->
<div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="addTaging">
                <input type="hidden" name="table_id" id="add_table_id">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Topic:</label>
                        <div class="col-md-7">
                            <select class="form-control" id="topic" name="main_topic" required>
                                <option value="">--- Select Topic ---</option>
                            </select>
                            <span class="text-danger error-text topic_err"></span>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary" id="topicModal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button>
                            <!-- <a id="topicModal"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> -->
                            <!-- The Modal -->

                        </div>

                    </div>
                    <div id="addSubTopic">

                    </div>
                    <div id="addSubSubTopic">

                    </div>
                    <div id="addSubSubSubTopic">

                    </div>
                    <div id="addSubSubSubSubTopic">

                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Country</label>
                        <div class="col-sm-8">
                            <select class="form-control country" name="country" id="tagCountry">
                                <option value="">--- Select Country ---</option>
                            </select>
                            <span class="text-danger error-text country_err"></span>
                        </div>
                    </div>
                    <div class="addStates">

                    </div>
                    <div class="addDistricts">

                    </div>

                    <!-- DISPLAY SMART CITIES -->
                    <div class="smartCities">

                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Year & Month</label>
                        <div class="col-sm-8">
                            <input type="month" class="form-control form-control-md" name="yearMonth">
                            <span class="text-danger error-text yearMonth_err"></span>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label col-form-label-md">From Year</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control form-control-md" name="fromYear">
                            <span class="text-danger error-text fromYear_err"></span>
                        </div>
                        <label class="col-md-3 col-form-label col-form-label-md">To Year</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control form-control-md" name="toYear">
                            <span class="text-danger error-text toYear_err"></span>
                        </div>

                    </div>

                </div>
                <div class="modal-footer" style="justify-content:unset;">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Edit tag -->
<div class="modal fade" id="editTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="editTaging">
                <input type="hidden" name="table_id" id="edit_table_id">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Topic:</label>
                        <div class="col-md-8">
                            <select class="form-control" name="topic" id="editTopic">
                                <option value="">--- Select Topic ---</option>
                            </select>
                            <span class="text-danger error-text topic_err"></span>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Country</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-md country " name="country_id">
                            </select>
                            <span class="text-danger error-text country_id_err"></span>
                        </div>
                    </div>

                    <div class="addStates">

                    </div>
                    <div class="addDistricts">

                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Block/Division</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-md" name="block" value="" id="get_block" />
                            <span class="text-danger error-text block_err"></span>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Year</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-md" name="year" value="" id="get_year"" />
                            <span class=" text-danger error-text year_err"></span>
                        </div>

                    </div>
                </div>
                <div class="modal-footer" style="justify-content:unset;">
                    <input type="submit" class="btn btn-success" value="Update">
                </div>
            </form>

        </div>
    </div>
</div>
<!-- view tag -->
<div class="modal fade" id="viewTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="viewTableTag">
                    <!-- <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Topic Name</label>
                        <div class="col-md-8">
                            <input type="text" id="topic_id" readonly class="form-control">
                        </div>
                    </div> -->
                    <div id="addTopicList">

                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Country</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-md" value="" id="country" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">State</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-md" value="" id="state" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">District</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-md" value="" id="district" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Block</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-md" value="" id="block" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Smart City</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-md" value="" id="smartCity" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Year & Month</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-md" id="yearMonth" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label col-form-label-md">From Year</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control form-control-md" id="fromYear" readonly />
                        </div>
                        <label class="col-md-3 col-form-label col-form-label-md">To Year</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control form-control-md" id="toYear" readonly />
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="chooseSingleExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Upload Single File Excel</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div>
                <span style="font-size:15px;padding-left:30%;">Excel formatting rules</span>
                <ul>
                    <li>First row of each table must be source of table</li>
                    <li>Second row of each table must be table name</li>
                    <li>Third row of each table must be columnn name</li>
                    <li>Remaining rows of each table must be data based on third row of each table columns</li>
                    <li>There must be no any merged columns in sheet</li>
                    <li>Each excel file must have only single table</li>
                </ul>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <input type="file" class="form-control" name="file[]" style="border:none;" required accept=".xlsx, .xls, .csv" />
                    <span class="text-danger error-text excel_err"></span>
                </div>

            </div>
            <!-- <div class="modal-footer border-top-0 d-flex justify-content-center">
                <button type="submit" class="btn btn-success" id="submitExcelFile">Save</button>
            </div> -->

        </div>
    </div>
</div>
<!-- add topic modal-->
<div class="modal fade" id="topicModalBox">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Topic</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="saveTopic">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="topic" placeholder="Enter Topic Name">
                        <span class="text-danger error-text topic_err"></span>
                    </div>
                    <div class="modal-footer" style="justify-content:unset">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- add sub topic modal-->
<div class="modal fade" id="subTopicModalBox">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Sub Topic</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="saveSubTopic">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="parentId" id="parentId">
                    <div class="form-group">
                        <input type="text" class="form-control" name="sub_topic" placeholder="Enter Sub Topic Name">
                        <span class="text-danger error-text sub_topic_err"></span>
                    </div>
                    <div class="modal-footer" style="justify-content:unset">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
if (isset($_GET['page'])) {
    $pdfPageCount = $_GET['page'];
} else {
    $pdfPageCount = '';
}
?>
<script>
    var path = '<?php echo url('/'); ?>';

    var login_id = '<?php echo session('login.user_id'); ?>';

    $('#download_suc').hide();

    function changeStatus(table_id, status) {
        if (confirm('Are you sure you want to change table status?')) {
            $.ajax({
                url: "/changeTableStatus",
                method: "POST",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "table_id": table_id,
                    "status": status
                },
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        alert(data.message);
                        //location.reload();
                        showTables();
                    }
                }
            });
        }

    }

    function viewRemark(table_id) {

        $.ajax({
            url: "/viewRemark/" + table_id,
            method: "GET",
            dataType: "json",
            success: function(data) {
                //console.log(data);
                $("#showRemark").val(data[0].remark);
            }
        })

    }

    function deleteTable(table_id) {
        if (confirm("Are you sure you want to delete this table ?")) {
            $.ajax({
                url: "/deleteTable/" + table_id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        alert(data.message);
                        //location.reload();
                        showTables();
                    }
                }
            })
        }

    }

    $(document).ready(function() {
        // update table detail
        $("#updateTable").on("submit", function(e) {
            //alert($("#updatestatus").serialize());
            e.preventDefault();
            $.ajax({
                url: "/updateTable",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    // console.log(data);
                    if (data.status == true) {
                        alert(data.message);
                        showTables();
                        $('#editTable').modal('hide');
                    } else {

                    }

                },
            });
        });

        // update
        $("#updatestatus").on("submit", function(e) {
            //alert($("#updatestatus").serialize());
            e.preventDefault();
            $.ajax({
                url: "/update_reviewWorkStatus",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    // console.log(data);
                    if (data.status == true) {
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is updated successfully" + "</span" + "</div>");

                        location.reload();
                    } else {

                    }

                },
            });
        });

        // upload pdf
        $("#uploadPdf").on('submit', function(e) {
            //console.table($("#saveFile").serialize());
            e.preventDefault();
            //var table = $("#table_name").val();
            //alert(table);

            $.ajax({
                url: "/upload_pdf",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        window.location.href = data.file;
                        location.reload();
                        alert(data.message);
                    }

                }
            });

        });

        // upload multiple sheet excel
        $("#upload_multiple_sheet").on('submit', function(e) {
            //console.table($("#saveFile").serialize());
            e.preventDefault();
            //var table = $("#table_name").val();
            //alert(table);
            $("#error-text").empty();
            $("#submitExcelFile").text('Uploading ...');

            $.ajax({
                url: "/upload_multiple_sheet",
                method: "post",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    if (data.status == true) {

                        //location.reload();
                        showTables();
                        $('#uploadExcel').modal('hide');
                        alert(data.message);
                        //$("#download_btn").addClass("btn-success");
                        $("#submitExcelFile").text('Upload');
                        $("#multipleFile").val(null);
                        ErrorMsg(data.error);
                    } else {
                        ErrorMsg(data.error);
                        $("#submitExcelFile").text('Upload');
                        // window.location.replace(`${path}'/admin/review_work`);
                        // alert('Something wrong');
                    }

                }
            });

        });
        // upload single sheet excel
        $("#uploadSingleSheet").on('submit', function(e) {
            e.preventDefault();
            //var table = $("#table_name").val();
            //alert(table);
            $("#submitSingleExcelFile").text('Uploading ...');

            $.ajax({
                url: "/upload_single_sheet",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);

                    if (data.status == true) {

                        //location.reload();
                        showTables();
                        $('#uploadExcelSingleSheet').modal('hide');
                        alert(data.message);
                        //$("#download_btn").addClass("btn-success");
                        $("#submitSingleExcelFile").text('Upload');
                        $("#singleFile").val(null);
                    } else {
                        //ErrorMsg(data.error);
                        window.location.replace(`${path}'/admin/review_work'`);
                        alert('Something wrong');
                    }

                }
            });

        });
        // search tag
        $(document).on('change', '#searchTag', function() {
            var id = this.value;
            $('#showAllTables').empty();
            //alert(id);
            $.ajax({
                url: "/searchTag",
                method: "POST",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "searchTag": id
                },
                success: function(data) {
                    //console.log(data);
                    //console.log(data[0].tableTopicId);
                    //console.log(data[1].table_topic);
                    var showTables = '';
                    var i = 1;
                    $.each(data, function(index, val) {
                        if (val.table_issued_by == 0) {
                            tableIssue = 'Operator';
                        } else if (val.table_issued_by == 1) {
                            tableIssue = 'Manager';
                        } else {
                            tableIssue = 'Admin';
                        }
                        showTables += `<tr><td> ${i} </td>
                                            <td> ${val.name} </td>
                                            <td> ${val.rows == null ? '':val.rows} </td>
                                            <td> ${val.columns == null ? '':val.columns} </td>
                                            <td>${val.submission_date == null ? '':val.submission_date}</td>
                                            <td>${(val.source == null) ? '':val.source}</td>
                                            <td><a href="${path}/admin/table_data?table_id=${val.id}" type="button" class="btn btn-info">View</a></td>

                                            <td> <a type="button" class="btn btn-success" data-toggle="modal" data-target="#editTable" onclick="get_table(${val.id})" style="color: aliceblue;">Edit</a></td>

                                            <td><a type="button" onclick="deleteTable(${val.id})" class="btn btn-danger" style="color: aliceblue;">Delete</a></td>


                                            <td><a type="button" class="btn btn-info" data-toggle="modal" data-target="#viewRemark" onclick="viewRemark(${val.id})" style="color: aliceblue;">View</a></td>

                                            <td>
                                                    <a type="button" class="btn btn-${val.status == 0 ?'secondary':'warning'}" onclick="changeStatus(${val.id}, ${val.status})" style="color: aliceblue;">${val.status == 0 ? 'Disapproved' : 'Approved'} </a>
                                            </td>
                                            <td>
                                                  
                                                    <a type="button" class="btn btn-primary" style="color: aliceblue;"> ${tableIssue} </a>
                                                  
                                            </td>

                                            <td><a type="button" class="btn btn-success" style="color: aliceblue;" data-table_id="${val.id}" id="addTopicTag">Add</a></td>


                                            <td><a type="button" class="btn btn-info" style="color: aliceblue;" data-table_id="${val.id}" id="viewTopicTag">View</a></td>

                                            <td><a type="button" class="btn btn-danger" style="color: aliceblue;" data-table_id="${val.id}" id="deleteTopicTag">Delete</a></td>

                                            <td><input type="checkbox" ${val.table_topic.length > 0 ? 'checked' : ''}></td>
                                        </tr>`;
                        i++;
                    });

                    $('#showAllTables').append(showTables);
                }
            });
        });
        // search status
        $(document).on('change', '#searchStatus', function() {
            var id = this.value;
            $('#showAllTables').empty();
            //alert(id);
            $.ajax({
                url: "/searchStatus",
                method: "POST",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "searchStatus": id
                },
                success: function(data) {
                    //console.log(data);
                    //console.log(data[0].tableTopicId);
                    //console.log(data[1].table_topic);
                    var showTables = '';
                    var i = 1;
                    $.each(data, function(index, val) {
                        if (val.table_issued_by == 0) {
                            tableIssue = 'Operator';
                        } else if (val.table_issued_by == 1) {
                            tableIssue = 'Manager';
                        } else {
                            tableIssue = 'Admin';
                        }
                        showTables += `<tr><td> ${i} </td>
                                            <td> ${val.name} </td>
                                            <td> ${val.rows == null ? '':val.rows} </td>
                                            <td> ${val.columns == null ? '':val.columns} </td>
                                            <td>${val.submission_date == null ? '':val.submission_date}</td>
                                            <td>${(val.source == null) ? '':val.source}</td>
                                            <td><a href="${path}/admin/table_data?table_id=${val.id}" type="button" class="btn btn-info">View</a></td>

                                            <td> <a type="button" class="btn btn-success" data-toggle="modal" data-target="#editTable" onclick="get_table(${val.id})" style="color: aliceblue;">Edit</a></td>

                                            <td><a type="button" onclick="deleteTable(${val.id})" class="btn btn-danger" style="color: aliceblue;">Delete</a></td>


                                            <td><a type="button" class="btn btn-info" data-toggle="modal" data-target="#viewRemark" onclick="viewRemark(${val.id})" style="color: aliceblue;">View</a></td>

                                            <td>
                                                    <a type="button" class="btn btn-${val.status == 0 ?'secondary':'warning'}" onclick="changeStatus(${val.id}, ${val.status})" style="color: aliceblue;">${val.status == 0 ? 'Disapproved' : 'Approved'} </a>
                                            </td>
                                            <td>
                                                  
                                                    <a type="button" class="btn btn-primary" style="color: aliceblue;"> ${tableIssue} </a>
                                                  
                                            </td>

                                            <td><a type="button" class="btn btn-success" style="color: aliceblue;" data-table_id="${val.id}" id="addTopicTag">Add</a></td>


                                            <td><a type="button" class="btn btn-info" style="color: aliceblue;" data-table_id="${val.id}" id="viewTopicTag">View</a></td>

                                            <td><a type="button" class="btn btn-danger" style="color: aliceblue;" data-table_id="${val.id}" id="deleteTopicTag">Delete</a></td>

                                            <td><input type="checkbox" ${val.table_topic.length > 0 ? 'checked' : ''}></td>
                                        </tr>`;
                        i++;
                    });

                    $('#showAllTables').append(showTables);

                }
            });
        });

        // search issue by
        $(document).on('change', '#searchIssueBy', function() {
            var id = this.value;
            $('#showAllTables').empty();
            //alert(id);
            $.ajax({
                url: "/searchIssueBy",
                method: "POST",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "searchIssueBy": id
                },
                success: function(data) {
                    console.log(data);
                    //console.log(data[0].tableTopicId);
                    //console.log(data[1].table_topic);
                    var showTables = '';
                    var i = 1;
                    $.each(data, function(index, val) {
                        if (val.table_issued_by == 0) {
                            tableIssue = 'Operator';
                        } else if (val.table_issued_by == 1) {
                            tableIssue = 'Manager';
                        } else {
                            tableIssue = 'Admin';
                        }
                        showTables += `<tr><td> ${i} </td>
                                            <td> ${val.name} </td>
                                            <td> ${val.rows == null ? '':val.rows} </td>
                                            <td> ${val.columns == null ? '':val.columns} </td>
                                            <td>${val.submission_date == null ? '':val.submission_date}</td>
                                            <td>${(val.source == null) ? '':val.source}</td>
                                            <td><a href="${path}/admin/table_data?table_id=${val.id}" type="button" class="btn btn-info">View</a></td>

                                            <td> <a type="button" class="btn btn-success" data-toggle="modal" data-target="#editTable" onclick="get_table(${val.id})" style="color: aliceblue;">Edit</a></td>

                                            <td><a type="button" onclick="deleteTable(${val.id})" class="btn btn-danger" style="color: aliceblue;">Delete</a></td>


                                            <td><a type="button" class="btn btn-info" data-toggle="modal" data-target="#viewRemark" onclick="viewRemark(${val.id})" style="color: aliceblue;">View</a></td>

                                            <td>
                                                    <a type="button" class="btn btn-${val.status == 0 ?'secondary':'warning'}" onclick="changeStatus(${val.id}, ${val.status})" style="color: aliceblue;">${val.status == 0 ? 'Disapproved' : 'Approved'} </a>
                                            </td>
                                            <td>
                                                  
                                                    <a type="button" class="btn btn-primary" style="color: aliceblue;"> ${tableIssue} </a>
                                                  
                                            </td>

                                            <td><a type="button" class="btn btn-success" style="color: aliceblue;" data-table_id="${val.id}" id="addTopicTag">Add</a></td>


                                            <td><a type="button" class="btn btn-info" style="color: aliceblue;" data-table_id="${val.id}" id="viewTopicTag">View</a></td>

                                            <td><a type="button" class="btn btn-danger" style="color: aliceblue;" data-table_id="${val.id}" id="deleteTopicTag">Delete</a></td>

                                            <td><input type="checkbox" ${val.table_topic.length > 0 ? 'checked' : ''}></td>
                                        </tr>`;
                        i++;
                    });

                    $('#showAllTables').append(showTables);

                }
            });
        });
        // get parent topic
        $.ajax({
            url: "/parent_topic",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                $("#topic").append(html);
            }
        });
        // get sub topic
        $(document).on("change", "#topic", function() {
            $("#addSubTopic").empty();
            $("#addSubSubTopic").empty();
            $("#addSubSubSubTopic").empty();
            $("#addSubSubSubSubTopic").empty();
            var parentId = this.value;
            if (parentId != "") {
                $.ajax({
                    url: "/get_subtopic/" + parentId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        console.log(parentId);
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class="col-md-4 col-form-label col-form-label-md"> Sub Topic </label><div class="col-md-7">
                                        <select class = "form-control" id="sub_topic"><option value=""> --- Select Sub Topic --- </option>`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text topic_err"></span></div><div class="col-md-1"><button type="button" class="btn btn-primary topicModal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button></div></div>`;
                            //console.log(html);
                            $("#addSubTopic").append(html);
                            $("#sub_topic").select2({
                                width: '100%'
                            });
                            $(".topicModal").on("click", function() {
                                //alert('test');
                                $("#addTag").modal('hide');
                                $('#subTopicModalBox').modal('show');
                                $('#parentId').val(parentId);
                            });
                        }
                    }
                });
            }
        });
        // get sub sub topic
        $(document).on("change", "#sub_topic", function() {
            $("#addSubSubTopic").empty();
            //$('#addSubTopic .form-group : last').remove();
            var parentId = this.value;
            if (parentId != "") {
                $.ajax({
                    url: "/get_subtopic/" + parentId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class="col-md-4 col-form-label col-form-label-md"> Sub Topic </label><div class="col-md-7">
                                        <select class = "form-control sub_topic" name = "topic[]" id="framework" multiple="multiple">`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text topic_err"></span></div><div class="col-md-1"><button type="button" class="btn btn-primary topicModal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button></div></div>`;
                            //console.log(html);
                            $("#addSubSubTopic").append(html);


                            //alert('hello');
                            $('#framework').multiselect({
                                nonSelectedText: 'Select Sub Topics',
                                enableFiltering: true,
                                enableCaseInsensitiveFiltering: true,
                                buttonWidth: '-webkit-fill-available',
                                //dropup: true,
                                //includeSelectAllOption: true
                                maxHeight: 450
                            });

                            $('.multiselect-clear-filter').hide();
                            $(".multiselect-filter > div").attr('style', 'width: auto !important');
                            $("ul .multiselect-container").attr('style', 'transform: none !important');
                            $("span .multiselect-selected-text").attr('style', 'float: left !important');
                            //$(".dropdown-toggle::after").css({"margin-top": "10px","float": "right"});
                            $(".topicModal").on("click", function() {
                                //alert('test');
                                $("#addTag").modal('hide');
                                $('#subTopicModalBox').modal('show');
                                $('#parentId').val(parentId);
                            });
                        }
                    }
                });
            }
        });

        //get sub sub sub topic
        $(document).on("change", "#framework", function() {
            $("#addSubSubSubTopic").empty();
            //$('#addSubTopic .form-group : last').remove();
            var parentId = this.value;
            if (parentId != "") {
                $.ajax({
                    url: "/get_subtopic/" + parentId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class="col-md-4 col-form-label col-form-label-md"> Sub Topic </label><div class="col-md-7">
                                        <select class = "form-control sub_topic" name = "topic[]" id="subSubSubTopicList" multiple="multiple">`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text topic_err"></span></div><div class="col-md-1"><button type="button" class="btn btn-primary topicModal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button></div></div>`;
                            //console.log(html);
                            $("#addSubSubSubTopic").append(html);


                            //alert('hello');
                            $('#subSubSubTopicList').multiselect({
                                nonSelectedText: 'Select Sub Topics',
                                enableFiltering: true,
                                enableCaseInsensitiveFiltering: true,
                                buttonWidth: '-webkit-fill-available',
                                //dropup: true,
                                //includeSelectAllOption: true
                                maxHeight: 450
                            });

                            $('.multiselect-clear-filter').hide();
                            $(".multiselect-filter > div").attr('style', 'width: auto !important');
                            $("ul .multiselect-container").attr('style', 'transform: none !important');
                            $("span .multiselect-selected-text").attr('style', 'float: left !important');
                            //$(".dropdown-toggle::after").css({"margin-top": "10px","float": "right"});
                            $(".topicModal").on("click", function() {
                                //alert('test');
                                $("#addTag").modal('hide');
                                $('#subTopicModalBox').modal('show');
                                $('#parentId').val(parentId);
                            });
                        }
                    }
                });
            }
        });

        // get sub sub sub sub topic
        $(document).on("change", "#subSubSubTopicList", function() {
            $("#addSubSubSubSubTopic").empty();
            //$('#addSubTopic .form-group : last').remove();
            var parentId = this.value;
            if (parentId != "") {
                $.ajax({
                    url: "/get_subtopic/" + parentId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class="col-md-4 col-form-label col-form-label-md"> Sub Topic </label><div class="col-md-7">
                                        <select class = "form-control sub_topic" name = "topic[]" id="subSubSubSubTopicList" multiple="multiple">`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text topic_err"></span></div><div class="col-md-1"><button type="button" class="btn btn-primary topicModal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button></div></div>`;
                            //console.log(html);
                            $("#addSubSubSubSubTopic").append(html);


                            //alert('hello');
                            $('#subSubSubSubTopicList').multiselect({
                                nonSelectedText: 'Select Sub Topics',
                                enableFiltering: true,
                                enableCaseInsensitiveFiltering: true,
                                buttonWidth: '-webkit-fill-available',
                                //dropup: true,
                                //includeSelectAllOption: true
                                maxHeight: 450
                            });

                            $('.multiselect-clear-filter').hide();
                            $(".multiselect-filter > div").attr('style', 'width: auto !important');
                            $("ul .multiselect-container").attr('style', 'transform: none !important');
                            $("span .multiselect-selected-text").attr('style', 'float: left !important');
                            //$(".dropdown-toggle::after").css({"margin-top": "10px","float": "right"});
                            $(".topicModal").on("click", function() {
                                //alert('test');
                                $("#addTag").modal('hide');
                                $('#subTopicModalBox').modal('show');
                                $('#parentId').val(parentId);
                            });
                        }
                    }
                });
            }
        });
        // save tagging
        $(document).on("click", "#addTopicTag", function() {
            var table_id = $(this).data("table_id");
            //alert(table_id);
            $("#add_table_id").val(table_id);
            $("#addTag").modal("show");
            $('#addTaging').trigger("reset");
            $('.multiselect-selected-text').text('');
        });
        // get country
        $.ajax({
            url: "/get_all_country",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                console.log(data.data);
                var html = '';
                for (var i = 0; i < data.data.length; i++) {
                    html += `<option value="${data.data[i].country_id}">${data.data[i].country_name}</option>`;
                }
                $("#tagCountry").append(html);

            }
        });

        // get states
        $(document).on("change", ".country", function() {
            var countryId = this.value;
            // alert(countryId);
            if (countryId == 19) {
                $.ajax({
                    url: "/get_states",
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        var data = response['state'];
                        var smartCities = response['smartCities'];
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class = "col-md-4 col-form-label col-form-label-md"> States </label>
                                     <div class = "col-md-8">
                                        <select class = "form-control form-control-md state" name = "state" id="tagState"><option value=""> --- Select State --- </option>`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text sub_topic_err"></span></div></div>`;
                            //console.log(html);
                            $(".addStates").append(html);
                            // serach states
                            $("#tagState").select2({
                                width: '100%',
                                height: '10px'
                            });
                        }

                        if (smartCities.length > 0) {
                            var html1 = `<div class="form-group row">
                                    <label class = "col-md-4 col-form-label col-form-label-md"> Smart Cities </label>
                                     <div class = "col-md-8">
                                        <select class = "form-control form-control-md smartCity" name = "smartCity" id="tagSmartCity"><option value=""> --- Select Smart City --- </option>`;
                            for (var i = 0; i < smartCities.length; i++) {
                                html1 += `<option value="${smartCities[i].id}">${smartCities[i].name}</option>`;
                            }
                            html1 += `</select><span class="text-danger error-text sub_topic_err"></span></div></div>`;
                            //console.log(html1);
                            $(".smartCities").append(html1);
                            $("#tagSmartCity").select2({
                                width: '100%',
                                height: '10px'
                            });
                        }
                    }
                });
            }
        });

        // get districts
        $(document).on("change", ".state", function() {
            //alert('test');
            $(".addDistricts").empty();
            var stateId = this.value;
            // alert(countryId);
            if (stateId != '') {
                $.ajax({
                    url: "/get_districts/" + stateId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        //console.log(data);
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class = "col-md-4 col-form-label col-form-label-md"> District </label>
                                     <div class = "col-md-8">
                                        <select class = "form-control form-control-md" name = "district" id="tagDistrict"><option value=""> --- Select District --- </option>`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text sub_topic_err"></span></div></div><div class="form-group row">
                                    <label class = "col-md-4 col-form-label col-form-label-md"> Block/Division </label><div class = "col-md-8"><input type="text" class="form-control" name="block"></div></div>`;
                            //console.log(html);
                            $(".addDistricts").append(html);
                            $("#tagDistrict").select2({
                                width: '100%',
                                height: '10px'
                            });
                        }
                    }
                });
            }
        });
        $("#addTaging").on("submit", function(e) {
            e.preventDefault();
            //console.log($("#addTaging").serialize());
            $.ajax({
                url: "/addTopicTag",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        alert(data.message);
                        //location.reload();
                        showTables();
                        $('#addTag').modal('hide');
                        $('#addTaging').trigger('reset');
                        $('#addSubTopic').empty();
                    } else {
                        printErrorMsg(data.error);
                    }


                },
            });
        });
        



        //view tagging
        $(document).on("click", "#viewTopicTag", function() {
            $('#viewTableTag').trigger('reset');
            $('#addTopicList').empty();
            $("#topic_id").val('');
            var table_id = $(this).data("table_id");
            $("#viewTag").modal("show");
            $.ajax({
                url: "/viewTopicTag/" + table_id,
                method: "get",
                success: function(data) {
                    console.log(data.topic[0]);
                    //console.log(data.parent_topic[0].topic[0].name);
                    //console.log(data.parent_topic.length);
                    var html = '';
                    for (var i = 0; i < data.parent_topic.length; i++) {
                        html += `
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Topic</label>
                        <div class="col-md-8">
                            <input type="text" value="${data.parent_topic[i].topic[0].mainParent}" readonly class="form-control">
                        </div>
                    </div>
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Sub Topic</label>
                        <div class="col-md-7">
                            <input type="text" value="${data.parent_topic[i].topic[0].name}" readonly class="form-control">
                        </div>
                        <div class="col-md-1" style="margin:auto;">
                           <a type="button" onClick="deleteSubTopic(${data.parent_topic[i].id})"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </div>`;
                    }
                    $('#addTopicList').append(html);

                    //console.log(data.topic[0].year);
                    //console.log(data[0].topic.name);
                    // $("#topic_id").val(data.topic[0].topic.name);
                    // $("#year").val(data.topic[0].year);
                    $("#country").val((data.topic[0].country != null) ? data.topic[0].country.country_name : '');
                    $("#state").val((data.topic[0].state != null) ? data.topic[0].state.name: '');
                    $("#district").val((data.topic[0].district != null) ? data.topic[0].district.name : '');
                    $("#smartCity").val((data.topic[0].smart_city != null) ? data.topic[0].smart_city.name : '');
                    $("#block").val(data.topic[0].block != null ? data.topic[0].block : '');
                    $("#yearMonth").val(data.topic[0].yearMonth != null ? data.topic[0].yearMonth : '');
                    $("#fromYear").val(data.topic[0].fromYear != null ? data.topic[0].fromYear : '');
                    $("#toYear").val(data.topic[0].toYear != null ? data.topic[0].toYear : '');


                },
            });
        });
        // delete tagging
        $(document).on("click", "#deleteTopicTag", function() {
            var table_id = $(this).data("table_id");
            if (confirm("Do you want to remove tag from this table?")) {
                $.ajax({
                    url: "/deleteTopicTag/" + table_id,
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.status == true) {
                            alert(data.message);
                            //location.reload();
                            showTables();
                        }

                    }
                });
            }
        });
    });

    function removeFile(elm) {
        $(elm).remove();
    }

    function get_table(id) {
        // alert('test');
        // die;
        $.ajax({
            url: "/get_table/" + id,
            method: "POST",
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },

            success: function(data) {
                //console.log(data);
                $("#upId").val(data[0].id);
                $("#name").val(data[0].name);
                $("#rows").val(data[0].rows);
                $("#columns").val(data[0].columns);
                $("#source").val(data[0].source);
                $("#file").val(data[0].file_name);
            }
        });

    }

    function publish(web_id, link_id, status_id) {
        if (status_id != 0) {
            $.ajax({
                url: "/publish",
                method: "POST",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "web_id": web_id,
                    "link_id": link_id,
                    "status_id": status_id
                },
                success: function(data) {
                    //console.log(data.status);
                    if (data.status == true) {
                        //location.reload();
                        alert("Status changed");
                        location.reload();
                    }
                }
            });
        } else {
            alert("Please upload file first");
        }
    }
    // delete sub topic
    function deleteSubTopic(id) {
        $('#viewTag').modal('hide');
        $.ajax({
            url: "/deleteSubTopic",
            method: "POST",
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data) {
                if (data.status == true) {
                    showTables();
                    alert(data.message);
                }
            }
        });
    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key.slice(0, 5) + '_err').text("This field is required");
        });
    }

    function ErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text(value);
        });
    }
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script>
    var headers = {};
    var fileId = '<?php echo $fileId; ?>';
    var AccessToken = '<?php echo $AccessToken; ?>';

    if (fileId != '' && AccessToken != '') {

        headers["Content-Type"] = "application/json; charset=UTF-8;";
        headers['Authorization'] = 'Bearer ' + AccessToken;


        $.ajax({
            url: 'https://www.googleapis.com/drive/v2/files/' + fileId,
            dataType: 'json',
            type: 'PATCH',
            contentType: 'application/json',
            data: JSON.stringify({
                "copyRequiresWriterPermission": true
            }),
            processData: false,
            headers: headers,
            success: function(data, textStatus, jQxhr) {
                console.log(JSON.stringify(data));
            },
            error: function(jqXhr, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });

    }

    function showTables() {
        $('#showAllTables').empty();
        var path = '<?php echo url('/'); ?>';
        $.ajax({
            url: 'showTables',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                //console.log(data[0].tableTopicId);
                //console.log(data[1].table_topic);
                var showTables = '';
                var i = 1;
                $.each(data, function(index, val) {
                    if (val.table_issued_by == 0) {
                        tableIssue = 'Operator';
                    } else if (val.table_issued_by == 1) {
                        tableIssue = 'Manager';
                    } else {
                        tableIssue = 'Admin';
                    }
                    showTables += `<tr><td> ${i} </td>
                                            <td> ${val.name} </td>
                                            <td> ${val.rows == null ? '':val.rows} </td>
                                            <td> ${val.columns == null ? '':val.columns} </td>
                                            <td>${val.submission_date == null ? '':val.submission_date}</td>
                                            <td>${(val.source == null) ? '':val.source}</td>
                                            <td><a href="${path}/admin/table_data?table_id=${val.id}" type="button" class="btn btn-info">View</a></td>

                                            <td> <a type="button" class="btn btn-success" data-toggle="modal" data-target="#editTable" onclick="get_table(${val.id})" style="color: aliceblue;">Edit</a></td>

                                            <td><a type="button" onclick="deleteTable(${val.id})" class="btn btn-danger" style="color: aliceblue;">Delete</a></td>


                                            <td><a type="button" class="btn btn-info" data-toggle="modal" data-target="#viewRemark" onclick="viewRemark(${val.id})" style="color: aliceblue;">View</a></td>

                                            <td>
                                                    <a type="button" class="btn btn-${val.status == 0 ?'secondary':'warning'}" onclick="changeStatus(${val.id}, ${val.status})" style="color: aliceblue;">${val.status == 0 ? 'Disapproved' : 'Approved'} </a>
                                            </td>
                                            <td>
                                                  
                                                    <a type="button" class="btn btn-primary" style="color: aliceblue;"> ${tableIssue} </a>
                                                  
                                            </td>

                                            <td><a type="button" class="btn btn-success" style="color: aliceblue;" data-table_id="${val.id}" id="addTopicTag">Add</a></td>


                                            <td><a type="button" class="btn btn-info" style="color: aliceblue;" data-table_id="${val.id}" id="viewTopicTag">View</a></td>

                                            <td><a type="button" class="btn btn-danger" style="color: aliceblue;" data-table_id="${val.id}" id="deleteTopicTag">Delete</a></td>

                                            <td><input type="checkbox" ${(val.table_topic.length > 0) ? 'checked' : ''}></td>
                                        </tr>`;
                    i++;
                });

                $('#showAllTables').append(showTables);
            }
        });
    }
    showTables();
</script>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("showAllTables");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName("td")[1];
            td2 = tr[i].getElementsByTagName("td")[2];
            td3 = tr[i].getElementsByTagName("td")[3];
            td4 = tr[i].getElementsByTagName("td")[4];
            td5 = tr[i].getElementsByTagName("td")[5];
            if (td1) {
                txtValue = td1.textContent || td1.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            } else if (td5) {
                txtValue = td5.textContent || td5.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            } else if (td4) {
                txtValue = td4.textContent || td4.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    $(document).ready(function() {
        //change selectboxes to selectize mode to be searchable
        // search topic
        $("#topic").select2({
            width: '100%',
            height: '10px'
        });
        //search country
        $("#tagCountry").select2({
            width: '100%',
            height: '10px'
        });


        $("#topicModal").on("click", function() {
            $("#addTag").modal('hide');
            $('#topicModalBox').modal('show');
        });

        // add topic
        $("#saveTopic").on("submit", function(e) {
            e.preventDefault();
            // console.log($('#saveTopic').serialize());
            // die;
            $.ajax({
                url: "/save_topic",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status === true) {
                        //
                        //showTables();
                        alert(data.message);

                        location.reload();
                        $("#saveTopic").trigger('reset');
                        $("#topicModalBox").modal('hide');
                        $('.topic_err').empty();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
        });
        // save sub topic
        $("#saveSubTopic").on("submit", function(e) {
            // alert($("#saveSubTopic").serialize())
            e.preventDefault();
            $.ajax({
                url: "/addSubtopic",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    if (data.status == true) {
                        //dataTable.ajax.reload();
                        alert(data.message);
                        location.reload();

                    } else {
                        ErrorMsg(data.error);
                    }

                },
            });
        });

    });
</script>