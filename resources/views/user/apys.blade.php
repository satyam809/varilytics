<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    #searchDataTable_info{
        display: none;
    }
    #searchDataTable_paginate{
        margin-top: 25px;
    }
    .paginate_button{
        cursor: pointer;
    }
    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .multiselect-container>li>a>label {
        padding: 3px 3px 0px 15px !important;
    }

    .multiselect-item>.input-group {
        width: 95% !important;
    }

    @media (max-width: 600px) {

        /* Set margin top to 20px */
        .searchInput,
        #showMandiCommodity,
        .years2,
        .years,
        #showMarket1,
        #showMarket2,
        #showGrade,
        #date,
        #searchAllMarket,
        .searchData {
            margin-top: 10px;
        }

        #compareRow {
            margin-top: -25px;
        }

        #searchAllCommodity>.btn-group,
        #showStates>.btn-group,
        #showDistricts>.btn-group,
        #showDistricts>select,
        #showYears>.btn-group,
        #showSeasons>.btn-group {
            width: 75%;
        }
    }

    /* th {
        padding: auto !important;
    } */

    .scrollable-container {
        overflow-x: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 10px;
        /* add padding to create space for the shadow */
    }

    .scrollable-table {
        width: 100%;
        /* make the table fill the container width */
    }

    @media (min-width: 768px) {

        #searchAllCommodity>.btn-group,
        #searchAllMarket>.btn-group {
            width: -webkit-fill-available;
        }
    }

    #searchDataTable_length {
        display: none;
    }

    div.dataTables_wrapper div.dataTables_processing {
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        background-color: #fff;
    }

    .btn-group {
        width: -webkit-fill-available;
    }

    @media (max-width: 767px) {

        /* Styles for screens smaller than 768 pixels wide (i.e., mobile) */
        #searchAllCommodity,
        #showStates,
        #showDistricts,
        #showYears,
        #showSeasons {
            padding: 10px 0px;
        }

        #showDistricts {
            display: flex;
            justify-content: center;
        }

        #customSearch {
            margin-top: -20px;
        }
    }
</style>
<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>APYs</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="container-fluid">
    @if (Session::has('success'))
    <div class="alert alert-warning alert-dismissible fade in" style="opacity: 1;width: fit-content;margin: 0% 20%;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="col-md-4" id="error_message" style="margin:0 auto"></div>
    <h4 class="text-center">Search Data</h4>
    <br>
    <form id="customSearch">
        {{ csrf_field() }}
        <div class="row" style="justify-content: center;">
            <div class="col-md-2 col-12 text-center" id="searchAllCommodity">
            </div>
            <div class="col-md-2 col-12 text-center" id="showStates">
            </div>
            <div class="col-md-2 col-12 text-center" id="showDistricts">
                <select class="form-control text-center">
                    <option value="">Select District</option>
                </select>
            </div>
            <div class="col-md-2 col-12 text-center" id="showYears">
                <select class="form-control" name="years[]" id="yearOption" multiple>
                    <option value="">Select Years</option>
                    <option>1997-98</option>
                    <option>1998-99</option>
                    <option>1999-00</option>
                    <option>2000-01</option>
                    <option>2001-02</option>
                    <option>2002-03</option>
                    <option>2003-04</option>
                    <option>2004-05</option>
                    <option>2005-06</option>
                    <option>2006-07</option>
                    <option>2007-08</option>
                    <option>2008-09</option>
                    <option>2009-10</option>
                    <option>2010-11</option>
                    <option>2011-12</option>
                    <option>2012-13</option>
                    <option>2013-14</option>
                    <option>2014-15</option>
                    <option>2015-16</option>
                    <option>2016-17</option>
                    <option>2017-18</option>
                    <option>2018-19</option>
                    <option>2019-20</option>
                </select>
                <span class="text-danger error-text year_err"></span>
            </div>
            <div class="col-md-2 col-12 text-center" id="showSeasons">
            </div>
            <div class="col-md-2 col-12 text-center">
                <input type="submit" class="btn btn-primary searchInput" value="Search Data">
            </div>

        </div>
        <!-- <div class="row" style="justify-content:center">
            
        </div> -->

    </form>


</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Search Box -->

            <table class="table" id="searchDataTable">
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
    </div>
</div>
</br>




