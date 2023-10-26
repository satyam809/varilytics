<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<style>
    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .multiselect-container>li>a>label {
        padding: 3px 3px 0px 15px !important;
    }

    .multiselect-item>.input-group {
        width: 95% !important;
    }
</style>
<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Mandi Prices Graph</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <form onSubmit="generateGraph(event)">
        {{ csrf_field() }}
        <div class="row">

            <div class="col-md-4">
                <select class="form-control" name="commodity[]" id="allMandiCommodity" _onChange="getCommodityGraph(event)" multiple="multiple">

                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div id="curve_chart" style="_width: 900px; height: 500px"></div>
        </div>
    </div>

</div>


<script type="text/javascript">
    // function getCommodityGraph(event) {
    //     drawGraph(event.target.value);
    // }
    function generateGraph(event) {
        event.preventDefault();
        drawGraph(event);

    }

    function drawGraph(event) {
        //alert(id);
        $.ajax({
            url: "/commodityYearPriceGraph",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(event.target),
            success: function(result) {
                //console.log(result);
                const keys = result.reduce((acc, obj) => {
                    return acc.concat(Object.keys(obj));
                }, []);

                const uniqueKeys = [...new Set(keys)];
                //console.log(uniqueKeys);
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
                    
                    result.map(function(element) {
                        const values = Object.values(element);
                        var resultData = [];
                        values.map(function(resData, key) {
                            if (key == 0) {
                                resultData.push(resData.toString());
                            }else{
                                resultData.push(Number(resData));
                            }
                        });
                        //console.log(values);
                        data.addRows([resultData]);
                            // [
                            //     values[0].toString(), Number(values[1]), Number(values[2]), Number(values[3])
                            // ]
                        //]);
                        resultData = [];
                    })
                    // var options = {
                    //     title: result.commodityName,
                    //     curveType: 'function',   
                    //     legend: {
                    //         position: 'bottom'
                    //     }
                    // };
                    var options = {
                        title: '',
                        // 'width': 800,
                        // 'height': 600,
                        'chartArea': {
                            'width': 'auto'
                        },
                        animation: {
                            duration: 3000,
                            easing: 'out',
                            startup: true
                        },
                        colorAxis: {
                            colors: ['#54C492', '#cc0000']
                        },
                        datalessRegionColor: '#dedede',
                        defaultColor: '#dedede'
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
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
                // var html = `<option>Select Commodities</option>`;
                // data.map(function(element) {
                //     html += `<option value="${element.id}">${element.name}</option>`;
                // });
                // $("#allCommodity").append(html);
                var html = `<option disabled>Select Commodity</option>`;
                data.map(function(element) {
                    html += `<option value="${element.id}" >${element.name}</option>`;
                    //});

                });
                $("#allMandiCommodity").append(html);
                $('#allMandiCommodity').multiselect({
                    nonSelectedText: 'Select Commodity',
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
            }

        });
    }
    allCommodity();
    //drawGraph(1);
</script>