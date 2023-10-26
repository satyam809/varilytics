<style>
    .multiselect-container li {
        width: max-content;
    }
</style>
<script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
<link href="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/css/bootstrap-multiselect.css" rel="stylesheet" />

<div class="content-wrapper" id="scrollUp">
    <!-- Content Header (Page header) -->
    <!-- <div>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('assignWorkMessage') }}
        </div>

    </div> -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-2">
                    <form id="getTablesData">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <select id="tables" class="form-control" name="tables[]" multiple>
                            <?php foreach ($tables as $data) { ?>
                                <option value="<?php echo $data->id; ?>"><?php echo ucwords(strtolower($data->name)); ?></option>
                            <?php } ?>
                        </select>
                </div>
                <div class="col-md-2">
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
                </form>
                <div class="col-md-2">
                    <button class="btn btn-success" id="combine_table">Combine</button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-warning" id="ApproveData" style="color: aliceblue;">Approve</button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-info" id="UnapproveData">Disapprove</button>
                </div>
                <div class="col-md-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Combine</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div style="overflow-x: auto;">
                            <table id="tableData" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="check_all" id="check_all"></th>
                                        <th>Sr.No</th>
                                        <th>Column</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                        <th>Issue</th>
                                        <th colspan="2" style="text-align:center;">Action</th>
                                        <th style="display:none;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>
                            </div>
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

    <!-- edit data modal -->
    <div class="modal fade" id="getData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateData">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="data_id" value="" id="data_id">
                        <input type="hidden" name="table_id" value="" id="table_id">
                        <div class="form-group">
                            <label>Table name:</label>
                            <input type="text" class="form-control" id="tableName" name="tableName">
                            <span class="text-danger error-text tableName_err data_err"></span>
                        </div>
                        <div class="form-group">
                            <label>Column:</label>
                            <input type="text" class="form-control" id="column" name="column">
                            <span class="text-danger error-text column_err data_err"></span>
                        </div>
                        <div class="form-group">
                            <label>Unit:</label>
                            <textarea class="form-control" id="unit" name="unit"></textarea>
                            <span class="text-danger error-text unit_err data_err"></span>
                        </div>

                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- add new table name data -->

    <div class="modal fade" id="table_name" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Table name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addTableName">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="table_data[]" value="" id="table_data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="new_table_name" name="new_table_name" required>

                        </div>

                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    $(function() {
        $('#tables').multiselect({
            nonSelectedText: 'Select Table'
        });
    });
    $(document).ready(function() {
        $("#table_name").modal('hide');
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#getTablesData").on('change', function(e) {
            //alert('test');
            var tableTxt = $(".multiselect-selected-text").text();
            tableTxt = "Select tables";
            $(".multiselect-selected-text").text(tableTxt);
            //alert()
        });
        $("#getTablesData").on("submit", function(e) {
            e.preventDefault();
            var table_id = $("#tables").val();

            if (table_id.length > 0) {
                $('#tableData').DataTable({
                    "destroy": true,
                    "ajax": {
                        method: "POST",
                        url: "/get_combine_data",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            "tables": table_id
                        },
                    },
                    "aoColumns": [{
                            data: 'id',
                            "render": function(data, type, full, meta) {
                                return '<input type="checkbox" name="approve[]" class="check_box" data-con-id="' + data + '" value="' + data + '">';
                            }
                        },

                        {
                            render: (data, type, row, meta) => meta.row + 1
                        },
                        {
                            data: 'column_name'
                        },
                        {
                            data: 'values'
                        },
                        {
                            data: 'status',
                            "render": function(data, type, full, meta) {
                                if(data == 0){
                                    return '<a type="button"  class="btn btn-danger"  style="color:white;">Disapprove</a>';
                                }else{
                                    return '<a type="button"  class="btn btn-warning"  style="color:white;">Approve</a>';
                                }
                            }
                        },
                        {
                            data: 'issued_by',
                            "render": function(data, type, full, meta) {
                                if(data == 0){
                                    return '';
                                }else if(data == 1){
                                    return '<a type="button"  class="btn btn-primary"  style="color:white;">Manager</a>';
                                }else{
                                    return '<a type="button"  class="btn btn-primary"  style="color:white;">Admin</a>';
                                }
                            }
                        },
                        {
                            data: 'id',
                            "render": function(data, type, full, meta) {
                                return '<a href="#" type="button"  class="btn btn-success" data-toggle="modal" data-target="#getData" id="get_record" data-id="' + data + '"">Update</a>';
                            }
                        },
                        {
                            data: 'id',
                            "render": function(data, type, full, meta) {
                                return '<a type="button"  class="btn btn-danger" id="delete_records" style="color:white;" data-id="' + data + '"">Delete</a>';
                            }
                        }

                    ]

                });
            } else {
                alert("Please select table");
            }
        });
        // get

        $(document).on('click', '#get_record', function() {
            var data_id = $(this).data('id');
            // var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/getDataTable/" + data_id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data.data);
                    $('#data_id').val(data.data[0].id);
                    $('#tableName').val(data.table[0].name);
                    $('#table_id').val(data.table[0].id);
                    $('#column').val(data.data[0].column_name);
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
                url: "/updateDataTable",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    console.log(data);
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

            if (confirm("Are you sure you want to delete this")) {
                $.ajax({
                    type: "GET",
                    url: "/delete_merge_data/" + id,
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

        // click on combine button
        $("#combine_table").on("click", function(e) {
            e.preventDefault();
            //alert($("#ApproveData").serialize());
            var data_length = [];
            $(".check_box:checked").each(function() {
                //alert($(this).data('con-id'));
                data_length.push($(this).data('con-id'));
            });
            if (data_length.length <= 0) {
                alert("Please select atleast two tables and its data");
            } else {
                //console.log(data_length);
                $("#table_name").modal('show');
                $("#table_data").val(data_length);
                // console.log($("#table_data").val());
                $("#addTableName").on("submit", function(e) {
                    e.preventDefault();
                    // alert($("#addTableName").serialize());
                    $.ajax({
                        url: "/combine_data",
                        method: "POST",
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: new FormData(this),
                        success: function(data) {
                            //console.log(data);
                            if (data.status == true) {
                                alert('Table combined successfully');
                                location.reload();
                            }
                        }
                    });
                });
                //if (confirm("Do you want to approve this")) {
                // $.ajax({
                //     url: "/ApproveData",
                //     method: "POST",
                //     dataType: "JSON",
                //     processData: false,
                //     contentType: false,
                //     cache: false,
                //     data: new FormData(this),
                //     success: function(data) {
                //         if (data.status == true) {
                //             location.reload();
                //         }
                //     }
                // });
                //}
            }

        });

        // approve data
        $("#ApproveData").on("click", function(e) {
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
                if (confirm("Do you want to approve this")) {
                    $.ajax({
                        url: "/approveMergeTableAndData",
                        method: "POST",
                        dataType: "JSON",
                        // processData: false,
                        // contentType: false,
                        // cache: false,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "approve": data_length
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

        // unapprove data
        $("#UnapproveData").on("click", function(e) {
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
                if (confirm("Do you want to disapprove this table data")) {
                    $.ajax({
                        url: "/unApproveMergeTableAndData",
                        method: "POST",
                        dataType: "JSON",
                        // processData: false,
                        // contentType: false,
                        // cache: false,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "unapprove": data_length
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
    // check all
    $('#check_all').click(function() {
        if (this.checked)
            $(".check_box").prop("checked", true);
        else
            $(".check_box").prop("checked", false);
    });
</script>