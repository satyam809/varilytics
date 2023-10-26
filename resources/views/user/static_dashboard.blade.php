<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Static Dashboards</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="container">
    <form id="searchData">
        {{ csrf_field() }}
        <div class="row" style="justify-content: center;">
            <div class="col-md-4 col-12">
                <select name="category_id" class="form-control" id="category" onchange="getCommodity(event)"></select>
            </div>
            <div class="col-md-4 col-12">
                <select name="commodity_id" class="form-control" id="commodity"></select>
            </div>
            <div class="col-md-4 col-12">
                <input type="submit" class="btn btn-primary searchInput" value="Search">
            </div>
        </div>

    </form>


</div>
<br>
<script>
    function showCategory(){
        $.ajax({
            url: `/dashboardAllCategory`,
            method: 'GET',
            success: function(data) {
                console.log(data);
                var html = `<option value="0" selected disabled>Select Category</option>`;
                data.map(function(item) {
                    html += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#category").append(html);
            }
        });
    }
    showCategory();
    function getCommodity(event){
        $.ajax({
            url: `/getCategoryCommodity/${event.target.value}`,
            method: 'GET',
            success: function(data) {
                console.log(data);
                var html = `<option value="0" selected disabled>Select Commodity</option>`;
                data.map(function(item) {
                    html += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#commodity").append(html);
            }
        });
    }
</script>