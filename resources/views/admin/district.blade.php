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
                        <li class="breadcrumb-item active">Districts</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div id="alert_message"></div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveDistrictModal">Add</button>
                    <!-- Modal -->
                    <div class="modal fade" id="saveDistrictModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Add District</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form enctype="multipart/form-data" onsubmit="saveDistrict(event)" id="saveDistrict">
                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <select class="form-control all_states" name="state_id">

                                                </select>
                                                <span class="text-danger error-text state_id_err"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>District</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="district">
                                                <span class="text-danger error-text district_err"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Icon</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="file" class="form-control" name="icon" style="border:none" id="imgInp" accept="image/*">
                                                <span class="text-danger error-text icon_err"></span>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="form-group col-md-8">
                                                <img id="blah" src="{{ asset('assets/admin_assets/images/no_image.png')}}" style="width:100px;" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary mb-2" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="updateDistrictModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Update District</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form enctype="multipart/form-data" onsubmit="updateDistrict(event)" id="updateDistrict">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="districtId">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <select class="form-control all_states" name="upState_id" id="upState_id">

                                                </select>
                                                <span class="text-danger error-text upState_id_err"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>District</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="upDistrict">
                                                <span class="text-danger error-text upDistrict_err"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Icon</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <!-- <input type="hidden" name="up_icon" id="up_icon"> -->
                                                <input type="file" class="form-control" name="upIcon" style="border:none" id="upIcon" accept="image/*">
                                                <span class="text-danger error-text upIcon_err"></span>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="form-group col-md-8">
                                                <img id="upPreview" src="{{ asset('assets/admin_assets/images/no_image.png')}}" style="width:100px;" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary mb-2" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                        <div class="card-body table-responsive">
                            <table id="districtTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>District</th>
                                        <th>State</th>
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
    upIcon.onchange = evt => {
        const [file] = upIcon.files
        if (file) {
            upPreview.src = URL.createObjectURL(file)
        }
    }
    var dataTable = '';
    $(document).ready(function() {

        dataTable = $('#districtTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "/getAllDistrict",
                type: "GET"
            },
            "aoColumns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name'
                },
                {
                    data: 'state_name.name'
                },
                {
                    data: 'icon',
                    "render": function(data, type, full, meta) {
                        if (data != null) {
                            return '<img style="width:50px" src="' + public_path + '/districtsIcons/' + data + '">';
                        } else {
                            return '<img style="width:50px" src="' + public_path + '/images/no_image.png' + '">';
                        }
                    }
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return `<button class="btn btn-default" onclick="getDistrict(${data})" data-toggle="modal" data-target="#updateDistrictModal">Update</button> &nbsp;<button class="btn btn-default" onclick="deleteDistrict(${data})">Delete</button>`;
                    }
                }
            ]

        });
    });
    // save district
    function saveDistrict(event) {
        event.preventDefault();
        var formData = new FormData(event.target);
        $.ajax({
            url: "/save_district",
            type: "post",
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function(data) {
                if (data.status == true) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    $("#saveDistrict").trigger('reset');
                    $('.district_err').empty();
                    $('.state_id_err').empty();
                    $('#UpBlah').attr('src', '');
                    $('#saveDistrictModal').modal('toggle');
                } else {
                    // console.log(data.error);
                    // $(".orgnisation").empty();
                    printErrorMsg(data.error);
                }
            }
        });
    }
    // update district
    function updateDistrict(event) {
        event.preventDefault();
        var formData = new FormData(event.target);
        $.ajax({
            url: "/update_district",
            type: "post",
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function(data) {
                if (data.status == true) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    $("#updateDistrict").trigger('reset');
                    $('.error-text').empty();
                    $('#UpBlah').attr('src', '');
                    $('#updateDistrictModal').modal('toggle');
                } else {
                    // console.log(data.error);
                    // $(".orgnisation").empty();
                    printErrorMsg(data.error);
                }
            }
        });
    }
    // delete district
    function deleteDistrict(id) {
        $.ajax({
            url: "/delete_district",
            type: "post",
            dataType: "json",
            data: {
                id: id,
                _token: $("meta[name='csrf-token']").attr("content")
            },
            success: function(data) {
                if (data.status == true) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                }

            }
        });
    }
    // get district
    function getDistrict(id) {
        $.ajax({
            url: "/get_district",
            method: "POST",
            dataType: "json",
            data: {
                id: id,
                _token: $("meta[name='csrf-token']").attr("content")
            },
            success: function(data) {
                $("input[name=districtId").val(data.id);
                $('input[name=upDistrict]').val(data.name);
                $('#upState_id').find(`option[value="${data.state_id}"]`).attr("selected", true);
                $("#up_icon").val(data.icon);
                if (data.icon == null) {
                    $("#upPreview").attr("src", public_path + "/images/no_image.png");
                } else {
                    $("#upPreview").attr("src", public_path + "/districtsIcons/" + data.icon);
                }
            }
        });
    }

    function allStates() {
        $.ajax({
            url: "/get_state",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var html = `<option selected disabled>Select State</option>`;
                data.data.map(function(element) {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                $(".all_states").html(html);

            }
        });
    }
    allStates();

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            //console.log(key);
            console.log(value);
            $('.' + key + '_err').text('This field is required');
        });
    }
</script>