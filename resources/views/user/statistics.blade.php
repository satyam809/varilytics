@include('user.header')
<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Statistics</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Report Data -->
<div class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6" style="font-size: 18px;">
                <p>VariLytics brings Statistics curated and collated for industry themed topics.</p>
                <p>We work for You as your extended business intelligence and analysis unit. Leave the data sourcing for Statistics to us</p>
                <p>Our subscription provides data discovery of a large database of Statistics</p>
                <a href="" class="text-red">Explore More...</a>
            </div>
            <div class="col-md-6">
                <img src="./assets/images/stats.png" alt="" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

<!--RequestDataArea-->
<div class="RequestDataArea" data-aos="fade-up" data-aos-delay="500">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Statistics you do not find in our database, we get it for you.</li>
                </ul>
            </div>
            <div class="col-md-4" style="text-align: end;"><a href="#" class="btn btn-primary">Request Statistics</a></div>
        </div>
    </div>
</div>
<div class="RequestDataArea" data-aos="fade-up" data-aos-delay="500" style="background: #F8F9FE;">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-md-4"><a href="#" class="btn btn-primary">Submit Statistics</a></div>
            <div class="col-md-8 pl-0">
                <ul>
                    <li style="text-align: end;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Data you wish to analyze with our tools you can submit</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--./RequestDataArea-->

<div class="viewPage">
    <div class="container">
        <div class="section-title text-center">
            <h2 style="color:white">Search Statistics</h2>
        </div>
        <div class="row">
            <div class="col-md-3 pr-0">
                <div class="search-container">
                    <input type="text" id="search-bar" placeholder="Type to search">
                    <a href="#"><i class="fa fa-search search-icon"></i></a>
                </div>
                <div class="card" data-aos="fade-right" data-aos-delay="100" style="width:100%">
                    <article class="filter-group">
                        <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#sidecat2" data-abc="true" aria-expanded="true" class="collapsed"> <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Data Store </h6>
                            </a> </header>
                        <div class="filter-content collapse show" id="sidecat2" style="">
                            <div class="card-body">
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn">Recent Statistics (3) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn">Popular Statistics (5) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn">Most Viewed Statistics (7) </span> </label>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#sidecat1" data-abc="true" aria-expanded="false" class="collapsed"> <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Industry </h6>
                            </a> </header>
                        <div class="filter-content collapse" id="sidecat1" style="">
                            <div class="card-body">
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn">Agriculture (73802) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn">Art and Design (29078) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn">Education (12255) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn">Finance (6993) </span> </label>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#sidecat3" data-abc="true" aria-expanded="false" class="collapsed"> <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Country </h6>
                            </a> </header>
                        <div class="filter-content collapse" id="sidecat3" style="">
                            <div class="card-body">
                                <label class="checkbox-btn">
                                    <input type="radio">
                                    <span class="btn">India (72708) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="radio">
                                    <span class="btn">Australia (21451) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="radio">
                                    <span class="btn">Brazil (1932) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="radio">
                                    <span class="btn">Canada (1641) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="radio">
                                    <span class="btn">China (1634) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="radio">
                                    <span class="btn">Egypt (1634) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="radio">
                                    <span class="btn">European Union (1334) </span> </label>
                                <label class="checkbox-btn">
                                    <input type="radio">
                                    <span class="btn">Argentina (634) </span> </label>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#sidecat4" data-abc="true" aria-expanded="false" class="collapsed"> <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">State </h6>
                            </a> </header>
                        <div class="filter-content collapse" id="sidecat4" style="">
                            <div class="card-body">
                                <label class="radio-btn">
                                    <input type="radio">
                                    <span class="btn">Andhra Pradesh </span> </label>
                                <label class="radio-btn">
                                    <input type="radio">
                                    <span class="btn">Andaman & Nicobar </span> </label>
                                <label class="radio-btn">
                                    <input type="radio">
                                    <span class="btn">Arunachal Pradesh </span> </label>
                                <label class="radio-btn">
                                    <input type="radio">
                                    <span class="btn">Assam </span> </label>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#sidecat5" data-abc="true" aria-expanded="false" class="collapsed"> <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Topics </h6>
                            </a> </header>
                        <div class="filter-content collapse" id="sidecat5" style="">
                            <div class="card-body">
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Urban Agglomerations </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Economic </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Demographics </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Rural </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Urban </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Commodity/Crop </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Weather </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Literacy </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Primary Education </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Secondary Education </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">College & Universities </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Digital Trends </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Trade </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Regulation </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Sustainability </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Consumer Affairs </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Civil Supplies </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Farmer Welfare </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Rural Development </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Food Processing </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Warehousing </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Logistics </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">MSME </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Cottage </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Art Industry </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Art & Craft </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Supplies </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Handicrafts </span> </label>
                                <label class="radio-btn">
                                    <input type="checkbox">
                                    <span class="btn">Banking &Financial Services </span> </label>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#sidecat6" data-abc="true" aria-expanded="false" class="collapsed"> <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Price Category </h6>
                            </a> </header>
                        <div class="filter-content collapse" id="sidecat6" style="">
                            <div class="card-body">
                                <label class="radio-btn">
                                    <input type="radio">
                                    <span class="btn">Free </span> </label>
                                <label class="radio-btn">
                                    <input type="radio">
                                    <span class="btn">Paid </span> </label>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#sidecat7" data-abc="true" aria-expanded="false" class="collapsed"> <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Price </h6>
                            </a> </header>
                        <div class="filter-content collapse" id="sidecat7" style="">
                            <div class="card-body">
                                <div class="price-range-slider">
                                    <p class="range-value">
                                        <input type="text" id="amount" readonly>
                                    </p>
                                    <div id="slider-range" class="range-bar"></div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-md-9">
                <div class="col">
                    <div class="alert" data-aos="fade-up" data-aos-delay="100" style="z-index: 99;">
                        <div class="pageper-view">Page 1 of 6858 | 102859 data</div>
                        <div class="text-right float-right row">
                            <div class="col">
                                <select class="form-control" style="width: 200px;">
                                    <option disabled="" selected="">Best Match</option>
                                    <option value="lowhigh">Low - High</option>
                                    <option value="highlow">High - Low</option>
                                    <option value="Oldest">Oldest</option>
                                    <option value="Newest">Newest</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-control">
                                    <option>15</option>
                                    <option>30</option>
                                    <option>50</option>
                                    <option>75</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="view-result" data-aos="fade-up" data-aos-delay="200">
                        <div class="alert">
                            <h2>AR_2018-19_Final_for_Print. , Department of agriculture, cooperation & Farmers Welfare</h2>
                            <ul>
                                <li>Free</li>
                                <li>August 2021</li>
                            </ul>
                            <div class="btns"> <a href="#">Add to Basket <i class="fa fa-shopping-basket"></i></a> <a href="#">Quick View <i class="fa fa-search-plus"></i></a> <a href="#">Add to Basket <i class="fa fa-floppy-o"></i></a> </div>
                        </div>
                    </div>
                    <div class="view-result" data-aos="fade-up" data-aos-delay="300">
                        <div class="alert">
                            <h2>Financial report fiscal year 2014, Harvard university</h2>
                            <ul>
                                <li>INR. 1000</li>
                                <li>September 2014</li>
                            </ul>
                            <div class="btns"> <a href="#">Add to Basket <i class="fa fa-shopping-basket"></i></a> <a href="#">Quick View <i class="fa fa-search-plus"></i></a> <a href="#">Add to Basket <i class="fa fa-floppy-o"></i></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--RequestDataArea-->
