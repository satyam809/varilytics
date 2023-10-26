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
                <div class="col-sm-6">
                    <select class="form-control" id="addTable">
                        <option value="">Select table</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">data</li>
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
                            <table id="tableData" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <?php if (session('login.user_id') == 1) { ?>
                                            <th>Users</th>
                                        <?php } ?>
                                        <th>Source</th>
                                        <th>Link name</th>
                                        <th>Column</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

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

    <!-- modal -->
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
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    var user_id = '<?php echo session('login.user_id'); ?>';
    //alert(user_id);
    $.ajax({
        url: "/get_tables/" + user_id,
        method: 'GET',
        //dataType: 'json',
        success: function(data) {
            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += `<option value="${data[i].table_id}">${data[i].table.name}</option>`;
            }
            $("#addTable").append(html);

        }
    });
    $(document).ready(function() {
        var dataTable = '';
        $(document).on('change', '#addTable', function() {
            var table_id = this.value;
            if (table_id != '') {
                //alert(user_id);
                if (user_id == 1) {
                    dataTable = $('#tableData').DataTable({
                        "destroy": true,
                        "ajax": {
                            type: "GET",
                            url: "/get_table_data/" + table_id
                        },
                        "aoColumns": [{
                                render: (data, type, row, meta) => meta.row + 1
                            },
                            {
                                data: 'user.name'
                            },
                            {
                                data: 'website.website'
                            },
                            {
                                data: 'work_link.name'
                            },
                            {
                                data: 'column_name'
                            },
                            {
                                data: 'values'
                            },
                            {
                                data: 'id',
                                "render": function(data, type, full, meta) {
                                    return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data + '"">Delete</a>&nbsp;<a href="#" type="button"  class="btn btn-default" id="get_record" data-id="' + data + '"">Update</a>';
                                }
                            }


                        ]

                    });
                } else {
                    var dataTable = $('#tableData').DataTable({
                        "destroy": true,
                        "ajax": {
                            type: "GET",
                            url: "/get_table_data/" + table_id
                        },
                        "aoColumns": [{
                                render: (data, type, row, meta) => meta.row + 1
                            },
                            {
                                data: 'website.website'
                            },
                            {
                                data: 'work_link.name'
                            },
                            {
                                data: 'column_name'
                            },
                            {
                                data: 'values'
                            },
                            {
                                data: 'id',
                                "render": function(data, type, full, meta) {
                                    return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data + '"">Delete</a>&nbsp;<button   type="button" class="btn btn-default" data-toggle="modal" data-target="#getData" id="get_record" data-id="' + data + '"">Update</button>';
                                }
                            }


                        ]

                    });
                }


            } else {
                alert('Please select correct value');
            }
        });
        // get

        $(document).on('click', '#get_record', function() {
            var data_id = $(this).data('id');
            // var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/get_paricular_data/" + data_id,
                method: "GET",
                success: function(data) {
                    $('#data_id').val(data[0].id);
                    $('#column').val(data[0].column_name);
                    $('#unit').val(data[0].values);
                }
            });
        });

        // update
        $("#updateData").on("submit", function(e) {
            e.preventDefault();
            $('.data_err').empty();
            //alert($('#updateData').serialize());
            $.ajax({
                url: "/update_particular_data",
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
                    url: "/delete_particular_data/" + id,
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
    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text(value);
        });
    }
</script>