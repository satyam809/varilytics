<style>
    .active {
        color: red;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Compare</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <?php foreach ($tags as $data) { ?>
                            <tr>
                                <th><a href="#" data-id="<?php echo $data->id; ?>" id="tag_id" class="data_table"><?php echo ucwords(strtolower($data->name)); ?></a></th>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
                <div class="col-md-8">
                    <form id="ApproveData">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="check_all" id="check_all"></th>
                                    <th>User</th>
                                    <th>Link Name</th>
                                    <th>Column</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <input type="submit" class="btn btn-primary" value="Approve">
                            </div>
                    </form>
                    <div class="col-md-6 text-center">
                        <a href="" target="_blank" class="btn btn-primary" id="compareLink">Compare</a>
                    </div>
                </div>
            </div>


        </div>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script>
    var public_path = '<?php echo asset('assets/admin_assets/excelUpload/'); ?>';
    $(document).ready(function() {
        $(document).on("click", "#tag_id", function(e) {
            e.preventDefault();
            $("#tableData").empty();
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/get_data/" + id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    "_token": token,
                },
                success: function(data) {
                    //console.log(data);
                    var html = "";
                    var username = '';
                    var linkname = '';
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].user != null) {
                            username = data[i].user.name;
                        } else {
                            username = '';
                        }
                        if (data[i].work_link != null) {
                            linkname = data[i].work_link.name;
                        } else {
                            linkname = '';
                        }
                        html += `<tr><td><input type="checkbox" name="approve[]" class="check_box" value="${data[i].id}"></td><td>${username}</td><td>${linkname}</td><td>${data[i].column_name}</td><td>${data[i].values}</td></tr>`
                    }
                    //console.log(html);
                    $("#tableData").append(html);
                    $("#compareLink").attr("href", public_path + "/" + data[0].table.file_name);
                }
            });
        });
        $("#ApproveData").on("submit", function(e) {
            e.preventDefault();
            //alert($("#ApproveData").serialize());
            var data_length = [];
            $(".check_box:checked").each(function() {
                data_length.push($(this).data('con-id'));
            });
            if (data_length.length <= 0) {
                alert("Please select table and its data");
            } else {
                if (confirm("Do you want to approve this")) {
                    $.ajax({
                        url: "/ApproveData",
                        method: "POST",
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: new FormData(this),
                        success: function(data) {
                            if (data.status == true) {
                                location.reload();
                            }
                        }
                    });
                }
            }

        });

        // check all
        $('#check_all').click(function() {
            if (this.checked)
                $(".check_box").prop("checked", true);
            else
                $(".check_box").prop("checked", false);
        });
    });
</script>
<script>
    var $link = $('.data_table');

    $link.on('click', function(event) {
        event.preventDefault(); // stop normal link function (#)
        $link.removeClass('active');
        $(this).addClass('active');
    });
</script>