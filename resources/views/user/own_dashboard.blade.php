<script
  type="text/javascript"
  src="https://www.gstatic.com/charts/loader.js"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<style>
  /* .btn-group {
        width: 100%;
    }
    .multiselect-container>li>a>label {
        padding: 3px 3px 0px 15px !important;
    }
    .multiselect-search{
        width: 95% !important;
    } */
</style>
<div class="page-title section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="page_title-content">
          <h3>Make Your Own Dashboard</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<br />
<div class="container">
  <form onsubmit="createOwnDashboard(event)" id="createOwnDashboard">
    {{ csrf_field() }}
    <div class="row" style="justify-content: center">
      <div class="col-md-4 col-12">
        <select
          name="category_id"
          class="form-control"
          id="category"
          onchange="getCommodity(event)"
        ></select>
      </div>
      <div class="col-md-4 col-12" id="commodity"></div>
      <div class="col-md-4 col-12">
        <input
          type="submit"
          class="btn btn-primary searchInput"
          value="Create Dashboard"
        />
      </div>
    </div>
  </form>
</div>
<br />
<div class="container" id="addPriceGraph"></div>
<script>
  function showCategory() {
    $.ajax({
      url: `/dashboardAllCategory`,
      method: "GET",
      success: function (data) {
        //console.log(data);
        var html = `<option value="0" selected disabled>Select Category</option>`;
        data.map(function (item) {
          html += `<option value="${item.id}">${item.name}</option>`;
        });
        $("#category").append(html);
      },
    });
  }
  showCategory();

  function getCommodity(event) {
    $("#commodity").empty();
    $.ajax({
      url: `/getCategoryCommodity/${event.target.value}`,
      method: "GET",
      success: function (data) {
        var html = `<select name="commodity_id[]" class="form-control" multiple="multiple" id="commodity_id">`;
        data.map(function (item) {
          html += `<option value="${item.id}">${item.name}</option>`;
        });
        html += `</select>`;
        $("#commodity").append(html);

        $("#commodity_id").select2({
          placeholder: "Select Commodity",
          width: "100%",
        });

        // $('select[name="commodity_id"]').multiselect({
        //     nonSelectedText: 'Select Commodity',
        //     enableFiltering: true,
        //     enableCaseInsensitiveFiltering: true,
        //     buttonWidth: '100%',
        //     maxHeight: 450,
        // });
      },
    });
  }

  function createOwnDashboard(event) {
    event.preventDefault();
    $.ajax({
      url: `/createOwnDashboard`,
      method: "POST",
      dataType: "json",
      data: new FormData(event.target),
      contentType: false,
      processData: false,
      success: function (data) {
        var html = "";
        console.log(data.data.length);
        for (var i = 0; i < data.data.length; i++) {
          var xYear = [];
          var xPrice = [];
          html += `<div><h3 class="text-center">${data.data[i].commodity_name}</h3></div><div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>Average Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>`;
          for (var j = 0; j < data.data[i].yearPrice.length; j++) {
            var year = data.data[i].yearPrice[j].year;
            var price = data.data[i].yearPrice[j].avg_price;
            xYear.push(year);
            xPrice.push(price);
            html += `<tr><td>${year}</td><td>${price}</td></tr>`;
          }
          html += `</tbody></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body" id="commodity_graph${i}">
                                        <canvas id="commodityChart${i}" style="width:100%;max-width:600px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

          $("#addPriceGraph").append(html);

          var canvas = document.getElementById(`commodityChart${i}`);
          if (canvas) {
            //console.log(canvas)
            //var ctx = canvas.getContext("2d");
            new Chart(`commodityChart${i}`, {
              type: "line",
              data: {
                labels: xYear,
                datasets: [
                  {
                    data: xPrice,
                    borderColor: "red",
                    fill: false,
                  },
                ],
              },
              options: {
                legend: {
                  display: false,
                },
              },
            });
          }
          html = ``;
        }
      },
    });
  }
</script>
