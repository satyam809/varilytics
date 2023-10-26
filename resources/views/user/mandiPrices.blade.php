<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    ul>li>a>label {
        font-size: 13px !important;
    }

    #searchDataTable_paginate {
        margin-top: 25px;
    }

    .paginate_button {
        cursor: pointer;
    }

    .border-gradient-rounded {
        /* Border */
        /* border: 4px solid transparent;
        border-radius: 20px;
        background:
            linear-gradient(to right, white, white),
            linear-gradient(to right, red, blue);
        background-clip: padding-box, border-box;
        background-origin: padding-box, border-box; */

        /* Other styles */
        /* width: 100px;
        height: 40px;
        padding: 12px; */
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

    @media (max-width: 991px) {

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



        /* #searchAllCommodity>.btn-group,
        #searchAllMarket>.btn-group {
            width: auto;
        } */

        #searchAllCommodity {
            text-align: center;
        }

        #searchAllMarket,
        #showMandiCommodity,
        #showMarket1,
        #showMarket2,
        #date,
        #compareDiv {
            display: flex;
            justify-content: center;
        }

        .notSetmarketOption {
            width: 65%;
        }

        #overflowTable {
            overflow-x: auto;
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

    /* @media (min-width: 768px) {

        #searchAllCommodity>.btn-group,
        #searchAllMarket>.btn-group {
            width: -webkit-fill-available;
        }
    } */

    #searchDataTable_length {
        display: none;
    }

    div.dataTables_wrapper div.dataTables_processing {
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        background-color: #fff;
    }

    .btn-group {
        width: 100%;
    }

    #searchDataTable_processing {
        margin-top: 15px;
    }

    @media (min-width: 992px) {

        #searchAllMarket,
        #showMandiCommodity,
        #showMarket1,
        #showMarket2,
        #date,
        #compareDiv {
            display: flex;
            justify-content: center;
        }

        #compareRow {
            margin-top: 5px;
        }
    }
</style>
<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Mandi Prices</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-warning alert-dismissible fade in" style="opacity: 1;width: fit-content;margin: 0% 20%;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="col-md-4" id="error_message" style="margin:0 auto"></div>
    <h4 class="text-center">Search Data</h4>
    <br>
    <form id="searchData">
        {{ csrf_field() }}
        <div class="row" style="justify-content: center;">
            <div class="col-md-3 col-12" id="searchAllCommodity">

            </div>
            <div class="col-md-3 col-12" id="searchAllMarket">
                <select class="form-control notSetmarketOption">
                    <option>Select Market</option>
                </select>
            </div>
            <div class="col-md-1 col-4 searchData d-flex align-items-center" style="justify-content:center;">
                <label>From Date</label>
            </div>
            <div class="col-md-2 col-8 searchData">
                <input type="date" class="form-control" name="fromDate" placeholder="From Date" />
                <span class="text-danger error-text fromDate_err"></span>
            </div>
            <div class="col-md-1 col-4 searchData d-flex align-items-center" style="justify-content:center;">
                <label>To Date</label>
            </div>
            <div class="col-md-2 col-8 searchData">
                <input type="date" class="form-control" name="toDate" placeholder="To Date" />
                <span class="text-danger error-text toDate_err"></span>
            </div>


        </div>
        <div class="row">
            <div class="col-12" style="text-align:end;margin-top:10px;">
                <input type="submit" class="btn btn-primary searchInput" value="Search Data">
            </div>
        </div>
        <!-- <div class="row" style="justify-content:center">
            
        </div> -->

    </form>


</div>

<div class="container" id="displayTable">
    <div class="row">
        <div class="col-md-12">
            <!-- Search Box -->
            <div id="overflowTable">
                <table class="table" id="searchDataTable">
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
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>


