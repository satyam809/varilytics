<style>
    .scrollme {
        overflow-x: auto;
    }

    .select2-container--default {
        display: none;
    }
</style>
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
                        <li class="breadcrumb-item active">Work Files</li>
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

                    <form id="work_file">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Source</label>
                                    <select class="form-control select2 website" style="width: 100%;" name="website">
                                        <option value="">Select Source</option>
                                        <?php foreach ($web as $val) { ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->website; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text website_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Work File Link</label>
                                    <input type="text" class="form-control select2" name="link" placeholder="Enter Work File Link">
                                    <span class="text-danger error-text link_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Work File Name</label>
                                    <input type="text" class="form-control select2" name="name" placeholder="Enter Work File name">
                                    <span class="text-danger error-text name_err assignerror"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control select2" name="description" placeholder="Enter Description">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Excel Url</label>
                                    <input type="text" class="form-control select2 download_excel" name="download_excel">
                                    <span class="text-danger error-text download_excel_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block;"></label><br>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#pdfUpload">Convert To Excel</button>
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

                    <form id="update_work_file">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="val_id" id="val_id">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Source</label>
                                    <select class="form-control select2 website" style="width: 100%;" name="website" id="website">
                                        <option value="">Select Source</option>
                                        <?php foreach ($web as $val) { ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->website; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text website_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Work File Link</label>
                                    <input type="text" class="form-control select2" name="link" placeholder="Enter Work File Link" id="link">
                                    <span class="text-danger error-text link_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Work File Name</label>
                                    <input type="text" class="form-control select2" name="name" placeholder="Enter Work File Name" id="name">
                                    <span class="text-danger error-text name_err assignerror"></span>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control select2" name="description" placeholder="Enter Description" id="description">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Excel Url</label>
                                    <input type="text" class="form-control select2 download_excel" name="download_excel">
                                    <span class="text-danger error-text download_excel_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block;"></label><br>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#pdfUpload">Convert To Excel</button>

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
                <div class="card-body">

                    

                        <div class="row">
                            <div class="col-md-4">
                            <form action="{{ url('upload_workFile') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" class="form-control" name="file" required style="border:none;" onchange="ValidateSingleInput(this);">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Upload">
                                    </form>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <a href="{{ asset('assets/admin_assets/work_file_formate.xlsx')}}" class="btn btn-primary" download>Format</a>
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
                            <table id="workFileTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Source</th>
                                        <th>Work File Link</th>
                                        <th>Work File Name</th>
                                        <th>Description</th>
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

<!-- Modal -->

<div class="modal fade" id="pdfUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <?php if ($totalPdf < 800) { ?>
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Pdf</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form _method="post" _action="https://text-stock.com/pdf-to-xlx" _enctype="multipart/form-data" id="pdfCount">

                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="form-group">

                            <input type="file" class="form-control" name="pdf" id="pdf_file" style="border:none;" required accept=".pdf" />
                            <span class="text-danger">File size must be greater than 10 MB</span>

                        </div>

                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <input type="submit" class="btn btn-success" value="Submit" id="waitForPdfExcel">
                    </div>
                </form>

            </div>
        <?php } else { ?>
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Page limit is over</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        //$("select").select2();

        var dataTable = $('#workFileTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": false,
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "/allWorkFile",
                type: "GET"
            },
            "columns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'website'
                },
                {
                    data: 'link'
                },
                {
                    data: 'name'
                },
                {
                    data: 'description'
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data + '">Delete</a>&nbsp;<a href="#scrollUp" type="button"  class="btn btn-default" id="get_record" data-id="' + data + '">Update</a>';
                    }
                }
            ]


        });


        // add
        $("#work_file").on("submit", function(e) {
            e.preventDefault();
            //alert($('#work_file').serialize());
            //console.log($('#work_file').serialize());

            $.ajax({
                url: "/save_work_file",
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
                        $("#work_file").trigger('reset');
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
                    url: "/delete_work_file/" + id,
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
                url: "/get_work_file/" + id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    $('#val_id').val(data[0].id);
                    $(".website option[value='" + data[0].web_id + "']").attr("selected", "selected");
                    $(".website").val(data[0].web_id).trigger("change");
                    $('#link').val(data[0].link);
                    $('#name').val(data[0].name);
                    $('#description').val(data[0].description);
                    $('.download_excel').val(data[0].download_excel);

                }
            });
        });

        // update
        $("#update_work_file").on("submit", function(e) {
            e.preventDefault();
            //alert($('#update_work_field').serialize());
            //console.log($('#update_work_field').serialize());

            $.ajax({
                url: "/update_work_file",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        alert('Updated successfully');
                        location.reload();
                        // dataTable.ajax.reload();
                        // $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        //     "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Updated successfully" + "</span" + "</div>");
                        // $("#update_work_file").trigger('reset');
                        // $('.assignerror').empty();
                        // $('#update').hide();
                        // $('#add').show();
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
                    alert("only allowed extensions are: " + _validFileExtensions.join(", "));
                    // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
    }

    // conversion
    $("#pdfCount").on("submit", function(e) {
        e.preventDefault();

        // alert($(this).serialize());
        // die;
        //jQuery.support.cors = true; document.getElementById('pdf_file')
        $('#waitForPdfExcel').val('Waiting ....');
        var file = document.getElementById('pdf_file').files[0];
        //console.log(file);
        //die;
        var formData = new FormData(this);
        //formData.append("_token", "{{ csrf_token() }}");
        formData.append("pdf", file);
        formData.append("_token", "{{ csrf_token() }}");
        //console.log(formData);
        if (file.size > 10000000) {
            $.ajax({
                url: "https://text-stock.com/pdf-to-xlx",
                type: "POST",
                //contentType: "application/x-www-form-urlencoded",
                contentType: false,
                dataType: 'json',
                data: formData,
                cache: false,
                processData: false,
                //contentType:false,
                success: function(response) {
                    //console.log(response);
                    $(".download_excel").val(response.url);
                    $('#pdfUpload').modal('hide');
                    $('#download_suc').show();
                    //$("#addTag").modal("show");
                    updatePdfCount(response.page_count);
                }

            });
        } else {
            alert('File size must be greater than 10 MB');
        }
        //updatePdfCount(1);

    });

    function updatePdfCount(page) {
        //alert(page);
        $.ajax({
            url: "/pdfCount",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                //"_token": "{{ csrf_token() }}",
                pdfPageCount: page
            }

        });
    }
</script>