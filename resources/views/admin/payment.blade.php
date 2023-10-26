<?php
$userId = session('login.user_id');
$designation = DB::select('select designation_id from `permission` where user_id = ?', array($userId));
if (isset($designation[0])) {
    $designationId = $designation[0]->designation_id;
}
?>
<style>
    .scrollme {
        overflow-x: auto;
    }
</style>

<div class="content-wrapper" id="upScroll">
    <!-- Content Header (Page header) -->
    <!-- <div>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('assignWorkMessage') }}
        </div>

    </div> -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Payment</li>
                    </ol>
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
                        <?php
                        if ($message = Session::get('success')) { ?>
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        <?php } ?>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="table-responsive text-nowrap">
                                <!--Table-->
                                <table class="table table-striped" id="payment">

                                    <!--Table head-->
                                    <thead>
                                    <tr>
                                            <th>Sr.No</th>
                                            <?php if ($designationId == 0 || $designationId == 1) { ?>
                                                <th >Username</th>
                                            <?php } ?>
                                            <th>Website</th>
                                            <th>File Name</th>
                                            <th>Table</th>
                                            <th>Row</th>
                                            <th>Columns</th>
                                            <th>Total Cell</th>
                                            <th>Pay</th>
                                            <th>Status</th>
                                            <th>Payment Date</th>
                                            <th>Invoice</th>
                                            <?php if ($designationId == 0 || $designationId == 1) { ?>
                                                <th>Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <!--Table head-->

                                    <!--Table body-->
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($data as $value) { ?>
                                            <tr scope="row">
                                                <td>{{ $i}}</td>
                                                <?php if ($designationId == 0 || $designationId == 1) { ?>
                                                    <td>{{ $value->username}}</td>
                                                <?php } ?>
                                                <td>{{ $value->website}}</td>
                                                <td>{{ $value->link_name}}</td>
                                                <td>{{ $value->table_name}}</td>
                                                <td>{{ $value->rows}}</td>
                                                <td>{{ $value->columns}}</td>
                                                <td>{{ $value->rows * $value->columns }}</td>
                                                <td> {{ ($value->rows * $value->columns) * 0.25 }}</td>
                                                <td>
                                                    <?php
                                                    echo ($value->payment_status == 0) ? "Due" : "Complete";
                                                    ?>
                                                </td>
                                                <td>{{ $value->payment_date}}</td>
                                                <td><a href="{{asset('assets/admin_assets/invoice')}}/{{ $value->invoice }}" target="_blank" class="btn btn-default">View</a></td>

                                                <td>
                                                    <?php if ($designationId == 0) { ?>
                                                        <a type="button" class="btn btn-default" data-toggle="modal" data-target="#change" onclick="change_payment({{ $value->id }})">Change</a>
                                                    <?php } ?>
                                                </td>

                                            </tr>
                                        <?php $i++;
                                        } ?>

                                    </tbody>
                                    <!--Table body-->


                                </table>
                                <!--Table-->
                            </div>
    </section>

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

</div>
<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/paymentDate" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="upId" id="upId">
                    <div class="form-group">
                        <label>Payment Status</label>
                        <select class="form-control" name="pstatus" id="pstatus">
                            <option value="0">Due</option>
                            <option value="1">Complete</option>
                        </select>
                    </div>
                    <div style="display:none" id="DateInvoice">
                        <div class="form-group">
                            <label>Payment Date</label>
                            <input type="date" class="form-control" name="pdate">
                        </div>
                        <div class="form-group">
                            <label>Upload Invoice</label>
                            <input type="file" class="form-control" name="invoice" style="border:none">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#payment').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": false,
        });
    });

    function change_payment(id) {
        $("#upId").val(id);
    }
    $("#pstatus").on('change', function() {
        if (this.value == 1) {
            $("#DateInvoice").show();
        } else {
            $("#DateInvoice").hide();
        }
    });
</script>