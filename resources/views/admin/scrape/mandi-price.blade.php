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

    .multiselect {
        width: 248px;
    }

    .multiselect-container>li>a {
        color: #444;
    }

    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: 100 !important;
    }
    .btn-group{
        display: flex !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">
            <div id="errorMessage" style="width: fit-content;margin: 0px auto;"></div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUrl">Add</button>
                    <!-- Modal -->
                    <div class="modal fade" id="addUrl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Scrapping Url</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="scrapeData" onsubmit="scrapeData(event)">
                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Commodity</label>
                                            <div id="commodities"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Url</label>
                                            <input type="text" class="form-control" name="url" value="" required>
                                            <span class="text-danger error-text url_err"></span>
                                        </div>

                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success" id="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Scrapping</a></li>
                        <li class="breadcrumb-item active">Mandi-Price-List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table" id="all_mandi_price">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Commodity</th>
                                        <th>Total</th>
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
    var dataTable = '';
    $(function() {
        dataTable = $('#all_mandi_price').DataTable({
            // processing: true,
            // serverSide: true,
            searching: true,
            ajax: '{{ url("/all_mandi_price_commodity") }}',
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'commodityName'
                },
                {
                    data: 'total'
                },
                {
                    render: function(data, type, row, meta) {
                        var deleteButton = `<a type="button" class="btn btn-danger" style="color: aliceblue;" onclick="deleteCommodityData(${row.commodity_id})" id="deleteCommodity${row.commodity_id}">Delete</a>`;
                        var viewButton = `<a href="mandi-price-data?commodity=${row.commodityName}" class="btn btn-success" style="color: aliceblue;">View</a>`;
                        return deleteButton + ' ' + viewButton;
                    }
                }
            ]
        });
    });


    function scrapeData(event) {
        event.preventDefault();
        var commodity = document.querySelector('#commodity_id');
        var url = $("input[name=url]").val();
        var status = checkScrappingValidation(commodity, url);
        if (status == true) {
            $.ajax({
                url: "/mandiPriceScrapeData",
                method: "POST",
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(event.target),
                beforeSend: function() {
                    $('#submit').text('Submitting ...');
                    $("#submit").attr('disabled', true);
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        dataTable.ajax.reload();
                        $("#errorMessage").html(`<div class='alert alert-success alert-dismissible in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><span>${data.message}</span></div>`);
                        $("#commodities").empty();
                        getCommodities();
                        $("#scrapeData").trigger('reset');
                        $("#addUrl").modal('hide');
                        $('#submit').text('Submit');
                        $("#submit").attr('disabled', false);
                    } else if (data.status == false) {
                        dataTable.ajax.reload();
                        $("#addUrl").modal('hide');
                        $("#errorMessage").html(`<div class='alert alert-success alert-dismissible in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><span>${data.message}</span></div>`);
                        $('#submit').text('Submit');
                        $("#submit").attr('disabled', false);
                    } else {
                        $('#submit').text('Submit');
                        printErrorMsg(data.error);
                        $('#submit').text('Submit');
                        $("#submit").attr('disabled', false);
                    }

                }

            })
        } else {
            alert(status);
        }
    }

    $(document).ready(function() {
        // $(document).on("submit", "#scrapeData", function(e) {
        //     e.preventDefault();
        //     var commodity = document.querySelector('#commodity_id');
        //     var url = $("input[name=url]").val();
        //     var status = checkScrappingValidation(commodity, url);
        //     if (status == true) {
        //         $.ajax({
        //             url: "/mandiPriceScrapeData",
        //             method: "POST",
        //             dataType: 'json',
        //             processData: false,
        //             contentType: false,
        //             cache: false,
        //             data: new FormData(this),
        //             beforeSend: function() {
        //                 $('#submit').text('Submitting ...');
        //                 $("#submit").attr('disabled', true);
        //             },
        //             success: function(data) {
        //                 //console.log(data);
        //                 //console.log(data.topic[0].topic.id);
        //                 if (data.status == true) {
        //                     //location.reload();
        //                     alert(data.message);
        //                     location.reload();
        //                     //$("#errorMessage").text(data.message);
        //                 } else if (data.status == false) {

        //                     alert(data.message);
        //                     location.reload();
        //                     //$("#errorMessage").text(data.message);
        //                 } else {
        //                     $('#submit').text('Submit');
        //                     printErrorMsg(data.error);
        //                 }

        //             }

        //         })
        //     } else {
        //         alert(status);
        //     }
        // });



    });

    function checkScrappingValidation(commodity, url) {

        var commodityIndex = commodity.selectedIndex;
        var selectedCommodity = commodity.options[commodityIndex];
        var commodityText = selectedCommodity.text;

        var url = new URL(url);
        var params = new URLSearchParams(url.search);
        var datasets = params.get("datasets");
        var commodity = params.get("commodity")
        if (datasets == "mandi-price" && commodity == commodityText) {
            return true;
        } else {
            return "Your dataset or commodity is not matching with current url";
        }

    }

    // get commodities
    function getCommodities() {
        $.ajax({
            url: '/getMandiPriceCommodities',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // var html = `<select class="form-control" name="commodity" id="commodity_id"><option selected disabled>Select Commodities</option>`;
                // data.map(function(element) {
                //     html += `<option value="${element.id}">${element.name}</option>`;
                // });
                // html += `</select>`;
                // $("#commodities").append(html);
                var html = `<select class="form-control" name="commodity" id="commodity_id" required>`;
                html += `<option selected disabled>Select Commodity</option>`;
                data.map(function(element) {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                html += `</select>`;
                $("#commodities").append(html);
                $('#commodity_id').multiselect({
                    nonSelectedText: 'Select Commodity',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: 'auto',
                    dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450,

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
    getCommodities();

    function deleteCommodityData(id) {
        if (confirm("Are you sure you want to delete this commodity data ?")) {
            $.ajax({
                url: "/deleteMandiPriceCommodity",
                method: "POST",
                dataType: "json",
                data: {
                    "commodity_id": id,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                beforeSend: function() {
                    $("#deleteCommodity" + id).text("Deleting...");
                    $("#deleteCommodity" + id).attr('disabled', true);
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        // alert(data.message);
                        // location.reload();
                        $("#commodities").empty();
                        getCommodities();
                        $("#scrapeData").trigger('reset');
                        dataTable.ajax.reload();
                        $("#errorMessage").html(`<div class='alert alert-success alert-dismissible in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><span>${data.message}</span></div>`);
                        
                    }
                }
            })
        }

    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text("This field is required");
        });
    }
</script>