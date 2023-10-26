<?php

use Google\Client;

//use \Session;
$userId = session('login.user_id');
$designation = DB::select('select designation_id from `permission` where user_id = ?', array($userId));
if (isset($designation[0])) {
    $designationId = $designation[0]->designation_id;
}
function drive()
{
    $client = new Client();
    $client->setClientId('1016165829239-ndo0vg766jenqnp629rv0o5ufngtgn8s.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri(url('/') . '/admin/get_work');
    $client->setScopes([
        'https://www.googleapis.com/auth/drive',
        'https://www.googleapis.com/auth/drive.file',
    ]);
    $url = $client->createAuthUrl();
    //redirect($url);
    return $url;
}
?>
<?php 
//echo Request::is('admin/review_work');die;
?>

<style>
    .scrollme {
        overflow-x: auto;
    }
</style>
<div class="content-wrapper" id="upScroll">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <select class="form-control" onchange="location = this.value;">
                        <option value="review_work" {{ Request::path() === '/admin/review_work' ? 'selected' : '' }}>All</option>
                        <option value="review_work?status=1" {{ request()->get('status') === '1' ? 'selected':''  }}>Approved</option>
                        <option value="review_work?status=0" {{ request()->get('status') === '0' ? 'selected':'' }}>Disapproved</option>
                        <option value="review_work?status=2" {{ request()->get('status') === '2' ? 'selected':'' }}>Partially Approved</option>
                    </select>
                </div>
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Review Work</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <!-- /.card -->
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body scrollme">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Source</th>
                                        <th>Work Link Name</th>
                                        <th>Total Table</th>
                                        <th>Approved Table</th>
                                        <th>Disapproved Table</th>
                                        <th>Users</th>
                                        <th>Assigned Date</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($review as $data) { ?>
                                        <tr>
                                            <td> {{$i}} </td>
                                            <td> {{$data->website}} </td>
                                            <td> {{ucwords(strtolower($data->link_name))}} </td>
                                            <td> {{ isset($data->total_table) ? $data->total_table : ''}}</td>
                                            <td> {{ $data->approvedTable }}</td>
                                            <td> {{ $data->disapprovedTable }}</td>
                                            <td> {{$data->name}} </td>
                                            <td> {{$data->assigned_date}} </td>

                                            <?php $url = drive(); ?>
                                            <td> <a type="button" href="<?php echo $url; ?>" class="btn btn-default" href="#upScroll" onClick="view_work({{ $data->id }});">View</a></td>
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
    function view_work(id) {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "/view_work",
            method: "POST",
            dataType: "json",
            data: {
                id: id,
                "_token": token,
            },
            success: function(data) {
                //console.log(data);
            }
        });
    }

    function viewWork(id, work_link_id) {
        //alert(id);
        var token = $("meta[name='csrf-token']").attr("content");
        $('#update').show();
        //$('#add').hide();
        $.ajax({
            url: "/get_review_work/" + id + "/" + work_link_id,
            method: "POST",
            dataType: "json",
            data: {
                id: id,
                "_token": token,
            },
            success: function(data) {
                console.log(data);
                $("#up_id").val(id);
                $("#workLink_id").val(work_link_id);
                $("#username").val(data.work[0].username);
                $('#website').val(data.work[0].website);
                $('#domain').val(data.work[0].domain);
                $('#acronym').val(data.work[0].acronym);
                $('#org_name').val(data.work[0].org_name);
                $('#sector').val(data.work[0].sector);
                $('#assigned_date').val(data.work[0].assigned_date);
                $('#remark').val(data.status[0].remark);
                $('#description').val(data.work[0].description);
                $("#status option[value='" + data.status[0].status + "']").attr("selected", "selected");
                $('#start_date').val(data.status[0].start_date);
                $('#complete_date').val(data.status[0].complete_date);
                $('#tables').val(data.status[0].tables);
                $('#rows').val(data.status[0].rows);
                $('#columns').val(data.status[0].columns);
                $('#link').val(data.link[0].link);
                $('#link_name').val(data.link[0].name);

                // $('#link_name').val(data.work[0].name);
                // $('#up_link').empty();
                // for (var i = 0; i < data.link.length; i++) {
                //     $('#up_link').append($('<option>', {
                //         value: data.link[i].id,
                //         text: data.link[i].link
                //     }));
                // }
                // $('#up_link_name').empty();
                // for (var i = 0; i < data.link.length; i++) {
                //     $('#up_link_name').append($('<option>', {
                //         value: data.link[i].id,
                //         text: data.link[i].name
                //     }));
                // }
            }
        });
    }
</script>