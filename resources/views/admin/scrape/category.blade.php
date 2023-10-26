<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">
            <div id="alert_message" style="width: fit-content;margin: 0px auto;"></div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add</button>
                    <!-- Modal -->
                    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form onsubmit="addCategory(event)" enctype="multipart/form-data" id="addCategory">
                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-md-4">Category</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="name">
                                                <span class="text-danger error-text name_err"></span>
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
                    <div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="updateCategory" onsubmit="updateCategory(event)" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="up_id">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-md-4">Category</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="name" id="up_name">
                                                <span class="text-danger error-text name_err"></span>
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
                        <li class="breadcrumb-item active">Categories</li>
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
                            <table class="table table-bordered table-striped" id="allCategories">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Category</th>
                                        <th>Status</th>
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
        dataTable = $('#allCategories').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/allCategory',
            columns: [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'status',
                    "render": function(data, type, row, meta) {
                        if (row.status == 0) {
                            return `<button type="button" class="btn btn-danger" onclick="changeStatus(${row.id})">Inactive</button>`;
                        } else {
                            return `<button type="button" class="btn btn-primary" onclick="changeStatus(${row.id})">Active</button>`;
                        }
                    }
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return `<button class="btn btn-default" onclick="getCategory(${data})" data-toggle="modal" data-target="#updateCategoryModal"><i class="fas fa-edit"></i></button>&nbsp;&nbsp;<button class="btn btn-default" onclick="deleteCategory(${data})"><i class="fa fa-trash" aria-hidden="true"></i></a>`;
                    }
                }
            ]
        });
    });

    function getCategory(id) {
        $.ajax({
            url: `/getCategory/${id}`,
            method: "GET",
            dataType: "json",
            success: function(data) {
                $("#up_id").val(data.id);
                $("#up_name").val(data.name);
            }
        })
    }

    function updateCategory(event) {
        event.preventDefault();
        $.ajax({
            url: "/updateCategory",
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
                    $("#updateCategory").trigger('reset');
                    $("#updateCategoryModal").modal('toggle');
                } else {
                    printErrorMsg(data.error);
                }

            },
        });
    }

    function addCategory(event) {
        event.preventDefault();
        $.ajax({
            url: "/addCategory",
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
                    $("#addCategory").trigger('reset');
                    $("#addCategoryModal").modal('toggle');
                    setTimeout(function() {
                        $('#alert_message').empty();
                    }, 2000); // 1000ms = 1 second
                } else {
                    printErrorMsg(data.error);
                }

            },
        });
    }

    function changeStatus(id) {
        if (confirm("Are you sure you want to chnage status of this category ?")) {
            $.ajax({
                url: `/category/changeStatus/${id}`,
                method: 'GET',
                success: function(data) {
                    if (data.status == true) {
                        dataTable.ajax.reload();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        setTimeout(function() {
                            $('#alert_message').empty();
                        }, 2000); // 1000ms = 1 second
                    }
                }
            });
        }
    }

    function deleteCategory(id) {
        if (confirm("Are you sure you want to delete this category ?")) {
            $.ajax({
                url: `/deleteCategory/${id}`,
                method: "GET",
                success: function(data) {
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

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text("This field is required");
        });
    }
    $(document).ready(function() {
        $('.close').click(function() {
            $('.error-text').empty();
        });
        setTimeout(function() {
            $('#alert_message').html("");
        }, 1000); // 1000ms = 1 second
    });
</script>