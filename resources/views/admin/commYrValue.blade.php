<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper" id='upScroll'>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Commodity Year & Value</li>
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
                <div class="card-body" id="add">
                    <div class="row">
                        <form class="form-inline" id="commYrvalue">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Select Topic</label>
                                    <select class="form-control select2" style="width: 100%;" name="topic">
                                        <option></option>
                                        <?php foreach ($topic as $topic) { ?>
                                            <option value="<?php echo $topic->id; ?>"><?php echo $topic->name; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text topic_err commYr"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Commodities</label>
                                    <select class="form-control select2" style="width: 100%;" name="commodity">
                                        <option></option>
                                        <?php foreach ($comm as $comm) { ?>
                                            <option value="<?php echo $comm->comm_id; ?>"><?php echo $comm->comm_name; ?></option>

                                        <?php } ?>

                                    </select>
                                    <span class="text-danger error-text commodity_err commYr"></span>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Select Year</label>
                                    <select class="form-control select2" style="width: 100%;" name="year">
                                        <option></option>
                                        <?php foreach ($years as $years) { ?>
                                            <option value="<?php echo $years->yr_id; ?>"><?php echo substr($years->from_date, 0, 4); ?>-<?php echo substr($years->to_date, 0, 4); ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text year_err commYr"></span>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Value(US $ Million)</label>
                                    <input type="text" name="value" class="form-control select2"> <span class="text-danger error-text value_err commYr"></span>
                                </div>

                            </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group" _style="margin-top:30px;">
                                <label></label>

                                <input type="submit" class="btn btn-primary" value="Save">

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-body" id="update" style="display:none;">
                    <div class="row">
                        <form class="form-inline" id="update_commYrvalue">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="val_id" id="val_id">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Select Topic</label>
                                    <select class="form-control select2" style="width: 100%;" name="topic" id="topic">
                                        <option></option>
                                        <?php foreach ($up_topic as $topic) { ?>
                                            <option value="<?php echo $topic->id; ?>"><?php echo $topic->name; ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text topic_err commYr"></span>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Commodities</label>
                                    <select class="form-control select2" style="width: 100%;" name="commodity" id="commodity">
                                        <option></option>

                                        <?php
                                        foreach ($up_comm as $comm) { ?>

                                            <option value="<?php echo $comm->comm_id; ?>"><?php echo $comm->comm_name; ?></option>
                                        <?php } ?>

                                    </select>
                                    <span class="text-danger error-text commodity_err commYr"></span>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Select Year</label>
                                    <select class="form-control select2" style="width: 100%;" name="year" id="year">
                                        <option></option>
                                        <?php foreach ($up_years as $years) { ?>
                                            <option value="<?php echo $years->yr_id; ?>"><?php echo substr($years->from_date, 0, 4); ?>-<?php echo substr($years->to_date, 0, 4); ?></option>

                                        <?php } ?>
                                    </select>
                                    <span class="text-danger error-text year_err commYr"></span>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Value(US $ Million)</label>
                                    <input type="text" name="value" class="form-control select2" id="value"> <span class="text-danger error-text value_err commYr"></span>
                                </div>

                            </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group" _style="margin-top:30px;">
                                <label></label>

                                <input type="submit" class="btn btn-primary" value="Update">

                            </div>
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

                    <div class="card">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="commYrValueTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Topic</th>
                                        <th>Commodity</th>
                                        <th>Year</th>
                                        <th>Value(US $ Million)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="allCommYrvalue">


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
    function allCommYrvalue() {
        $.ajax({
            url: "/allCommodityYearValue",
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.status == false) {
                    $("#allCommYrvalue").append("<b>" + data.message + "</b>");
                } else {
                    var i = 1;
                    $.each(data, function(key, value) {
                        $("#allCommYrvalue").append(`<tr>
                           <td>${i}</td>
                           <td>${value.topic_name}</td>
                           <td>${value.comm_name}</td>
                           <td>${value.from_date.slice(0,4)}-${value.to_date.slice(0,4)}</td>   
                           <td>${value.value}</td>
                           <td><a type="button"  class="btn btn-default delete_records" onclick="deletecommYrValue(${value.val_id})">Delete</a>&nbsp;<a href="#upScroll" type="button"  class="btn btn-default delete_records" onclick="updateCommYrVal(${value.val_id})">Update</a></td>
                        </tr>`);
                        i++;
                    });
                    $("#commYrValueTable").dataTable();

                }
            },
        });
    }

    function updateCommYrVal(id) {
        //alert(id);
        var token = $("meta[name='csrf-token']").attr("content");
        $('#update').show();
        $('#add').hide();
        $.ajax({
            url: "/get_commYrVal/" + id,
            method: "POST",
            dataType: "json",
            data: {
                id: id,
                "_token": token,
            },
            success: function(data) {
                //console.log(data);
                var get_topic_id = data[0].topic_id;
                var get_comm_id = data[0].comm_id;
                var yr_id = data[0].yr_id;
                //alert(get_comm_id);
                $("#topic option[value='" + get_topic_id + "']").attr("selected", "selected");
                $("#commodity option[value='" + get_comm_id + "']").attr("selected", "selected");
                $("#year option[value='" + yr_id + "']").attr("selected", "selected");
                $('#value').val(data[0].value);
                $('#val_id').val(data[0].val_id);
            }
        });
    }

    function deletecommYrValue(id) {
        //console.log(id);
        var token = $("meta[name='csrf-token']").attr("content");
        //console.log(token);
        if (confirm("Are you sure you want to delete this")) {
            $.ajax({
                type: "POST",
                url: "/deleteCommYrValue/" + id,
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
                        // location.reload();
                        //allCommYrvalue();
                        $('#allCommYrvalue').empty();
                        allCommYrvalue();
                    }
                }
            });
        }
    }

    $(document).ready(function() {
        $("#commYrvalue").on("submit", function(e) {
            e.preventDefault();
            //alert($('#commYrvalue').serialize());
            //console.log($('#commYrvalue').serialize());

            $.ajax({
                url: "/save_commYrValue",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        //location.reload();
                        //$("#commYrvalue").trigger('reset');
                        //$('#allCommYrvalue').empty();
                        //allCommYrvalue();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is added successfully" + "</span" + "</div>");
                        // location.reload();
                    } else {
                        $(".commYr").empty();
                        printErrorMsg(data.error);
                    }
                    $('#allCommYrvalue').empty();
                        allCommYrvalue();
                },
            });


        });

        $("#update_commYrvalue").on("submit", function(e) {
            e.preventDefault();
            //alert($('#update_commYrvalue').serialize());
            //console.log($('#update_commYrvalue').serialize());
            $.ajax({
                url: "/update_commYrVal",
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
                        //$("#update_commYrvalue").trigger('reset');
                        //$('#allCommYrvalue').html('');
                        //allCommYrvalue();
                        //$('#update').hide();
                        //$('#add').show();

                        $('#allCommYrvalue').empty();
                        allCommYrvalue();
                        // location.reload();
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
            $('.' + key + '_err').text(value);
        });
    }
    allCommYrvalue();
</script>