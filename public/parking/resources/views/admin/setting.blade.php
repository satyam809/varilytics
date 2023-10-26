<style>
    .scrollme {
        overflow-x: auto;
    }
</style>
<style>
        .pass_show {
            position: relative
        }

        .pass_show .ptxt {

            position: absolute;

            top: 50%;

            right: 10px;

            z-index: 1;

            color: #f36c01;

            margin-top: -10px;

            cursor: pointer;

            transition: .3s ease all;

        }

        .pass_show .ptxt:hover {
            color: #333333;
        }
    </style>

<div class="content-wrapper" id="upScroll">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-body container">
                        <form id="save_setting" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" class="form-control" name="old_username" value="{{$userDetail[0]->username}}">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" name="name" value="{{$userDetail[0]->name}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" name="username" value="{{$userDetail[0]->username}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" name="email" value="{{$userDetail[0]->email}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <label>New Password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control" name="password" id="removePass" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Confirm Password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control" name="cpassword" >

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="Change">
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
        $('.pass_show').append('<span class="ptxt">Show</span>');
    });


    $(document).on('click', '.pass_show .ptxt', function() {

        $(this).text($(this).text() == "Show" ? "Hide" : "Show");

        $(this).prev().attr('type', function(index, attr) {
            return attr == 'password' ? 'text' : 'password';
        });

    });
    $(document).ready(function() {
        //$('input[name=password]').val('hello');
        $('#save_setting').on('submit', function(e) {
            e.preventDefault();
            //alert($('#save_setting').serialize());
            //alert($('#change_password').serialize());
            var pass = $('input[name=password]').val();
            var cpass = $('input[name=cpassword]').val();
            if (pass === cpass) {
                $.ajax({
                    url: "/save_setting",
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
            } else {
                alert('Password must be match');
            }

        });

    });
</script>