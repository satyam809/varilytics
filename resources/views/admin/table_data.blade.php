<?php
// $userId = session('login.user_id');
// $designation = DB::select('select designation_id from `permission` where user_id = ?', array($userId));
// $designationId = $designation[0]->designation_id;

//echo $designationId;
//die;
//echo $userId;
//die; 
$merge = $data[0]['table']->merged_table;
$scrape = $data[0]['table']->scrape;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <?php if (($merge == 0 && $scrape == 0)) { ?>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRemark">Add Feedback</button>
                    </div>
                <?php } ?>
                <?php if (isset($data[0]->table_id) && ($merge == 0 && $scrape == 0)) { ?>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewRemark" onclick="viewRemark(<?php echo $data[0]->table_id; ?>)">View Feedback</button>
                    </div>
                <?php } ?>
                <?php if (isset($data[0]['table']->id) && ($merge == 0 && $scrape == 0)) { ?>
                <div class=" col-md-1">
                        <!-- <a href ="https://view.officeapps.live.com/op/embed.aspx?src={{ asset('assets/admin_assets/excelUpload/') }}/{{ $data[0]['table']->file_name }}" target="_blank" class="btn btn-primary">Compare</a> -->
                        <a href="https://docs.google.com/spreadsheets/d/{{ $data[0]['table']->driveFileId }}" target="_blank" class="btn btn-primary">Compare</a>
                </div>
                <?php } ?>
                <?php if (isset($data[0]['table']->id)) { ?>
                <div class="col-md-1">
                        <a href="{{ url('admin/tabular') }}?tableId={{ $data[0]['table']->id }}" type="button" class="btn btn-success" target="_blank">Tabular</a>
                </div>
                <?php } ?>
                <div class="col-md-2" style="text-align: end;">
                    <button type="button" class="btn btn-warning" id="ApproveTable" data-table_id="{{ isset($data[0]['table']->id) ? $data[0]['table']->id:'' }}" style="color: aliceblue;">Approve</button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-info" id="UnapproveTable" data-table_id="{{ isset($data[0]['table']->id) ? $data[0]['table']->id:'' }}">Disapprove</button>
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-info" id="DeleteAll">Delete</button>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>

                                        <th><input type="checkbox" name="check_all" id="check_all"></th>

                                        <th>Sr.No</th>
                                        <th>Row</th>
                                        <th colspan="2" style="text-align: center">Action</th>
                                        <th>Status</th>
                                        <th>Issue</th>
                                    </tr>
                                </thead>

                                <body>
                                    <?php //print_r($data);
                                    ?>
                                    <?php $i = 1;
                                    foreach ($data as $value) { ?>
                                        <tr>

                                            <td><input type="checkbox" name="approve[]" class="check_box" value="{{ $value->id }}" data-con-id="{{ $value->id }}"></td>

                                            <td>{{ $i }}</td>
                                            <!-- <td>{{ $value->column_name }}</td> -->
                                            <!-- <td>{{ $value->values }}</td> -->
                                            <td>
                                                <a type="button" class="btn btn-success" id="get_record" data-id="{{ $value->id }}" data-toggle="modal" data-target="#viewData" style="color: aliceblue;">View</a>
                                            </td>
                                            <td style="text-align: end;">
                                                <a type="button" class="btn btn-danger" id="delete_records" data-id="{{ $value->id }}" style="color: aliceblue;">Delete</a>
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-success" id="get_record" data-id="{{ $value->id }}" data-toggle="modal" data-target="#getData" style="color: aliceblue;">Update</a>
                                            </td>
                                            <td>


                                                <?php if ($value['table']->status == 1) { ?>
                                                    <button type="button" class="btn btn-warning" style="color: aliceblue;">Approved</button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-info" style="color: aliceblue;">Disapproved</button>
                                                <?php } ?>


                                            </td>
                                            <td>

                                                <?php if ($value['table']->table_issued_by == 1) { ?>
                                                    <button type="button" class="btn btn-primary" style="color: aliceblue;">Manager</button>
                                                <?php } elseif ($value['table']->table_issued_by == 2) { ?>
                                                    <button type="button" class="btn btn-primary" style="color: aliceblue;">Admin</button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-primary" style="color: aliceblue;">Data Operator</button>
                                                <?php } ?>

                                            </td>


                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </body>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
</div>
<!-- edit table data modal -->
<div class="modal fade" id="getData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit table data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateData">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="data_id" value="" id="data_id">
                    <input type="hidden" name="table_id" value="{{ $_GET['table_id'] }}">
                    <!-- <div class="form-group">
                        <label>Column:</label>
                        <input type="text" class="form-control" id="column" name="column">
                        <span class="text-danger error-text column_err data_err"></span>
                    </div> -->
                    <div class="form-group" id="addInput">
                        <!-- <label>Unit:</label> -->
                        <!-- <textarea class="form-control" id="unit" name="unit"></textarea>
                        <span class="text-danger error-text unit_err data_err"></span> -->

                    </div>

            </div>
            <div class="modal-footer" style="justify-content: center;">
                <input type="submit" class="btn btn-success" value="Update">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- view table data modal -->
<div class="modal fade" id="viewData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" id="addDataInput">
                </div>

            </div>

        </div>
    </div>
</div>

<!--Add  Remark -->
<div class="modal fade" id="addRemark" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{url('addRemark') }}" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <?php if (isset($data[0]->table_id)) { ?>
                        <input type="hidden" name="table_id" id="table_id" value="{{ $data[0]->table_id }}">
                    <?php } ?>

                    <div class="form-group">
                        <textarea class="form-control" name="remark"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
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
<!-- <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ asset('assets/admin_assets/excelUpload/') }}/{{ $data[0]['table']->file_name }}" width='100%' height='565px' frameborder='0' style="display: none;" id="openExcel"> </iframe> -->
<script>
    // function showExcel() {
    //     $('#openExcel').css('display', 'block');
    // }
    // var hyperLink = document.getElementById("openExcel").src;
    // function refreshLink(link) {
    //     alert(link);
    //     hyperLink = link;
    //     document.getElementById("viewExcel").href = hyperLink;
    // }
    var userId = '<?php echo session('login.user_id'); ?>';

    // get
    $(document).ready(function() {
        // get
        $(document).on('click', '#get_record', function() {
            $('#addInput').empty();
            $('#addDataInput').empty();
            var data_id = $(this).data('id');
            // var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/getSingleData/" + data_id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(JSON.parse(data.data[0].values));
                    var row = JSON.parse(data.data[0].values);
                    var input = ``;
                    for (var i = 0; i < row.length; i++) {
                        if (row[i] == null) {
                            input += `<input type='hidden' value='${''}' name='values[]' class='form-control' style='margin:inherit;'>`;
                        } else {
                            input += `<input type='text' value='${row[i]}' name='values[]' class='form-control' style='margin:inherit;'>`;
                        }
                    }
                    $('#addInput').append(input);
                    $('#addDataInput').append(input);
                    $('#data_id').val(data.data[0].id);
                    //$('#column').val(data.data[0].column_name);
                    $('#unit').val(data.data[0].values);
                }
            });
        });
        // update
        $("#updateData").on("submit", function(e) {
            e.preventDefault();
            $('.data_err').empty();
            //alert($('#updateData').serialize());
            $.ajax({
                url: "/updateData",
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
                        location.reload();
                        // $("#getData").modal('hide');
                        // dataTable.ajax.reload();
                        // $("#updateData").trigger('reset');
                    } else {
                        printErrorMsg(data.error);
                    }


                },
            });
        });

        // delete
        $(document).on('click', '#delete_records', function() {

            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete this table data ?')) {
                $.ajax({
                    type: "GET",
                    url: "/deleteData/" + id,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.status == true) {
                            alert(data.message);
                            location.reload();
                        }
                    }
                });
            }

        });
        // check all
        $('#check_all').click(function() {
            if (this.checked)
                $(".check_box").prop("checked", true);
            else
                $(".check_box").prop("checked", false);
        });

        // approve data
        $("#ApproveTable").on("click", function(e) {
            e.preventDefault();
            var table_id = $(this).data("table_id");
            //alert(table_id);
            if (confirm("Do you want to approve this table?")) {
                $.ajax({
                    url: "/ApproveTable",
                    method: "POST",
                    dataType: "JSON",
                    // processData: false,
                    // contentType: false,
                    // cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "approve": table_id
                    },
                    success: function(data) {
                        //console.log(data);
                        if (data.status == true) {
                            alert(data.message);
                            location.reload();
                        }
                    }
                });
            }


        });

        // unapprove data
        $("#UnapproveTable").on("click", function(e) {
            e.preventDefault();
            //alert($("#ApproveData").serialize());
            var table_id = $(this).data("table_id");
            if (confirm("Do you want to disapprove this table?")) {
                $.ajax({
                    url: "/UnapproveTable",
                    method: "POST",
                    dataType: "JSON",
                    // processData: false,
                    // contentType: false,
                    // cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "unapprove": table_id
                    },
                    success: function(data) {
                        //console.log(data);
                        if (data.status == true) {
                            alert(data.message);
                            location.reload();
                        }
                    }
                });
            }


        });

        // delete all
        $("#DeleteAll").on("click", function(e) {
            e.preventDefault();
            //alert($("#ApproveData").serialize());
            var data_length = [];
            $(".check_box:checked").each(function() {

                data_length.push($(this).data('con-id'));
            });
            //console.log(data_length);
            if (data_length.length <= 0) {
                alert("Please select data");
            } else {
                if (confirm("Do you want to delete this table data")) {
                    $.ajax({
                        url: "/DeleteAll",
                        method: "POST",
                        dataType: "JSON",
                        // processData: false,
                        // contentType: false,
                        // cache: false,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "deleteAll": data_length
                        },
                        success: function(data) {
                            //console.log(data);
                            if (data.status == true) {
                                alert(data.message);
                                location.reload();
                            }
                        }
                    });
                }
            }

        });



    });
    //compare to pdf
    // function compare_pdf(table_id){
    //     $.ajax({
    //         url: "/compare_pdf/" + table_id,
    //         method: "get",
    //         _dataType: "json",
    //         success: function(data) {
    //             console.log(data);

    //         }
    //     })
    // }

    function viewRemark(id) {
        $.ajax({
            url: "/viewRemark/" + id,
            method: "get",
            dataType: "json",
            success: function(data) {
                //console.log(data);
                $("#showRemark").val(data[0].remark);
            }
        })

    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text(value);
        });
    }
</script>