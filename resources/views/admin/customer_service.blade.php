<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                  <h1>DataTables</h1>
                </div> -->
                <div class="col-sm-12 center_btn">
                    <a type="button" id="delete_records" class="btn btn-default">Delete</a>
                    <!-- <a href="api/contact/export.php?export=contact" type="button" data-eid="contact" class="btn btn-default">Export</a> -->

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content" style="position: relative;bottom:24px;">
        <div class="row">
            <div class="col-12">

                <meta name="csrf-token" content="{{ csrf_token() }}">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="customerServiceTable" class="table table-hover">
                        <thead>
                            <th><input type="checkbox" id="select_all"></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Request</th>

                        </thead>
                        <tbody id="allContacts1">

                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->


<script>
    // fetch contact records
    function contactFetch() {

        $.get('/admin/customer_service_data', function(data) {

            var i = 1;
            $.each(JSON.parse(data), function(key, value) {
                $("#allContacts1").append(`<tr id="${value.id}">
                           <td><input type="checkbox" class="con_checkbox" data-con-id="${value.id}"></td>
                           <td>${value.name}</td>
                           <td>${value.email}</td>
                           <td>${value.subject}</td>
                           <td>${value.request}</td>
                        </tr>`);
                i++;
            });
            $("#customerServiceTable").dataTable();
        });
    }

    $(document).ready(function() {
        /* delete selected records*/
        $('#delete_records').on('click', function(e) {
            var contact = [];
            $(".con_checkbox:checked").each(function() {
                contact.push($(this).data('con-id'));
            });
            if (contact.length <= 0) {
                alert("Please select records.");
            } else {
                WRN_PROFILE_DELETE = "Are you sure you want to delete " + (contact.length > 1 ? "these" : "this") + " row?";
                var checked = confirm(WRN_PROFILE_DELETE);
                if (checked == true) {
                    var selected_values = contact.join(",");
                    var token = $("meta[name='csrf-token']").attr("content");
                    //alert(selected_values);
                    $.ajax({
                        type: "POST",
                        url: "/admin/customer_service_delete/" + selected_values,
                        dataType: "json",
                        cache: false,
                        data: {
                            "id": selected_values,
                            "_token": token,
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status == true) {
                                // $('#allContacts1').html('');
                                // contactFetch();
                                location.reload();
                            }
                        }
                    });
                }
            }
        });
    });
    $(document).on('click', '#select_all', function() {
        $(".con_checkbox").prop("checked", this.checked);
        $("#select_count").html($("input.con_checkbox:checked").length + " Selected");
    });
    $(document).on('click', '.con_checkbox', function() {
        if ($('.con_checkbox:checked').length == $('.con_checkbox').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }
        $("#select_count").html($("input.con_checkbox:checked").length + " Selected");
    });
    contactFetch();
</script>