<!-- <style>
    .scrollme {
        overflow-x: auto;
    }
</style> -->


<div class="content-wrapper" id="scrollUp">
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
                        <li class="breadcrumb-item active">Add Taging</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body scrollme">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Topic</th>
                                        <!-- <th>Sub topic</th> -->
                                        <th>Country</th>
                                        <th>Year</th>
                                        <th>State</th>
                                        <th>District</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($tag as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo isset($value->topics->name) ? $value->topics->name : ''; ?></td>
                                            <?php if (isset($value->country->country_name)) { ?>
                                            <td><?php echo $value->country->country_name; ?></td>
                                            <?php } else { ?>
                                                <td><?php echo ''; ?></td>
                                            <?php } ?>
                                            <td><?php echo $value->year; ?></td>
                                            <?php if (isset($value->state->name)) { ?>
                                                <td><?php echo $value->state->name;?></td>
                                            <?php } else { ?>
                                                <td><?php echo ''; ?></td>
                                            <?php } ?>
                                            <?php if (isset($value->state->name)) { ?>
                                                <td><?php echo $value->district->name;?></td>
                                            <?php } else { ?>
                                                <td><?php echo '';?></td>
                                            <?php } ?>
                                            <td>
                                                <a href="<?php echo url('admin/getTagging'); ?>/<?php echo $value->id; ?>" type="button" class="btn btn-primary">Edit</a>
                                                <a href="" type="button" class="btn btn-danger" id="deleteTag" data-id="<?php echo $value->id; ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>


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

</div>
<script>
    $(document).ready(function() {
        $(document).on("click", "#deleteTag", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            if (confirm("Are you sure you want to delete this ?")) {
                $.ajax({
                    url: "/deleteTag/" + id,
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(data) {
                        if (data.status == true) {
                            alert(data.message);
                            location.reload()
                        }
                    }
                });
            }
        });
    });
</script>