<div class="RequestDataArea" data-aos="fade-up" data-aos-delay="500">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> We follow an open data policy, All Statistics provided has their source acknowledge and declared.</li>
                </ul>
            </div>
            <div class="col-md-2 text-right"><a href="#" class="btn btn-primary">Access free basic statistics</a></div>
        </div>
    </div>
</div>
<div class="RequestDataArea" data-aos="fade-up" data-aos-delay="500" style="background-color: #F8F9FE;">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-md-4 text-left"><a href="#" class="btn btn-primary">Register</a></div>
            <div class="col-md-8 pl-0">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Any statistics we source from public domains is provided free auto charting tools.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--./RequestDataArea-->

<!--./RequestDataArea-->

<div class="reportpage section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="popular-statistics section-padding pt-0">
                    <div class="section-title text-center mb-0">
                        <h2>Popular Statistics</h2>
                    </div>
                    <div class="row monitoring mt-4">
                        <div class="col-12 col-md-8 col-lg-6">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#Agriculture" role="tab" aria-controls="Agriculture" aria-selected="true">Agriculture</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Art" role="tab" aria-controls="Art" aria-selected="false">Art</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Education" role="tab" aria-controls="Education" aria-selected="false">Education</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Finance" role="tab" aria-controls="Finance" aria-selected="false">Finance</a> </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="Agriculture" role="tabpanel" aria-labelledby="Agriculture-tab">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">774.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">778.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Art" role="tabpanel" aria-labelledby="Art-tab">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">674.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">678.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">9051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">9063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Education" role="tabpanel" aria-labelledby="Education-tab">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">874.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">878.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Finance" role="tabpanel" aria-labelledby="Finance-tab">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">574.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">578.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">5051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">6063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="graph col-xs-12 col-md-6">
                            <div class="chartPael">
                                <div class="text-center">
                                    <label class="radio-container">Line
                                        <input type="radio" class="mychart" id="line" value="line" onclick="chartfunc()" checked name="mychart">
                                        <span class="checkmark"></span> </label>
                                    <label class="radio-container">Column
                                        <input type="radio" name="mychart" class="mychart" id="column" value="column" onclick="chartfunc()">
                                        <span class="checkmark"></span> </label>
                                    <label class="radio-container">Bar
                                        <input type="radio" name="mychart" class="mychart" id="bar" value="bar" onclick="chartfunc()">
                                        <span class="checkmark"></span> </label>
                                </div>
                                <div id="popularstats" style="min-width: 200px; height: 313px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="text-right text-red float-right">Explore More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--RequestDataArea-->
