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
                        <li class="breadcrumb-item active">Commodity</li>
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
                    <form id="addCommodity">
                        <div class="row" id="add">

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group col-md-1" style="padding-top: 5px;">
                                <label>Commodity</label>
                            </div>
                            <div class="form-group col-md-9">
                                <input type="text" class="form-control" name="commodity">
                                <span class="text-danger error-text commodity_err"></span>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary mb-2" value="Save">
                            </div>

                        </div>
                    </form>
                    <form id="updateCommodity">
                        <div class="row" style="display: none" id="update">

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="comm_id" value="" id="comm_id">
                            <div class="form-group col-md-1" style="padding-top: 5px;">
                                <label>Commodity</label>
                            </div>
                            <div class="form-group col-md-9">
                                <input type="text" class="form-control input-normal" name="commodity" id="comm_name">
                                <span class="text-danger error-text commodity_err"></span>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary mb-2" value="Update">
                            </div>
                        </div>
                    </form>

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
                            <table id="commodityTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Commodity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="allCommodity">


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
    function commodityFetch() {
        //alert("test");
        $.ajax({
            url: "/get_commodity",
            dataType: "json",
            success: function(data) {
                //console.log(data);
                if (data.status == false) {
                    $("#allCommodity").append("<b>" + data.message + "</b>");
                } else {
                    var i = 1;
                    //$("#allCountry").empty();
                    $.each(data.message, function(key, value) {
                        $("#allCommodity").append(`<tr>
                           <td>${i}</td>
                           <td>${value.comm_name}</td>   
                           <td colspan="2"><a type="button"  class="btn btn-default delete_records" onclick="deleteCommodity(${value.comm_id})">Delete</a>&nbsp;<a href="#scrollUp" type="button"  class="btn btn-default delete_records" onclick="updateComm(${value.comm_id})">Update</a></td>
                        </tr>`);
                        i++;
                    });
                    $('#commodityTable').dataTable();

                }
            },
        });
    }

    function deleteCommodity(id) {

        var token = $("meta[name='csrf-token']").attr("content");

        if (confirm("Are you sure you want to delete this ?")) {
            $.ajax({
                type: "POST",
                url: "/delete_commodity/" + id,
                dataType: "json",
                cache: false,
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        //$('#allCommodity').html('');
                        //commodityFetch();
                        location.reload();
                    }
                }
            });
        }
    }

    function updateComm(id) {
        var token = $("meta[name='csrf-token']").attr("content");
        $('#update').show();
        $('#add').hide();
        $.ajax({
            url: "/get_commodity/" + id,
            method: "POST",
            dataType: "json",
            data: {
                id: id,
                "_token": token,
            },
            success: function(data) {
                //console.log(data[0]);
                $('#comm_name').val(data[0].comm_name);
                $('#comm_id').val(data[0].comm_id);
            }
        });

    }


    $(document).ready(function() {
        $("#addCommodity").on("submit", function(e) {
            e.preventDefault();
            //alert($('#addCommodity').serialize());
            //console.log($('#addCommodity').serialize());

            $.ajax({
                url: "/save_commodity",
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
                        //$("#addCommodity").trigger('reset');
                        //$(".commodity_err").empty();
                        //$('#allCommodity').html('');
                        //commodityFetch();
                        location.reload();
                    } else {
                        //console.log(data.error);
                        $(".commodity").empty();
                        printErrorMsg(data.error);
                    }

                },
            });
        });
        $("#updateCommodity").on("submit", function(e) {
            e.preventDefault();
            //alert($('#updateCommodity').serialize());
            //console.log($('#updateCommodity').serialize());

            $.ajax({
                url: "/update_commodity",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        //$(".commodity_err").empty();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "updated successfully" + "</span" + "</div>");
                        //$("#updateCommodity").trigger('reset');
                        //$('#allCommodity').html('');
                        //commodityFetch();
                        location.reload();
                    } else {
                        //console.log(data.error);
                        $(".commodity_err").empty();
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
    commodityFetch();
</script>