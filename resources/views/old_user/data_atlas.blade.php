<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Data Atlas</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="atlaspage section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <ul class="world-atlas-header">
                        <li class="bg-green">
                            <h3 class="value"><span class="counter-value" data-count="4.1">0</span>b+</h3>
                            <span class="text">Time Series:</span>
                        </li>
                        <li class="bg-red">
                            <h3 class="value"><span class="counter-value" data-count="450">0</span>+</h3>
                            <span class="text pointer">Topics:</span>
                        </li>
                        <li class="bg-yellow">
                            <h3 class="value"><span class="counter-value" data-count="1.5">0</span>+</h3>
                            <span class="text">Sources:</span>
                        </li>
                    </ul>
                    <h5 class="text-center" style="font-size: 20px;">India and India-Centric Statistics, National, State and District Data, Rankings.</h5>
                    <!-- <p class="text-center">Take a look at <a href="#"><u>data coverage matrix</u></a> by country or topic to see the full picture!</p> -->

                    <div class="data-app data-bulletin h-auto text-center pt-4 pl-4 pr-4 pb-2">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="imgArea"><img src="assets/images/databoard.jpg"></div>
                                <h2><a href="data-board.html" class="btn btn-success">Data Board</a></h2>
                            </div>
                            <div class="col-md-6">
                                <div class="imgArea"><img src="assets/images/datacoverage.png"></div>
                                <h2><a href="data-coverage.html" class="btn btn-success">Data Coverage</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="nav nav-tabs tabs-left sideways">
                                    <li><a class="active" href="#data1" data-toggle="tab">India Data (Country Data)
                                        </a></li>
                                    <li><a href="#data2" data-toggle="tab">India In Context to Global
                                        </a></li>
                                    <li><a href="#data3" data-toggle="tab">India In Context to Country Groups</a></li>
                                    <li><a href="#data4" data-toggle="tab">Country Data Sets (58 countries)
                                        </a></li>
                                    <li><a href="#data5" data-toggle="tab">Country Rankings (58 countries)
                                        </a></li>
                                    <li><a href="#data6" data-toggle="tab">Country Maps (58 countries)
                                        </a></li>
                                    <li><a href="#data6-1" data-toggle="tab">India Key Rankings
                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">India Data (India Data)
                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">Indian States Data (Central Data)

                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">State Rankings
                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">District Rankings
                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">States Data (Respective States Data)
                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">Districts Data
                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">100 Smart Cities Data
                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">Block /Tehsil Data
                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">Sources
                                        </a></li>
                                    <li>
                                    <li><a href="#data6-1" data-toggle="tab">Statistics
                                        </a></li>
                                    <li><a href="#data6-1" data-toggle="tab">Data Sets /Series

                                        </a></li>

                                    <li><a href="#data6-1" data-toggle="tab">Data Maps
                                        </a></li>
                                    <li><a href="#data6-1" data-toggle="tab">Data Dashboards

                                        </a></li>
                                    <li><a href="#data6-1" data-toggle="tab">Data Dayboards
                                        </a></li>
                                    <li><a href="#data6-1" data-toggle="tab">Commodities Quick Access
                                        </a></li>
                                    <li><a href="#data6-1" data-toggle="tab">Perishables Quick Access
                                        </a></li>
                                    <li><a href="#data6-1" data-toggle="tab">Processed Food Access
                                        </a></li>
                                    <li>
                                        <h4 class="mt-3">Topics</h4>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-9" style="margin-top:10px;" id="emptyTopic">

                                <div class="row" id="secondSubTopic">
                                </div>
                                <div class="row" id="thirdSubTopic" style="margin-top: 10px;">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $.ajax({
        url: "/front_parent_topic",
        method: "get",
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                $(".sideways").append(`<li class="pointer"><a class="pointer" onclick="firstSubTopic(${data[i].id})">${data[i].name}</a></li>`);
            }
        }
    });

    function firstSubTopic(id) {
        $("#secondSubTopic").empty();
        $("#thirdSubTopic").empty();
        $.ajax({
            url: "/front_get_subtopic/" + id,
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $("#secondSubTopic").append(`<div class="col-md-4">
                                                <a onclick="secondSubTopic(${data[i].id})" style="text-transform: uppercase;font-size:20px; color: black;" class="pointer">${data[i].name}</a>
                                            </div>`);
                }
            }
        });
    }

    function secondSubTopic(id) {
        $("#thirdSubTopic").empty();
        $.ajax({
            url: "/front_get_subtopic/" + id,
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $("#thirdSubTopic").append(`<div class="col-md-6">
                                                <a style="font-size:18px;color: black;">${data[i].name}</a>
                                                <div>${secondSubTopicChild(data[i].id)}</div>
                                            </div>`);
                }
            }
        });
    }

    function secondSubTopicChild(id) {
        var html = "";
        $.ajax({
            url: "/front_get_subtopic/" + id,
            method: "get",
            async: false,
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    html += `<li style='list-style: disc;'><a href='/topic_data/` + data[i].id + `' style='font-size:18px;color: blue;'>` + data[i].name + `</a></li>`;
                }

            }
        });
        //console.log(html);
        return html;
    }
</script>

<style>
    .pointer {
        cursor: pointer;
    }
</style>