<div class="RequestDataArea" data-aos="fade-up" data-aos-delay="500">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> VariStats provides Data Tools for analysts to extract and analyze the themseleves</li>
                </ul>
            </div>
            <div class="col-md-3 text-right"><a href="#" class="btn btn-primary">Access free basic statistics</a></div>
        </div>
    </div>
</div>
<div class="RequestDataArea" data-aos="fade-up" data-aos-delay="500" style="background-color: #F8F9FE;">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-md-4 text-left"><a href="#" class="btn btn-primary">Subscribe</a></div>
            <div class="col-md-8 pl-0 text-right">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> You can use our Analysis full of relevant and insightful statistics.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="reportpage section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="popular-statistics section-padding pt-0">
                    <div class="section-title text-center mb-0">
                        <h2>Most Viewed Statistics</h2>
                    </div>
                    <div class="row monitoring mt-4">
                        <div class="col-12 col-md-8 col-lg-6">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#Agriculture1" role="tab" aria-controls="Agriculture1" aria-selected="true">Agriculture</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Art1" role="tab" aria-controls="Art1" aria-selected="false">Art</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Education1" role="tab" aria-controls="Education1" aria-selected="false">Education</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Finance1" role="tab" aria-controls="Finance1" aria-selected="false">Finance</a> </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="Agriculture1" role="tabpanel" aria-labelledby="Agriculture-tab1">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">774.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">778.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Art1" role="tabpanel" aria-labelledby="Art-tab1">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">674.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">678.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">9051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">9063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Education1" role="tabpanel" aria-labelledby="Education-tab1">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">874.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">878.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Finance1" role="tabpanel" aria-labelledby="Finance-tab1">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">574.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">578.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">5051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">6063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="graph col-xs-12 col-md-6">
                            <div class="chartPael">
                                <div class="text-center">
                                    <label class="radio-container">Pie
                                        <input type="radio" name="mychart2" checked class="mychart" id="pie2" value="pie" onclick="chartfunc2()">
                                        <span class="checkmark"></span> </label>
                                    <label class="radio-container">Line
                                        <input type="radio" class="mychart" id="line2" value="line" onclick="chartfunc2()" name="mychart2">
                                        <span class="checkmark"></span> </label>
                                    <label class="radio-container">Column
                                        <input type="radio" name="mychart2" class="mychart" id="column2" value="column" onclick="chartfunc2()">
                                        <span class="checkmark"></span> </label>
                                    <label class="radio-container">Bar
                                        <input type="radio" name="mychart2" class="mychart" id="bar2" value="bar" onclick="chartfunc2()">
                                        <span class="checkmark"></span> </label>
                                </div>
                                <div id="container2" style="min-width: 200px; height: 313px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="float-right text-red">Explore More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--RequestDataArea-->
<div class="RequestDataArea" data-aos="fade-up" data-aos-delay="500">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10 text-left">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Varilytics can provide customizations to our existing datasets or can build new statistics with variable as you may require.</li>
                </ul>
            </div>
            <div class="col-md-2 text-right"><a href="#" class="btn btn-primary">Get a Customizied Quote</a></div>
        </div>
    </div>
</div>
<div class="RequestDataArea" data-aos="fade-up" data-aos-delay="500" style="background-color: #F8F9FE;">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-md-4 text-left"><a href="#" class="btn btn-primary">Contact Us</a></div>
            <div class="col-md-8 pl-0 text-right">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> We can also work on your datasets to create insights out of them.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--./RequestDataArea-->

