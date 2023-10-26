<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Organization And Countries</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div id="alert_message"></div>
                <div class="card-body" id='add'>
                    <div class="row">
                        <form class="form-inline" id="orgAndCountry">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Organization</label>
                                    <select class="form-control select2" style="width: 100%;" name="orgnization">
                                        <option></option>
                                        <?php foreach ($org as $org) { ?>
                                            <option value="<?php echo $org->org_id; ?>"><?php echo $org->org_name; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text orgnization_err orgCountry"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="form-control select2" style="width: 100%;" name="country">
                                        <option></option>
                                        <?php foreach ($country as $country) { ?>
                                            <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text organisation_err orgCountry"></span>
                                </div>

                            </div>
                            <div class=" col-md-4">
                                <div class="form-group" style="margin-top:30px;">
                                    <label></label>

                                    <input type="submit" class="btn btn-primary" value="Save">

                                </div>
                            </div>
                        </form>
                    </div>


                </div>
                <div class="card-body" id='update' style='display:none'>
                    <div class="row">
                        <form class="form-inline" id="updateOrgAndCountry">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="val_id" id="val_id">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Organization</label>
                                    <select class="form-control select2" style="width: 100%;" name="orgnization" id="org_name">
                                        <option></option>
                                        <?php foreach ($up_org as $org) { ?>
                                            <option value="<?php echo $org->org_id; ?>"><?php echo $org->org_name; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text orgnization_err orgCountry"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="form-control select2" style="width: 100%;" name="country" id="country_name">
                                        <option></option>
                                        <?php foreach ($up_country as $country) { ?>
                                            <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text organisation_err orgCountry"></span>
                                </div>

                            </div>
                            <div class=" col-md-4">
                                <div class="form-group" style="margin-top:30px;">
                                    <label></label>

                                    <input type="submit" class="btn btn-primary" value="Update">

                                </div>
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
                        <div class="card-body">
                            <table id="orgAndCountryTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Country</th>
                                        <th>Organisation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="allOrgAndCountry">


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


    <!-- /.content -->
</div>
<script>
    function allOrgAndCountry() {
        $.ajax({
            url: "/allOrgAndCountry",
            dataType: "json",
            success: function(data) {
                //console.log(data);
                console.log(JSON.stringify(data));
                if (data.status == false) {
                    $("#allOrgAndCountry").append("<b>" + data.message + "</b>");
                } else {
                    var i = 1;
                    $.each(data, function(key, value) {
                        $("#allOrgAndCountry").append(`<tr>
                           <td>${i}</td>
                           <td>${value.country_name}</td>
                           <td>${value.org_name}</td>   
                           <td colspan='2'><a type="button"  class="btn btn-default delete_records" onclick="deleteOrgAndCountry(${value.id})">Delete</a>&nbsp;<a href="#upScroll" type="button"  class="btn btn-default delete_records" onclick="updateOrgAndCountry(${value.id})">Update</a></td>
                        </tr>`);
                        i++;
                    });
                    $("#orgAndCountryTable").DataTable();

                }
            },
        });
    }





    function updateOrgAndCountry(id) {
        //alert(id);
        var token = $("meta[name='csrf-token']").attr("content");
        $('#update').show();
        $('#add').hide();
        $.ajax({
            url: "/get_orgAndCountry/" + id,
            method: "POST",
            dataType: "json",
            data: {
                id: id,
                "_token": token,
            },
            success: function(data) {
                console.log(data);
                var country_id = data[0].country_id;
                var org_id = data[0].org_id;
                //alert(get_comm_id);

                $("#country_name option[value='" + country_id + "']").attr("selected", "selected");
                $("#org_name option[value='" + org_id + "']").attr("selected", "selected");
                $('#val_id').val(data[0].id);

                $('#allOrgAndCountry').empty();
                allOrgAndCountry();
            }
        });
    }

    function deleteOrgAndCountry(id) {
        //console.log(id);
        var token = $("meta[name='csrf-token']").attr("content");
        //console.log(token);
        if (confirm("Are you sure you want to delete this")) {
            $.ajax({
                type: "POST",
                url: "/deleteOrgAndCountry/" + id,
                dataType: "json",
                cache: false,
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        //$('#allCommYrvalue').html('');
                        //location.reload();
                        //allCommYrvalue();
                        $('#allOrgAndCountry').empty();
                        allOrgAndCountry();
                    }
                }
            });
        }
    }
    $(document).ready(function() {
        $("#orgAndCountry").on("submit", function(e) {
            e.preventDefault();
            //alert($('#orgAndCountry').serialize());
            //console.log($('#orgAndCountry').serialize());
            $.ajax({
                url: "/save_orgAndCountry",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is added successfully" + "</span" + "</div>");
                      $("#updateOrgAndCountry").trigger('reset');
                        $('.organisation_err').empty();
                        setTimeout(function(){
                        $('#alert_message').addClass('d-none');
                        },3000);
                    } else {
                        //console.log(data.error);
                        //$(".orgnisation").empty();
                        printErrorMsg(data.error);
                    }

                        location.reload();
                        
                    // } else {
                    //     $(".orgCountry").empty();
                    //     printErrorMsg(data.error);
                    // }
                    
                    // $('select[name="orgnization"] option:first').attr('selected','selected');
                    //  $('select[name="country"] option:first').attr('selected','selected');
                    // $('#allOrgAndCountry').empty();
                    //  allOrgAndCountry();
                    //  //$('#orgAndCountryTable').DataTable().ajax.reload();
                    //  //$('#orgAndCountryTable').reload();
                    //  //DataTable(ajax.reload());

                   
                },
            });
        });

        $("#updateOrgAndCountry").on("submit", function(e) {
            e.preventDefault();
            // alert($('#updateOrgAndCountry').serialize());
            //console.log($('#updateOrgAndCountry').serialize());
            $.ajax({
                url: "/update_orgAndCountry",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is updated successfully" + "</span" + "</div>");
                        //$("#updateOrgAndCountry").trigger('reset');
                        //$('#allOrgAndCountry').html('');
                        //allOrgAndCountry();
                        //$('#update').hide();
                        //$('#add').show();
                        //location.reload();

                        $("#updateOrgAndCountry").trigger('reset');
                        $('.organisation_err').empty();
                    } else {
                        //console.log(data.error);
                        //$(".orgnisation").empty();
                        printErrorMsg(data.error);
                    }

                    //     $('#allOrgAndCountry').empty();
                    //     allOrgAndCountry();
                    //     $("#org_name option:first").attr('selected','selected');
                    //     $("#country_name option:first").attr('selected','selected');
                    // } else {
                    //     //console.log(data.error);
                    //     //$(".orgnisation").empty();
                    //     printErrorMsg(data.error);
                    // }

                },
            });
        });


    });
    allOrgAndCountry();

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            //console.log(key);
            $('.' + key + '_err').text(value);
        });
    }
</script>