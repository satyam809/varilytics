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
                    <!-- <a type="button" id="delete_records" class="btn btn-default">Delete</a> -->
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
                <div class="card">
                    <div class="card-body">
                        <table id="dataSourceTable" class="table table-hover">
                            <thead>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Dataset</th>
                                <th>Want</th>
                                <th>Source of data</th>
                                <th>Action</th>
                            </thead>


                        </table>

                    </div>
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
    var dataTable = "";
    $('.error-text').empty();
    $(function() {
        dataTable = $('#dataSourceTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/data_source_data',
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
                    data: 'suggest',
                    name: 'suggest'
                },
                {
                    data: 'want_with_data',
                    name: 'want_with_data'
                },
                {
                    data: 'source_of_data',
                    "render": function(data) {
                        return data != null ? data : '';
                    }
                }, {
                    data: 'id',
                    "render": function(data) {
                        return `<a href="" class="btn btn-danger" onClick="deleteSource(event,${data})">Delete</a>`;
                    }
                }
            ]
        });
    });

   

    function deleteSource(event, id) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                url: `/admin/data_source_delete/${id}`,
                method: "GET",
                success: function(data) {
                    if (data.status == true) {
                        alert(data.message);
                        dataTable.ajax.reload();
                    }
                }
            });
        }
    }
</script>