<div class="container" id="graphSection" style="margin-top:70px;">
    <h4 class="text-center">Generate Commodity Wise Graph</h4>
    <br>
    <form onSubmit="generateGraph(event)">
        {{ csrf_field() }}
        <div class="row">

            <div class="col-md-4 text-center commodity">

            </div>
            <div class="col-md-4 text-center years">
                <select class="form-control allYears" name="years[]" multiple="multiple">
                    <option>2008</option>
                    <option>2009</option>
                    <option>2010</option>
                    <option>2011</option>
                    <option>2012</option>
                    <option>2013</option>
                    <option>2014</option>
                    <option>2015</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                </select><br><span class="text-danger error-text years_err"></span>
            </div>
            <div class="col-md-4 text-center">
                <input type="submit" class="btn btn-primary searchInput" value="Generate" id="submitCommodityGraph">
            </div>

        </div>
    </form>
    <div class="row" id="showGraph">
        <div class="col-md-12">
            <div class="border-gradient-rounded" id="curve_chart">
                <div style="display:flex;justify-content:center;filter:blur(5px)">
                    <svg version="1.1" class="highcharts-root" style="font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size: 12px;width: 910px;" xmlns="http://www.w3.org/2000/svg" width="910" height="400" viewBox="0 0 910 400">
                        <defs>
                            <clipPath id="highcharts-l8w7g9k-1-">
                                <rect x="0" y="0" width="842" height="356" fill="none"></rect>
                            </clipPath>
                        </defs>
                        <rect fill="#FFFFFF" class="highcharts-background" x="0" y="0" width="910" height="400" rx="0" ry="0"></rect>
                        <rect fill="rgb(255,255,255)" class="highcharts-plot-background" x="53" y="10" width="842" height="356"></rect>
                        <g class="highcharts-pane-group" data-z-index="0"></g>
                        <rect fill="none" class="highcharts-plot-border" data-z-index="1" stroke="#cccccc" stroke-width="1" x="52.5" y="9.5" width="843" height="357"></rect>
                        <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 366.5 L 895 366.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 322.5 L 895 322.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 277.5 L 895 277.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 233.5 L 895 233.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 188.5 L 895 188.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 144.5 L 895 144.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 99.5 L 895 99.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 55.5 L 895 55.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 9.5 L 895 9.5" opacity="1"></path>
                        </g>
                        <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1"></g>
                        <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 68.5 10 L 68.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 84.5 10 L 84.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 101.5 10 L 101.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 117.5 10 L 117.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 133.5 10 L 133.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 149.5 10 L 149.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 165.5 10 L 165.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 182.5 10 L 182.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 198.5 10 L 198.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 214.5 10 L 214.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 230.5 10 L 230.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 246.5 10 L 246.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 263.5 10 L 263.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 279.5 10 L 279.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 295.5 10 L 295.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 311.5 10 L 311.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 327.5 10 L 327.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 343.5 10 L 343.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 360.5 10 L 360.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 376.5 10 L 376.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 392.5 10 L 392.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 408.5 10 L 408.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 424.5 10 L 424.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 441.5 10 L 441.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 457.5 10 L 457.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 473.5 10 L 473.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 489.5 10 L 489.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 505.5 10 L 505.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 522.5 10 L 522.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 538.5 10 L 538.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 554.5 10 L 554.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 570.5 10 L 570.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 586.5 10 L 586.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 603.5 10 L 603.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 619.5 10 L 619.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 635.5 10 L 635.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 651.5 10 L 651.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 667.5 10 L 667.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 684.5 10 L 684.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 700.5 10 L 700.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 716.5 10 L 716.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 732.5 10 L 732.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 748.5 10 L 748.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 764.5 10 L 764.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 781.5 10 L 781.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 797.5 10 L 797.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 813.5 10 L 813.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 829.5 10 L 829.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 845.5 10 L 845.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 862.5 10 L 862.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 878.5 10 L 878.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 894.5 10 L 894.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 52.5 10 L 52.5 366" opacity="1"></path>
                        </g>
                        <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="23.97499942779541" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 23.97499942779541 188)" class="highcharts-axis-title" style="color:#222240;font-family:PT Sans;font-size:8pt;white-space:nowrap;fill:#222240;" y="188">Mton CO2</text>
                            <path fill="none" class="highcharts-axis-line" stroke="#000000" stroke-width="0.5" data-z-index="7" d="M 52.75 10 L 52.75 366"></path>
                        </g>
                        <g class="highcharts-axis highcharts-yaxis" data-z-index="2">
                            <path fill="none" class="highcharts-axis-line" stroke="#000000" stroke-width="0.5" data-z-index="7" d="M 895.25 10 L 895.25 366" visibility="hidden"></path>
                        </g>
                        <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 68.75 366 L 68.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 84.75 366 L 84.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 101.75 366 L 101.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 117.75 366 L 117.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 133.75 366 L 133.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 149.75 366 L 149.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 165.75 366 L 165.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 182.75 366 L 182.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 198.75 366 L 198.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 214.75 366 L 214.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 230.75 366 L 230.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 246.75 366 L 246.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 263.75 366 L 263.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 279.75 366 L 279.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 295.75 366 L 295.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 311.75 366 L 311.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 327.75 366 L 327.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 343.75 366 L 343.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 360.75 366 L 360.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 376.75 366 L 376.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 392.75 366 L 392.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 408.75 366 L 408.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 424.75 366 L 424.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 441.75 366 L 441.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 457.75 366 L 457.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 473.75 366 L 473.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 489.75 366 L 489.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 505.75 366 L 505.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 522.75 366 L 522.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 538.75 366 L 538.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 554.75 366 L 554.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 570.75 366 L 570.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 586.75 366 L 586.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 603.75 366 L 603.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 619.75 366 L 619.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 635.75 366 L 635.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 651.75 366 L 651.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 667.75 366 L 667.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 684.75 366 L 684.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 700.75 366 L 700.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 716.75 366 L 716.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 732.75 366 L 732.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 748.75 366 L 748.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 764.75 366 L 764.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 781.75 366 L 781.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 797.75 366 L 797.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 813.75 366 L 813.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 829.75 366 L 829.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 845.75 366 L 845.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 862.75 366 L 862.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 878.75 366 L 878.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 895.25 366 L 895.25 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 52.75 366 L 52.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-axis-line" stroke="#000000" stroke-width="0.5" data-z-index="7" d="M 53 366.25 L 895 366.25"></path>
                        </g>
                        <g class="highcharts-series-group" data-z-index="3">
                            <g class="highcharts-series highcharts-series-0 highcharts-line-series" data-z-index="0.1" opacity="1" transform="translate(53,10) scale(1 1)" clip-path="url(#highcharts-l8w7g9k-1-)">
                                <path fill="none" d="M 8.0961538461538 349.93780396290526 L 24.288461538462 349.81632118475 L 40.480769230769 348.03425569945 L 56.673076923077 344.85806286260527 L 72.865384615385 344.93092019649475 L 89.057692307692 346.7178774383922 L 105.25 347.98544410335 L 121.44230769231 347.0241097591447 L 137.63461538462 347.45708624945 L 153.82692307692 343.6401986182922 L 170.01923076923 342.2271875423078 L 186.21153846154 343.9046984525422 L 202.40384615385 342.46070311458277 L 218.59615384615 337.4039708125476 L 234.78846153846 336.0504285448122 L 250.98076923077 340.72427623538846 L 267.17307692308 335.86732557437875 L 283.36538461538 334.61770345010996 L 299.55769230769 334.52603521589066 L 315.75 338.7000429279096 L 331.94230769231 331.56923116140905 L 348.13461538462 326.0317474913356 L 364.32692307692 324.5629119546005 L 380.51923076923 321.25699424433253 L 396.71153846154 313.79674078307494 L 412.90384615385 310.0866980341835 L 429.09615384615 307.30183647315044 L 445.28846153846 302.22652037184264 L 461.48076923077 298.97852005779026 L 477.67307692308 281.7804322180792 L 493.86538461538 279.8308576364261 L 510.05769230769 274.5763999201656 L 526.25 289.4918762635941 L 542.44230769231 280.5214614742888 L 558.63461538462 290.3939606354095 L 574.82692307692 282.57031830079535 L 591.01923076923 295.16428400540156 L 607.21153846154 293.2994276339687 L 623.40384615385 286.7485931021042 L 639.59615384615 264.8062656582813 L 655.78846153846 248.94211591406452 L 671.98076923077 236.11500008035253 L 688.17307692308 217.24539678023163 L 704.36538461538 216.48384155851562 L 720.55769230769 193.76576645373115 L 736.75 192.34789385536106 L 752.94230769231 121.08178198688077 L 769.13461538462 75.21101126901652 L 785.32692307692 17.26657006057502 L 801.51923076923 52.98651453345349 L 817.71153846154 46.13387128993122 L 833.90384615385 37.5191695584337" class="highcharts-graph" data-z-index="1" stroke="#205e4c" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                                <path fill="none" d="M 8.0961538461538 349.93780396290526 L 24.288461538462 349.81632118475 L 40.480769230769 348.03425569945 L 56.673076923077 344.85806286260527 L 72.865384615385 344.93092019649475 L 89.057692307692 346.7178774383922 L 105.25 347.98544410335 L 121.44230769231 347.0241097591447 L 137.63461538462 347.45708624945 L 153.82692307692 343.6401986182922 L 170.01923076923 342.2271875423078 L 186.21153846154 343.9046984525422 L 202.40384615385 342.46070311458277 L 218.59615384615 337.4039708125476 L 234.78846153846 336.0504285448122 L 250.98076923077 340.72427623538846 L 267.17307692308 335.86732557437875 L 283.36538461538 334.61770345010996 L 299.55769230769 334.52603521589066 L 315.75 338.7000429279096 L 331.94230769231 331.56923116140905 L 348.13461538462 326.0317474913356 L 364.32692307692 324.5629119546005 L 380.51923076923 321.25699424433253 L 396.71153846154 313.79674078307494 L 412.90384615385 310.0866980341835 L 429.09615384615 307.30183647315044 L 445.28846153846 302.22652037184264 L 461.48076923077 298.97852005779026 L 477.67307692308 281.7804322180792 L 493.86538461538 279.8308576364261 L 510.05769230769 274.5763999201656 L 526.25 289.4918762635941 L 542.44230769231 280.5214614742888 L 558.63461538462 290.3939606354095 L 574.82692307692 282.57031830079535 L 591.01923076923 295.16428400540156 L 607.21153846154 293.2994276339687 L 623.40384615385 286.7485931021042 L 639.59615384615 264.8062656582813 L 655.78846153846 248.94211591406452 L 671.98076923077 236.11500008035253 L 688.17307692308 217.24539678023163 L 704.36538461538 216.48384155851562 L 720.55769230769 193.76576645373115 L 736.75 192.34789385536106 L 752.94230769231 121.08178198688077 L 769.13461538462 75.21101126901652 L 785.32692307692 17.26657006057502 L 801.51923076923 52.98651453345349 L 817.71153846154 46.13387128993122 L 833.90384615385 37.5191695584337" visibility="visible" data-z-index="2" class="highcharts-tracker-line" stroke-linecap="round" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22" style="cursor:pointer;"></path>
                            </g>
                            <g class="highcharts-markers highcharts-series-0 highcharts-line-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(53,10) scale(1 1)" style="cursor:pointer;" clip-path="none"></g>
                        </g><text x="455" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="455" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="397"></text>
                        <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="369" opacity="1">0</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="325" opacity="1">2</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="280" opacity="1">4</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="236" opacity="1">6</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="191" opacity="1">8</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="147" opacity="1">10</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="102" opacity="1">12</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="58" opacity="1">14</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="13" opacity="1">16</text></g>
                        <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"></g>
                        <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="61.09615384615416" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1970</text><text x="77.28846153846115" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="93.48076923076616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1972</text><text x="109.67307692307617" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="125.86538461538615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1974</text><text x="142.05769230769616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="158.24999999999616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1976</text><text x="174.44230769230617" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="190.63461538461615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1978</text><text x="206.82692307692616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="223.01923076922617" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1980</text><text x="239.21153846153615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="255.40384615384616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1982</text><text x="271.59615384615614" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="287.78846153846615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1984</text><text x="303.98076923076616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="320.1730769230761" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1986</text><text x="336.3653846153861" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="352.55769230769613" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1988</text><text x="368.74999999999613" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="384.94230769230614" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1990</text><text x="401.13461538461615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="417.3269230769261" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1992</text><text x="433.5192307692261" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="449.7115384615361" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1994</text><text x="465.90384615384613" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="482.09615384615614" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1996</text><text x="498.28846153846615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="514.4807692307662" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1998</text><text x="530.6730769230762" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="546.8653846153862" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2000</text><text x="563.0576923076962" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="579.2499999999961" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2002</text><text x="595.4423076923061" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="611.6346153846162" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2004</text><text x="627.8269230769262" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="644.0192307692262" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2006</text><text x="660.2115384615362" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="676.4038461538462" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2008</text><text x="692.5961538461562" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="708.7884615384662" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2010</text><text x="724.9807692307662" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="741.1730769230762" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2012</text><text x="757.3653846153862" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="773.5576923076962" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2014</text><text x="789.7499999999961" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="805.9423076923061" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2016</text><text x="822.1346153846162" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="838.3269230769262" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2018</text><text x="854.5192307692262" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="870.7115384615362" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="886.9038461538462" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2021</text></g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mandi graph section -->
