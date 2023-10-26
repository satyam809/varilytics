<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Topic</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTopic">Add Topic</button>
                    </div>
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
                        <div class="card-body table-responsive">
                            <table id="topicTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Topic</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


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


    <!-- /.content -->
</div>

<!-- Add Modal -->
<div class="modal fade" id="addTopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <button type="button" class="btn btn-primary addParentTopic">Parent</button>
                <button type="button" class="btn btn-success addChildTopic">Child</button>
            </div>
            <div class="modal-body showParentTopic">
                <form id="saveTopic">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="topic" placeholder="Enter topic name">
                        <span class="text-danger error-text topic_err"></span>
                    </div>
                    <div class="modal-footer" style="justify-content:unset">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
            <div class="modal-body showChildTopic">
                <form id="saveSubTopic">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div id="addParentTopics">

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sub_topic" placeholder="Enter sub topic name">
                        <span class="text-danger error-text sub_topic_err"></span>
                    </div>

                    <div class="modal-footer" style="justify-content:unset">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editTopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateTopic">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="upTopicId" id="upTopicId">
                    <div class="form-group">
                        <input type="text" class="form-control" name="topic" placeholder="Enter topic name" id="topic">
                        <span class="text-danger error-text topic_err"></span>
                    </div>
                    <div class="modal-footer" style="justify-content:unset">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
            <div class="modal-body">
                <form id="updateSubTopic">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="upSubTopicId" id="upSubTopicId">
                    <div id="updateParentTopics">

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sub_topic" placeholder="Enter sub topic name" id="sub_topic">
                        <span class="text-danger error-text topic_err sub_topic"></span>
                    </div>

                    <div class="modal-footer" style="justify-content:unset">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.firstParent').empty();
        $(".showChildTopic").hide();
        $(".addChildTopic").on('click', function() {
            $(".showChildTopic").show();
            $(".showParentTopic").hide();
        });
        $(".addParentTopic").on('click', function() {
            $(".showChildTopic").hide();
            $(".showParentTopic").show();
        });
        $('.sub_topic').empty();
        var dataTable = $('#topicTable').DataTable({
            "ajax": {
                url: "/get_topic",
                type: "GET"
            },
            "aoColumns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name'
                },
                {
                    data: {
                        id: 'id',
                        parent_id: 'parent_id'
                    },
                    "render": function(data, type, full, meta) {
                        return '<a type="button"  class="btn btn-default" id="delete_records" data-id="' + data.id + '"">Delete</a>&nbsp;<a href="" type="button"  class="btn btn-default" id="get_record" data-parent_id ="' + data.parent_id + '" data-id="' + data.id + '" data-toggle="modal" data-target="#editTopic">Update</a>';
                    }
                }
            ]

        });
        // save
        $("#saveTopic").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/save_topic",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    if (data.status == true) {
                        //
                        alert(data.message);
                        //dataTable.ajax.reload();
                        location.reload();
                        $("#saveTopic").trigger('reset');
                        $("#addTopic").modal('hide');
                        $('.topic_err').empty();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
        });

        // save sub topic
        $("#saveSubTopic").on("submit", function(e) {
            // alert($("#saveSubTopic").serialize())
            e.preventDefault();
            $.ajax({
                url: "/save_subtopic",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    if (data.status == true) {
                        //dataTable.ajax.reload();
                        alert(data.message);
                        location.reload();
                        //dataTable.ajax.reload()
                        $("#saveSubTopic").trigger('reset');
                        $("#addTopic").modal('hide');
                        $('.sub_topic_err').empty();
                        $(".parent").remove();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
        });
        // get
        $(document).on('click', '#get_record', function() {
            $("#updateParentTopics").empty();
            var id = $(this).data('id');
            //alert(id);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/get_topic/" + id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    var parent_id = data[0].parent_id;
                    if (data[0].parent_id == 0) {
                        $("#updateSubTopic").hide();
                        $("#updateTopic").show();
                        $("#topic").val(data[0].name);
                        $("#upTopicId").val(data[0].id);
                    } else {
                        $("#updateSubTopic").show();
                        $("#updateTopic").hide();
                        $("#sub_topic").val(data[0].name);
                        $.ajax({
                            url: "/up_parent_topic/" + parent_id,
                            method: "get",
                            dataType: "JSON",
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function(data) {
                                var html = '<div class="form-group"><select name="up_parent_id[]" class="form-control UpFirstParent"><option value="" selected>--Select Type--</option>';
                                for (var i = 0; i < data.length; i++) {
                                    html += `<option value="${data[i].id}" ${data[i].id == parent_id ? "selected":""}>${data[i].name}</option>`;
                                }
                                $("#updateParentTopics").append(html);
                            }
                        });
                        $("#upSubTopicId").val(data[0].id);
                    }
                }
            });
        });

        // delete
        $(document).on('click', '#delete_records', function() {
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");

            if (confirm("Are you sure you want to delete this")) {
                $.ajax({
                    type: "POST",
                    url: "/delete_topic/" + id,
                    dataType: "json",
                    cache: false,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data) {
                        if (data.status == true) {
                            //dataTable.ajax.reload();
                            location.reload();
                        }
                    }
                });
            }
        });

        // update topic
        $("#updateTopic").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/update_topic",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    if (data.status == true) {
                        alert(data.message);
                        //dataTable.ajax.reload();
                        location.reload();
                        $("#updateTopic").trigger('reset');
                        $("#editTopic").modal('hide');
                        $('.topic_err').empty();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
        });
        // update sub topic
        $("#updateSubTopic").on("submit", function(e) {
            //alert($("#updateSubTopic").serialize())
            e.preventDefault();
            $.ajax({
                url: "/update_sub_topic",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        alert(data.message);
                        //dataTable.ajax.reload();
                        location.reload();
                        // $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        //     "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Updated successfully" + "</span" + "</div>");
                        // $("#updateTopic").trigger('reset');
                        // $("#editTopic").modal('hide');
                        // $('.topic_err').empty();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
            });
        });
        // get parent
        $.ajax({
            url: "/parent_topic",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                var html = '<div class="form-group"><select name="parent_id[]" class="form-control firstParent"><option value="" selected>--Select Type--</option>';
                for (var i = 0; i < data.length; i++) {
                    html += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                $("#addParentTopics").append(html);
            }
        });
        $(document).on("change", ".firstParent", function() {
            var parentId = this.value;
            if (parentId != "") {
                $.ajax({
                    url: "/get_subtopic/" + parentId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        if (data != '') {
                            var html = '<div class="form-group parent"><select name="parent_id[]" class="form-control firstParent"><option value="" selected>--Select Type--</option>';
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            $("#addParentTopics").append(html);
                        }
                    }
                });
            }
        });
        $(document).on("change", ".UpFirstParent", function() {
            var parentId = this.value;
            //alert(parentId);
            if (parentId != "") {
                $.ajax({
                    url: "/get_subtopic/" + parentId,
                    method: "get",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        //console.log(data);
                        if (data != '') {
                            var html = '<div class="form-group parent"><select name="up_parent_id[]" class="form-control firstParent"><option value="" selected>--Select Type--</option>';
                            for (var i = 0; i < data.length; i++) {
                                html += `<option value="${data[i].id}">${data[i].name}</option>`;
                            }
                            $("#updateParentTopics").append(html);
                        }
                    }
                });
            }
        });

    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text(value);
        });
    }
</script>