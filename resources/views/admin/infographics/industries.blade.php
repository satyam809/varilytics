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
                        <li class="breadcrumb-item active">Industries</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6" style="text-align: end;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#IndustriesModal">Add</button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->



    <section class="content">
        <div class="container-fluid">
            <div id="alert_message"></div>
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="getAllIndustry" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Indutry</th>
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

<div class="modal fade" id="IndustriesModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="addIndustry">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Industry</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name"  placeholder="Name">
                            <span class="text-danger error-text name_err"></span>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>

        </div>

    </div>
</div>
<div class="modal fade" id="editIndustryModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="editIndustry">
                    {{ csrf_field() }}
                    <input type="hidden" id="updateId" name="updateId">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Industry</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            <span class="text-danger error-text name_err"></span>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>

        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        var dataTable = $('#getAllIndustry').DataTable({
            "ajax": {
                url: "/getAllIndustry",
                type: "GET"
            },
            "aoColumns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name'
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data + '"">Delete</a>&nbsp;<a href="" type="button" data-toggle="modal" data-target="#editIndustryModal"  class="btn btn-default" id="get_record" data-id="' + data + '"">Update</a>';
                    }
                }
            ]

        });
        $("#addIndustry").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/addIndustry",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data.status);
                    if (data.status == true) {
                        dataTable.ajax.reload();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        $("#addIndustry").trigger('reset');
                        $('#IndustriesModal').modal('hide');
                        $('.name_err').empty();
                    } else {
                        //console.log(data.error);
                        //$(".orgnisation").empty();
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
                    url: "/deleteIndustry",
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
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        }
                    }
                });
            }
        });
        // get
        $(document).on('click', '#get_record', function() {
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/getIndustry",
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data[0].icon);
                    $('#name').val(data[0].name);
                    $('#updateId').val(data[0].id);
                }
            });
        });
        // update
        $("#editIndustry").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/editIndustry",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    if (data.status == true) {
                        dataTable.ajax.reload();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        $("#editIndustry").trigger('reset');
                        $('#editIndustryModal').modal('hide');
                        $('.name_err').empty();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
        });

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                //console.log(key);
                console.log(value);
                $('.' + key + '_err').text(value);
            });
        }
    });
</script>