<div class="reportpage section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="popular-statistics section-padding">
                    <div class="section-title text-center mb-0">
                        <h2>Recent Statistics</h2>
                    </div>
                    <div class="row monitoring mt-4">
                        <div class="col-12 col-md-8 col-lg-6">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#Agriculture2" role="tab" aria-controls="Agriculture2" aria-selected="true">Agriculture</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Art2" role="tab" aria-controls="Art2" aria-selected="false">Art</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Education2" role="tab" aria-controls="Education2" aria-selected="false">Education</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Finance2" role="tab" aria-controls="Finance2" aria-selected="false">Finance</a> </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="Agriculture2" role="tabpanel" aria-labelledby="Agriculture-tab2">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">774.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">778.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Art2" role="tabpanel" aria-labelledby="Art-tab2">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">674.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">678.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">9051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">9063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Education2" role="tabpanel" aria-labelledby="Education-tab2">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">874.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">878.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">1063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="Finance2" role="tabpanel" aria-labelledby="Finance-tab2">
                                    <table class="contenttable">
                                        <tbody>
                                            <tr>
                                                <th rowspan="3" width="33%"></th>
                                                <th colspan="3" style="padding: 0px; "></th>
                                            </tr>
                                            <tr class="data-header">
                                                <th width="25%">
                                                    <p class="bodytext">2020/21</p>
                                                </th>
                                                <th colspan="2">
                                                    <p class="bodytext">2021/22&nbsp;</p>
                                                </th>
                                            </tr>
                                            <tr class="data-header">
                                                <th>
                                                    <p class="bodytext">estimate</p>
                                                </th>
                                                <th>
                                                    <p class="bodytext">6 May</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Production</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">574.6</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">578.8</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Supply</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">5051.8</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">6063.6</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Utilization</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">763.3</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">770.0</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Trade</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">188.0</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">184.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="data-prod">
                                                    <p class="bodytext">Ending Stocks</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">284.9</p>
                                                </td>
                                                <td class="data-value">
                                                    <p class="bodytext">293.5</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="legend">
                                                    <p class="bodytext">in million tonnes</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="graph col-xs-12 col-md-6">
                            <div class="chartPael">
                                <div class="text-center">
                                    <label class="radio-container">Column
                                        <input type="radio" name="mychart3" class="mychart" checked id="column3" value="column" onclick="chartfunc3()">
                                        <span class="checkmark"></span> </label>
                                    <label class="radio-container">Line
                                        <input type="radio" class="mychart" id="line3" value="line" onclick="chartfunc3()" name="mychart3">
                                        <span class="checkmark"></span> </label>
                                    <label class="radio-container">Bar
                                        <input type="radio" name="mychart3" class="mychart" id="bar3" value="bar" onclick="chartfunc3()">
                                        <span class="checkmark"></span> </label>


                                </div>
                                <div id="container3" style="min-width: 200px; height: 313px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="float-right text-red">Explore More</a>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="reportpage section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box browse-report">
                    <h5 class="text-center" style="font-size: 28px;">Browse Topics</h5>
                    <div class="row" data-aos="fade-right" data-aos-delay="500">
                        <div class="col-md-3">
                            <h3>Agriculture</h3>
                            <div class="published-rpt-box">
                                <div class="published-rpt">
                                    <h2><a href="#">Consumer Affairs</a></h2>
                                    <h2><a href="#">Civil Supplies</a></h2>
                                    <h2><a href="#">Farmer Welfare</a></h2>
                                    <h2><a href="#">Rural Development</a></h2>
                                    <h2><a href="#">Food</a></h2>
                                    <h2><a href="#">Processing</a></h2>
                                    <h2><a href="#">Warehousing</a></h2>
                                    <h2><a href="#">Logistics</a></h2>
                                    <h2><a href="#">MSME</a></h2>
                                    <h2><a href="#">Cottage</a></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h3>Art & Design</h3>
                            <div class="published-rpt-box">
                                <div class="published-rpt">
                                    <h2><a href="#">Art Industry</a></h2>
                                    <h2><a href="#">Art & Craft</a></h2>
                                    <h2><a href="#">Supplies</a></h2>
                                    <h2><a href="#">Handicrafts</a></h2>
                                    <h2><a href="#">Cottage</a></h2>
                                    <h2><a href="#">MSME</a></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h3>Education</h3>
                            <div class="published-rpt-box">
                                <div class="published-rpt">
                                    <h2><a href="#">Literacy</a></h2>
                                    <h2><a href="#">Primary Education</a></h2>
                                    <h2><a href="#">Secondary Education</a></h2>
                                    <h2><a href="#">College & Universities </a></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h3>Finance</h3>
                            <div class="trending-rpt-box">
                                <div class="trending-rpt">
                                    <h2><a href="#">Banking &Financial Services</a></h2>
                                    <h2><a href="#">Micro Finance</a></h2>
                                    <h2><a href="#">Agri Finance</a></h2>
                                    <h2><a href="#">Retail Finance</a></h2>
                                    <h2><a href="#">Corporate Finance</a></h2>
                                    <h2><a href="#">Infrastructure Finance</a></h2>
                                    <h2><a href="#">Financial Markets</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="footer">
    <div class="container">

        <div class="col text-center">
            <div class="footer-links">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="data-bulletin.html">Platform</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Company</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<script src="assets/js/global.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl-carousel-init.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/highcharts-more.js"></script>
