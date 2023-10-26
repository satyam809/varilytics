<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Sales', 'Expenses'],
            ['2004', 1000, 400],
            ['2005', 1170, 460],
            ['2006', 660, 1120],
            ['2007', 1030, 540]
        ]);

        var options = {
            title: 'Company Performance',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>


<section style="margin-top: 115px;background-color: #F5F7FA;">
    <div class="container">
        <div class="row" style="padding:25px 0px">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body" style="background-image: linear-gradient(150deg, #f731db, #4600f1 100%)">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="fa fa-pencil float-left" style="font-size:xxx-large;color:white;"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 style="font-size:1.51rem;color:white;">278</h3>
                                    <span style="color:white;">New Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body" style="background-image: linear-gradient(150deg, #39ef74, #4600f1 100%);">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="fa fa-pencil float-left" style="font-size:xxx-large;color:white;"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 style="font-size:1.51rem;color:white;">278</h3>
                                    <span style="color:white;">New Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body" style="background-image: linear-gradient(150deg, #f731db, #4600f1 100%)">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="fa fa-pencil float-left" style="font-size:xxx-large;color:white;"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 style="font-size:1.51rem;color:white;">278</h3>
                                    <span style="color:white;">New Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body" style="background-image: linear-gradient(150deg, #39ef74, #4600f1 100%);">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="fa fa-pencil float-left" style="font-size:xxx-large;color:white;"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 style="font-size:1.51rem;color:white;">278</h3>
                                    <span style="color:white;">New Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <canvas id="lineChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>
<script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "World Wine Production 2018"
            }
        }
    });
</script>
<script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart1", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "World Wide Wine Production 2018"
            }
        }
    });
</script>
<script>
    const x1Values = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

    new Chart("lineChart", {
        type: "line",
        data: {
            labels: x1Values,
            datasets: [{
                data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
                borderColor: "red",
                fill: false
            }, {
                data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
                borderColor: "green",
                fill: false
            }, {
                data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
                borderColor: "blue",
                fill: false
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });
</script>