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
                        <li class="breadcrumb-item active">Messages</li>
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

                        <!-- /.card-header -->
                        <div class="card-body scrollme">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Users</th>
                                        <th>File Name</th>
                                        <th>Table Name</th>
                                        <th>Message</th>
                                    </tr> 
                                </thead>
                                <tbody id="allassignwork">
                                    <?php
                                    $i = 1;
                                    foreach ($data as $data) { ?>
                                        <tr>
                                            <td> {{$i}} </td>
                                            <td> {{$data->name}} </td>
                                            <td> {{$data->link_name}} </td>
                                            <td> {{$data->table}} </td>
                                            <td> {{$data->remark}} </td>
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