<script src="assets/js/exporting.js"></script>
<script src="assets/js/export-data.js"></script>
<script src="assets/js/accessibility.js"></script>
<script>
    $(document).on('click', '.btn-fullscreen', function() {
        $(this).parents('.rigPanelBox').toggleClass('box-fullscreen');
        window.dispatchEvent(new Event('resize'));
    });
</script>
<script type="text/javascript">
    if (window.matchMedia('(max-width: 980px)').matches) {
        $('.dropdown').click(function() {
            $(this).children('.dropdown-menu').toggle();
            $('.dropdown').not(this).children('.dropdown-menu').hide();
        });
    }
</script>
<script>
    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Select",
        // allowHtml: true,
        allowClear: true,
        tags: true // создает новые опции на лету
    });
</script>
<script type="text/javascript">
    //Icon Change Collapse
    $(".rigPanelBox h2 .fa-plus").click(function() {
        $(this).toggleClass("fa-minus");
    });
</script>
<script>
    $(document).ready(function() {
        $(".createdropdown select").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".selecthideshow").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".selecthideshow").hide();
                }
            });
        }).change();
    });
</script>
<script type="text/javascript">
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 30000,
            values: [0, 30000],
            slide: function(event, ui) {
                $("#amount").val("INR" + ui.values[0] + " - INR" + ui.values[1]);
            }
        });
        $("#amount").val("INR" + $("#slider-range").slider("values", 0) +
            " - INR" + $("#slider-range").slider("values", 1));
    });
</script>
<script>
    $(function() {


        // Create the chart

        var options = {
            chart: {
                backgroundColor: '#fff',
                events: {
                    drilldown: function(e) {
                        if (!e.seriesOptions) {

                            var chart = this;



                            // Show the loading label
                            chart.showLoading('Loading ...');

                            setTimeout(function() {
                                chart.hideLoading();
                                chart.addSeriesAsDrilldown(e.point, series);
                            }, 1000);
                        }

                    }
                },
                plotBorderWidth: 0
            },

            title: {
                text: 'Art Indicator Graph',
            },
            //
            subtitle: {
                text: 'FAO Food Price Index (by Year)'
            },
            //
            xAxis: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            //
            yAxis: {

                title: {
                    margin: 10,
                    text: 'Numbers'
                },
            },
            //
            legend: {
                enabled: true,
            },
            //
            plotOptions: {
                series: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                pie: {
                    plotBorderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    size: '100%',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    }
                }
            },
            //
            series: [{
                name: '2018',
                colorByPoint: true,
                data: [330, 228, 126, 329]
            }, {
                name: '2019',
                data: [207, 107, 309, 212]
            }, {
                name: '2020',
                data: [188, 387, 287, 188]
            }],
            //
            drilldown: {
                series: []
            }
        };

        // Column chart
        options.chart.renderTo = 'container2';
        options.chart.type = 'pie';
        var chart1 = new Highcharts.Chart(options);

        chartfunc2 = function() {
            var line = document.getElementById('line2');
            var column = document.getElementById('column2');
            var bar = document.getElementById('bar2');
            var pie = document.getElementById('pie2');

            if (column.checked) {

                options.chart.renderTo = 'container2';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.checked) {
                options.chart.renderTo = 'container2';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            } else if (pie.checked) {
                options.chart.renderTo = 'container2';
                options.chart.type = 'pie';
                var chart1 = new Highcharts.Chart(options);
            } else {
                options.chart.renderTo = 'container2';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }

        }

        $('#change_chart_title').click(function() {
            var new_title = $('#chart_title').val();
            var chart = $('#container2').highcharts();
            chart.setTitle({
                text: new_title
            });

            alert('Chart title changed to ' + new_title + ' !');

        });
    });
