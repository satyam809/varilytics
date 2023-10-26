<style>
    .scrollme {
        overflow-x: auto;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Assign Work</li>
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

                    <form id="assignwork">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select user</label>
                                    <select class="form-control select2" style="width: 100%;" name="users">
                                        <option value="">Select Users</option>
                                        <?php foreach ($users as $val) { ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text users_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Source</label>
                                    <select class="form-control select2 website" style="width: 100%;" name="website">
                                        <option value="">Select Source</option>
                                        <?php foreach ($work_field as $val) { ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->website; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text website_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Acronym</label>
                                    <input type="text" class="form-control select2 acronym empty_col" name="acronym" placeholder="Enter Acronym">
                                    <span class="text-danger error-text acronym_err assignerror"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Organisation Name</label>
                                    <input type="text" class="form-control select2 org_name empty_col" name="org_name" placeholder="Enter Orgnisation Name">
                                    <span class="text-danger error-text org_name_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sector</label>
                                    <input type="text" class="form-control select2 sector empty_col" name="sector" placeholder="Enter Agri Sector">
                                    <span class="text-danger error-text sector_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Domain/Topic</label>
                                    <input type="text" class="form-control select2 domain empty_col" name="domain" placeholder="Enter Agri Domain">
                                    <span class="text-danger error-text domain_err assignerror"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control select2" name="description" placeholder="Enter Description"></textarea>
                                    <span class="text-danger error-text description_err assignerror"></span>
                                </div>

                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Work File Name</label>
                                    <select class="form-control select2 link" style="width: 100%;" name="link[]" id="link" multiple>

                                    </select>
                                    <span class="text-danger error-text link_err assignerror"></span>
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

                    <form id="updateassignwork">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="val_id" id="val_id">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>User</label>
                                    <select class="form-control select2" style="width: 100%;" name="users" id="users_name">
                                        <option value="">Select Users</option>
                                        <?php foreach ($users as $val) { ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text users_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Website</label>
                                    <select class="form-control select2 website" style="width: 100%;" name="website">
                                        <option value="">Select Website</option>
                                        <?php foreach ($work_field as $val) { ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->website; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text website_err assignerror"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Acronym</label>
                                    <input type="text" class="form-control select2 acronym empty_col" name="acronym" placeholder="Enter Acronym" id="up_acronym">

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Organisation Name</label>
                                    <input type="text" class="form-control select2 org_name empty_col" name="org_name" placeholder="Enter Orgnisation Name">

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sector</label>
                                    <input type="text" class="form-control select2 sector empty_col" name="sector" placeholder="Enter Agri Sector">

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Domain/Topic</label>
                                    <input type="text" class="form-control select2 domain empty_col" name="domain" placeholder="Enter Agri Domain">
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control select2" name="description" placeholder="Enter Description" id="description"></textarea>
                                    <span class="text-danger error-text description_err assignerror"></span>
                                </div>

                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Work File Name</label>
                                    <select class="form-control select2 link" style="width: 100%;" name="link[]" id="up_link" multiple>


                                    </select>
                                    <span class="text-danger error-text link_err assignerror"></span>
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
                <!-- <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ asset('assets/assign_work.csv') }}" class="btn btn-default" download>Download Format</a>
                        </div>
                        <div class="col-md-6">
                            <form enctype="multipart/form-data" method="post" action="assignWork_upload">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-group">
                                    <label for="exampleInputFile">File Upload</label>
                                    <input type="file" name="file" id="file" size="150">
                                    <p class="help-block">Only Excel/CSV File Import.</p>
                                </div>
                                <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
                            </form>
                        </div>
                    </div>


                </div> -->

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
                            <table id="assignWorkTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Users</th>
                                        <th>Website</th>
                                        <th>Work File Name</th>
                                        <th>Assigned Date</th>
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
        $(".website").on("change", function() {
            $('.empty_col').val('');
            var token = $("meta[name='csrf-token']").attr("content");
            //console.log(token);
            var website_id = this.value;
            // alert(website_id);
            $.ajax({
                type: "POST",
                url: "/getField/" + website_id,
                dataType: "json",
                cache: false,
                data: {
                    "website_id": website_id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data);

                    $('.domain').val(data.data[0].domain);
                    $('.acronym').val(data.data[0].acronym);
                    $('.org_name').val(data.data[0].org_name);
                    $('.sector').val(data.data[0].sector);
                    $('.link').empty();
                    for (var i = 0; i < data.work_link.length; i++) {
                        $('.link').append($('<option>', {
                            value: data.work_link[i].id,
                            text: data.work_link[i].name
                        }));
                    }


                }
            });

        });
        var dataTable = $('#assignWorkTable').DataTable({

            "ajax": {
                url: "/allassignwork",
                type: "GET"
            },
            "columns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name'
                },
                {
                    data: 'website'
                },
                {
                    data: {
                        link_name: "link_name",
                        assignId: "assignId"
                    },
                    "render": function(data, type, row) {
                        var link_name = '';
                        // var link = data.link_name.map(i => `<li>${i}</li>`).join('');
                        // var linkId = data.assignId.map(j => `<a data-assignId="${j}"><i class="fa fa-trash-o"></i></a>`).join('');
                        // return link + linkId;
                        for (var i = 0; i < data.assignId.length; i++) {
                            for (var j = 0; j < data.link_name.length; j++) {
                                if (i == j) {
                                    link_name += `<li>${data.link_name[j]}<a type="button" id="deleteSingleRecord" data-assignworkid="${data.assignId[i]}"><i class="fa fa-trash-o"></i></a></li>`;
                                    break;
                                }
                            }
                        }
                        return link_name;
                        //}
                    }
                },
                {
                    data: 'assigned_date'
                },
                {
                    data: {
                        id: 'id',
                        work_field_id: 'work_field_id'
                    },
                    "render": function(data, type, full, meta) {
                        return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data.id + '">Delete</a>&nbsp;<a href="#scrollUp" type="button"  class="btn btn-default" id="get_record" data-work_field_id="' + data.work_field_id + '" data-id="' + data.id + '">Update</a>';
                    }
                }
            ]


        });


        // add
        $("#assignwork").on("submit", function(e) {
            e.preventDefault();
            //alert($('#assignwork').serialize());
            //console.log($('#assignwork').serialize());

            $.ajax({
                url: "/save_assignwork",
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
                        $("#assignwork").trigger('reset');
                        $('.assignerror').empty();
                        $('#link').empty();
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
                    url: "/deleteassignwork/" + id,
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
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is deleted successfully" + "</span" + "</div>");
                        }
                    }
                });
            }
        });

        // single delete
        $(document).on('click', '#deleteSingleRecord', function() {

            var id = $(this).data('assignworkid');
            //alert(id);
            var token = $("meta[name='csrf-token']").attr("content");

            if (confirm("Are you sure you want to delete this")) {
                $.ajax({
                    type: "POST",
                    url: "/deleteSingleAssignwork/" + id,
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
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is deleted successfully" + "</span" + "</div>");
                        }
                    }
                });
            }
        });

        // get

        $(document).on('click', '#get_record', function() {
            var id = $(this).data('id');
            // alert(id);
            var work_field_id = $(this).data('work_field_id');
            // alert(work_field_id);
            var token = $("meta[name='csrf-token']").attr("content");
            $('#update').show();
            $('#add').hide();
            $.ajax({
                url: "/get_assignwork/" + id + "/" + work_field_id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    console.log(data.assign_work);
                    //let arr = data.assign_work[0].work_link_ids.split(',');
                    //console.log(arr);
                    $('#val_id').val(id);
                    $("#users_name option[value='" + data.assign_work[0].userId + "']").attr("selected", "selected");
                    $(".website option[value='" + data.assign_work[0].work_fieldId + "']").attr("selected", "selected");
                    $('.domain').val(data.assign_work[0].domain);
                    $('.acronym').val(data.assign_work[0].acronym);
                    $('.org_name').val(data.assign_work[0].org_name);
                    $('.sector').val(data.assign_work[0].sector);
                    $('#assigned_date').val(data.assign_work[0].assigned_date);
                    $('#up_link').empty();
                    for (var i = 0; i < data.assign_work.length; i++) {
                        //console.log(data.assign_work[i].workId);
                        // $("#up_link").find('option[value="' + data.assign_work[i].workId + '"]').attr("selected", "selected");

                        // $('#up_link').append($('<option selected>', {
                        //     value: data.assign_work[i].workId,
                        //     text: data.assign_work[i].link_name
                        // }));
                        $('#up_link').append("<option value='" + data.assign_work[i].workId + "' selected>" + data.assign_work[i].link_name + "</option>");
                    }
                    for (var i = 0; i < data.link.length; i++) {
                        $('#up_link').append($('<option>', {
                            value: data.link[i].id,
                            text: data.link[i].name
                        }));
                    }



                    //console.log(data[0].work_link_ids);

                }
            });
        });

        // update
        $("#updateassignwork").on("submit", function(e) {
            e.preventDefault();
            //alert($('#updateOrganisation').serialize());
            //console.log($('#updateOrganisation').serialize());

            $.ajax({
                url: "/update_assignwork",
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
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Organisation is updated successfully" + "</span" + "</div>");
                        $("#updateassignwork").trigger('reset');
                        $('.assignerror').empty();
                        $("#up_link").empty();
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
</script>