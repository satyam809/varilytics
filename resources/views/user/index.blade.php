<div class="hero" id="app-banner">
    <?php foreach ($slider as $data) { ?>
        <div class="container mySlides">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="hero-content aos-init aos-animate" data-aos="fade-right" data-aos-delay="500">
                        <!-- <h1><span class="text-danger">Get more</span><br>
                        from data</h1> -->
                        <h1><span class="text-danger">{{ $data->heading }}</h1>
                        <p>{{ $data->paragraph }}</p>
                        <a href="{{ url('/simple_search') }}" class="btn btn-primary">Start Search</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="hero-img aos-init aos-animate" data-aos="fade-left" data-aos-delay="900"> <img src="{{ asset('assets/admin_assets/slider/')}}{{'/'}}{{ $data->image }}" alt="" class="img-fluid"> </div>
                </div>
            </div>


        </div>
    <?php } ?>
</div>

<!-- number Counter -->
<div class="section-padding pb-0">
    <div class="container">
        <div class="numbers-counting2 aos-init" data-aos="fade-left" data-aos-delay="600">
            <div class="row">
                <div class="col">
                    <p>Sources</p>
                    <h3><span class="counter-value" data-count="63000">63000</span>+</h3>
                </div>
                <div class="col">
                    <p>Topics</p>
                    <h3><span class="counter-value" data-count="33000">33000</span>+</h3>
                </div>
                <div class="col">
                    <p>Datasets</p>
                    <h3><span class="counter-value" data-count="23.5">23.5</span>k</h3>
                </div>
                <div class="col">
                    <p>Time Series</p>
                    <h3><span class="counter-value" data-count="80000">80000</span>+</h3>
                </div>
                <!-- <div class="col">
                    <p>Insights</p>
                    <h3><span class="counter-value" data-count="23.5">23.5</span>k</h3>
                </div>
                <div class="col">
                    <p>Reports</p>
                    <h3><span class="counter-value" data-count="80000">80000</span>+</h3>
                </div> -->
                <div class="col">
                    <p>Primary Data</p>
                    <h3><span class="counter-value" data-count="23.5">23.5</span>k</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="prevention section-padding">
    <div class="container">
        <div class="covid-world-widget">
            <div class="updated-time row">
                <div class="col-md-4 col-lg-4 col-6 aos-init" data-aos="fade-up" data-aos-delay="100">
                    <div class="covid-widget-1 defult-bx">
                        <!-- <div class="icon">
                                        <img src="images/icons/diet.png" alt="">
                                    </div> -->
                        <div class="info">
                            <h5>Composite National</h5>
                            <div class="ticker-graph">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Indicator</th>
                                                <th>Current</th>
                                                <th>Year Ago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-toggle="collapse" data-target="#tickerdemo1" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>All Commodities</td>
                                                <td>11.16</td>
                                                <td>7.23</td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="tickerdemo1" style="">
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (11.16)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (12.07)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (7.23)<br>
                                                        </p>
                                                        <div id="tickerdemo1graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="0">
                                                            <div id="highcharts-apxj1gv-0" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-1-">
                                                                            <rect x="0" y="0" width="234" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="68" y="10" width="234" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 145.5 10 L 145.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 223.5 10 L 223.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 67.5 10 L 67.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 68 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 68 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 68 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 68 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="68" y="10" width="234" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 68 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.416665077209473" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.416665077209473 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 68 10 L 68 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(68,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-1-)">
                                                                            <rect x="20" y="40" width="38" height="114" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="98" y="31" width="38" height="123" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="176" y="80" width="38" height="74" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(68,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(68,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(14,16)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">11.16%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>11.16%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(92,7)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">12.07%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>12.07%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(173,56)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">7.23%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>7.23%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="107" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="185" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="263" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">5</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">10</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">15</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#tickerdemo2" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Primary Articles</td>
                                                <td>5.72</td>
                                                <td>1.61</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="tickerdemo2" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (5.72)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (7.74)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (1.61)<br>
                                                        </p>
                                                        <div id="tickerdemo2graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="1">
                                                            <div id="highcharts-apxj1gv-5" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-6-">
                                                                            <rect x="0" y="0" width="234" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="68" y="10" width="234" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 145.5 10 L 145.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 223.5 10 L 223.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 67.5 10 L 67.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 68 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 68 87.5 L 302 87.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 68 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="68" y="10" width="234" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 68 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.416665077209473" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.416665077209473 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 68 10 L 68 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(68,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-6-)">
                                                                            <rect x="20" y="66" width="38" height="88" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="98" y="36" width="38" height="118" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="176" y="129" width="38" height="25" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(68,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(68,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(17,42)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">5.72%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>5.72%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(95,12)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">7.74%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>7.74%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(173,105)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">1.61%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>1.61%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="107" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="185" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="263" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="91" opacity="1">5</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">10</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#tickerdemo3" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Food Articles</td>
                                                <td>0</td>
                                                <td>4.54</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="tickerdemo3" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (0.00)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (3.09)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (4.54)<br>
                                                        </p>
                                                        <div id="tickerdemo3graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="2">
                                                            <div id="highcharts-apxj1gv-10" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-11-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-11-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="bottom-link"> <a href="https://companydemo.in/demos/VariStats/Layout2-v3/statistics.html">Explore <img src="./assets/images/arrow-blue.png"></a> <a href="javascript:void;" class="collapse-back text-right float-right"><img src="./assets/images/arrow-blue-left.png"> Go
                                    Back</a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-6 aos-init" data-aos="fade-up" data-aos-delay="200">
                    <div class="covid-widget-1 red-bx">
                        <!-- <div class="icon">
                                        <img src="images/icons/diet.png" alt="">
                                    </div> -->
                        <div class="info">
                            <h5>State Rankings</h5>
                            <div class="ticker-graph">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Indicator</th>
                                                <th>Current</th>
                                                <th>Year Ago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-toggle="collapse" data-target="#tickerdemo4" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>All Commodities</td>
                                                <td>11.16</td>
                                                <td>7.23</td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="tickerdemo4" style="">
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (11.16)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (12.07)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (7.23)<br>
                                                        </p>
                                                        <div id="tickerdemo4graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="3">
                                                            <div id="highcharts-apxj1gv-15" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-16-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-16-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#tickerdemo5" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Primary Articles</td>
                                                <td>5.72</td>
                                                <td>1.61</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="tickerdemo5" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (5.72)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (7.74)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (1.61)<br>
                                                        </p>
                                                        <div id="tickerdemo5graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="4">
                                                            <div id="highcharts-apxj1gv-20" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-21-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-21-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo6" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Food Articles</td>
                                                <td>0</td>
                                                <td>4.54</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo6" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (0.00)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (3.09)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (4.54)<br>
                                                        </p>
                                                        <div id="tickerdemo6graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="5">
                                                            <div id="highcharts-apxj1gv-25" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-26-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-26-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="bottom-link"> <a href="https://companydemo.in/demos/VariStats/Layout2-v3/statistics.html">Explore <img src="./assets/images/arrow-blue.png"></a> <a href="javascript:void;" class="collapse-back text-right float-right"><img src="./assets/images/arrow-blue-left.png"> Go
                                    Back</a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-6 aos-init" data-aos="fade-up" data-aos-delay="300">
                    <div class="covid-widget-1 defult-bx">
                        <!-- <div class="icon">
                                        <img src="images/icons/books.png" alt="">
                                    </div> -->
                        <div class="info">
                            <h5>Finance or District Rankings</h5>
                            <div class="ticker-graph">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Indicator</th>
                                                <th>Current</th>
                                                <th>Year Ago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-toggle="collapse" data-target="#demo10" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>All Commodities</td>
                                                <td>11.16</td>
                                                <td>7.23</td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="demo10" style="">
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (11.16)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (12.07)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (7.23)<br>
                                                        </p>
                                                        <div id="tickerdemo10graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="6">
                                                            <div id="highcharts-apxj1gv-30" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-31-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-31-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo11" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Primary Articles</td>
                                                <td>5.72</td>
                                                <td>1.61</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo11" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (5.72)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (7.74)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (1.61)<br>
                                                        </p>
                                                        <div id="tickerdemo11graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="7">
                                                            <div id="highcharts-apxj1gv-35" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-36-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-36-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo12" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Food Articles</td>
                                                <td>0</td>
                                                <td>4.54</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo12" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (0.00)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (3.09)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (4.54)<br>
                                                        </p>
                                                        <div id="tickerdemo12graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="8">
                                                            <div id="highcharts-apxj1gv-40" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-41-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-41-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="bottom-link"> <a href="https://companydemo.in/demos/VariStats/Layout2-v3/statistics.html">Explore <img src="./assets/images/arrow-blue.png"></a> <a href="javascript:void;" class="collapse-back text-right float-right"><img src="./assets/images/arrow-blue-left.png"> Go
                                    Back</a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-6 aos-init" data-aos="fade-up" data-aos-delay="400">
                    <div class="covid-widget-1 red-bx">
                        <!-- <div class="icon">
                                        <img src="images/icons/agriculture.png" alt="">
                                    </div> -->
                        <div class="info">
                            <h5>Agriculture</h5>
                            <div class="ticker-graph">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Indicator</th>
                                                <th>Current</th>
                                                <th>Year Ago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-toggle="collapse" data-target="#demo13" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>All Commodities</td>
                                                <td>11.16</td>
                                                <td>7.23</td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="demo13" style="">
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (11.16)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (12.07)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (7.23)<br>
                                                        </p>
                                                        <div id="tickerdemo13graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="9">
                                                            <div id="highcharts-apxj1gv-45" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-46-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-46-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo14" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Primary Articles</td>
                                                <td>5.72</td>
                                                <td>1.61</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo14" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (5.72)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (7.74)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (1.61)<br>
                                                        </p>
                                                        <div id="tickerdemo14graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="10">
                                                            <div id="highcharts-apxj1gv-50" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-51-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-51-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo15" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Food Articles</td>
                                                <td>0</td>
                                                <td>4.54</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo15" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (0.00)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (3.09)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (4.54)<br>
                                                        </p>
                                                        <div id="tickerdemo15graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="11">
                                                            <div id="highcharts-apxj1gv-55" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-56-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-56-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="bottom-link"> <a href="https://companydemo.in/demos/VariStats/Layout2-v3/data-board.html">See All Districts <img src="./assets/images/arrow-blue.png"></a> <a href="javascript:void;" class="collapse-back text-right float-right"><img src="./assets/images/arrow-blue-left.png"> Go
                                    Back</a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-6 aos-init" data-aos="fade-up" data-aos-delay="500">
                    <div class="covid-widget-1 defult-bx">
                        <!-- <div class="icon">
                                        <img src="images/icons/skills.png" alt="">
                                    </div> -->
                        <div class="info">
                            <h5>Education </h5>
                            <div class="ticker-graph">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Indicator</th>
                                                <th>Current</th>
                                                <th>Year Ago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-toggle="collapse" data-target="#demo16" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>All Commodities</td>
                                                <td>11.16</td>
                                                <td>7.23</td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="demo16" style="">
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (11.16)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (12.07)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (7.23)<br>
                                                        </p>
                                                        <div id="tickerdemo16graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="12">
                                                            <div id="highcharts-apxj1gv-60" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-61-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-61-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo17" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Primary Articles</td>
                                                <td>5.72</td>
                                                <td>1.61</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo17" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (5.72)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (7.74)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (1.61)<br>
                                                        </p>
                                                        <div id="tickerdemo17graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="13">
                                                            <div id="highcharts-apxj1gv-65" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-66-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-66-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo18" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Food Articles</td>
                                                <td>0</td>
                                                <td>4.54</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo18" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (0.00)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (3.09)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (4.54)<br>
                                                        </p>
                                                        <div id="tickerdemo18graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="14">
                                                            <div id="highcharts-apxj1gv-70" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-71-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-71-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="bottom-link"> <a href="https://companydemo.in/demos/VariStats/Layout2-v3/data-board.html">See All Districts <img src="./assets/images/arrow-blue.png"></a> <a href="javascript:void;" class="collapse-back text-right float-right"><img src="./assets/images/arrow-blue-left.png"> Go
                                    Back</a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-6 aos-init" data-aos="fade-up" data-aos-delay="600">
                    <div class="covid-widget-1 red-bx">
                        <!-- <div class="icon">
                                        <img src="images/icons/infrastructure.png" alt="">
                                    </div> -->
                        <div class="info">
                            <h5>Commodities</h5>
                            <div class="ticker-graph">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Indicator</th>
                                                <th>Current</th>
                                                <th>Year Ago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-toggle="collapse" data-target="#demo19" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>All Commodities</td>
                                                <td>11.16</td>
                                                <td>7.23</td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="demo19" style="">
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (11.16)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (12.07)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (7.23)<br>
                                                        </p>
                                                        <div id="tickerdemo19graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="15">
                                                            <div id="highcharts-apxj1gv-75" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-76-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-76-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo20" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Primary Articles</td>
                                                <td>5.72</td>
                                                <td>1.61</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo20" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (5.72)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (7.74)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (1.61)<br>
                                                        </p>
                                                        <div id="tickerdemo20graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="16">
                                                            <div id="highcharts-apxj1gv-80" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-81-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-81-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-toggle="collapse" data-target="#demo21" class="accordion-toggle">
                                                <td><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button></td>
                                                <td>Food Articles</td>
                                                <td>0</td>
                                                <td>4.54</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="hiddenRow">
                                                    <div id="demo21" class="accordian-body collapse" style="">
                                                        <p class="m-0">Inflation YoY (In %), Based on WPI (2011-12=100)</p>
                                                        <p class="m-0"> <span>Current :</span>For the month of July, 2021 (0.00)<br>
                                                            <span>Previous :</span> For the month of June, 2021 (3.09)<br>
                                                            <span>Year Ago :</span> For the month of July, 2020 (4.54)<br>
                                                        </p>
                                                        <div id="tickerdemo21graph" style="min-width: 100px; height: 200px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="17">
                                                            <div id="highcharts-apxj1gv-85" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 312px; height: 200px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                                                <svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="312" height="200" viewBox="0 0 312 200">
                                                                    <desc>Created with Highcharts 9.2.2</desc>
                                                                    <defs>
                                                                        <clippath id="highcharts-apxj1gv-86-">
                                                                            <rect x="0" y="0" width="241" height="153" fill="none"></rect>
                                                                        </clippath>
                                                                    </defs>
                                                                    <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="312" height="200" rx="0" ry="0"></rect>
                                                                    <rect fill="none" class="highcharts-plot-background" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 140.5 10 L 140.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 301.5 10 L 301.5 163" opacity="1"></path>
                                                                        <path fill="none" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 60.5 10 L 60.5 163" opacity="1"></path>
                                                                    </g>
                                                                    <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 163.5 L 302 163.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 112.5 L 302 112.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 61.5 L 302 61.5" opacity="1"></path>
                                                                        <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 61 9.5 L 302 9.5" opacity="1"></path>
                                                                    </g>
                                                                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="61" y="10" width="241" height="153"></rect>
                                                                    <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                                                        <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 61 163.5 L 302 163.5"></path>
                                                                    </g>
                                                                    <g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="26.374998569488525" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.374998569488525 86.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="86.5">Number of Percent</text>
                                                                        <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 61 10 L 61 163"></path>
                                                                    </g>
                                                                    <g class="highcharts-series-group" data-z-index="3">
                                                                        <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="url(#highcharts-apxj1gv-86-)">
                                                                            <rect x="21" y="154" width="39" height="0" fill="#7cb5ec" opacity="1" class="highcharts-point highcharts-color-0"></rect>
                                                                            <rect x="101" y="75" width="39" height="79" fill="#434348" opacity="1" class="highcharts-point highcharts-color-1"></rect>
                                                                            <rect x="182" y="38" width="39" height="116" fill="#90ed7d" opacity="1" class="highcharts-point highcharts-color-2"></rect>
                                                                        </g>
                                                                        <g class="highcharts-markers highcharts-series-0 highcharts-column-series" data-z-index="0.1" opacity="1" transform="translate(61,10) scale(1 1)" clip-path="none"></g>
                                                                    </g><text x="156" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="156" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="197"></text>
                                                                    <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(61,10) scale(1 1)">
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(19,130)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0.00%<tspan x="5" y="16">​</tspan>
                                                                                </tspan>0.00%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(99,51)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">3.09%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>3.09%
                                                                            </text></g>
                                                                        <g class="highcharts-label highcharts-data-label highcharts-data-label-color-2" data-z-index="1" transform="translate(180,14)"><text x="5" data-z-index="1" y="16" style="color:#000000;font-size:11px;font-weight:bold;fill:#000000;">
                                                                                <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">4.54%<tspan x="5" y="16">​
                                                                                    </tspan>
                                                                                </tspan>4.54%
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="101.16666666666333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Current</text><text x="181.50000000000335" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Previous</text><text x="261.8333333333333" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="182" opacity="1">Year
                                                                            Ago</text></g>
                                                                    <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="167" opacity="1">0</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="116" opacity="1">2</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="65" opacity="1">4</text><text x="46" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">6</text></g>
                                                                    <text x="302" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="195">Highcharts.com</text>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="bottom-link"> <a href="https://companydemo.in/demos/VariStats/Layout2-v3/data-board.html">See all states <img src="./assets/images/arrow-blue.png"></a> <a href="javascript:void;" class="collapse-back text-right float-right"><img src="./assets/images/arrow-blue-left.png"> Go
                                    Back</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Us -->
<div class="why-choose pt-0">
    <div class="container">
        <div class="section-title text-center">
            <h2>Why Choose Us?</h2>
            <p class="mb-0">Get data capabilities for getting better results</p>
        </div>
        <div class="row">
            <!-- Why Choose Us Left-->
            <div class="col-md-6 col-xs-12">
                <table class="table table-fs" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="width:8%;"><strong>01</strong></td>
                            <td style="width:42%;"><strong>Themed India-centric Data</strong></td>
                            <td style="width:50%;">Granular Data about India </td>
                        </tr>
                        <tr>
                            <td><strong>02</strong></td>
                            <td><strong>Ready Easy-to-Use Data</strong></td>
                            <td>Collated Data in quick easy form </td>
                        </tr>
                        <tr>
                            <td><strong>03</strong></td>
                            <td><strong>Low-Cost &amp; Flat Access</strong></td>
                            <td>Get more from Data Subscriptions </td>
                        </tr>
                        <tr>
                            <td><strong>04</strong></td>
                            <td><strong>Actionable Insights</strong></td>
                            <td>Discover Value in Visuals &amp; Analytics</td>
                        </tr>
                        <tr>
                            <td><strong>05</strong></td>
                            <td><strong>Tools &amp; Resources</strong></td>
                            <td>Support and Collaborate for Data</td>
                        </tr>
                        <tr>
                            <td><strong>06</strong></td>
                            <td><strong>Relevant &amp; Recent</strong></td>
                            <td>Regularly Refreshed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- ./Why Choose Us Left-->

            <!-- Why Choose Us Right-->
            <div class="col-md-6 col-xs-12">
                <div class="row m-0">
                    <div class="col-md-4 col-xs-12 p-0 borLineArea aos-init" data-aos="fade-up" data-aos-delay="500">
                        <div class="why-section-box"> <a href="{{ url('/data_store')}}"> <img src="./assets/images/view.png">
                                <h3>View</h3>
                            </a> </div>
                    </div>
                    <div class="col-md-4 col-xs-12 p-0 borLineArea aos-init" data-aos="fade-up" data-aos-delay="300">
                        <div class="why-section-box"> <a href="{{ url('/simple_search')}}"> <img src="./assets/images/searching.png">
                                <h3>Search</h3>
                            </a> </div>
                    </div>
                    <div class="col-md-4 col-xs-12 p-0 borLineArea aos-init" data-aos="fade-up" data-aos-delay="500">
                        <div class="why-section-box"> <a href="{{ url('/custom_query')}}"> <img src="./assets/images/supply-chain.png">
                                <h3>Query</h3>
                            </a> </div>
                    </div>
                    <div class="col-md-4 col-xs-12 p-0 borLineArea aos-init" data-aos="fade-up" data-aos-delay="400">
                        <div class="why-section-box"> <a href="{{ url('/compare_sources')}}"> <img src="./assets/images/diagram.png">
                                <h3>Compare</h3>
                            </a> </div>
                    </div>
                    <div class="col-md-4 col-xs-12 p-0 borLineArea aos-init" data-aos="fade-up" data-aos-delay="500">
                        <div class="why-section-box"> <a href="{{ url('/create')}}">
                                <img src="./assets/images/setting.png">
                                <h3>Create</h3>
                            </a> </div>
                    </div>
                    <div class="col-md-4 col-xs-12 p-0 borLineArea aos-init" data-aos="fade-up" data-aos-delay="500">
                        <div class="why-section-box"> <a href="{{ url('/publish')}}">
                                <img src="./assets/images/paper-plane.png">
                                <h3>Publish</h3>
                            </a> </div>
                    </div>
                </div>
            </div>
            <!-- ./Why Choose Us Right-->

        </div>
    </div>
</div>

<!-- Market Monitoring -->
<div class="prevention section-padding">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h2>Infographics</h2>
        </div>
        <div class="covid-world-widget">
            <div class="updated-time row">
                <?php foreach ($infographics as $key => $data) { ?>
                    <div class="col-md-4 col-lg-4 col-6 aos-init" data-aos="fade-up" data-aos-delay="100">
                        <div class="covid-widget-1">
                            <!-- <div class="icon">
                                        <img src="images/icons/diet.png" alt="">
                                    </div> -->
                            <div class="info">
                                <?php if (isset($data->current_topic[0]->name)) { ?>
                                    <h5>{{ $data->current_topic[0]->name}}</h5>
                                <?php } else { ?>
                                    <h5>{{ isset($data->industry[0]->name) ? $data->industry[0]->name : '' }}</h5>
                                <?php } ?>
                                <ul class="infoImgArea">
                                    <li> <a href="{{ asset('assets/admin_assets/infographics/pdf/')}}{{'/'}}{{ $data->pdf }}" target="_blank"> <img src="{{ asset('assets/admin_assets/infographics/images/')}}{{'/'}}{{ $data->image }}"></a> </li>
                                    <div class="info-fav-button"> <a href="javascript:void;" data-toggle="tooltip" data-placement="top" title="Add to Favourite"><i class="fa fa-star"></i></a> <a href="javascript:void;" data-toggle="tooltip" data-placement="top" title="Notification"><i class="fa fa-bell"></i></a>
                                        <!-- AddToAny BEGIN -->
                                        <a class="a2a_dd" href="https://www.addtoany.com/share#url=https%3A%2F%2Fcompanydemo.in%2Fdemos%2FVariStats%2FLayout2-v3%2Findex.html&amp;title=Varistats" data-toggle="tooltip" data-placement="top" title="Share"><i class="fa fa-share-alt"></i></a>
                                        <script>
                                            var a2a_config = a2a_config || {};
                                            a2a_config.onclick = 1;
                                            a2a_config.num_services = 2;
                                        </script>
                                        <script async="" src="assets/js/page.js"></script>
                                        <!-- AddToAny END -->
                                    </div>
                                </ul>
                                <div class="bottom-link"> <a href="{{ url('/infographics')}}">Explore <img src="./assets/images/arrow-blue.png"></a> </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<!--RequestDataArea-->
<div class="RequestDataArea aos-init" data-aos="fade-up" data-aos-delay="500">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Data that you don’t see in our databases, we
                        get them for you!</li>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Insights which can show value for you, we make
                        them for you!</li>
                </ul>
            </div>
            <div class="col-md-4 text-center"><a href="{{ url('contact') }}" class="btn btn-primary">Request Data</a></div>
        </div>
        <hr>
        <div class="row mt-4 mb-4 align-items-center">
            <div class="col-md-4 text-center"><a href="{{ url('contact') }}" class="btn btn-primary">Submit Data</a></div>
            <div class="col-md-8 pl-0">
                <ul>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Data insights which you wish to share, we help
                        you publish.</li>
                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Submit Data sets which you wish to contribute,
                        we help you share.</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row mt-4 align-items-center">
            <div class="col-md-8 pr-0">
                <ul>
                    <!-- <li>Submit data sets which you wish to contribute, we help you share.</li> -->
                    <!-- <li>Our Commitment is to help you get more from data whatever be your cause. </li> -->
                    <li>We help you get more from data whatever be your cause. </li>
                </ul>
            </div>
            <div class="col-md-4 text-center"><a href="{{ url('/about') }}" class="btn btn-primary">Read More</a></div>
        </div>
    </div>
</div>
<!--./RequestDataArea-->

<!--  <div class="how-spread section-padding pt-0">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="datasetform" data-aos="fade-right" data-aos-delay="600">
                            <h5>SUGGEST A DATASET</h5>
                            <form>
                                <div class="row">
                                <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="" placeholder="Your Name">
                                </div>
                                <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="" placeholder="Your E-mail Address">
                                </div>
                                <div class="form-group col-md-12">
                                <textarea class="form-control" placeholder="Suggest the Dataset or App"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="" placeholder="What do you want to do with Data?">
                                </div>
                                 <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="" placeholder="Source of Data">
                                </div>
                                <div class="form-group col-md-12">
                                <input type="file" class="form-control" style="padding: 7px;">
                                <small>(Limit of 5MB) (JPEG, PNG, PDF)</small>
                                </div>
                                <div class="col-md-6 captcha_img">
                                   <img src="images/icons/captcha.jpg" style="width: 170px; height: 40px; border: 0;" alt=" ">
                                   <a class="text-black" href="javascript:void(0)" onclick="change_image()"><small><i class="fa fa-refresh"></i></small></a>
                               </div>
                               <div class="col-md-6">
                               <input autocomplete="off" type="text" name="captcha" class="form-control" placeholder="Enter Captcha Text" maxlength="6">                               
                               </div>
                               <div class="col-md-12">
                                <label><small class="descriptionicon">Enter the characters shown in the image.</small></label>
                               </div>
                               <div class="form-group col-md-12">
                               <button type="submit" class="btn btn-primary">Submit</button>
                               </div>
                               </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6" data-aos="fade-left" data-aos-delay="600">
                        <div class="section-title">
                            <h2>Champions of Change Platform</h2>
                            <p>The Transformation of Aspirational Districts Program aims to expeditiously transform 117 districts that were identified from across 28 states, in a transparent manner. Central to the programme are – Convergence (of Central & State Schemes), Collaboration (of Central & State level ‘Prabhari’ Officers & District Collectors), and Competition among districts. Driven primarily by the States and instituted for the States, this initiative focuses on the strengths of each district, and identifies the attainable outcomes for immediate improvement, while measuring progress and ranking the select districts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<div class="prevention section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center mb-0">
                    <h2>PRODUCTS &amp; SERVICES</h2>
                    <p class="mb-0">Get modular and flat access to data, pay only for what you need</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="100">
                <div class="have-symptom-content">
                    <h4>VISUALS</h4>
                    <img src="./assets/images/01.jpg" class="servImg" alt="">
                    <?php if (session()->get('login_email') != null) { ?>
                        <div class="btntext"><a href="{{ url('/visuals')}}" class="submit_btn">Explore</a></div>
                    <?php } else { ?>
                        <div class="btntext"><a href="{{ url('/login')}}" class="submit_btn round-btn" data-toggle="tooltip" data-placement="top" title="Please Login"><img src="./assets/images/ico-lock.png"></a></div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="200">
                <div class="have-symptom-content">
                    <h4>STATISTICS</h4>
                    <img src="./assets/images/02.jpg" class="servImg" alt="">
                    <div class="btntext"><a href="{{ url('/statistics')}}" class="submit_btn">Explore</a></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="300">
                <div class="have-symptom-content">
                    <h4>DASHBOARD</h4>
                    <img src="./assets/images/03.jpg" class="servImg" alt="">
                    <?php if (session()->get('login_email') == null) { ?>
                        <div class="btntext"><a href="{{ url('/login')}}" class="submit_btn round-btn" data-toggle="tooltip" data-placement="top" title="Please Login"><img src="./assets/images/ico-lock.png"></a></div>
                    <?php } else { ?>
                        <div class="btntext"><a href="{{ url('/dashboards')}}" class="submit_btn">Explore</a></div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="400">
                <div class="have-symptom-content">
                    <h4>ANALYTICS</h4>
                    <img src="./assets/images/04.jpg" class="servImg" alt="">
                    <?php if (session()->get('login_email') == null) { ?>
                        <div class="btntext"><a href="{{ url('/login')}}" class="submit_btn round-btn" data-toggle="tooltip" data-placement="top" title="Please Login"><img src="./assets/images/ico-lock.png"></a></div>
                    <?php } else { ?>
                        <div class="btntext"><a href="{{ url('/analytics')}}" class="submit_btn">Explore</a></div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="500">
                <div class="have-symptom-content">
                    <h4>INFOGRAPHICS</h4>
                    <img src="./assets/images/05.png" class="servImg" alt="">
                    <div class="btntext"><a href="{{ url('/infographics') }}" class="submit_btn">Explore</a></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="600">
                <div class="have-symptom-content">
                    <h4>DATA STORE</h4>
                    <img src="./assets/images/06.jpg" class="servImg" alt="">
                    <div class="btntext"><a href="{{ url('/data_store') }}" class="submit_btn">Get More</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--statistics Matter Area-->
<div class="statisticsMatterArea section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center mb-0">
                    <h2>STATISTICS THAT MATTER!</h2>
                    <p class="mb-0">View data that is latest and relevant</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <!--01 Area-->
            <div class="col-md-3 aos-init" data-aos="fade-up" data-aos-delay="500">
                <div class="statisticsMatterBox">
                    <h3>Recent Statistics</h3>
                    <div class="row m-0">
                        <div class="col-xl-6"> <a href="./assets/images/Agriculture1-sep-2017.jpg" data-lightbox="Statistics"><img src="./assets/images/Agriculture1-sep-2017.jpg"></a> </div>
                        <div class="col-xl-6"> <a href="./assets/images/WENR-0918-India-Graphics-9.png" data-lightbox="Statistics"><img src="./assets/images/WENR-0918-India-Graphics-9.png"></a> </div>
                        <div class="col-xl-6"> <a href="./assets/images/Search-e-commerce-2020.png" data-lightbox="Statistics"><img src="./assets/images/Search-e-commerce-2020.png"></a> </div>
                        <div class="col-xl-6"> <a href="./assets/images/Social+Media+Users+Over+Time+January+2021+DataReportal.png" data-lightbox="Statistics"><img src="./assets/images/Social+Media+Users+Over+Time+January+2021+DataReportal.png"></a> </div>
                    </div>
                </div>
            </div>
            <!--./01 Area-->

            <!--02 Area-->
            <div class="col-md-3 aos-init" data-aos="fade-up" data-aos-delay="500">
                <div class="statisticsMatterBox">
                    <h3>Popular Statistics</h3>
                    <div class="row m-0">
                        <div class="col-xl-6"><a href="./assets/images/Social+Media+Users+Over+Time+January+2021+DataReportal(1).png" data-lightbox="Statistics"><img src="./assets/images/Social+Media+Users+Over+Time+January+2021+DataReportal(1).png"></a></div>
                        <div class="col-xl-6"><a href="./assets/images/netflix-users-geography-all.png" data-lightbox="Statistics"><img src="./assets/images/netflix-users-geography-all.png"></a></div>
                        <div class="col-xl-6"><a href="./assets/images/Marketing_Statistics2.png" data-lightbox="Statistics"><img src="./assets/images/Marketing_Statistics2.png"></a></div>
                        <div class="col-xl-6"><a href="./assets/images/facebook-daily-active-users.png" data-lightbox="Statistics"><img src="./assets/images/facebook-daily-active-users.png"></a></div>
                    </div>
                </div>
            </div>
            <!--./02 Area-->

            <!--03 Area-->
            <div class="col-md-3 aos-init" data-aos="fade-up" data-aos-delay="500">
                <div class="statisticsMatterBox">
                    <h3>Most Viewed Statistics</h3>
                    <div class="row m-0">
                        <div class="col-xl-6"><a href="./assets/images/Wolves_-_damage_statistics_Germany_1.png" data-lightbox="Statistics"><img src="./assets/images/Wolves_-_damage_statistics_Germany_1.png"></a></div>
                        <div class="col-xl-6"><a href="./assets/images/Selected_countries_with_decreasing_cabotage_performance,_2013-2017_(million_tonne-kilometres).png" data-lightbox="Statistics"><img src="./assets/images/Selected_countries_with_decreasing_cabotage_performance,_2013-2017_(million_tonne-kilometres).png"></a>
                        </div>
                        <div class="col-xl-6"><a href="./assets/images/Wolves_-_damage_statistics_Germany_1.png" data-lightbox="Statistics"><img src="./assets/images/Wolves_-_damage_statistics_Germany_1.png"></a></div>
                        <div class="col-xl-6"><a href="./assets/images/influencer-rates-wall-street-journal.png" data-lightbox="Statistics"><img src="./assets/images/influencer-rates-wall-street-journal.png"></a></div>
                    </div>
                </div>
            </div>
            <!--./03 Area-->

            <!--04 Area-->
            <div class="col-md-3 aos-init" data-aos="fade-up" data-aos-delay="500">
                <div class="statisticsMatterBox">
                    <h3>More Statistics</h3>
                    <div class="pl-3 pr-3 pb-3">
                        <ul>
                            <li><a href="https://companydemo.in/demos/VariStats/Layout2-v3/statistics.html">By Industry</a></li>
                            <li><a href="https://companydemo.in/demos/VariStats/Layout2-v3/statistics.html">By Themes</a></li>
                            <li><a href="https://companydemo.in/demos/VariStats/Layout2-v3/statistics.html">By Topics</a></li>
                            <li><a href="https://companydemo.in/demos/VariStats/Layout2-v3/statistics.html">By Geography</a></li>
                            <li><a href="https://companydemo.in/demos/VariStats/Layout2-v3/statistics.html">By Time Series </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--./04 Area-->

        </div>
    </div>
</div>

<!--./statistics Matter Area-->

<div class="prevention section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center mb-0">
                    <h2>VARILYTICS ACCESS ACCOUNTS</h2>
                    <p class="mb-0">Easy Access, Low-Cost Solutions</p>
                </div>
            </div>
        </div>
        @if ($message = Session::get('successMessage'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="100">
                <div class="have-symptom-content">
                    <h4 class="mb-0">Basic Access</h4>
                    <p class="mb-3">Explore our Platform</p>
                    <ul class="dots">
                        <li>Access Free Data</li>
                        <li>Know our Product suite</li>
                        <li>Download as PDF Only</li>
                    </ul>
                    <small class="d-block mt-3 font-13">Free</small>
                    <div class="btntext"><a href="{{ url('registration')}}" class="submit_btn btn-yellow font-13 mt-0">Register</a></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="200">
                <div class="have-symptom-content">
                    <h4 class="mb-0">Professional Access</h4>
                    <p class="mb-3">Access our Platform</p>
                    <ul class="dots">
                        <li>Access Data</li>
                        <li>Access Insights</li>
                        <li>Download and Extract Only</li>
                    </ul>
                    <small class="d-block mt-3 font-13">Rs 600 + Taxes/month<sup>*</sup></small>
                    <div class="btntext">
                        <form action="{{ route('razorpay.payment.store') }}" method="POST">
                            @csrf
                            <?php if (session()->get('login_email') != null) { ?>
                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_dg3dxMbRbLOILJ" data-amount="{{ 600 * 100 }}" data-name="varilytics.com" data-description="Rozerpay" data-image="https://varilytics.com/assets/images/logo.jpeg" data-prefill.name="name" data-prefill.email="email" data-theme.color="#ff7529">
                                </script>
                            <?php } ?>
                            <input type="hidden" name="plan" value="2">
                            <input type="submit" value="Subscribe" class="submit_btn btn-yellow font-13 mt-0">
                        </form>
                        <!-- <a href="{{url('subscription')}}" class="submit_btn btn-yellow font-13 mt-0">Subscribe</a> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="300">
                <div class="have-symptom-content">
                    <h4 class="mb-0">Multi-User Access</h4>
                    <p class="mb-3">Access at lower cost</p>
                    <ul class="dots">
                        <li>3 or 5 user plan</li>
                        <li>Lower Cost</li>
                        <li>Collaborative Working</li>
                    </ul>
                    <small class="d-block mt-3 font-13">Rs 500 + Taxes/month/ User<sup>*</sup></small>
                    <div class="btntext">
                        <form action="{{ route('razorpay.payment.store') }}" method="POST">
                            @csrf
                            <?php if (session()->get('login_email') != null) { ?>
                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_dg3dxMbRbLOILJ" data-amount="{{ 500 * 100 }}" data-name="varilytics.com" data-description="Rozerpay" data-image="https://varilytics.com/assets/images/logo.jpeg" data-prefill.name="name" data-prefill.email="email" data-theme.color="#ff7529">
                                </script>
                            <?php } ?>
                            <input type="hidden" name="plan" value="3">
                            <input type="submit" value="Subscribe" class="submit_btn btn-yellow font-13 mt-0">
                        </form>
                        <!-- <a href="{{ url('subscription')}}" class="submit_btn btn-yellow font-13 mt-0">Subscribe <sup>*</sup></a> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="400">
                <div class="have-symptom-content">
                    <h4 class="mb-0">Premium Access</h4>
                    <p class="mb-3">Access premium features</p>
                    <ul class="dots">
                        <li>Access Dashboards</li>
                        <li>Access premium content</li>
                        <li>Request Insights</li>
                    </ul>
                    <small class="d-block mt-3 font-13">Customized Solutions</small>
                    <div class="btntext"><a href="{{ url('contact')}}" class="submit_btn btn-yellow font-13 mt-0">Get a Quote</a></div>
                </div>
            </div>
        </div>
        <small class="text-right float-right mt-2">* All products require an annual contract.</small>
        <div class="clearfix"></div>
        <a href="{{ url('/subscription') }}" class="price-overview-btn">Go to Pricing
            Overview</a>
    </div>
</div>

<!-- number Counter -->
<div class="section-padding pt-3 pb-3">
    <div class="container">
        <div class="section-title text-center mb-3">
            <h2>User Testimonial</h2>
        </div>
        <div class="row numbers-counting aos-init" data-aos="fade-left" data-aos-delay="600">
            <div class="col">
                <h3>
                    <span class="counter-value" data-count="{{ isset($testimonial[0]->visitors) ? $testimonial[0]->visitors : '' }}">
                        {{ isset($testimonial[0]->visitors) ? $testimonial[0]->visitors : '' }}
                    </span>+
                </h3>

                <p>No of Visitor</p>
            </div>
            <div class="col">
                <h3>
                    <span class="counter-value" data-count="{{ isset($testimonial[0]->users) ? $testimonial[0]->users : '' }}">
                        {{ isset($testimonial[0]->users) ? $testimonial[0]->users : '' }}
                    </span>+
                </h3>
                <p>Users</p>

            </div>
            <div class="col">
                <h3><span class="counter-value" data-count="{{isset($testimonial[0]->subscribers) ? $testimonial[0]->subscribers : ''}}">{{ isset($testimonial[0]->subscribers) ? $testimonial[0]->subscribers : '' }}</span>k</h3>
                <p>Subscribers</p>
            </div>
            <div class="col">
                <h3><span class="counter-value" data-count="{{ isset($testimonial[0]->partners) ? $testimonial[0]->partners : '' }}">{{ isset($testimonial[0]->partners) ? $testimonial[0]->partners : '' }}</span>+</h3>
                <p>Partners</p>
            </div>
            <div class="col">
                <h3><span class="counter-value" data-count="{{ isset($testimonial[0]->corporates) ? $testimonial[0]->corporates : '' }}">{{ isset($testimonial[0]->corporates) ? $testimonial[0]->corporates : '' }}</span>+</h3>
                <p>Corporates</p>
            </div>
        </div>
    </div>
</div>

<!-- <div class="cta section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-content">
                            <h2>FOR MORE INFORMATION ON VARISTATS</h2>
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <div class="cta-call">
                                        <span><i class="mdi mdi-phone"></i></span>
                                        (+91) 98 1234 5678
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                    <div class="cta-call">
                                        <span><i class="mdi mdi-web"></i></span>
                                        <a href="mailto:support@varistats.com">
                                            support@varistats.com
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<script>
    $('.razorpay-payment-button').remove();
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        //let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        //   for (i = 0; i < dots.length; i++) {
        //     dots[i].className = dots[i].className.replace(" active", "");
        //   }
        slides[slideIndex - 1].style.display = "block";
        //dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>