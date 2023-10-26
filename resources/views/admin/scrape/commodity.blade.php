<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">
            <div id="alert_message" style="width: fit-content;margin: 0px auto;"></div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCommodityModal" id="addButton">Add</button>
                    <!-- Modal -->
                    <div class="modal fade" id="addCommodityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Commodity</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form onsubmit="addCommodity(event)" enctype="multipart/form-data" id="addCommodity">
                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-md-4">Commodity</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="commodity" value="">
                                                <span class="text-danger error-text commodity_err"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">Category</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="category_id" id="category_id"></select>
                                                <span class="text-danger error-text category_id_err"></span>
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
                    <!-- Modal -->
                    <div class="modal fade" id="updateCommodityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Commodity</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="updateCommodity" onsubmit="updateCommodity(event)" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="upId">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-md-4">Commodity</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="upCommodity" value="">
                                                <span class="text-danger error-text upCommodity_err"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">Category</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="category_id" id="up_category_id"></select>
                                                <span class="text-danger error-text category_id_err"></span>
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
                        <li class="breadcrumb-item active">Commodity</li>
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
                        <div class="card-body" style="overflow: auto;">
                            <table class="table table-bordered table-striped" id="allCommodities">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Commodity</th>
                                        <th>Category</th>
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
    $('.error-text').empty();
    $(document).ready(function() {
        $('#addButton').click(function() {
            $('.error-text').empty();
        });
    });
    $(function() {
        dataTable = $('#allCommodities').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/allCommodity',
            columns: [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'category_name',
                    name: 'category_name'
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return `<button class="btn btn-default" onclick="getCommodity(${data})" data-toggle="modal" data-target="#updateCommodityModal"><i class="fas fa-edit"></i></button>&nbsp;&nbsp;<button class="btn btn-default" onclick="deleteCommodity(${data})"><i class="fa fa-trash" aria-hidden="true"></i></a>`;
                    }
                }
            ]
        });
    });

    function getCommodity(id) {
        $(".error-text").empty();
        $.ajax({
            url: "/getCommodity",
            method: "POST",
            dataType: "json",
            data: {
                "commodity_id": id,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            success: function(data) {
                $("input[name=upId]").val(data.id);
                $("input[name=upCommodity]").val(data.name);
                $("#up_category_id").val(data.category_id).prop("selected");
            }
        })
    }

    function updateCommodity(event) {
        event.preventDefault();
        $.ajax({
            url: "/updateCommodity",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            success: function(data) {
                if (data.status == true) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    $("#updateCommodity").trigger('reset');
                    $("#updateCommodityModal").modal('toggle');
                } else {
                    printErrorMsg(data.error);
                }

            },
        });
    }

    function addCommodity(event) {
        event.preventDefault();
        $.ajax({
            url: "/addCommodity",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            success: function(data) {
                if (data.status == true) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    $("#addCommodity").trigger('reset');
                    $("#addCommodityModal").modal('toggle');
                    setTimeout(function() {
                        $('#alert_message').empty();
                    }, 2000); // 1000ms = 1 second
                } else {
                    printErrorMsg(data.error);
                }

            },
        });
    }

    function deleteCommodity(id) {
        if (confirm("Are you sure you want to delete this commodity data ?")) {
            $.ajax({
                url: "/deleteCommodity",
                method: "POST",
                dataType: "json",
                data: {
                    "commodity_id": id,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        dataTable.ajax.reload();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        setTimeout(function() {
                            $('#alert_message').empty();
                        }, 2000);
                    }
                }
            })
        }

    }

    function getCategory() {
        $.ajax({
            url: `/allCategory`,
            method: 'GET',
            success: function(data) {
                var html = `<option value="0" selected disabled>Select Category</option>`;
                data.data.map(function(item) {
                    html += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#category_id").append(html);
                $("#up_category_id").append(html);
            }
        });
    }
    getCategory();

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text("This field is required");
        });
    }
    $(document).ready(function() {
        setTimeout(function() {
            $('#alert_message').html("");
        }, 1000); // 1000ms = 1 second
    });
</script>