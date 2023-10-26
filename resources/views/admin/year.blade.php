<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Year</li>
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
                        <form class="form-inline" id="addYear">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group mx-sm-3 mb-2">
                                <label>From</label>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="date" class="form-control" name="from_date">
                                <span class="text-danger error-text from_date_err"></span>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label>To</label>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="date" class="form-control" name="to_date">
                                <span class="text-danger error-text to_date_err"></span>
                            </div>
                            <input type="submit" class="btn btn-primary mb-2" value="Save">
                        </form>

                    </div>
                    <div class="row" id="update" style="display: none">
                        <form class="form-inline" id="updateYear">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="yr_id" value="" id="yr_id">
                            <div class="form-group mx-sm-3 mb-2">
                                <label>From</label>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="date" class="form-control" name="from_date" id="from_date">
                                <span class="text-danger error-text from_date_err"></span>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label>To</label>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="date" class="form-control" name="to_date" id="to_date">
                                <span class="text-danger error-text to_date_err"></span>
                            </div>
                            <input type="submit" class="btn btn-primary mb-2" value="Update">
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
                            <table id="yearsTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="allYear">


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
    function yearFetch() {
        //alert("test");
        $.ajax({
            url: "/get_year",
            dataType: "json",
            success: function(data) {
                //console.log(data);
                if (data.status == false) {
                    $("#allYear").append("<b>" + data.message + "</b>");
                } else {
                    var i = 1;
                    //$("#allCountry").empty();
                    $.each(data.message, function(key, value) {
                        $("#allYear").append(`<tr>
                           <td>${i}</td>
                           <td>${value.from_date.slice(0,4)}-${value.to_date.slice(0,4)}</td>   
                           <td><a type="button"  class="btn btn-default delete_records" onclick="deleteYear(${value.yr_id})">Delete</a>&nbsp;<a type="button"  class="btn btn-default delete_records" onclick="updateYear(${value.yr_id})">Update</a></td>
                        </tr>`);
                        i++;
                    });
                    $("#yearsTable").dataTable();

                }
            },
        });
    }

    function deleteYear(id) {

        var token = $("meta[name='csrf-token']").attr("content");

        if (confirm("Are you sure you want to delete this")) {
            $.ajax({
                type: "POST",
                url: "/delete_year/" + id,
                dataType: "json",
                cache: false,
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        //$('#allYear').html('');
                        //countryFetch();
                        location.reload();
                    }
                }
            });
        }
    }

    function updateYear(id) {
        var token = $("meta[name='csrf-token']").attr("content");
        $('#update').show();
        $('#add').hide();
        $.ajax({
            url: "/get_year/" + id,
            method: "POST",
            dataType: "json",
            data: {
                id: id,
                "_token": token,
            },
            success: function(data) {
                //console.log(data[0]);
                $('#from_date').val(data[0].from_date);
                $('#to_date').val(data[0].to_date);
                $('#yr_id').val(data[0].yr_id);
            }
        });

    }


    $(document).ready(function() {
        $("#addYear").on("submit", function(e) {
            e.preventDefault();
            //alert($('#addYear').serialize());
            //console.log($('#addCountry').serialize());

            $.ajax({
                url: "/save_year",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {

                    if (data.status == true) {

                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is added successfully" + "</span" + "</div>");
                        // $("#addYear").trigger('reset');
                        //$('#allYear').html('');
                        //countryFetch();
                        location.reload();
                    } else {
                        //console.log(data.error);
                        //$(".orgnisation").empty();
                        printErrorMsg(data.error);
                    }

                },
            });
        });
        $("#updateYear").on("submit", function(e) {
            e.preventDefault();
            //alert($('#updateYear').serialize());
            //console.log($('#updateYear').serialize());

            $.ajax({
                url: "/update_year",
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
                        location.reload();
                        //$("#updateYear").trigger('reset');
                        //$('#allYear').html('');
                        //yearFetch();
                    } else {
                        //console.log(data.error);
                        //$(".orgnisation").empty();
                        printErrorMsg(data.error);
                    }

                },
            });
        });

    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            //console.log(key);
            //console.log(value);
            $('.' + key + '_err').text(value);
        });
    }
    yearFetch();
</script>