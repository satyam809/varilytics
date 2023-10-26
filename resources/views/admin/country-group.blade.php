<style>
    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .multiselect-container>li>a>label {
        padding: 3px 10px !important;
    }

    .multiselect-item>.input-group {
        width: 95% !important;
    }

    .multiselect-container {
        width: -webkit-fill-available;
    }

    .btn-group {
        width: 100%;
    }

    .multiselect-container>li>a {
        color: #444;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Country-Group</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content-header">
        <div id="alert_message" style="width:fit-content;margin:0px auto;"></div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveModal" id="clrSaveModal">Add</button>
                    <!-- Modal -->
                    <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered " role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Country Group</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form onsubmit="saveOrganisation(event)" id="saveOrganisation">
                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Country Group</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="organisation">
                                                <span class="text-danger error-text organisation_err"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Select Countries</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <div class="form-group" id="country"></div>
                                                <span class="text-danger error-text country_err"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4"></div>
                                            <div class="form-group col-md-8">
                                                <div class="row" id="add_countries_list"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Icon</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="file" class="form-control" name="icon" style="border:none" id="imgInp" accept="image/*">
                                                <span class="text-danger error-text icon_err"></span>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="form-group col-md-8">
                                                <img id="blah" src="{{ asset('assets/admin_assets/images/no_image.png')}}" style="width:100px;" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary mb-2" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="getModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Country Group</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form onsubmit="updateOrganisation(event)" id="updateOrganisation">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="org_id" value="" id="up_org_id">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Organisation</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="organisation" id="up_organisation">
                                                <span class="text-danger error-text organisation_err"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Select Countries</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <div class="form-group" id="up_country"></div>
                                                <span class="text-danger error-text country_err"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4"></div>
                                            <div class="form-group col-md-8">
                                                <div class="row" id="update_countries_list"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Icon</label>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="file" class="form-control" name="up_icon" style="border:none" id="UpImgInp" accept="image/*">
                                                <span class="text-danger error-text up_icon_err"></span>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="form-group col-md-8">
                                                <img id="up_blah" src="{{ asset('assets/admin_assets/images/no_image.png')}}" style="width:100px;" />
                                                <!-- <i class="fa fa-trash-o" aria-hidden="true" style="position:relative;top:44%;color:red;cursor:pointer;"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary mb-2" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
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
                            <table id="organisationTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Country Group</th>
                                        <th>Icon</th>
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
<script>
    var public_path = '<?php echo asset('assets/'); ?>';
    //alert(public_path);
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            console.log(file);
            blah.src = URL.createObjectURL(file)
        }
    }
    UpImgInp.onchange = evt => {
        const [file] = UpImgInp.files
        if (file) {
            up_blah.src = URL.createObjectURL(file)
        }
    }
    var dataTable;
    $(document).ready(function() {
        $('#clrSaveModal').click(function() {
            $("#saveOrganisation").trigger("reset");
            $("#add_countries_list").empty();
        });
        dataTable = $('#organisationTable').DataTable({
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "ajax": {
                url: "/get-all-country-group",
                type: "GET"
            },
            "aoColumns": [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'name'
                },
                {
                    data: 'icon',
                    "render": function(data, type, full, meta) {
                        if (data != null) {
                            return '<img style="width:50px" src="' + public_path + '/country_group_icon/' + data + '">';
                        } else {
                            return '<img style="width:50px" src="' + public_path + '/admin_assets/images/no_image.png' + '">';
                        }
                    }
                },
                {
                    data: 'id',
                    "render": function(data, type, full, meta) {
                        return `<a href="" type="button"  class="btn btn-default" onClick="deleteOrg(${data},event)">Delete</a>&nbsp;<a href="" type="button"  class="btn btn-default" onClick="getOrg(${data},event)" data-toggle="modal" data-target="#getModal">Update</a>`;
                    }
                }
            ]

        });
    });


    function saveOrganisation(event) {
        event.preventDefault();
        $.ajax({
            url: "/save-country-group",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            success: function(data) {
                //console.log(data);
                if (data.status == true) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Data is added successfully" + "</span" + "</div>");
                    $("#saveOrganisation").trigger('reset');
                    $("#blah").attr("src", public_path + "/admin_assets/images/no_image.png");
                    $(".error-text").empty();
                    $("#saveModal").modal('toggle');
                } else {
                    //console.log(data.error);
                    //$(".orgnisation").empty();
                    $(".error-text").empty();
                    printErrorMsg(data.error);
                }

            },
        });
    }

    function updateOrganisation(event) {
        event.preventDefault();
        $.ajax({
            url: "/update-country-group",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            success: function(data) {
                if (data.status == true) {
                    dataTable.ajax.reload();
                    $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    $("#updateOrganisation").trigger('reset');
                    $("#up_blah").attr("src", public_path + "/admin_assets/images/no_image.png");
                    $(".error-text").empty();
                    $("#getModal").modal('toggle');
                } else {
                    //console.log(data.error);
                    //$(".orgnisation").empty();
                    $(".error-text").empty();
                    printErrorMsg(data.error);
                }

            },
        });
    }

    function deleteOrg(data, event) {
        event.preventDefault();
        if (confirm("Are you sure you want to delete this")) {
            $.ajax({
                type: "POST",
                url: "/delete-country-group",
                dataType: "json",
                cache: false,
                data: {
                    "id": data,
                    "_token": $("meta[name='csrf-token']").attr("content"),
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        dataTable.ajax.reload();
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    }
                }
            });
        }
    }

    function getOrg(data, event) {
        event.preventDefault();
        $("#update_countries_list").empty();
        //$("#up_country").empty();
        up_country().then(function() {
            $.ajax({
                url: "/get-country-group/" + data,
                method: "get",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var html = "";
                    $('#up_organisation').val(data[0].name);
                    $('#up_org_id').val(data[0].id);
                    if (data[0].icon == null) {
                        $("#up_blah").attr("src", public_path + "/admin_assets/images/no_image.png");
                    } else {
                        $("#up_blah").attr("src", public_path + "/country_group_icon/" + data[0].icon);
                    }
                    const dropdown = document.getElementById('upCountryOption');
                    console.log(dropdown);
                    const options = dropdown.options;
                    console.log(options)
                    // Set selected options
                    for (let i = 0; i < data.length; i++) {
                        for (let j = 0; j < options.length; j++) {
                            //console.log('country =' + data[i].country_id + ' option =' + options[j].value);
                            if (options[j].value == data[i].country_id) {
                                options[j].selected = true;
                            }
                        }
                        if (data[i].country_name != null) {
                            html += `<div class="col-6"><div class="alert alert-primary alert-dismissible fade in" style="opacity:unset;width:fit-content;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color:white;">&times;</a>
                            <strong>${data[i].country_name}</strong>
                        </div></div>`;
                        }
                    }
                    $("#update_countries_list").append(html);
                    // Refresh selected options only
                    $(dropdown).multiselect("rebuild");
                }
            });
        });
    }



    function country() {
        $("#country").empty();
        $.ajax({
            url: '/all_country_lists',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = `<select class="form-control" name="country[]" id="countryOption" multiple>`;
                html += `<option value="0" disabled>Select Country</option>`;
                data.map(function(element) {
                    html += `<option value="${element.country_id}">${element.country_name}</option>`;
                });
                html += `</select>`;
                $("#country").append(html);
                $('#countryOption').multiselect({
                    nonSelectedText: 'Select Country',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: 'auto',
                    dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450,
                    onChange: function(option, checked) {
                        if (checked === true) {
                            var selectedOptions = this.$select.find('option').filter(':selected');
                            var selectedText = selectedOptions.map(function() {
                                return $(this).text();
                            }).get().join(', ');
                            const arr = selectedText.split(',');
                            var html = "";
                            html += `<div class="col-6"><div class="alert alert-primary alert-dismissible fade in" style="opacity:unset;width:fit-content;">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color:white;">&times;</a>
                                        <strong>${arr[arr.length - 1]}</strong>
                                    </div></div>`;
                            $("#add_countries_list").append(html);
                            $('.close').click(function() {
                                // Get the value of the corresponding option
                                var text = $(this).closest('.alert').find('strong').text().trim();
                                //alert(text);
                                var option = $('#countryOption option').filter(function() {
                                    return $(this).text().trim() === text;
                                });
                                var value = option.val();
                                // Find the option with the corresponding value and deselect it
                                $('#countryOption option[value="' + value + '"]').prop('selected', false);
                                $('#countryOption').multiselect('refresh');
                                // Remove the corresponding alert
                                $(this).closest('.col-6').remove();
                            });
                        }
                    }


                });
                $('.input-group-addon').remove();
                $('.input-group-btn').remove();
                $('ul > li').css('line-height', 'unset');
                $('.multiselect button').css('overflow', 'none');
                $('.multiselect button').css('background-color', '#eaeeff');
                $('.multiselect button').css('height', '41px');
                $('.multiselect button').css('border-radius', '5px');

            }
        })
    }
    country();

    function up_country() {
        $("#up_country").empty();
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: '/all_country_lists',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = `<select class="form-control" name="country[]" id="upCountryOption" multiple>`;
                    html += `<option value="0" disabled>Select Country</option>`;
                    data.map(function(element) {
                        html += `<option value="${element.country_id}">${element.country_name}</option>`;
                    });
                    html += `</select>`;
                    $("#up_country").append(html);
                    $('#upCountryOption').multiselect({
                        nonSelectedText: 'Select Country',
                        enableFiltering: true,
                        enableCaseInsensitiveFiltering: true,
                        buttonWidth: 'auto',
                        dropup: true,
                        //includeSelectAllOption: true
                        maxHeight: 450,
                        onChange: function(option, checked) {
                            if (checked === true) {
                                var selectedOptions = this.$select.find('option').filter(':selected');
                                var selectedText = selectedOptions.map(function() {
                                    return $(this).text();
                                }).get().join(', ');
                                const arr = selectedText.split(',');
                                var html = "";
                                html += `<div class="col-6"><div class="alert alert-primary alert-dismissible fade in" style="opacity:unset;width:fit-content;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color:white;">&times;</a>
                                    <strong>${arr[arr.length - 1]}</strong>
                                </div></div>`;
                                $("#update_countries_list").append(html);
                            }
                        }
                    });
                    $(document).on("click", ".close", function() {
                        var text = $(this).closest('.alert').find('strong').text().trim();
                        var option = $('#upCountryOption option').filter(function() {
                            return $(this).text().trim() === text;
                        });
                        var value = option.val();
                        // Find the option with the corresponding value and deselect it
                        $('#upCountryOption option[value="' + value + '"]').prop('selected', false);
                        $('#upCountryOption').multiselect('refresh');
                        // Remove the corresponding alert
                        $(this).closest('.col-6').remove();
                    });
                    $('.input-group-addon').remove();
                    $('.input-group-btn').remove();
                    $('ul > li').css('line-height', 'unset');
                    $('.multiselect button').css('overflow', 'none');
                    $('.multiselect button').css('background-color', '#eaeeff');
                    $('.multiselect button').css('height', '41px');
                    $('.multiselect button').css('border-radius', '5px');
                    resolve();
                }
            });
        });
    }

    up_country();





    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            //console.log(key);
            console.log(value);
            $('.' + key + '_err').text(value);
        });
    }
</script>