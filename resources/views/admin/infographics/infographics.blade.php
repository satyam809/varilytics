<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Infographics</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6" style="text-align: end;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#InfographicsModal">Add</button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->



    <section class="content">
        <div class="container-fluid">
            <div id="alert_message"></div>
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="getAllInfographics" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Current Topic</th>
                                        <th>Industry</th>
                                        <th>Image</th>
                                        <th>Pdf</th>
                                        <th>Action</th>
                                        <th>Home Page</th>
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


    <!-- /.content -->
</div>

<div class="modal fade" id="InfographicsModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="addInfographics" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Current Topic</label>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%;" name="currentTopic" id="currentTopic">
                                <option value="">Select Current Topic</option>
                                <?php foreach ($currentTopic as $val) { ?>
                                    <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                                <?php } ?>
                            </select>
                            <span class="text-danger error-text currentTopic_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Industry</label>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%;" name="industry" id="industry">
                                <option value="">Select Industry</option>
                                <?php foreach ($industries as $val) { ?>
                                    <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                                <?php } ?>
                            </select>
                            <span class="text-danger error-text industry_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Upload image</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="image" style="border:none" id="imgInp" accept="image/*">
                            <span class="text-danger error-text image_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md"></label>
                        <div class="col-md-8">
                            <img id="blah" src="{{ asset('assets/admin_assets/images/no_image.png')}}" style="width:100px;" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Upload Pdf</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="pdf" style="border:none" accept="application/pdf">
                            <span class="text-danger error-text pdf_err"></span>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>

        </div>

    </div>
</div>
<div class="modal fade" id="editInfographicModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="editInfographics" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="upInfographicsId" name="upInfographicsId">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Current Topic</label>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%;" name="currentTopic" id="editCurrentTopic">
                                <option value="">Select Current Topic</option>
                                <?php foreach ($currentTopic as $val) { ?>
                                    <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                                <?php } ?>
                            </select>
                            <span class="text-danger error-text currentTopic_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Industry</label>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%;" name="industry" id="editIndustry">
                            <option value="">Select Industry</option>
                                <?php foreach ($industries as $val) { ?>
                                    <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                                <?php } ?>
                            </select>
                            <span class="text-danger error-text industry_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Upload image</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="image" style="border:none" id="upImgInp" accept="image/*">
                            <span class="text-danger error-text image_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md"></label>
                        <div class="col-md-8">
                            <img id="upPreview" src="{{ asset('assets/admin_assets/images/no_image.png')}}" style="width:100px;" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Upload Pdf</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="pdf" style="border:none" accept="application/pdf" id="uploadPdf">
                            <span class="text-danger error-text pdf_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md"></label>
                        <div class="col-md-8" id="addPdfbutton">

                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>

        </div>

    </div>
</div>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    upImgInp.onchange = evt => {
        const [file] = upImgInp.files
        if (file) {
            upPreview.src = URL.createObjectURL(file)
        }
    }
    uploadPdf.onchange = evt => {
        document.getElementById("addPdfbutton").style.display = "none";
    }
    var preview_image = "{{ asset('assets/admin_assets/images/no_image.png')}}";
    var public_path = '<?php echo asset('assets/admin_assets/'); ?>';
    $(document).ready(function() {
        var dataTable = $('#getAllInfographics').DataTable({
            "ajax": {
                url: "/getAllInfographics",
                type: "GET"
            },
            "aoColumns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'current_topic[0].name'
                },
                {
                    data: 'industry[0].name'
                },
                {
                    data: 'image',
                    "render": function(data, type, full, meta) {
                        return '<img src="' + public_path + "/infographics/images/" + data + '"style="width:50px;height:50px">';
                    }
                },
                {
                    data: 'pdf',
                    "render": function(data, type, full, meta) {
                        return '<a href="' + public_path + "/infographics/pdf/" + data + '" target="_blank" type="button"  class="btn btn-default">View</a>';
                    }
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data + '"">Delete</a>&nbsp;<a href="" type="button" data-toggle="modal" data-target="#editInfographicModal"  class="btn btn-default" id="get_record" data-id="' + data + '"">Update</a>';
                    }
                },
                {
                    data: {
                        id: 'id',
                        homePage: 'homePage'
                    },
                    "render": function(data, type, full, meta) {
                        if (data.homePage == 1) {
                            return `<input type="checkbox" value="${data.homePage}" checked onchange="homePage(${data.id})">`;
                        } else {
                            return `<input type="checkbox" value="${data.homePage}" onchange="homePage(${data.id})">`;
                        }
                    },
                }
            ]

        });

        $("#addInfographics").on("submit", function(e) {
            e.preventDefault();
            var currentTopic = $('#currentTopic').find(":selected").val();
            var industry = $('#industry').find(":selected").val();
            if ((currentTopic == '' && industry != '') || (currentTopic != '' && industry == '')) {
                $.ajax({
                    url: "/addInfographics",
                    method: "POST",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: new FormData(this),
                    success: function(data) {
                        //console.log(data.status);
                        if (data.status == true) {
                            dataTable.ajax.reload();
                            $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                            $("#addInfographics").trigger('reset');
                            $('#InfographicsModal').modal('hide');
                            $('.error-text').empty();
                            $('.select2').prop('selectedIndex', 0);
                            $("#blah").attr("src", preview_image);
                        } else {
                            //console.log(data.error);
                            //$(".orgnisation").empty();
                            printErrorMsg(data.error);
                        }

                    },
                });
            } else {
                alert('Select Current Topic or Industry');
            }
        });
        // delete
        $(document).on('click', '#delete_records', function() {

            var id = $(this).data('id');
            //alert(id);
            var token = $("meta[name='csrf-token']").attr("content");

            if (confirm("Are you sure you want to delete this")) {
                $.ajax({
                    type: "POST",
                    url: "/deleteInfographics",
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
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        }
                    }
                });
            }
        });
        // get
        $(document).on('click', '#get_record', function() {
            $('#addPdfbutton').show();
            $('#editInfographics').trigger('reset');
            $("#editCurrentTopic").val("");
            $("#editIndustry").val("");
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/getInfographics",
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data);
                    $("#editCurrentTopic option[value='" + data[0].current_topic_id + "']").attr("selected", "selected");
                    $("#editIndustry option[value='" + data[0].industries_id + "']").attr("selected", "selected");
                    // $("#editCurrentTopic").val(`${data[0].current_topic_id}`).attr("selected","selected");
                    // $("#editIndustry").val(`${data[0].industries_id}`).attr("selected","selected");
                    $("#upPreview").attr("src", public_path + "/infographics/images/" + data[0].image);
                    $("#addPdfbutton").html(`<a href="${public_path}/infographics/pdf/${data[0].pdf}" class="btn btn-primary" target="_blank">View</a>`);
                    $('#upInfographicsId').val(data[0].id);
                    //console.log(data[0].icon);

                }
            });
        });
        // update
        $("#editInfographics").on("submit", function(e) {
            e.preventDefault();
            //console.log($('#editInfographics').serialize());
            var currentTopic = $('#editCurrentTopic').find(":selected").val();
            var industry = $('#editIndustry').find(":selected").val();
            if ((currentTopic == '' && industry != '') || (currentTopic != '' && industry == '')) {
                $.ajax({
                    url: "/editInfographics",
                    method: "POST",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: new FormData(this),
                    success: function(data) {
                        if (data.status == true) {
                            dataTable.ajax.reload();
                            $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                            $("#editInfographics").trigger('reset');
                            $('#editInfographicModal').modal('hide');
                            $('.error-text').empty();
                        } else {
                            printErrorMsg(data.error);
                        }

                    },
                });
            } else {
                alert('Select Current Topic or Industry');
            }
        });

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                //console.log(key);
                console.log(value);
                $('.' + key + '_err').text(value);
            });
        }
    });

    function homePage(id) {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: "POST",
            url: "/infographicsHomePage",
            dataType: "json",
            cache: false,
            data: {
                "id": id,
                "_token": token,
            },
            success: function(data) {
                console.log(data);
                if (data.status == true) {
                    //alert(data.message);
                    //dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                }

            }
        });

    }
</script>