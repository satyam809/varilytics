<!-- <style>
    .scrollme {
        overflow-x: auto;
    }
</style> -->

<div class="content-wrapper" id="scrollUp">
    <!-- Content Header (Page header) -->
    <!-- <div>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('assignWorkMessage') }}
        </div>

    </div> -->
    <?php if (Session::has('DataUpload')) { ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('DataUpload') }}
        </div>
    <?php } ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Work Fields</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div id="alert_message"></div>
                <div class="card-body" id='add'>

                    <form id="work_field">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Source</label>
                                    <input type="text" class="form-control select2" name="website" placeholder="Enter source">
                                    <span class="text-danger error-text website_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Acronym</label>
                                    <input type="text" class="form-control select2" name="acronym" placeholder="Enter Acronym">
                                    <span class="text-danger error-text acronym_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Orgnisation Name</label>
                                    <input type="text" class="form-control select2" name="org_name" placeholder="Enter Orgnisation Name">
                                    <span class="text-danger error-text org_name_err assignerror"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sector</label>
                                    <input type="text" class="form-control select2" name="sector" placeholder="Enter Sector">
                                    <span class="text-danger error-text sector_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Domain/Topic</label>
                                    <input type="text" class="form-control select2" name="domain" placeholder="Enter Domain">
                                    <span class="text-danger error-text domain_err assignerror"></span>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" style="margin-top:30px;">
                                    <input type="submit" class="btn btn-primary" value="Save">

                                </div>

                            </div>
                        </div>

                    </form>



                </div>

                <div class="card-body" id='update' style='display:none'>

                    <form id="update_work_field">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="val_id" id="val_id">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Source</label>
                                    <input type="text" class="form-control select2" name="website" placeholder="Enter source" id="website">
                                    <span class="text-danger error-text website_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Acronym</label>
                                    <input type="text" class="form-control select2" name="acronym" placeholder="Enter Acronym" id="acronym">
                                    <span class="text-danger error-text acronym_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Orgnisation Name</label>
                                    <input type="text" class="form-control select2" name="org_name" placeholder="Enter Orgnisation Name" id="org_name">
                                    <span class="text-danger error-text org_name_err assignerror"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sector</label>
                                    <input type="text" class="form-control select2" name="sector" placeholder="Enter Sector" id="sector">
                                    <span class="text-danger error-text sector_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Domain/Topic</label>
                                    <input type="text" class="form-control select2" name="domain" placeholder="Enter Domain" id="domain">
                                    <span class="text-danger error-text domain_err assignerror"></span>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" style="margin-top:30px;">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>

                            </div>
                        </div>
                    </form>



                </div>

                <div class="card-body" id='add'>



                    <div class="row">

                        <div class="col-md-4">
                            <form action="{{ url('upload_workField') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" class="form-control" name="file" required style="border:none;" onchange="ValidateSingleInput(this);">
                                </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Upload">

                            </div>
                            </form>
                        </div>


                        <div class="col-md-4">

                            <a href="{{ asset('assets/admin_assets/work_field_formate.xlsx')}}" class="btn btn-primary" download>Format</a>



                        </div>
                    </div>




                </div>


            </div>


        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body scrollme">
                            <table id="workFieldTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Source</th>
                                        <th>Acronym</th>
                                        <th>Orgnisation</th>
                                        <th>Agri Sector</th>
                                        <th>Agri Domain</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


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

</div>


<script>
    $(document).ready(function() {

        var dataTable = $('#workFieldTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": false,
            "scrollX": true,
            "ajax": {
                url: "/allWorkField",
                type: "GET"
            },
            "columns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'website'
                },
                {
                    data: 'acronym'
                },
                {
                    data: 'org_name'
                },
                {
                    data: 'sector'
                },
                {
                    data: 'domain'
                },
                {
                    data: {
                        id: 'id'
                    },
                    "render": function(data, type, full, meta) {
                        return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data.id + '">Delete</a>&nbsp;<a href="#scrollUp" type="button"  class="btn btn-default" id="get_record" data-id="' + data.id + '">Update</a>';
                    }
                }
            ]


        });


        // add
        $("#work_field").on("submit", function(e) {
            e.preventDefault();
            //alert($('#work_field').serialize());
            //console.log($('#work_field').serialize());

            $.ajax({
                url: "/save_work_field",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        dataTable.ajax.reload();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is added successfully" + "</span" + "</div>");
                        $("#work_field").trigger('reset');
                        $('.assignerror').empty();

                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
        });

        // delete
        $(document).on('click', '#delete_records', function() {

            var id = $(this).data('id');
            //alert(id);
            var token = $("meta[name='csrf-token']").attr("content");

            if (confirm("Are you sure you want to delete this")) {
                $.ajax({
                    type: "POST",
                    url: "/delete_work_field/" + id,
                    dataType: "json",
                    cache: false,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status == true) {
                            dataTable.ajax.reload();
                            $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Deleted successfully" + "</span" + "</div>");
                        }
                    }
                });
            }
        });



        // get

        $(document).on('click', '#get_record', function() {
            $('#update').show();
            $('#add').hide();
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/get_work_field/" + id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    $('#val_id').val(data[0].id);
                    $('#website').val(data[0].website);
                    $('#domain').val(data[0].domain);
                    $('#acronym').val(data[0].acronym);
                    $('#org_name').val(data[0].org_name);
                    $('#sector').val(data[0].sector);

                }
            });
        });

        // update
        $("#update_work_field").on("submit", function(e) {
            e.preventDefault();
            //alert($('#update_work_field').serialize());
            //console.log($('#update_work_field').serialize());

            $.ajax({
                url: "/update_work_field",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        dataTable.ajax.reload();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Updated successfully" + "</span" + "</div>");
                        $("#update_work_field").trigger('reset');
                        $('.assignerror').empty();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
        });

    });


    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            //console.log(key);
            console.log(value);
            $('.' + key + '_err').text(value);
        });
    }

    var _validFileExtensions = [".xlsx", ".xlsm", ".xlsb", ".xltx", ".xltm", ".xls", ".xlt", ".xml"];

    function ValidateSingleInput(oInput) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }


                if (!blnValid) {
                    alert("allowed extensions are: " + _validFileExtensions.join(", "));
                    // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
    }
</script>