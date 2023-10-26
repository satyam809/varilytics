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
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6" style="text-align: end;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#sliderModal">Add</button>
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
                            <table id="getAllSliders" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Heading</th>
                                        <th>Paragraph</th>
                                        <th>Image</th>
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


    <!-- /.content -->
</div>

<div class="modal fade" id="sliderModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="addSlider" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Heading</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="heading">
                            <span class="text-danger error-text heading_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Paragraph</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="paragraph"></textarea>
                            <span class="text-danger error-text paragraph_err"></span>
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
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>

        </div>

    </div>
</div>
<div class="modal fade" id="editSliderModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="editSlider" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="upSliderId" name="upSliderId">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Heading</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="heading" id="heading">
                            <span class="text-danger error-text heading_err"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Paragraph</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="paragraph" id="paragraph"></textarea>
                            <span class="text-danger error-text paragraph_err"></span>
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
    var preview_image = "{{ asset('assets/admin_assets/images/no_image.png')}}";
    var public_path = '<?php echo asset('assets/admin_assets/'); ?>';
    $(document).ready(function() {
        var dataTable = $('#getAllSliders').DataTable({
            "ajax": {
                url: "/getAllSliders",
                type: "GET"
            },
            "aoColumns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'heading'
                },
                {
                    data: 'paragraph'
                },
                {
                    data: 'image',
                    "render": function(data, type, full, meta) {
                        return '<img src="' + public_path + "/slider/" + data + '"style="width:50px;height:50px">';
                    }
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data + '"">Delete</a>&nbsp;<a href="" type="button" data-toggle="modal" data-target="#editSliderModal"  class="btn btn-default" id="get_record" data-id="' + data + '"">Update</a>';
                    }
                }
            ]

        });

        $("#addSlider").on("submit", function(e) {
            e.preventDefault();
            var currentTopic = $('#currentTopic').find(":selected").val();
            var industry = $('#industry').find(":selected").val();
            $.ajax({
                url: "/addSlider",
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
                        $("#addSlider").trigger('reset');
                        $('#sliderModal').modal('hide');
                        $('.error-text').empty();
                        $("#blah").attr("src", preview_image);
                    } else {
                        //console.log(data.error);
                        //$(".orgnisation").empty();
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
                    url: "/deleteSlider",
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
            $('#editSlider').trigger('reset');
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/getSlider",
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    console.log(data);
                    $('#heading').val(data[0].heading);
                    $('#paragraph').val(data[0].paragraph);
                    $("#upPreview").attr("src", public_path + "/slider/" + data[0].image);
                    $('#upSliderId').val(data[0].id);
                    //console.log(data[0].icon);

                }
            });
        });
        // update
        $("#editSlider").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/editSlider",
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
                        $("#editSlider").trigger('reset');
                        $('#editSliderModal').modal('hide');
                        $('.error-text').empty();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });

        });

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                //console.log(key);
                console.log(value);
                $('.' + key + '_err').text(value);
            });
        }
    });
</script>