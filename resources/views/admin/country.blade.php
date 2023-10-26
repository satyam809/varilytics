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
                        <li class="breadcrumb-item active">Country</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
        <div id="alert_message"></div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveCountryModal">Add</button>
                    <!-- Modal -->
                    <div class="modal fade" id="saveCountryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form enctype="multipart/form-data" onsubmit="saveCountry(event)" id="saveCountry">
                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Country</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="country">
                                                <span class="text-danger error-text country_err"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary mb-2" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="updateCountryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Country</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form onsubmit="updateCountry(event)" id="updateCountry">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="country_id" id="up_country_id">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Country</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="country" id="up_country_name">
                                                <span class="text-danger error-text country_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary mb-2" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
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
                            <table id="countryTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Country</th>
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
    
    var dataTable = '';
    $(document).ready(function() {

        dataTable = $('#countryTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "/get_all_country",
                type: "GET"
            },
            "aoColumns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'country_name'
                },
                {
                    data: 'country_id',
                    "render": function(data, type, full, meta) {
                        return `<button class="btn btn-default" onclick="getCountry(${data})" data-toggle="modal" data-target="#updateCountryModal">Update</button> &nbsp;<button class="btn btn-default" onclick="deleteCountry(${data})">Delete</button>`;
                    }
                }
            ]

        });
    });

    function deleteCountry(id) {

        var token = $("meta[name='csrf-token']").attr("content");

        if (confirm("Are you sure you want to delete this")) {
            $.ajax({
                type: "POST",
                url: "/delete_country/" + id,
                dataType: "json",
                cache: false,
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        dataTable.ajax.reload();
                    }
                }
            });
        }
    }

    function getCountry(id) {
        $.ajax({
            url: "/get_country/" + id,
            method: "GET",
            dataType: "json",
            success: function(data) {
                $('#up_country_name').val(data.country_name);
                $('#up_country_id').val(data.country_id);
            }
        });

    }

    function saveCountry(event) {
        event.preventDefault();
        $.ajax({
            url: "/save_country",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            success: function(data) {

                if (data.status == true) {

                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    $("#saveCountry").trigger('reset');
                    $('#saveCountryModal').modal('toggle');
                    dataTable.ajax.reload();

                } else {
                    printErrorMsg(data.error);
                }

            },
        });
    }

    function updateCountry(event){
        event.preventDefault();
        $.ajax({
                url: "/update_country",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(event.target),
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                        $("#updateCountry").trigger('reset');
                        $('#updateCountryModal').modal('toggle');
                        dataTable.ajax.reload();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text(value);
        });
    }
</script>