</script>
<script>
    $(function() {


        // Create the chart

        var options = {
            chart: {
                backgroundColor: '#fff',
                events: {
                    drilldown: function(e) {
                        if (!e.seriesOptions) {

                            var chart = this;



                            // Show the loading label
                            chart.showLoading('Loading ...');

                            setTimeout(function() {
                                chart.hideLoading();
                                chart.addSeriesAsDrilldown(e.point, series);
                            }, 1000);
                        }

                    }
                },
                plotBorderWidth: 0
            },

            title: {
                text: 'Education Indicator Graph',
            },
            //
            subtitle: {
                text: 'FAO Food Price Index (by Year)'
            },
            //
            xAxis: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            //
            yAxis: {

                title: {
                    margin: 10,
                    text: 'Numbers'
                },
            },
            //
            legend: {
                enabled: true,
            },
            //
            plotOptions: {
                series: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                pie: {
                    plotBorderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    size: '100%',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    }
                }
            },
            //
            series: [{
                name: '2018',
                colorByPoint: true,
                data: [330, 228, 126, 329, 230, 132]
            }, {
                name: '2019',
                data: [207, 107, 309, 212, 114, 316]
            }, {
                name: '2020',
                data: [188, 387, 287, 188, 389, 291]
            }],
            //
            drilldown: {
                series: []
            }
        };

        // Column chart
        options.chart.renderTo = 'container3';
        options.chart.type = 'column';
        var chart1 = new Highcharts.Chart(options);

        chartfunc3 = function() {
            var line = document.getElementById('line3');
            var column = document.getElementById('column3');
            var bar = document.getElementById('bar3');
            /*var pie = document.getElementById('pie');*/

            if (column.checked) {

                options.chart.renderTo = 'container3';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.checked) {
                options.chart.renderTo = 'container3';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }
            /*else if(pie.checked)
                {
                    options.chart.renderTo = 'container';
                    options.chart.type = 'pie';
                    var chart1 = new Highcharts.Chart(options);
                }*/
            else {
                options.chart.renderTo = 'container3';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }

        }

        $('#change_chart_title').click(function() {
            var new_title = $('#chart_title').val();
            var chart = $('#container3').highcharts();
            chart.setTitle({
                text: new_title
            });

            alert('Chart title changed to ' + new_title + ' !');

        });
    });
</script>
<script>
    $(function() {


        // Create the chart

        var options = {
            chart: {
                backgroundColor: '#fff',
                events: {
                    drilldown: function(e) {
                        if (!e.seriesOptions) {

                            var chart = this;



                            // Show the loading label
                            chart.showLoading('Loading ...');

                            setTimeout(function() {
                                chart.hideLoading();
                                chart.addSeriesAsDrilldown(e.point, series);
                            }, 1000);
                        }

                    }
                },
                plotBorderWidth: 0
            },

            title: {
                text: 'Education Indicator Graph',
            },
            //
            subtitle: {
                text: 'FAO Food Price Index (by Year)'
            },
            //
            xAxis: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            //
            yAxis: {

                title: {
                    margin: 10,
                    text: 'Numbers'
                },
            },
            //
            legend: {
                enabled: true,
            },
            //
            plotOptions: {
                series: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                pie: {
                    plotBorderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    size: '100%',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    }
                }
            },
            //
            series: [{
                name: '2018',
                colorByPoint: true,
                data: [330, 228, 126, 329, 230, 132]
            }, {
                name: '2019',
                data: [207, 107, 309, 212, 114, 316]
            }, {
                name: '2020',
                data: [188, 387, 287, 188, 389, 291]
            }],
            //
            drilldown: {
                series: []
            }
        };

        // Column chart
        options.chart.renderTo = 'container3a';
        options.chart.type = 'line';
        var chart1 = new Highcharts.Chart(options);

        chartfunc3a = function() {
            var line = document.getElementById('line3a');
            var column = document.getElementById('column3a');
            var bar = document.getElementById('bar3a');
            /*var pie = document.getElementById('pie');*/

            if (column.checked) {

                options.chart.renderTo = 'container3a';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.checked) {
                options.chart.renderTo = 'container3a';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }
            /*else if(pie.checked)
                {
                    options.chart.renderTo = 'container';
                    options.chart.type = 'pie';
                    var chart1 = new Highcharts.Chart(options);
                }*/
            else {
                options.chart.renderTo = 'container3a';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }

        }

        $('#change_chart_title').click(function() {
            var new_title = $('#chart_title').val();
            var chart = $('#container3a').highcharts();
            chart.setTitle({
                text: new_title
            });

            alert('Chart title changed to ' + new_title + ' !');

        });
    });
