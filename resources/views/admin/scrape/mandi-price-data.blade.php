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
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">
            <div id="errorMessage"></div>
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Scrapping</a></li>
                        <li class="breadcrumb-item active">Mandi-Price-Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="container-fluid">

            <form _onsubmit="customSearch(event)" id="customSearch">
                {{ csrf_field() }}
                <input type="hidden" name="commodity" value="<?php echo $_GET["commodity"]; ?>" />
                <div class="row">
                    <div class="col-md-3" id="showCommodityMarket"></div>
                    <div class="col-md-3" id="showCommodityGrade"></div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" placeholder="Min Price" id="minPrice" style="width:initial">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" placeholder="Max Price" id="maxPrice" style="width:initial">
                    </div>
                </div>
                <br>
                <div class="row" style="text-align:center">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label>From Date</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="fromDate" id="fromDate" placeholder="From Date" style="width:initial">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label>To Date</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="toDate" id="toDate" placeholder="To Date" style="width:initial">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </form>

            <br>
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body" style="overflow: auto;">
                            <table class="table table-bordered table-striped" id="commodity">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>State</th>
                                        <th>District</th>
                                        <th>Market</th>
                                        <th>Commodity</th>
                                        <th>Variety</th>
                                        <th>Grade</th>
                                        <th>Min Price</th>
                                        <th>Max Price</th>
                                        <th>Modal Price</th>
                                        <th>Price Date</th>

                                    </tr>
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
    const urlParams = new URLSearchParams(window.location.search);
    const commodity = urlParams.get('commodity');
    var dataTable = '';
    $(function() {
        dataTable = $('#commodity').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: '{{ url("/getMandiPriceCommodityData?commodity=") }}' + commodity,
            columns: [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'state'
                },
                {
                    data: 'district',
                },
                {
                    data: 'market',
                },
                {
                    data: 'comm_name',
                },
                {
                    data: 'variety',
                },
                {
                    data: 'grade',
                },
                {
                    data: 'min_price',
                },
                {
                    data: 'max_price',
                },
                {
                    data: 'modal_price',
                },
                {
                    data: 'price_date',
                }

            ]

        });


    });

    function getMarket(commodity) {
        $.ajax({
            url: "/getCommodityNameMarket",
            method: 'POST',
            dataType: 'json',
            data: {
                commodity: commodity,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                //console.log(data);
                var html = `<select class="form-control" name="market[]" id="commodityMarket">`;
                html += `<option>Select Market</option>`;
                data.map(function(element) {
                    html += `<option value="${element.market}">${element.market}</option>`;
                });
                html += `</select>`;
                $("#showCommodityMarket").append(html);
                $('#commodityMarket').multiselect({
                    nonSelectedText: 'Select Market',
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
                $(".marketLoader").remove();
            }
        });
    }
    getMarket(commodity);

    function getGrade(commodity) {
        $.ajax({
            url: "/getCommodityNameGrade",
            method: 'POST',
            dataType: 'json',
            data: {
                commodity: commodity,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                //console.log(data);
                var html = `<select class="form-control" name="grade[]" id="commodityGrade">`;
                html += `<option>Select Grade</option>`;
                data.map(function(element) {
                    html += `<option value="${element.grade}">${element.grade}</option>`;
                });
                html += `</select>`;
                $("#showCommodityGrade").append(html);
                $('#commodityGrade').multiselect({
                    nonSelectedText: 'Select Grade',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: 'auto',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450
                });
                $('.input-group-addon').remove();
                $('.input-group-btn').remove();
                $('ul > li').css('line-height', 'unset');
                $('.multiselect button').css('overflow', 'none');
                $('.multiselect button').css('background-color', '#eaeeff');
                $('.multiselect button').css('height', '41px');
                $('.multiselect button').css('border-radius', '5px');
                $(".gradeLoader").remove();
            }
        });
    }
    getGrade(commodity);


    $(document).ready(function() {
        $(document).on('submit', '#customSearch', function(e) {
            e.preventDefault();
            //$('#commodity').DataTable().ajax.reload();
            //alert($("#commodityGrade").find(":selected").val());
            $('#commodity').DataTable({
                "bDestroy": true,
                "processing": true,
                "serverSide": true,
                "searching": true,
                "ajax": {
                    "url": "/getMandiPriceCommoditySearch",
                    "type": "POST",
                    "data": function(d) {
                        d.market = $("#commodityMarket").find(":selected").val();
                        d.grade = $("#commodityGrade").find(":selected").val();
                        d.minPrice = $("#minPrice").val();
                        d.maxPrice = $("#maxPrice").val();
                        d.fromDate = $("#fromDate").val();
                        d.toDate = $("#toDate").val();
                        d.commodity = commodity;
                        d._token = $('meta[name="csrf-token"]').attr('content');
                    }
                },
                "columns": [{
                        render: (data, type, row, meta) => meta.row + 1
                    },
                    {
                        data: 'state'
                    },
                    {
                        data: 'district',
                    },
                    {
                        data: 'market',
                    },
                    {
                        data: 'comm_name',
                    },
                    {
                        data: 'variety',
                    },
                    {
                        data: 'grade',
                    },
                    {
                        data: 'min_price',
                    },
                    {
                        data: 'max_price',
                    },
                    {
                        data: 'modal_price',
                    },
                    {
                        data: 'price_date',
                    }

                ]
            });
        });
    });
</script>