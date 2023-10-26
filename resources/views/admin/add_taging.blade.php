<style>
    .select-checkbox-fa option::before {
        font-family: FontAwesome;
        content: "\f096";
        width: 1.3em;
        display: inline-block;
        margin-left: 2px;
    }

    .select-checkbox-fa option:checked::before {
        content: "\f046";
    }
    .select2-container--default .select2-selection--single{
    height: 38px;
    }
</style>
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
                        <li class="breadcrumb-item active">Add Tagging</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-body">
                    <form id="addTaging">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Topic</label>
                            <div class="col-sm-4">
                                <select class="form-control sub_topic select2" name="topic[]" id="topic">
                                    <option value="">Select Topic</option>
                                </select>
                                <span class="text-danger error-text topic_err"></span>
                            </div>
                        </div>
                        <div id="addSubTopic">

                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Country</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" name="country" id="country">
                                    <option value="">Select Country</option>
                                </select>
                                <span class="text-danger error-text country_err"></span>
                            </div>
                        </div>
                        <div id="addStates">

                        </div>
                        <div id="addDistricts">

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Year & Month</label>
                            <div class="col-sm-4">
                                <input type="month" class="form-control form-control-md" name="year">
                                <span class="text-danger error-text year_err"></span>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Table</label>
                            <div class="col-sm-10">
                                <select class="form-control select-checkbox-fa" name="table_id[]" multiple id="table_id">

                                </select>
                                <span class="text-danger error-text tag_err"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="submit" class="btn btn-primary">
                        </div>

                    </form>
                    <!-- /.row -->


                    <!-- /.row -->
                </div>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    $('.select2').select2();
    $(document).ready(function() {

        // get parent topic
        $.ajax({
            url: "/parent_topic",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                $("#topic").append(html);
            }
        });

        // get sub topic
        $(document).on("change", ".sub_topic", function() {
            var parentId = this.value;
            if (parentId != "") {
                $.ajax({
                    url: "/get_subtopic/" + parentId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class = "col-sm-2 col-form-label col-form-label-md"> Sub Topic </label>
                                     <div class = "col-sm-4">
                                        <select class = "form-control form-control-md sub_topic" name = "topic[]"><option value=""> Select sub topic </option>`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text sub_topic_err"></span></div></div>`;
                            //console.log(html);
                            $("#addSubTopic").append(html);
                        }
                    } 
                });
            }
        });


        // get country
        $.ajax({
            url: "/get_country",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                //console.log(data.message);
                var html = '';
                for (var i = 0; i < data.message.length; i++) {
                    html += `<option value="${data.message[i].country_id}">${data.message[i].country_name}</option>`;
                }
                $("#country").append(html);
            }
        });

        // get states
        $(document).on("change", "#country", function() {
            var countryId = this.value;
            // alert(countryId);
            if (countryId == 19) {
                $.ajax({
                    url: "/get_states",
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        //console.log(data);
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class = "col-sm-2 col-form-label col-form-label-md"> States </label>
                                     <div class = "col-sm-4">
                                        <select class = "form-control form-control-md" name = "state" id = "state"><option value=""> Select State </option>`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text sub_topic_err"></span></div></div>`;
                            //console.log(html);
                            $("#addStates").append(html);
                        }
                    }
                });
            }
        });

        // get districts
        $(document).on("change", "#state", function() {
            $("#addDistricts").empty();
            var stateId = this.value;
            // alert(countryId);
            if (stateId != '') {
                $.ajax({
                    url: "/get_districts/" + stateId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        //console.log(data);
                        if (data != '') {
                            var html = `<div class="form-group row">
                                    <label class = "col-sm-2 col-form-label col-form-label-md"> District </label>
                                     <div class = "col-sm-4">
                                        <select class = "form-control form-control-md" name = "district"><option value=""> Select District </option>`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            html += `</select><span class="text-danger error-text sub_topic_err"></span></div></div><div class="form-group row">
                                    <label class = "col-sm-2 col-form-label col-form-label-md"> Block/Division </label><div class = "col-sm-4"><input type="text" class="form-control" name="block"></div></div>`;
                            //console.log(html);
                            $("#addDistricts").append(html);
                        }
                    }
                });
            }
        });
        // add table
        $.ajax({
            url: "/get_tables",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                console.log(data)
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                $("#table_id").append(html);
            }
        });
        // save taging
        $("#addTaging").on("submit", function(e) {
            e.preventDefault();
            // alert($("#addTaging").serialize());
            $.ajax({
                url: "/addTaging",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        alert("Added successfully");
                        location.reload();
                    } else {
                        printErrorMsg(data.error);
                    }


                },
            });
        });
    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text(value);
        });
    }
</script>