</script>
<script>
    $(function() {


        // Create the chart

        var options = {
            chart: {
                backgroundColor: '#fff',
                events: {
                    drilldown: function(e) {
                        if (!e.seriesOptions) {

                            var chart = this;



                            // Show the loading label
                            chart.showLoading('Loading ...');

                            setTimeout(function() {
                                chart.hideLoading();
                                chart.addSeriesAsDrilldown(e.point, series);
                            }, 1000);
                        }

                    }
                },
                plotBorderWidth: 0
            },

            title: {
                text: 'Education Indicator Graph',
            },
            //
            subtitle: {
                text: 'FAO Food Price Index (by Year)'
            },
            //
            xAxis: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            //
            yAxis: {

                title: {
                    margin: 10,
                    text: 'Numbers'
                },
            },
            //
            legend: {
                enabled: true,
            },
            //
            plotOptions: {
                series: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                pie: {
                    plotBorderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    size: '100%',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    }
                }
            },
            //
            series: [{
                name: '2018',
                colorByPoint: true,
                data: [330, 228, 126, 329, 230, 132]
            }, {
                name: '2019',
                data: [207, 107, 309, 212, 114, 316]
            }, {
                name: '2020',
                data: [188, 387, 287, 188, 389, 291]
            }],
            //
            drilldown: {
                series: []
            }
        };

        // Column chart
        options.chart.renderTo = 'container3b';
        options.chart.type = 'bar';
        var chart1 = new Highcharts.Chart(options);

        chartfunc3b = function() {
            var line = document.getElementById('line3b');
            var column = document.getElementById('column3b');
            var bar = document.getElementById('bar3b');
            /*var pie = document.getElementById('pie');*/

            if (column.checked) {

                options.chart.renderTo = 'container3b';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.checked) {
                options.chart.renderTo = 'container3b';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }
            /*else if(pie.checked)
                {
                    options.chart.renderTo = 'container';
                    options.chart.type = 'pie';
                    var chart1 = new Highcharts.Chart(options);
                }*/
            else {
                options.chart.renderTo = 'container3b';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }

        }

        $('#change_chart_title').click(function() {
            var new_title = $('#chart_title').val();
            var chart = $('#container3b').highcharts();
            chart.setTitle({
                text: new_title
            });

            alert('Chart title changed to ' + new_title + ' !');

        });
    });
</script>
<script>
    $(function() {


        // Create the chart

        var options = {
            chart: {
                backgroundColor: '#fff',
                events: {
                    drilldown: function(e) {
                        if (!e.seriesOptions) {

                            var chart = this;



                            // Show the loading label
                            chart.showLoading('Loading ...');

                            setTimeout(function() {
                                chart.hideLoading();
                                chart.addSeriesAsDrilldown(e.point, series);
                            }, 1000);
                        }

                    }
                },
                plotBorderWidth: 0
            },

            title: {
                text: 'Agriculture Indicator Graph',
            },
            //
            subtitle: {
                text: 'FAO Food Price Index (by Year)'
            },
            //
            xAxis: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            //
            yAxis: {

                title: {
                    margin: 10,
                    text: 'Numbers'
                },
            },
            //
            legend: {
                enabled: true,
            },
            //
            plotOptions: {
                series: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                pie: {
                    plotBorderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    size: '100%',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    }
                }
            },
            //
            series: [{
                name: '2018',
                colorByPoint: true,
                data: [330, 328, 326, 329, 330, 332]
            }, {
                name: '2019',
                data: [307, 307, 309, 312, 314, 316]
            }, {
                name: '2020',
                data: [288, 287, 287, 288, 289, 291]
            }],
            //
            drilldown: {
                series: []
            }
        };

        // Column chart
        options.chart.renderTo = 'popularstats';
        options.chart.type = 'line';
        var chart1 = new Highcharts.Chart(options);

        chartfunc = function() {
            var line = document.getElementById('line');
            var column = document.getElementById('column');
            var bar = document.getElementById('bar');
            /*var pie = document.getElementById('pie');*/

            if (column.checked) {

                options.chart.renderTo = 'popularstats';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.checked) {
                options.chart.renderTo = 'popularstats';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }
            /*else if(pie.checked)
                {
                    options.chart.renderTo = 'popularstats';
                    options.chart.type = 'pie';
                    var chart1 = new Highcharts.Chart(options);
                }*/
            else {
                options.chart.renderTo = 'popularstats';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }

        }

        $('#change_chart_title').click(function() {
            var new_title = $('#chart_title').val();
            var chart = $('#popularstats').highcharts();
            chart.setTitle({
                text: new_title
            });

            alert('Chart title changed to ' + new_title + ' !');

        });
    });