<div class="container" id="mandiGraphSection" style="margin-top:30px;">
    <h4 class="text-center">Generate Commodity With Market Wise Graph</h4>
    <br>
    <form onSubmit="generateMandiGraph(event)">
        {{ csrf_field() }}
        <div class="row">

            <div class="col-md-3 text-center md-text-right">
                <select class="form-control singleSelectionCommodity" name="commodity2" onChange="getMandi(event)">

                </select>
                <br><span class="text-danger error-text commodity2_err">
            </div>
            <div class="col-md-3 text-center md-text-right" id="showMandiCommodity">
                <select class="form-control notSetmarketOption">
                    <option>Select Market</option>
                </select><span class="text-danger error-text market_err">
            </div>
            <div class="col-md-3 text-center md-text-right years2">
                <select class="form-control allYears" name="years2[]" multiple="multiple">
                    <option>2008</option>
                    <option>2009</option>
                    <option>2010</option>
                    <option>2011</option>
                    <option>2012</option>
                    <option>2013</option>
                    <option>2014</option>
                    <option>2015</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                </select><br><span class="text-danger error-text years2_err"></span>
            </div>
            <div class="col-md-3 text-center">
                <input type="submit" class="btn btn-primary searchInput" value="Generate" id="submitMarketGraph">
            </div>

        </div>
    </form>
    <br>

    <div class="row" id="showMandiGraph" style="margin:-25px 0px;">
        <div class="col-md-12">
            <div id="mandi_curve_chart" class="border-gradient-rounded">
                <div style="display:flex;justify-content:center;filter:blur(5px)">
                    <svg version="1.1" class="highcharts-root" style="font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size: 12px;width: 910px;" xmlns="http://www.w3.org/2000/svg" width="910" height="400" viewBox="0 0 910 400">
                        <defs>
                            <clipPath id="highcharts-l8w7g9k-1-">
                                <rect x="0" y="0" width="842" height="356" fill="none"></rect>
                            </clipPath>
                        </defs>
                        <rect fill="#FFFFFF" class="highcharts-background" x="0" y="0" width="910" height="400" rx="0" ry="0"></rect>
                        <rect fill="rgb(255,255,255)" class="highcharts-plot-background" x="53" y="10" width="842" height="356"></rect>
                        <g class="highcharts-pane-group" data-z-index="0"></g>
                        <rect fill="none" class="highcharts-plot-border" data-z-index="1" stroke="#cccccc" stroke-width="1" x="52.5" y="9.5" width="843" height="357"></rect>
                        <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 366.5 L 895 366.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 322.5 L 895 322.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 277.5 L 895 277.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 233.5 L 895 233.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 188.5 L 895 188.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 144.5 L 895 144.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 99.5 L 895 99.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 55.5 L 895 55.5" opacity="1"></path>
                            <path fill="none" stroke="#888888" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 53 9.5 L 895 9.5" opacity="1"></path>
                        </g>
                        <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1"></g>
                        <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 68.5 10 L 68.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 84.5 10 L 84.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 101.5 10 L 101.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 117.5 10 L 117.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 133.5 10 L 133.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 149.5 10 L 149.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 165.5 10 L 165.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 182.5 10 L 182.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 198.5 10 L 198.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 214.5 10 L 214.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 230.5 10 L 230.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 246.5 10 L 246.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 263.5 10 L 263.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 279.5 10 L 279.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 295.5 10 L 295.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 311.5 10 L 311.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 327.5 10 L 327.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 343.5 10 L 343.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 360.5 10 L 360.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 376.5 10 L 376.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 392.5 10 L 392.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 408.5 10 L 408.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 424.5 10 L 424.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 441.5 10 L 441.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 457.5 10 L 457.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 473.5 10 L 473.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 489.5 10 L 489.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 505.5 10 L 505.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 522.5 10 L 522.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 538.5 10 L 538.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 554.5 10 L 554.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 570.5 10 L 570.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 586.5 10 L 586.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 603.5 10 L 603.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 619.5 10 L 619.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 635.5 10 L 635.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 651.5 10 L 651.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 667.5 10 L 667.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 684.5 10 L 684.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 700.5 10 L 700.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 716.5 10 L 716.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 732.5 10 L 732.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 748.5 10 L 748.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 764.5 10 L 764.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 781.5 10 L 781.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 797.5 10 L 797.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 813.5 10 L 813.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 829.5 10 L 829.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 845.5 10 L 845.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 862.5 10 L 862.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 878.5 10 L 878.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 894.5 10 L 894.5 366" opacity="1"></path>
                            <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 52.5 10 L 52.5 366" opacity="1"></path>
                        </g>
                        <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="23.97499942779541" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 23.97499942779541 188)" class="highcharts-axis-title" style="color:#222240;font-family:PT Sans;font-size:8pt;white-space:nowrap;fill:#222240;" y="188">Mton CO2</text>
                            <path fill="none" class="highcharts-axis-line" stroke="#000000" stroke-width="0.5" data-z-index="7" d="M 52.75 10 L 52.75 366"></path>
                        </g>
                        <g class="highcharts-axis highcharts-yaxis" data-z-index="2">
                            <path fill="none" class="highcharts-axis-line" stroke="#000000" stroke-width="0.5" data-z-index="7" d="M 895.25 10 L 895.25 366" visibility="hidden"></path>
                        </g>
                        <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 68.75 366 L 68.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 84.75 366 L 84.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 101.75 366 L 101.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 117.75 366 L 117.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 133.75 366 L 133.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 149.75 366 L 149.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 165.75 366 L 165.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 182.75 366 L 182.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 198.75 366 L 198.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 214.75 366 L 214.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 230.75 366 L 230.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 246.75 366 L 246.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 263.75 366 L 263.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 279.75 366 L 279.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 295.75 366 L 295.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 311.75 366 L 311.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 327.75 366 L 327.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 343.75 366 L 343.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 360.75 366 L 360.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 376.75 366 L 376.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 392.75 366 L 392.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 408.75 366 L 408.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 424.75 366 L 424.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 441.75 366 L 441.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 457.75 366 L 457.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 473.75 366 L 473.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 489.75 366 L 489.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 505.75 366 L 505.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 522.75 366 L 522.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 538.75 366 L 538.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 554.75 366 L 554.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 570.75 366 L 570.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 586.75 366 L 586.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 603.75 366 L 603.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 619.75 366 L 619.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 635.75 366 L 635.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 651.75 366 L 651.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 667.75 366 L 667.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 684.75 366 L 684.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 700.75 366 L 700.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 716.75 366 L 716.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 732.75 366 L 732.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 748.75 366 L 748.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 764.75 366 L 764.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 781.75 366 L 781.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 797.75 366 L 797.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 813.75 366 L 813.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 829.75 366 L 829.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 845.75 366 L 845.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 862.75 366 L 862.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 878.75 366 L 878.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 895.25 366 L 895.25 371" opacity="1"></path>
                            <path fill="none" class="highcharts-tick" stroke="#000000" stroke-width="0.5" d="M 52.75 366 L 52.75 371" opacity="1"></path>
                            <path fill="none" class="highcharts-axis-line" stroke="#000000" stroke-width="0.5" data-z-index="7" d="M 53 366.25 L 895 366.25"></path>
                        </g>
                        <g class="highcharts-series-group" data-z-index="3">
                            <g class="highcharts-series highcharts-series-0 highcharts-line-series" data-z-index="0.1" opacity="1" transform="translate(53,10) scale(1 1)" clip-path="url(#highcharts-l8w7g9k-1-)">
                                <path fill="none" d="M 8.0961538461538 349.93780396290526 L 24.288461538462 349.81632118475 L 40.480769230769 348.03425569945 L 56.673076923077 344.85806286260527 L 72.865384615385 344.93092019649475 L 89.057692307692 346.7178774383922 L 105.25 347.98544410335 L 121.44230769231 347.0241097591447 L 137.63461538462 347.45708624945 L 153.82692307692 343.6401986182922 L 170.01923076923 342.2271875423078 L 186.21153846154 343.9046984525422 L 202.40384615385 342.46070311458277 L 218.59615384615 337.4039708125476 L 234.78846153846 336.0504285448122 L 250.98076923077 340.72427623538846 L 267.17307692308 335.86732557437875 L 283.36538461538 334.61770345010996 L 299.55769230769 334.52603521589066 L 315.75 338.7000429279096 L 331.94230769231 331.56923116140905 L 348.13461538462 326.0317474913356 L 364.32692307692 324.5629119546005 L 380.51923076923 321.25699424433253 L 396.71153846154 313.79674078307494 L 412.90384615385 310.0866980341835 L 429.09615384615 307.30183647315044 L 445.28846153846 302.22652037184264 L 461.48076923077 298.97852005779026 L 477.67307692308 281.7804322180792 L 493.86538461538 279.8308576364261 L 510.05769230769 274.5763999201656 L 526.25 289.4918762635941 L 542.44230769231 280.5214614742888 L 558.63461538462 290.3939606354095 L 574.82692307692 282.57031830079535 L 591.01923076923 295.16428400540156 L 607.21153846154 293.2994276339687 L 623.40384615385 286.7485931021042 L 639.59615384615 264.8062656582813 L 655.78846153846 248.94211591406452 L 671.98076923077 236.11500008035253 L 688.17307692308 217.24539678023163 L 704.36538461538 216.48384155851562 L 720.55769230769 193.76576645373115 L 736.75 192.34789385536106 L 752.94230769231 121.08178198688077 L 769.13461538462 75.21101126901652 L 785.32692307692 17.26657006057502 L 801.51923076923 52.98651453345349 L 817.71153846154 46.13387128993122 L 833.90384615385 37.5191695584337" class="highcharts-graph" data-z-index="1" stroke="#205e4c" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                                <path fill="none" d="M 8.0961538461538 349.93780396290526 L 24.288461538462 349.81632118475 L 40.480769230769 348.03425569945 L 56.673076923077 344.85806286260527 L 72.865384615385 344.93092019649475 L 89.057692307692 346.7178774383922 L 105.25 347.98544410335 L 121.44230769231 347.0241097591447 L 137.63461538462 347.45708624945 L 153.82692307692 343.6401986182922 L 170.01923076923 342.2271875423078 L 186.21153846154 343.9046984525422 L 202.40384615385 342.46070311458277 L 218.59615384615 337.4039708125476 L 234.78846153846 336.0504285448122 L 250.98076923077 340.72427623538846 L 267.17307692308 335.86732557437875 L 283.36538461538 334.61770345010996 L 299.55769230769 334.52603521589066 L 315.75 338.7000429279096 L 331.94230769231 331.56923116140905 L 348.13461538462 326.0317474913356 L 364.32692307692 324.5629119546005 L 380.51923076923 321.25699424433253 L 396.71153846154 313.79674078307494 L 412.90384615385 310.0866980341835 L 429.09615384615 307.30183647315044 L 445.28846153846 302.22652037184264 L 461.48076923077 298.97852005779026 L 477.67307692308 281.7804322180792 L 493.86538461538 279.8308576364261 L 510.05769230769 274.5763999201656 L 526.25 289.4918762635941 L 542.44230769231 280.5214614742888 L 558.63461538462 290.3939606354095 L 574.82692307692 282.57031830079535 L 591.01923076923 295.16428400540156 L 607.21153846154 293.2994276339687 L 623.40384615385 286.7485931021042 L 639.59615384615 264.8062656582813 L 655.78846153846 248.94211591406452 L 671.98076923077 236.11500008035253 L 688.17307692308 217.24539678023163 L 704.36538461538 216.48384155851562 L 720.55769230769 193.76576645373115 L 736.75 192.34789385536106 L 752.94230769231 121.08178198688077 L 769.13461538462 75.21101126901652 L 785.32692307692 17.26657006057502 L 801.51923076923 52.98651453345349 L 817.71153846154 46.13387128993122 L 833.90384615385 37.5191695584337" visibility="visible" data-z-index="2" class="highcharts-tracker-line" stroke-linecap="round" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22" style="cursor:pointer;"></path>
                            </g>
                            <g class="highcharts-markers highcharts-series-0 highcharts-line-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(53,10) scale(1 1)" style="cursor:pointer;" clip-path="none"></g>
                        </g><text x="455" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="455" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="397"></text>
                        <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="369" opacity="1">0</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="325" opacity="1">2</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="280" opacity="1">4</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="236" opacity="1">6</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="191" opacity="1">8</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="147" opacity="1">10</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="102" opacity="1">12</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="58" opacity="1">14</text><text x="46" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;fill:#222240;" text-anchor="end" transform="translate(0,0)" y="13" opacity="1">16</text></g>
                        <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"></g>
                        <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="61.09615384615416" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1970</text><text x="77.28846153846115" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="93.48076923076616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1972</text><text x="109.67307692307617" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="125.86538461538615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1974</text><text x="142.05769230769616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="158.24999999999616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1976</text><text x="174.44230769230617" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="190.63461538461615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1978</text><text x="206.82692307692616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="223.01923076922617" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1980</text><text x="239.21153846153615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="255.40384615384616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1982</text><text x="271.59615384615614" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="287.78846153846615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1984</text><text x="303.98076923076616" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="320.1730769230761" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1986</text><text x="336.3653846153861" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="352.55769230769613" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1988</text><text x="368.74999999999613" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="384.94230769230614" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1990</text><text x="401.13461538461615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="417.3269230769261" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1992</text><text x="433.5192307692261" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="449.7115384615361" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1994</text><text x="465.90384615384613" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="482.09615384615614" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1996</text><text x="498.28846153846615" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="514.4807692307662" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">1998</text><text x="530.6730769230762" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="546.8653846153862" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2000</text><text x="563.0576923076962" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="579.2499999999961" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2002</text><text x="595.4423076923061" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="611.6346153846162" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2004</text><text x="627.8269230769262" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="644.0192307692262" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2006</text><text x="660.2115384615362" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="676.4038461538462" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2008</text><text x="692.5961538461562" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="708.7884615384662" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2010</text><text x="724.9807692307662" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="741.1730769230762" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2012</text><text x="757.3653846153862" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="773.5576923076962" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2014</text><text x="789.7499999999961" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="805.9423076923061" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2016</text><text x="822.1346153846162" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="838.3269230769262" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2018</text><text x="854.5192307692262" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="870.7115384615362" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1"></text><text x="886.9038461538462" style="color:#222240;cursor:default;font-size:8pt;font-family:PT Sans;line-height:10pt;fill:#222240;" text-anchor="middle" transform="translate(0,0)" y="381" opacity="1">2021</text></g>
                    </svg>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container" id="compareCommodities">
    <h4 class="text-center">Compare Market</h4>
    <form onsubmit="compareMarket(event)">
        <br>
        <div class="row">
            <div class="col-md-4 text-center md-text-right">
                <select class="form-control singleSelectionCommodity" name="commodity3" onChange="getCompareMarket(event)">
                </select>
                <br><span class="text-danger error-text commodity3_err">
            </div>
            <div class="col-md-4 text-center" id="showMarket1">
                <select class="form-control" style="width:65%">
                    <option>Select Market 1</option>
                </select><br><span class="text-danger error-text market1_err">
            </div>
            <div class="col-md-4 text-center" id="showMarket2">
                <select class="form-control" style="width:65%">
                    <option>Select Market 2</option>
                </select><br><span class="text-danger error-text market2_err">
            </div>


        </div>
        <div class="row" id="compareRow">
            <div class="col-md-4 text-center" id="showGrade">
                <select class="form-control" name="grade" id="addGrade">
                    <option disabled selected>Select Grade</option>
                    <option>Medium</option>
                    <option>Small</option>
                    <option>FAQ</option>
                    <option>Large</option>
                </select><br><span class="text-danger error-text grade_err"></span>
            </div>
            <div class="col-md-4" id="date">
                <input type="date" class="form-control" style="max-width: 65%;" name="date">
                <span class="text-danger error-text date_err">
            </div>

            <div class="col-md-4" id="compareDiv">
                <input type="submit" class="btn btn-primary searchInput" value="Compare" id="submitCompare">
            </div>
        </div>
    </form>
    <br>
    <div class="row" id="compareTable">
        <div class="col-md-6 scrollable-container">
            <!-- Search Box -->

            <table class="table table-hover responsive dataTable stripe scrollable-table">
                <thead>
                    <tr>
                        <!-- <th>Sr.No</th>
                        <th>State</th>
                        <th>District</th>
                        <th>Market</th>
                        <th>Commodity</th>
                        <th>Variety</th>
                        <th>Grade</th> -->
                        <th>Min Price</th>
                        <th>Max Price</th>
                        <th>Modal Price</th>
                        <!-- <th>Price Date</th> -->
                    </tr>
                </thead>
                <tbody id="compareMarket1">
                </tbody>
            </table>

            <!-- <ul id="compareMarket1_pagination" class="pagination-sm"></ul> -->
            <h4 class="text-center" id="market1Table"></h4>
        </div>
        <div class="col-md-6 scrollable-container">
            <!-- Search Box -->

            <table class="table table-hover responsive dataTable stripe scrollable-table">
                <thead>
                    <tr>
                        <!-- <th>Sr.No</th>
                        <th>State</th>
                        <th>District</th>
                        <th>Market</th>
                        <th>Commodity</th>
                        <th>Variety</th>
                        <th>Grade</th> -->
                        <th>Min Price</th>
                        <th>Max Price</th>
                        <th>Modal Price</th>
                        <!-- <th>Price Date</th> -->
                    </tr>
                </thead>
                <tbody id="compareMarket2">

                </tbody>
            </table>

            <!-- <ul id="compareMarket2_pagination" class="pagination-sm"></ul> -->
            <h4 class="text-center" id="market2Table"></h4>
        </div>
    </div>
    <br>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // get all market
    function getAllMarket() {
        var fromYear = $("input[name='fromYear']").val();
        var toYear = $("input[name='toYear']").val();
        $.ajax({
            url: "getAllMarket",
            method: "POST",
            cache: true,
            dataType: "JSON",
            data: {
                "fromYear": fromYear,
                "toYear": toYear,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            beforeSend: function() {
                $('#market').hide();
                $('#addMarket').append('<div class="spinner-border" style="position:relative;left:50%;"></div>');
            },
            success: function(data) {
                //
                var marketHtml = `<select class="form-control" name="market[]" id="market" onchange="getMarketCommodity(this);" multiple="multiple">`;
                for (var i = 0; i < data.length; i++) {
                    marketHtml += `<option value="${data[i].market}">${data[i].market}</option>`;
                }
                marketHtml += '</select>';
                $("#addMarket").append(marketHtml);
                $('#market').multiselect({
                    nonSelectedText: 'Select Market',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '-webkit-fill-available',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450,
                    onChange: function(option, checked) {
                        if (checked === true) {
                            if (this.$select.find('option').filter(':selected').length > 5) {
                                alert("You can only five markets.");
                                $(option).prop('selected', false);
                                this.refresh();
                            }
                        }
                    }
                });
                $('#addMarket > .spinner-border').remove();
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
    //get all commodity
    function getAllCommodity() {
        var fromYear = $("input[name='fromYear']").val();
        var toYear = $("input[name='toYear']").val();
        $.ajax({
            url: "getAllCommodity",
            method: "POST",
            cache: true,
            dataType: "JSON",
            data: {
                "fromYear": fromYear,
                "toYear": toYear,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            beforeSend: function() {
                $('#commodity').hide();
                $('#addCommodity').append('<div class="spinner-border" style="position:relative;left:50%;"></div>');
            },
            success: function(data) {
                var commodityHtml = `<select class="form-control" name="commodity[]" id="commodity" multiple="multiple">`;
                for (var i = 0; i < data.length; i++) {
                    commodityHtml += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                commodityHtml += `</select>`;
                $("#addCommodity").append(commodityHtml);
                $('#commodity').multiselect({
                    nonSelectedText: 'Select Commodity',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '-webkit-fill-available',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450,
                    onChange: function(option, checked) {
                        if (checked === true) {
                            if (this.$select.find('option').filter(':selected').length > 3) {
                                alert("You can select only three commodity.");
                                $(option).prop('selected', false);
                                this.refresh();
                            }
                        }
                    }
                });

                $('#addCommodity > .spinner-border').remove();
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
    // get state district
    function getStateDistrict(sel) {
        var fromYear = $("input[name='fromYear']").val();
        var toYear = $("input[name='toYear']").val();
        $("#addDistrict").empty();
        $("#addMarket").empty();
        $("#addCommodity").empty();
        $.ajax({
            url: "getStateDistrict",
            method: "POST",
            dataType: "json",
            data: {
                "fromYear": fromYear,
                "toYear": toYear,
                "stateName": sel.value,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            beforeSend: function() {
                $('#districts').hide();
                $('#addDistrict').append('<div class="spinner-border" style="position:relative;left:50%;"></div>');
            },
            success: function(data) {
                var html = `<select class="form-control" name="district" id="districts" onchange="getDistrictMarket(this);">`;
                html += '<option disabled selected>Select District</option>';
                for (var i = 0; i < data.length; i++) {
                    //stateKeyValue.forEach(function(value) {
                    html += `<option value="${data[i].district}" >${data[i].district}</option>`;
                    //});

                }
                html += '</select>';

                $("#addDistrict").append(html);
                $('#districts').multiselect({
                    nonSelectedText: 'Select Districts',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '-webkit-fill-available',
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
                //$('.multiselect-selected-text').remove();
                //$('#market').show();
                $('#addDistrict > .spinner-border').remove();


            }

        });
    }
    // get district market
    function getDistrictMarket(sel) {
        var fromYear = $("input[name='fromYear']").val();
        var toYear = $("input[name='toYear']").val();
        $("#addMarket").empty();
        //alert(sel.value);die;
        $.ajax({
            url: "getDistrictMarket",
            method: "POST",
            dataType: "json",
            data: {
                "fromYear": fromYear,
                "toYear": toYear,
                "districtName": sel.value,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            beforeSend: function() {
                $('#market').hide();
                $('#addMarket').append('<div class="spinner-border" style="position:relative;left:50%;"></div>');
            },
            success: function(data) {
                var marketHtml = `<select class="form-control" name="market[]" id="market" onchange="getMarketCommodity(this);" multiple="multiple">`;
                for (var i = 0; i < data.length; i++) {
                    marketHtml += `<option value="${data[i].market}">${data[i].market}</option>`;
                }
                marketHtml += `</select>`;
                $("#addMarket").append(marketHtml);
                $('#market').multiselect({
                    nonSelectedText: 'Select Market',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '-webkit-fill-available',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450,
                    onChange: function(option, checked) {
                        if (checked === true) {
                            if (this.$select.find('option').filter(':selected').length > 5) {
                                alert("You can only five markets.");
                                $(option).prop('selected', false);
                                this.refresh();
                            }
                        }
                    }
                });
                $('#addMarket > .spinner-border').remove();
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

    function getMarketCommodity(sel) {
        var fromYear = $("input[name='fromYear']").val();
        var toYear = $("input[name='toYear']").val();
        $("#addCommodity").empty();
        //alert(sel.selectedOptions.length);die;
        // var values = [];
        // for (var i = 0; i < sel.selectedOptions.length; i++) {
        //     values.push(sel.selectedOptions[i].value);
        // }
        $.ajax({
            url: "getMarketCommodity",
            method: "POST",
            dataType: "json",
            data: {
                "fromYear": fromYear,
                "toYear": toYear,
                "marketName": sel.value,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            beforeSend: function() {
                $('#commodity').hide();
                $('#addCommodity').append('<div class="spinner-border" style="position:relative;left:50%;"></div>');
            },
            success: function(data) {
                var commodityHtml = `<select class="form-control" name="commodity[]" id="commodity" multiple="multiple">`;
                for (var i = 0; i < data.length; i++) {
                    commodityHtml += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                commodityHtml += `</select>`;
                $("#addCommodity").append(commodityHtml);
                $('#commodity').multiselect({
                    nonSelectedText: 'Select Commodity',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '-webkit-fill-available',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450,
                    onChange: function(option, checked) {
                        if (checked === true) {
                            if (this.$select.find('option').filter(':selected').length > 3) {
                                alert("You can select only three commodity.");
                                $(option).prop('selected', false);
                                this.refresh();
                            }
                        }
                    }
                });
                $('#addCommodity > .spinner-border').remove();
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

    // grapgh generate

    function generateGraph(event) {
        event.preventDefault();
        drawGraph(event);


    }

    function drawGraph(event) {
        //alert(id);
        $(".error-text").empty();
        $.ajax({
            url: "/commodityYearPriceGraph",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            beforeSend: function() {
                $("#submitCommodityGraph").val('Please Wait ...');
            },
            success: function(result) {
                console.log(result);
                if (result.status == true) {
                    $("#submitCommodityGraph").val('Generate');
                    $(".error-text").empty();
                    $("#showGraph").show();
                    $("#curve_chart").empty();
                    const keys = result.data.reduce((acc, obj) => {
                        return acc.concat(Object.keys(obj));
                    }, []);

                    const uniqueKeys = [...new Set(keys)];
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        uniqueKeys.map(function(element, key) {
                            if (key == 0) {
                                data.addColumn('string', `${element}`);
                            } else {
                                data.addColumn('number', `${element}`);
                            }

                        });

                        result.data.map(function(element) {
                            const values = Object.values(element);
                            var resultData = [];
                            values.map(function(resData, key) {
                                if (key == 0) {
                                    resultData.push(resData.toString());
                                } else {
                                    resultData.push(Number(resData));
                                }
                            });
                            data.addRows([resultData]);
                            resultData = [];
                        })
                        // var options = {
                        //     title: result.title,
                        //     curveType: 'function',   
                        //     legend: {
                        //         position: 'bottom'
                        //     }
                        // };
                        // var options = {
                        //     title: "",
                        //     // 'width': 800,
                        //     // 'height': 600,
                        //     'chartArea': {
                        //         'width': 'auto'
                        //     },
                        //     legend: {
                        //         position: 'bottom'
                        //     },
                        //     animation: {
                        //         duration: 1000,
                        //         easing: 'out',
                        //         startup: true
                        //     },
                        //     colorAxis: {
                        //         colors: ['#54C492', '#cc0000']
                        //     },
                        //     datalessRegionColor: '#dedede',
                        //     defaultColor: '#dedede'
                        // };

                        var options = {
                            width: 1000,
                            height: 500,
                            axes: {
                                x: {
                                    0: {
                                        side: 'top'
                                    }
                                }
                            }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                        chart.draw(data, options);
                        //alert(result.plan);


                    }
                    if (result.plan == 0 || result.plan == 1) {
                        setTimeout(function() {
                            $("#curve_chart svg").css({
                                'filter': 'blur(10px)'
                            });
                            $("#error_message").html("<div class='alert alert-danger alert-dismissible in'>" +
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Please subscribe to view this chart" + "</span" + "</div>");
                        }, 2000);

                    }
                    //myDisplay(result);


                } else {
                    $("#submitCommodityGraph").val('Generate');
                    printErrorMsg(result.error);
                }
            }
        });

    }


    //mandi graph generate
    function generateMandiGraph(event) {
        event.preventDefault();
        $("#showMandiGraph").show();
        $(".error-text").empty();
        $.ajax({
            url: "/commodityMandiGraph",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            beforeSend: function() {
                $("#submitMarketGraph").val('Please Wait ...');
            },
            success: function(result) {
                console.log(result);
                if (result.status == true) {
                    $("#submitMarketGraph").val('Generate');
                    $(".error-text").empty();
                    $("#mandi_curve_chart").empty();
                    const keys = result.data.reduce((acc, obj) => {
                        return acc.concat(Object.keys(obj));
                    }, []);

                    const uniqueKeys = [...new Set(keys)];
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        uniqueKeys.map(function(element, key) {
                            if (key == 0) {
                                data.addColumn('string', `${element}`);
                            } else {
                                data.addColumn('number', `${element}`);
                            }

                        });

                        result.data.map(function(element) {
                            const values = Object.values(element);
                            var resultData = [];
                            values.map(function(resData, key) {
                                if (key == 0) {
                                    resultData.push(resData.toString());
                                } else {
                                    resultData.push(Number(resData));
                                }
                            });
                            data.addRows([resultData]);
                            resultData = [];
                        })
                        // var options = {
                        //     title: result.title,
                        //     curveType: 'function',   
                        //     legend: {
                        //         position: 'bottom'
                        //     }
                        // };
                        // var options = {
                        //     title: result.title,
                        //     // 'width': 800,
                        //     // 'height': 600,
                        //     'chartArea': {
                        //         'width': 'auto'
                        //     },
                        //     legend: {
                        //         position: 'bottom'
                        //     },
                        //     animation: {
                        //         duration: 1000,
                        //         easing: 'out',
                        //         startup: true
                        //     },
                        //     colorAxis: {
                        //         colors: ['#54C492', '#cc0000']
                        //     },
                        //     datalessRegionColor: '#dedede',
                        //     defaultColor: '#dedede'
                        // };
                        var options = {
                            width: 1000,
                            height: 500,
                            axes: {
                                x: {
                                    0: {
                                        side: 'top'
                                    }
                                }
                            }
                        };


                        var chart = new google.visualization.LineChart(document.getElementById('mandi_curve_chart'));

                        chart.draw(data, options);
                    }
                    if (result.plan == 0 || result.plan == 1) {
                        setTimeout(function() {
                            $("#mandi_curve_chart svg").css({
                                'filter': 'blur(10px)'
                            });
                            $("#error_message").html("<div class='alert alert-danger alert-dismissible in'>" +
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + "Please subscribe to view this chart" + "</span" + "</div>");
                        }, 2000);

                    }
                } else {
                    printErrorMsg(result.error);
                    $("#submitMarketGraph").val('Generate');
                }
            }
        });
    }

    function allCommodity() {
        $.ajax({
            url: "/AllMandiPriceCommodity",
            method: "get",
            dataType: "json",
            success: function(data) {
                //console.log(data);
                var html = `<select class="form-control allMandiCommodity" name="commodity[]" multiple="multiple">`;
                var html3 = `<select class="form-control" name="commodity3[]" id="searchAllCommodityOption" onChange="getSearchCommodityMarket(event)">`;
                html3 += `<option value="" selected>Select Commodity</option>`;
                data.map(function(element) {
                    html += `<option value="${element.id}" >${element.name}</option>`;
                    html3 += `<option value="${element.id}" >${element.name}</option>`;
                });
                html3 += `</select><br><span class="text-danger error-text commodity3_err"></span>`;
                html += `</select><br><span class="text-danger error-text commodity_err"></span>`;
                var html2 = `<option selected disabled>Select Commodity</option>`;
                data.map(function(element) {
                    html2 += `<option value="${element.id}" >${element.name}</option>`;
                });
                html2 += `<br><span class="text-danger error-text commodity_err"></span>`;
                $(".singleSelectionCommodity").append(html2);
                $("#searchAllCommodity").append(html3);
                $(".commodity").append(html);
                $('.allMandiCommodity,#searchAllCommodityOption').multiselect({
                    nonSelectedText: 'Select Commodity',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    //buttonWidth: '50%',
                    //dropup: true,
                    //includeSelectAllOption: true
                    maxHeight: 450
                });

                $('.singleSelectionCommodity').multiselect({
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

    function getMandi(event) {
        //alert('test');
        $("#showMandiCommodity").empty();

        $.ajax({
            url: "/getCommodityMarket",
            method: "POST",
            dataType: "JSON",
            data: {
                commodity: event.target.value,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            beforeSend: function() {
                $("#showMandiCommodity").append('<div class="spinner-border marketLoader"></div>')
            },
            success: function(result) {
                $("#commodityMandi").show();
                var html = `<select class="form-control" name="market[]" id="commodityMandi" multiple="multiple">`;
                result.map(function(element) {
                    html += `<option value="${element.market}">${element.market}</option>`;
                });
                html += `</select><br><span class="text-danger error-text market_err">`;
                $("#showMandiCommodity").append(html);
                $('#commodityMandi').multiselect({
                    nonSelectedText: 'Select Market',
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

    function getSearchCommodityMarket(event) {
        //alert('test');
        $("#searchAllMarket").empty();

        $.ajax({
            url: "/getCommodityMarket",
            method: "POST",
            dataType: "JSON",
            data: {
                commodity: event.target.value,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            beforeSend: function() {
                $("#searchAllMarket").append('<div class="spinner-border marketLoader"></div>')
            },
            success: function(result) {
                var html = `<select class="form-control" name="market3[]" id="searchAllMarketOption" multiple="multiple">`;
                result.map(function(element) {
                    html += `<option value="${element.market}">${element.market}</option>`;
                });
                html += `</select><br><span class="text-danger error-text market_err">`;
                $("#searchAllMarket").append(html);
                $('#searchAllMarketOption').multiselect({
                    nonSelectedText: 'Select Market',
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


    function getCompareMarket(event) {
        $("#showMarket1").empty();
        $("#showMarket2").empty();
        $.ajax({
            url: "/getCommodityMarket",
            method: "POST",
            dataType: "JSON",
            data: {
                commodity: event.target.value,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            beforeSend: function() {
                $("#showMarket1").append('<div class="spinner-border marketLoader"></div>');
                $("#showMarket2").append('<div class="spinner-border marketLoader"></div>');

            },
            success: function(result) {
                var html = `<select class="form-control showMarket" name="market1[]"><option disabled selected>Select Market1</option>`;
                var html2 = `<select class="form-control showMarket" name="market2[]"><option disabled selected>Select Market2</option>`;
                result.map(function(element) {
                    html += `<option value="${element.market}">${element.market}</option>`;
                    html2 += `<option value="${element.market}">${element.market}</option>`;
                });
                html += `</select><br><span class="text-danger error-text market1_err">`;
                html2 += `</select><br><span class="text-danger error-text market2_err">`;
                $("#showMarket1").append(html);
                $("#showMarket2").append(html2);
                $('.showMarket').multiselect({
                    nonSelectedText: 'Select Market',
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

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $('.' + key + '_err').text("This field is required");
        });
    }




    function compareMarket(event) {
        event.preventDefault();
        $("#compareMarket1").empty();
        $("#compareMarket2").empty();
        $("#market1Table").empty();
        $("#market2Table").empty();
        $(".error-text").empty();
        $.ajax({
            url: "/compareMarket",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            beforeSend: function() {
                $("#submitCompare").val('Comparing ...');
            },
            success: function(data) {
                if (data.status == true) {
                    $("#compareTable").show();
                    $(".error-text").empty();
                    $("#submitCompare").val('Compare');
                    var html = ``;
                    var html2 = ``;
                    if (data.market1.length > 0) {
                        data.market1.map(function(element, index) {
                            html += `<tr>
                                    <td>${element.min_price}</td>
                                    <td>${element.max_price}</td>
                                    <td>${element.modal_price}</td>
                                 </tr>`;
                        });
                        $("#compareMarket1").append(html);
                    } else {
                        $("#market1Table").text(`No Data`);
                    }
                    if (data.market1.length > 0) {
                        data.market2.map(function(element, index) {
                            html2 += `<tr>
                                    <td>${element.min_price}</td>
                                    <td>${element.max_price}</td>
                                    <td>${element.modal_price}</td>
                                 </tr>`;
                        });
                        $("#compareMarket2").append(html2);
                    } else {
                        $("#market2Table").text(`No Data`)
                    }
                } else if (data.status == false) {
                    window.location.href = data.redirect;
                } else {
                    printErrorMsg(data.error);
                    $("#submitCompare").val('Compare');
                }
            }
        });
    }

    $(document).ready(function() {
        $(document).on('submit', '#searchData', function(e) {
            e.preventDefault();
            //$('.error-text').empty();
            var fromDate = $("input[name=fromDate]").val();
            var toDate = $("input[name=toDate]").val();
            var commodity = $("#searchAllCommodityOption").find(":selected").val();
            var market = $("#searchAllMarketOption").val();
            const date1 = new Date(fromDate);
            const fromYear = date1.getFullYear();
            const date2 = new Date(toDate);
            const toYear = date2.getFullYear();
            const validYear = toYear - fromYear;
            if (validYear == 1 || validYear == 0) {
                if (commodity != '' || market != '') {
                    $("#searchDataTable").show();
                    $('#searchDataTable').DataTable({
                        "bDestroy": true,
                        "processing": true,
                        "serverSide": true,
                        "searching": false,
                        "showNEntries": false,
                        "lengthChanged": false,
                        "paginging": false,
                        "info": false,
                        "ajax": {
                            "url": "/dataSearch",
                            "type": "POST",
                            "data": function(d) {
                                d.commodity3 = commodity;
                                d.market3 = market;
                                d.fromDate = fromDate;
                                d.toDate = toDate;
                                d._token = $('meta[name="csrf-token"]').attr('content');
                            }
                            // ,
                            // "success": function(data) {
                            //     $('.error-text').empty();
                            //     if (data.status == false) {
                            //         $("#error_message").html(`<div class='alert alert-danger alert-dismissible in'>
                            //             <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><span>${data.message}</span></div>`);

                            //     }
                            //     printErrorMsg(data.error);



                            // }
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
                } else {
                    $("#error_message").html(`<div class='alert alert-danger alert-dismissible in'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><span>Please select commodity or market</span></div>`);
                }
            } else if (fromDate == '' || toDate == '') {
                $("#error_message").html(`<div class='alert alert-danger alert-dismissible in'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><span>From and to date fields are required</span></div>`);
            } else {
                alert("Change date selection to 2 years of data. For more than 2 years of data please contact us.");
                window.location.href = "/contact";
                // $("#error_message").html(`<div class='alert alert-danger alert-dismissible in'>
                //                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><span>Customer can not see more than two years of data. Please go to contact us to see it.</span></div>`);
            }
        });
    });
    $(document).ready(function() {
        $('.allYears').multiselect({
            nonSelectedText: 'Select Years',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            //buttonWidth: '50%',
            //dropup: true,
            includeSelectAllOption: true,
            maxHeight: 450
        });
        $('#addGrade').multiselect({
            nonSelectedText: 'Select Grade',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            //buttonWidth: '50%',
            //dropup: true,
            includeSelectAllOption: true,
            maxHeight: 450
        });
        $('.input-group-addon').remove();
        $('.input-group-btn').remove();
        $('ul > li').css('line-height', 'unset');
        $('button').css('overflow', 'none');
        $('button').css('background-color', '#eaeeff');
        $('button').css('height', '41px');
        $('button').css('border-radius', '5px');
        $(".yearLoader").remove();
    });
    $(function() {
        dataTable = $('#searchDataTable').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            lengthChanged: false,
            paginging: false,
            info: false,
            ajax: '{{ url("/getMandiPriceData") }}',
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
</script>