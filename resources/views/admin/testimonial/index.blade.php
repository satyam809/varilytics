<div class="content-wrapper" id="upScroll">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Testimonial</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-body container">
                    <form id="save_testimonial">
                        <div>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" class="form-control" name="id" value="{{ $data[0]->id }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>No of Visitors</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" name="visitors" value="{{ $data[0]->visitors }}" readonly style="width: fit-content;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Users</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" name="users" value="{{ $data[0]->users }}" readonly style="width: fit-content;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Subscribers</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" name="subscribers" value="{{ $data[0]->subscribers }}" readonly style="width: fit-content;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Partners</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" name="partners" value="{{ $data[0]->partners }}" style="width: fit-content;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Corporates</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" name="corporates" value="{{ $data[0]->corporates }}" style="width: fit-content;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </section>

</div>
<script>
    $(document).ready(function() {
        //$('input[name=password]').val('hello');
        $('#save_testimonial').on('submit', function(e) {
            e.preventDefault();
            //alert($('#save_setting').serialize());
            //alert($('#change_password').serialize());
            $.ajax({
                url: "/save_testimonial",
                method: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.status === true) {
                        alert(data.message);
                        location.reload();
                    }

                }
            });
        });

    });
</script>