<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    function allCommodity() {
        $.ajax({
            url: "/all-apys-commodity",
            method: "get",
            dataType: "json",
            success: function(data) {
                //console.log(data);
                var html = `<select class="form-control" name="commodity[]" id="commodityOption">`;
                html += `<option value="" selected disabled>Select Commodity</option>`;
                data.map(function(element) {
                    html += `<option value="${element.id}" >${element.name}</option>`;
                });
                html += `</select><br><span class="text-danger error-text commodity_err"></span>`;
                $("#searchAllCommodity").append(html);
                $('#commodityOption').multiselect({
                    nonSelectedText: 'Select Commodity',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    //buttonWidth: '50%',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450
                });
                $('.input-group-addon').remove();
                $('.input-group-btn').remove();
                $('ul > li').css('line-height', 'unset');
                $('button').css('overflow', 'none');
                $('button').css('background-color', '#eaeeff');
                $('button').css('height', '41px');
                $('button').css('border-radius', '5px');



            }

        });
    }
    allCommodity();

    function getAllApysState() {
        $.ajax({
            url: "getAllApysState",
            method: "GET",
            dataType: "JSON",
            beforeSend: function() {},
            success: function(result) {
                var html = `<select class="form-control" name="state" id="stateOption" onchange="getDistricts(event)">`;
                html += `<option value="">Select State</option>`;
                result.map(function(element) {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                html += `</select>`;
                $("#showStates").append(html);
                $('#stateOption').multiselect({
                    nonSelectedText: 'Select State',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    //buttonWidth: '50%',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450
                });

                $('.input-group-addon').remove();
                $('.input-group-btn').remove();
                $('ul > li').css('line-height', 'unset');
                $('button').css('overflow', 'none');
                $('button').css('background-color', '#eaeeff');
                $('button').css('height', '41px');
                $('button').css('border-radius', '5px');
                $(".marketLoader").remove();
            }

        });
    }
    getAllApysState();

    function getDistricts(event) {
        //alert(event.target.value)
        $("#showDistricts").empty();
        $.ajax({
            url: "getAllApysDistricts",
            method: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            // cache: false,
            data: {
                "state_id": event.target.value,
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                //console.log(result);
                var html = `<select class="form-control" name="state" id="districtOptions">`;
                html += `<option value="">Select District</option>`;
                result.map(function(element) {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                html += `</select>`;
                $("#showDistricts").append(html);
                $('#districtOptions').multiselect({
                    nonSelectedText: 'Select Districts',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    //buttonWidth: '50%',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450
                });
                $('.input-group-addon').remove();
                $('.input-group-btn').remove();
                $('ul > li').css('line-height', 'unset');
                $('button').css('overflow', 'none');
                $('button').css('background-color', '#eaeeff');
                $('button').css('height', '41px');
                $('button').css('border-radius', '5px');



            }

        });
    }

    function printErrorMsg(msg) {
        console.log(msg);
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text("This field is required");
        });
    }

    var dataTable = '';
    $(function() {
        dataTable = $('#searchDataTable').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: '{{ url("/apys") }}',
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

    function getAllSeason() {
        $.ajax({
            url: "/getAllApysSeason",
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
                $("#showSeasons").append(html);
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
                $('button').css('overflow', 'none');
                $('button').css('background-color', '#eaeeff');
                $('button').css('height', '41px');
                $('button').css('border-radius', '5px');


            }
        });
    }
    getAllSeason();

    // function getYears() {
    //     $.ajax({
    //         url: "/getAllApysYears",
    //         method: 'get',
    //         dataType: 'json',
    //         success: function(data) {
    //             var html = `<select class="form-control" name="years[]" id="yearOption">`;
    //             html += `<option value="">Select Years</option>`;
    //             data.map(function(element) {
    //                 html += `<option value="${element.year}">${element.year}</option>`;
    //             });
    //             html += `</select>`;
    //             $("#showYears").append(html);
    //             $('#yearOption').multiselect({
    //                 nonSelectedText: 'Select Years',
    //                 enableFiltering: true,
    //                 enableCaseInsensitiveFiltering: true,
    //                 buttonWidth: 'auto',
    //                 dropup: true,
    //                 //includeSelectAllOption: true
    //                 maxHeight: 450,

    //             });
    //             $('.input-group-addon').remove();
    //             $('.input-group-btn').remove();
    //             $('ul > li').css('line-height', 'unset');
    //             $('button').css('overflow', 'none');
    //             $('button').css('background-color', '#eaeeff');
    //             $('button').css('height', '41px');
    //             $('button').css('border-radius', '5px');


    //         }
    //     });
    // }
    // getYears();
    $(document).ready(function() {
        $(document).on('submit', '#customSearch', function(e) {
            e.preventDefault();
            //$('#commodity').DataTable().ajax.reload();
            var year = $("#yearOption").find(":selected").val();
            //alert(year);
            if (year) {
                $('#searchDataTable').DataTable({
                    "bDestroy": true,
                    "processing": true,
                    "serverSide": true,
                    "searching": false,
                    "ajax": {
                        "url": "/apysSearch",
                        "type": "POST",
                        "data": function(d) {
                            d.state = $("#stateOption").find(":selected").val();
                            d.district = $("#districtOptions").find(":selected").val();
                            d.season = $("#seasonOption").find(":selected").val();
                            d.year = $("#yearOption").val();
                            d.commodity = $("#commodityOption").find(":selected").val();
                            d._token = $('meta[name="csrf-token"]').attr('content');
                        },
                        // success: function(data){
                        //     //console.log(data.error);
                        //     printErrorMsg(data.error);
                        // }
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
            } else {
                $("#error_message").html(`<div class='alert alert-danger alert-dismissible in'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><span>Please select year</span></div>`);
            }
        });
    });
    $('#yearOption').multiselect({
        nonSelectedText: 'Select Years',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: 'auto',
        dropup: true,
        //includeSelectAllOption: true
        maxHeight: 450,
        onChange: function(option, checked) {
            if (checked === true) {
                if (this.$select.find('option').filter(':selected').length > 2) {
                    alert("You can fetch only two years of data.");
                    $(option).prop('selected', false);
                    this.refresh();
                }
            }
        }

    });
    $('.input-group-addon').remove();
    $('.input-group-btn').remove();
    $('ul > li').css('line-height', 'unset');
    $('button').css('overflow', 'none');
    $('button').css('background-color', '#eaeeff');
    $('button').css('height', '41px');
    $('button').css('border-radius', '5px');
</script>