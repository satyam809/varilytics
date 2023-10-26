<?php //echo $data[0]->topic_id;
//die; 
?>
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
                        <li class="breadcrumb-item active">Edit Taging</li>
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
                    <form id="updateTaging">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                        <input type="hidden" name="id" value="{{ $data[0]->id }}" />
                        <!-- <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Topic</label>
                            <div class="col-sm-4">
                                <select class="form-control form-control-md sub_topic" name="topic" id="topic">
                                    <option value="">Select topic</option>
                                </select>
                                <span class="text-danger error-text topic_err"></span>
                            </div>
                        </div> -->
                        <!-- <div id="addSubTopic">

                        </div> -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Topic</label>
                            <div class="col-sm-4">
                                <select class="form-control form-control-md sub_topic" name="topic_id" id="last_sub_topic">
                                </select>
                                <span class="text-danger error-text topic_id_err"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Country</label>
                            <div class="col-sm-4">
                                <select class="form-control form-control-md" name="country_id" id="country">
                                </select>
                                <span class="text-danger error-text country_id_err"></span>
                            </div>
                        </div>

                        <div class="form-group row state_data">
                            <label class="col-sm-2 col-form-label col-form-label-md">States</label>
                            <div class="col-sm-4">
                                <select class="form-control form-control-md" name="state_id" id="state">
                                    <option value="">Select State</option>
                                </select>
                                <span class="text-danger error-text state_id_err"></span>
                            </div>
                        </div>
                        <div class="form-group row district_data">
                            <label class="col-sm-2 col-form-label col-form-label-md">Districts</label>
                            <div class="col-sm-4">
                                <select class="form-control form-control-md" name="district_id" id="district">
                                    <option value=""> Select District</option>
                                </select>
                                <span class="text-danger error-text district_id_err"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Block/Division</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-md" name="block" value="{{ $data[0]->block }}" />
                                <span class="text-danger error-text block_err"></span>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Year</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-md" name="year" value="{{ $data[0]->year }}" />
                                <span class="text-danger error-text year_err"></span>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label-md">Table</label>
                            <div class="col-sm-10">
                                <select class="form-control select-checkbox-fa" name="table_id[]" multiple id="table_id">

                                </select>
                                <span class="text-danger error-text table_id_err"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="submit" class="btn btn-primary" value="Update">
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
    $(document).ready(function() {
        var country_id = '<?php echo $data[0]->country_id; ?>'; 
        //alert(country_id);
        var state_id = '<?php echo $data[0]->state_id; ?>';
        var district_id = '<?php echo $data[0]->district_id; ?>';
        var table_id = '<?php echo $data[0]->TableTag;
                        ?>';
                        //alert(table_id);
        var table_data = JSON.parse(table_id);
       // console.log(table_data);
        var last_sub_topic_id = '<?php echo $data[0]->topic_id; ?>';
        if (country_id != 19) {
            //alert(country_id);
            $(".state_data").hide();
            $(".district_data").hide();
        }
        // get last sub topic
        $.ajax({
            url: "/last_sub_topic/" + last_sub_topic_id,
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                //console.log(data);
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += `<option value="${data[i].id}" ${(data[i].id == last_sub_topic_id) ? 'selected':''}>${data[i].name}</option>`;
                }
                $("#last_sub_topic").append(html);
            }
        })

        //get country
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
                html+= `<option value="">Select Country</option>`;
                for (var i = 0; i < data.message.length; i++) {
                    html += `<option value="${data.message[i].country_id}" ${(data.message[i].country_id == country_id) ? 'selected':''}>${data.message[i].country_name}</option>`;
                }
                $("#country").append(html);
            }
        });

        // get states
        $.ajax({
            url: "/get_states",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                //console.log(data.message);
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += `<option value="${data[i].id}" ${(data[i].id == state_id) ? 'selected':''}>${data[i].name}</option>`;
                }
                $("#state").append(html);
            }
        });

        // get districts
        $.ajax({
            url: "/get_districts/" + state_id,
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                //console.log(data);
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += `<option value="${data[i].id}" ${(data[i].id == district_id) ? 'selected':''}>${data[i].name}</option>`;
                }
                $("#district").append(html);
            }
        });
        // add tables
        $.ajax({
            url: "/get_tables",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                // console.log(data);
                // console.log(table_data);
                var html = '';
                var j = 0;
                for (var i = 0; i < data.length; i++) {
                    //console.log(i, j);
                    if (table_data.length > j) {
                        if (table_data[j].table_id == data[i].id) {
                            html += `<option value="${data[i].id}" selected>${data[i].name}</option>`;
                            j++;
                        }
                    } else {
                        html += `<option value="${data[i].id}">${data[i].name}</option>`;
                        j++;
                    }


                }
                $("#table_id").append(html);
            }
        });

        // update taging
        $("#updateTaging").on("submit", function(e) {
            e.preventDefault();
            // alert($("#updateTaging").serialize());
            // die;
            $.ajax({
                url: "/updateTaging",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        alert(data.message);
                        location.reload();
                    } else {
                        printErrorMsg(data.error);
                    }


                },
            });
        });

        $(document).on("change", "#country", function() {
            var countryId = this.value;
            // alert(countryId);
            if (countryId == 19) {
                $(".state_data").show();
                //$("#state").empty();
                $("#district").empty();
            } else {
                $(".state_data").hide();
                $(".district_data").hide();
                $("#state").empty();
                $("#district").empty();
            }
        });

        // get districts
        $(document).on("change", "#state", function() {
            $("#district").empty();
            $(".district_data").show();
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
                            var html = ``;
                            html += `<option value="">Select District</option>`;
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            //console.log(html);
                            $("#district").append(html);
                        }
                    }
                });
            }
        });

    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text(value);
        });
    }
</script>