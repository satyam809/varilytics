<!-- <style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-4">
                <form id="filterEconomy">
                    <div class="form-group">
                        <select class="form-control select2" style="width: 100%;" id="economy" name="economy">
                            <option selected="selected" value="0">Select Economy Type</option>
                            <option value="1">GDP Growth</option>
                            <option value="2">GDP Per Capita Growth</option>
                            <option value="3">GDP Based on PPP</option>
                            <option value="4">GDP (LCU)</option>
                            <option value="5">GDP Per Capita </option>
                            <option value="6">GDP Per Capita Based on PPP</option>
                            <option value="7">GDP Per Capita (LCU)</option>
                            <option value="8">GDP Deflator</option>
                        </select>
                    </div>



            </div>

            <div class="col-md-2">

                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group row">
                    <div class="col-md-6" style="text-align: center;">
                        <label class="control-label">From</label>
                    </div>
                    <div class="col-md-6" style="text-align: center;">
                        <input type="text" class="form-control" name="from">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group row">
                    <div class="col-md-6" style="text-align: center;">
                        <label class="control-label">To</label>
                    </div>
                    <div class="col-md-6" style="text-align: center;">
                        <input type="text" class="form-control" name="to">
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="text-align: center;">
                <input type="submit" class="btn btn-primary" value="Submit" />

            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Country</th>
                                <th>Year</th>
                                <th id="value">Value</th>
                            </tr>
                        </thead>



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
<script>
    $(document).ready(function() {
        // $(document).on('change', '#economy', function() {
        //     var id = this.value;
        //     if (id == 3) {
        //         $("#value").text("Value(Millions)");
        //     } else if (id == 4) {
        //         $("#value").text("Value(Billions)");
        //     } else {
        //         $("#value").text("Value")
        //     }
        //     //dataTable.ajax.reload();
        //     if (id != 0) {
        //         var dataTable = $('#example2').DataTable({
        //             // "processing": true,
        //             // "serverSide": false,
        //             // "paging": true,
        //             // "pageLength": 50,
        //             dom: 'lBfrtip',
        //             buttons: [
        //                 "copy", "csv", "excel", "pdf", "print", "colvis"
        //             ],


        //             "ajax": {
        //                 'url': '/economy_data',
        //                 'type': 'POST',
        //                 'data': {
        //                     id: id,
        //                     _token: '{{csrf_token()}}'
        //                 }
        //             },
        //             "bDestroy": true,
        //             "aoColumns": [{
        //                     render: (data, type, row, meta) => meta.row + 1
        //                 },
        //                 {
        //                     data: 'country'
        //                 },
        //                 {
        //                     data: 'year',
        //                     "render": function(data, type, full, meta) {
        //                         if (data == 0) {
        //                             return '';
        //                         } else {
        //                             return data;
        //                         }
        //                     }
        //                 },
        //                 {
        //                     data: 'value',
        //                     "render": function(data, type, full, meta) {
        //                         if (data == 0) {
        //                             return '';
        //                         } else {
        //                             return data;
        //                         }
        //                     }
        //                 }
        //             ]

        //         });
        //     }
        // });
        // filter
        $("#filterEconomy").on("submit", function(e) {
            e.preventDefault();
            alert($("#filterEconomy").serialize());
            $.ajax({
                url: "/economy_data",
                method: "post",
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>