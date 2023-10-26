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

    /* Styles for desktop */
    @media screen and (min-width: 992px) {

        #showSeason,
        #showDistrict {
            text-align: end;
        }
    }

    /* Styles for mobile */
    @media screen and (max-width: 991px) {

        #showSeason,
        #showDistrict,
        #showStates {
            text-align: center;
            margin: 10px 0px;
        }
    }

    @media screen and (max-width: 991px) {
        #showYear {
            display: flex;
            justify-content: center;
        }

        #showDistrict {
            margin: 10px 10px;
        }
    }

    @media screen and (min-width: 992px) {
        #showYear {
            display: flex;
            justify-content: end;
        }
    }

    /* Styles for desktop */
    @media screen and (min-width: 992px) {
        #search {
            text-align: end;
        }
    }

    /* Styles for mobile */
    @media screen and (max-width: 991px) {
        #search {
            text-align: center;
        }
    }

    .btn-default {
        background-color: #fff !important;
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
                        <li class="breadcrumb-item active">Crop-Production-Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="container-fluid">
            <form id="customSearch">
                <div class="row">

                    {{ csrf_field() }}
                    <input type="hidden" name="commodity" value="<?php echo $_GET["commodityId"]; ?>" id="commodityId" />

                    <div class="col-md-3" id="showStates"></div>
                    <div class="col-md-3" id="showDistrict">
                        <select class="form-control">
                            <option value="">Search District</option>
                        </select>
                    </div>
                    <div class="col-md-3" id="showYear">
                        <input type="number" class="form-control" name="year" placeholder="year" style="width:initial" id="year">
                    </div>
                    <div class="col-md-3" id="showSeason"></div>
                </div>
                <br>
                <div class="row" id="search">
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="search" />
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
                                        <th>Commodity</th>
                                        <th>State</th>
                                        <th>District</th>
                                        <th>Year</th>
                                        <th>Season</th>
                                        <th>Area</th>
                                        <th>Production</th>
                                        <th>Yield</th>

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
    const urlParams = new URLSearchParams(window.location.search);
    const commodity = urlParams.get('commodityId');
    var dataTable = '';
    $(function() {
        dataTable = $('#commodity').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: '{{ url("/getCropProductionData?commodityId=") }}' + commodity,
            columns: [{
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'commodity'
                },
                {
                    data: 'state',
                },
                {
                    data: 'district',
                },
                {
                    data: 'year',
                },
                {
                    data: 'season',
                },
                {
                    data: 'area',
                },
                {
                    data: 'production',
                },
                {
                    data: 'yield',
                }

            ]

        });


    });

    function getAllStates() {
        $.ajax({
            url: "/get_state",
            method: 'get',
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                var html = `<select class="form-control" name="state" id="stateOption" onchange="showDistrict(event)">`;
                html += `<option value="">Select State</option>`;
                data.data.map(function(element) {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                html += `</select>`;
                $("#showStates").append(html);
                $('#stateOption').multiselect({
                    nonSelectedText: 'Select State',
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
    getAllStates();

    function showDistrict(event) {
        $("#showDistrict").empty();
        $.ajax({
            url: "/getStateDistricts",
            method: 'post',
            data: {
                state_id: event.target.value,
                _token: $("meta[name='csrf-token']").attr("content")
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var html = `<select class="form-control" name="district" id="districtOption">`;
                html += `<option value="">Select District</option>`;
                data.map(function(element) {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                html += `</select>`;
                $("#showDistrict").append(html);
                $('#districtOption').multiselect({
                    nonSelectedText: 'Select District',
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
        });
    }

    function getAllSeason() {
        $.ajax({
            url: "/getAllSeason",
            method: 'get',
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                var html = `<select class="form-control" name="season" id="seasonOption">`;
                html += `<option value="">Select Season</option>`;
                data.map(function(element) {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                html += `</select>`;
                $("#showSeason").append(html);
                $('#seasonOption').multiselect({
                    nonSelectedText: 'Select Season',
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
        });
    }
    getAllSeason();
    $(document).ready(function() {
        $(document).on('submit', '#customSearch', function(e) {
            e.preventDefault();
            //$('#commodity').DataTable().ajax.reload();
            //alert($("#commodityGrade").find(":selected").val());
            $('#commodity').DataTable({
                "bDestroy": true,
                "processing": true,
                "serverSide": true,
                "searching": false,
                "ajax": {
                    "url": "/cropProductionSearch",
                    "type": "POST",
                    "data": function(d) {
                        d.state = $("#stateOption").find(":selected").val();
                        d.district = $("#districtOption").find(":selected").val();
                        d.season = $("#seasonOption").find(":selected").val();
                        d.year = $("#year").val();
                        d.commodity = $("#commodityId").val();
                        d._token = $('meta[name="csrf-token"]').attr('content');
                    }
                },
                "columns": [{
                        render: (data, type, row, meta) => meta.row + 1
                    },
                    {
                        data: 'commodity'
                    },
                    {
                        data: 'state',
                    },
                    {
                        data: 'district',
                    },
                    {
                        data: 'year',
                    },
                    {
                        data: 'season',
                    },
                    {
                        data: 'area',
                    },
                    {
                        data: 'production',
                    },
                    {
                        data: 'yield',
                    }

                ]
            });
        });
    });
</script>