</script>
<script>
    $(function() {


        // Create the chart

        var options = {
            chart: {
                backgroundColor: '#fff',
                events: {
                    drilldown: function(e) {
                        if (!e.seriesOptions) {

                            var chart = this;



                            // Show the loading label
                            chart.showLoading('Loading ...');

                            setTimeout(function() {
                                chart.hideLoading();
                                chart.addSeriesAsDrilldown(e.point, series);
                            }, 1000);
                        }

                    }
                },
                plotBorderWidth: 0
            },

            title: {
                text: 'Agriculture Indicator Graph',
            },
            //
            subtitle: {
                text: 'FAO Food Price Index (by Year)'
            },
            //
            xAxis: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            //
            yAxis: {

                title: {
                    margin: 10,
                    text: 'Numbers'
                },
            },
            //
            legend: {
                enabled: true,
            },
            //
            plotOptions: {
                series: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                pie: {
                    plotBorderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    size: '100%',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    }
                }
            },
            //
            series: [{
                name: '2018',
                colorByPoint: true,
                data: [330, 328, 326, 329, 330, 332]
            }, {
                name: '2019',
                data: [307, 307, 309, 312, 314, 316]
            }, {
                name: '2020',
                data: [288, 287, 287, 288, 289, 291]
            }],
            //
            drilldown: {
                series: []
            }
        };

        // Column chart
        options.chart.renderTo = 'popularstats4a';
        options.chart.type = 'bar';
        var chart1 = new Highcharts.Chart(options);

        chartfunc4a = function() {
            var line = document.getElementById('line4a');
            var column = document.getElementById('column4a');
            var bar = document.getElementById('bar4a');
            /*var pie = document.getElementById('pie');*/

            if (column.checked) {

                options.chart.renderTo = 'popularstats4a';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.checked) {
                options.chart.renderTo = 'popularstats4a';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }
            /*else if(pie.checked)
                {
                    options.chart.renderTo = 'popularstats';
                    options.chart.type = 'pie';
                    var chart1 = new Highcharts.Chart(options);
                }*/
            else {
                options.chart.renderTo = 'popularstats4a';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }

        }

        $('#change_chart_title').click(function() {
            var new_title = $('#chart_title').val();
            var chart = $('#popularstats4a').highcharts();
            chart.setTitle({
                text: new_title
            });

            alert('Chart title changed to ' + new_title + ' !');

        });
    });
</script>
<script>
    $(function() {


        // Create the chart

        var options = {
            chart: {
                backgroundColor: '#fff',
                events: {
                    drilldown: function(e) {
                        if (!e.seriesOptions) {

                            var chart = this;



                            // Show the loading label
                            chart.showLoading('Loading ...');

                            setTimeout(function() {
                                chart.hideLoading();
                                chart.addSeriesAsDrilldown(e.point, series);
                            }, 1000);
                        }

                    }
                },
                plotBorderWidth: 0
            },

            title: {
                text: 'Agriculture Indicator Graph',
            },
            //
            subtitle: {
                text: 'FAO Food Price Index (by Year)'
            },
            //
            xAxis: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            //
            yAxis: {

                title: {
                    margin: 10,
                    text: 'Numbers'
                },
            },
            //
            legend: {
                enabled: true,
            },
            //
            plotOptions: {
                series: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                pie: {
                    plotBorderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    size: '100%',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    }
                }
            },
            //
            series: [{
                name: '2018',
                colorByPoint: true,
                data: [330, 328, 326, 329, 330, 332]
            }, {
                name: '2019',
                data: [307, 307, 309, 312, 314, 316]
            }, {
                name: '2020',
                data: [288, 287, 287, 288, 289, 291]
            }],
            //
            drilldown: {
                series: []
            }
        };

        // Column chart
        options.chart.renderTo = 'popularstats4b';
        options.chart.type = 'column';
        var chart1 = new Highcharts.Chart(options);

        chartfunc4b = function() {
            var line = document.getElementById('line4b');
            var column = document.getElementById('column4b');
            var bar = document.getElementById('bar4b');
            /*var pie = document.getElementById('pie');*/

            if (column.checked) {

                options.chart.renderTo = 'popularstats4b';
                options.chart.type = 'column';
                var chart1 = new Highcharts.Chart(options);
            } else if (bar.checked) {
                options.chart.renderTo = 'popularstats4b';
                options.chart.type = 'bar';
                var chart1 = new Highcharts.Chart(options);
            }
            /*else if(pie.checked)
                {
                    options.chart.renderTo = 'popularstats';
                    options.chart.type = 'pie';
                    var chart1 = new Highcharts.Chart(options);
                }*/
            else {
                options.chart.renderTo = 'popularstats4b';
                options.chart.type = 'line';
                var chart1 = new Highcharts.Chart(options);
            }

        }

        $('#change_chart_title').click(function() {
            var new_title = $('#chart_title').val();
            var chart = $('#popularstats4b').highcharts();
            chart.setTitle({
                text: new_title
            });

            alert('Chart title changed to ' + new_title + ' !');

        });
    });
</script>
</body>

</html>