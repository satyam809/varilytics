<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script> -->
<style>
    th span,
    td.th span {
        display: inline-block;
        transform: rotate(-90deg);
        float: left;
        width: 35px;
        white-space: nowrap;
    }

    .sortable {
        background: #2050be;
        color: #fff;
    }

    thead th {
        vertical-align: bottom;
        padding-bottom: 1.5em;
        height: 180px;
    }


    thead th:first-child {
        width: 235px;
    }

    thead th.countries,
    thead th.companies {
        padding-bottom: 5px;
        text-align: left;
    }

    th,
    td.th {
        font-weight: normal;
        color: #2050be;
        _font-size: 0.8em;
        font-size: 14px;
    }

    .even {
        background: #eee;
    }

    .odd {
        background: white;
    }

    td {
        text-align: center;
    }

    th {
        text-align: center;
    }

    .scale2 {
        background: #ff9b00;
        color: #fff;
    }

    .scale5 {
        background: #4cb666;
        color: #fff;
    }

    .table tr td,
    .table tr th {
        padding: 10px 10px 10px 10px;
    }

    @media screen and (min-width: 768px) {
        #data-coverage {
            text-align: center;
        }

        #data-coverage>.row {
            display: inline-block;
        }
    }

    .search-container {
        position: relative;
    }

    .search-input {
        width: 100%;
        /* Set width to 100% to fill the container */
        padding-right: 40px;
        /* Add space for the search icon */
    }

    .fa-search {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        /* Vertically center the icon */
    }

    /* Media query for responsive styles */
    @media screen and (max-width: 767px) {
        .fa-search {
            right: 5px;
            /* Adjust the position of the icon for smaller screens */
        }
    }

    .select2-container {
        min-width: 50% !important;
    }
</style>
<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Data Coverage</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4" style="display:flex;justify-content:end;">
            <select id="showCountries" onChange="getStates(event)">
            </select>

        </div>
        <div class="col-md-4" style="display:flex;justify-content:center;">
            <select id="showStates" onchange="getDistricts(event)">
                <option value="">Select State</option>
            </select>

        </div>
        <!-- <div class="col-md-4" style="display:flex;justify-content:center;">
            <select class="form-control">
                <option value="">Country Group</option>
            </select>

        </div> -->
    </div>
</div>
<br>
<div class="container-fluid" id="data-coverage">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead id="appendTopic">
                </thead>
                <tbody id="appendCountry">
                </tbody>
            </table>
        </div>
    </div>

</div>
<br>
<script>
    $(document).ready(function() {
        $('#showCountries').select2();
        $('#showStates').select2();
    });

    function parentTopic() {
        $.ajax({
            url: "/front_parent_topic",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                var html = `<tr><th>
  <div class="search-container">
    <input type="text" class="search-input" placeholder="Country" id="country" onkeyup="fetchCountry()">
    <i class="fa fa-search"></i>
  </div>
</th>`;
                for (var i = 0; i < data.length; i++) {
                    var className = i % 2 === 0 ? 'even' : 'odd';
                    html += `<th class="${className}"><span>${data[i].name}</span></th>`;
                }
                html += `</tr>`;
                $("#appendTopic").append(html);
            }
        });
    }
    parentTopic();

    function getCountries() {
        $.ajax({
            url: "/getAllCountries",
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                var html = "";
                var html1 = "<option value='' disabled selected>Select Country</option>";
                for (var i = 0; i < data.length; i++) {
                    var className = i % 2 === 0 ? 'even' : 'odd';
                    html += `<tr class="coverage ${className}">
        <th>${data[i].country_name}</th>`;
                    for (var j = 0; j < data[i].main_topic.length; j++) {
                        html += `<td class="${j % 2 === 0 ? 'scale2' : 'scale5'}">${data[i].main_topic[j].count}</td>`;
                    }
                    html += "</tr>";
                    html1 += `<option value="${data[i].country_id}">${data[i].country_name}</option>`;
                }
                $("#appendCountry").append(html);
                $("#showCountries").append(html1);
                $("#country").attr("placeholder", "Country");
                
            }
        });
    }
    getCountries();

    function getStates(event) {
        $("#showStates").empty();
        $("#appendCountry").empty();
        //alert(event.target.value);
        $.ajax({
            url: "/getCountryStates/" + event.target.value,
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                console.log(data)
                var html = "";
                var html1 = "<option value='' disabled selected>Select State</option>";
                for (var i = 0; i < data.length; i++) {
                    var className = i % 2 === 0 ? 'even' : 'odd';
                    html += `<tr class="coverage ${className}">
        <th>${data[i].name}</th>`;
                    for (var j = 0; j < data[i].main_topic.length; j++) {
                        html += `<td class="${j % 2 === 0 ? 'scale2' : 'scale5'}">${data[i].main_topic[j].count}</td>`;
                    }
                    html += "</tr>";
                    html1 += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                $("#appendCountry").append(html);
                $("#showStates").append(html1);
                $("#country").attr("placeholder", "States");

            }
        })
    }

    function getDistricts(event) {
        $("#appendCountry").empty();
        $.ajax({
            url: "/getStateDistricts/" + event.target.value,
            method: "get",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                var html = "";
                var html1 = "<option value='' disabled selected>Select District</option>";
                for (var i = 0; i < data.length; i++) {
                    var className = i % 2 === 0 ? 'even' : 'odd';
                    html += `<tr class="coverage ${className}">
        <th>${data[i].name}</th>`;
                    for (var j = 0; j < data[i].main_topic.length; j++) {
                        html += `<td class="${j % 2 === 0 ? 'scale2' : 'scale5'}">${data[i].main_topic[j].count}</td>`;
                    }
                    html += "</tr>";
                    html1 += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                $("#appendCountry").append(html);
                //$("#showStates").append(html1);
                $("#country").attr("placeholder", "Districts");
            }
        })
    }
    // filter
    const fetchCountry = () => {
        var input, filter, div1, div2, txt, i, txtValue;
        input = document.getElementById("country");
        filter = input.value.toUpperCase();
        //alert(filter);die;
        div1 = document.getElementById("appendCountry");
        div2 = div1.getElementsByClassName("coverage");
        for (i = 0; i < div2.length; i++) {
            //console.log(div2[i].getElementsByTagName("th"));
            txt = div2[i].getElementsByTagName("th")[0];
            txtValue = txt.textContent || txt.innerText;
            //console.log(txtValue.toUpperCase().indexOf(filter));die;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                div2[i].style.display = "";
            } else {
                div2[i].style.display = "none";
            }
        }
    }
</script>