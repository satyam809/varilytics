<style>
    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .multiselect-container>li>a>label {
        padding: 3px 10px !important;
    }

    .multiselect-item>.input-group {
        width: 95% !important;
    }

    .multiselect-container {
        width: -webkit-fill-available;
    }

    .multiselect {
        width: 248px;
    }

    .multiselect-container>li>a {
        color: #444;
    }

    .form-control {
        height: calc(2.25rem + 7px) !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">
            <div id="alert_message" style="width: fit-content;margin: 0px auto;"></div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cropProduction">Add</button>
                    <!-- Modal -->
                    <div class="modal fade" id="cropProduction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Crop Production</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form onsubmit="saveCropProduction(event)" enctype="multipart/form-data" id="saveCropProduction">
                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-4 text-center">
                                                <label>Commodity</label>
                                            </div>
                                            <div class="form-group col-md-8 text-center">
                                                <div class="form-group" id="commodities"></div>
                                                <span class="text-danger error-text commodity_err" style="position:relative;bottom:15px;"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4 text-center">
                                                <label>Url</label>
                                            </div>
                                            <div class="form-group col-md-8 text-center">
                                                <input type="file" class="form-control" name="file" accept=".xlsx, .xls, .csv">
                                                <span class="text-danger error-text file_err"></span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success" id="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Scrapping</a></li>
                        <li class="breadcrumb-item active">Crop Production</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="allCrops">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Commodity</th>
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
    var dataTable = "";
    $(function() {
        dataTable = $('#allCrops').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("cropProduction.show") }}',
            columns: [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'commodity_id',
                    "render": function(data, type, full, meta) {
                        return `<a href="{{ url('admin/crop-production-data')}}?commodityId=${data}" class="btn btn-primary">View</a>&nbsp;&nbsp;<button class="btn btn-danger" onclick="deleteCrop(${data})">Delete</button>`;
                    }
                }
            ]
        });
    });

    function getCommodities() {
        $("#commodities").empty();
        $.ajax({
            url: '/getAllCommodities',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = `<select class="form-control" name="commodity" id="commodityOption">`;
                html += `<option value="0">Select Commodity</option>`;
                data.map(function(element) {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                html += `</select>`;
                $("#commodities").append(html);
                $('#commodityOption').multiselect({
                    nonSelectedText: 'Select Commodity',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: 'auto',
                    dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450,

                });
                $('.input-group-addon').remove();
                $('.input-group-btn').remove();
                $('ul > li').css('line-height', 'unset');
                $('.multiselect button').css('overflow', 'none');
                $('.multiselect button').css('background-color', '#eaeeff');
                $('.multiselect button').css('height', '41px');
                $('.multiselect button').css('border-radius', '5px');
                // $("#commodities").append(html);
            }
        })
    }
    getCommodities();

    function saveCropProduction(event) {
        event.preventDefault();
        $(".error-text").empty();
        $.ajax({
            url: "/save-crop-production",
            method: "POST",
            data: new FormData(event.target),
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $("#submit").text('Submitting...');
                $("#submit").attr('disabled', true);
            },
            success: function(data) {
                //console.log(data);
                if (data.status == true || data.status == false) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    getCommodities();
                    $("#saveCropProduction").trigger('reset');
                    $("#cropProduction").modal('toggle');
                    $("#submit").attr('disabled', false);
                    $("#submit").text('submit');
                    // setTimeout(function() {
                    //     $('#alert_message').empty();
                    // }, 5000);
                } else {
                    printErrorMsg(data.error);
                    $("#submit").attr('disabled', false);
                    $("#submit").text('submit');
                }
            }
        });
    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text(value);
        });
    }

    function deleteCrop(id) {
        if (confirm("Are you sure you want to delete this commodity data ?")) {
            $.ajax({
                url: "/deleteCrop",
                method: "POST",
                dataType: "json",
                data: {
                    "commodity_id": id,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data) {
                    if (data.status == true) {
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        dataTable.ajax.reload();
                        getCommodities();
                        // setTimeout(function() {
                        //     $('#alert_message').empty();
                        // }, 5000);
                    }
                }
            })
        }
    }
    $('#cropProduction').click(function() {
        $(".error-text").empty();
    });
</script>