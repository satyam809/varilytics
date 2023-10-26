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
                        <li class="breadcrumb-item active">SmartCities</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div id="alert_message"></div>
                <div class="card-body">
                    <div class="row" id="add">
                        <form class="form-inline" id="addSmartCity">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group mx-sm-2 mb-2">
                                <label>Smart City</label>
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <input type="text" class="form-control" name="smartCity">
                                <span class="text-danger error-text smartCity_err"></span>
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <label>Icon</label>
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <input type="file" class="form-control" name="icon" style="border:none" id="imgInp" accept="image/*">
                                <span class="text-danger error-text icon_err"></span>
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <img id="blah" src="{{ asset('assets/admin_assets/images/no_image.png')}}" style="width:100px;" />
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <input type="submit" class="btn btn-primary mb-2" value="Save">
                            </div>
                        </form>

                    </div>

                    <div class="row" style="display: none" id="update">
                        <form class="form-inline" id="updateSmartCity">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="smartCity_id" value="" id="smartCity_id">
                            <div class="form-group mx-sm-2 mb-2">
                                <label>Smart City</label>
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <input type="text" class="form-control" name="smartCity" id="smartCity_name">
                                <span class="text-danger error-text smartCity_err"></span>
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <label>Icon</label>
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <input type="hidden" name="up_icon" id="up_icon">
                                <input type="file" class="form-control" name="icon" style="border:none" id="UpImgInp" accept="image/*">
                                <span class="text-danger error-text icon_err"></span>
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <img id="UpBlah" src="" style="width:100px;" />
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <input type="submit" class="btn btn-primary mb-2" value="Update">
                            </div>
                        </form>

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
                        <div class="card-body table-responsive">
                            <table id="smartCityTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Smart City</th>
                                        <th>Icon</th>
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
<script>
    var public_path = '<?php echo asset('assets/admin_assets/'); ?>';
    //alert(public_path);
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    UpImgInp.onchange = evt => {
        const [file] = UpImgInp.files
        if (file) {
            UpBlah.src = URL.createObjectURL(file)
        }
    }

    $(document).ready(function() {

        var dataTable = $('#smartCityTable').DataTable({
            "ajax": {
                url: "/get_smartCity",
                type: "GET"
            },
            "aoColumns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name'
                },
                {
                    data: 'icon',
                    "render": function(data, type, full, meta) {
                        if (data != null) {
                            return '<img style="width:50px" src="' + public_path + '/smartCitiesIcons/' + data + '">';
                        } else {
                            return '<img style="width:50px" src="' + public_path + '/images/no_image.png' + '">';
                        }
                    }
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return '<a href="#scrollUp" type="button"  class="btn btn-default" id="get_record" data-id="' + data + '"">Update</a>';
                    }
                }
            ]

        });
        

        // get

        $(document).on('click', '#get_record', function() {
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            $('#update').show();
            $('#add').hide();
            $.ajax({
                url: "/get_smartCity/" + id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data);
                    //console.log(data[0].icon);
                    $('#smartCity_name').val(data.name);
                    $('#smartCity_id').val(data.id);
                    $("#up_icon").val(data.icon);
                    if (data.icon == null) {
                        $("#UpBlah").attr("src", public_path + "/images/no_image.png");
                    } else {
                        $("#UpBlah").attr("src", public_path + "/smartCitiesIcons/" + data.icon);
                    }
                }
            });
        });

        // update
        $("#updateSmartCity").on("submit", function(e) {
            e.preventDefault();
            //alert('testing');
            // alert($('#updateState').serialize());
            // console.log($('#updateSmartCity').serialize());
            // die;
            $.ajax({
                url: "/update_smartCity",
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
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        $("#updateSmartCity").trigger('reset');
                        $('.smartCity_err').empty();
                        $('#UpBlah').attr('src', '');
                    } else {
                        // console.log(data.error);
                        // $(".orgnisation").empty();
                        printErrorMsg(data.error);
                    }

                },
            });
        });

    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text('This field is required');
        });
    }
</script>