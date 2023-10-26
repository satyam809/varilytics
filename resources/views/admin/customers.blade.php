<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
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
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4" id="alert_message">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="allCustomers" class="table">
                                <thead>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Plan</th>
                                    <th>Action</th>
                                </thead>


                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="updateCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updatePassword(event)" enctype="multipart/form-data" id="updatePasswordForm">
                {{ csrf_field() }}
                <input type="hidden" name="upId">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label col-form-label-md">Change Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="password" id="password-field" placeholder="Enter Password" autocomplete="new-password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
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
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    var dataTable = '';
    $(function() {
        dataTable = $('#allCustomers').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("/admin/customers") }}',
            columns: [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'plan',
                    name: 'plan',
                    render: function(data, type, row) {
                        if (data === 0) {
                            return 'No Plan';
                        } else if (data === 1) {
                            return 'Basic';
                        } else if (data === 2) {
                            return 'Professional';
                        } else if (data === 3) {
                            return 'Mult-Users';
                        } else {
                            return 'Premium';
                        }
                    }
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return `<button class="btn btn-default" onclick="changePassword(${data})" data-toggle="modal" data-target="#updateCustomerModal">Change Password</button>&nbsp;&nbsp;<button class="btn btn-default" onclick="deleteCustomer(${data})">Delete</a>`;
                    }
                }
            ]
        });
    });

    function deleteCustomer(id) {
        //console.log(id);
        var token = $("meta[name='csrf-token']").attr("content");
        //console.log(token);
        if (confirm("Are you sure you want to delete this")) {
            $.ajax({
                type: "POST",
                url: "/deleteCustomer/" + id,
                dataType: "json",
                cache: false,
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                }
            });
        }
    }

    function changePassword(id) {
        $("input[name=upId]").val(id);
    }

    function updatePassword(event) {
        event.preventDefault();
        $.ajax({
            url: "/changeCustomerPassword",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            success: function(data) {
                console.log(data);
                if (data.status == true) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    $("#updatePasswordForm").trigger('reset');
                    $("#updateCustomerModal").modal('toggle');
                }
            }
        })
    }
</script>