<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
<style type="text/css">
   .pointer {
   cursor: pointer;
   }
   .spinner-border {
   position: relative;
   top: 50%;
   left: 50%;
   right: 50%;
   bottom: 50%;
   }
   .underlined {
   border-bottom: 2px solid #c60001;
   }
   .wrapper {
   overflow: hidden;
   display: flex;
   flex-direction: row;
   margin: auto;
   align-items: center;
   }
   .slider {
   position: relative;
   display: flex;
   overflow: hidden;
   }
   .next,
   .prev {
   font-family: monospace;
   font-size: 2rem;
   background: none;
   border: 0px;
   cursor: pointer;
   display: flex;
   align-items: center;
   color: rgb(100, 100, 100, 0.5);
   }
   .prev {
   transform: rotate(-180deg);
   }
   .next:hover {
   text-shadow: 2px 2px 2px rgb(200, 200, 200);
   }
   .prev:hover {
   text-shadow: 2px -2px 2px rgb(200, 200, 200);
   }
   .item {
   flex: 1 0 25%;
   _min-height: 200px;
   height: 35px;
   text-align: center;
   }
   @media (max-width: 1024px) {
   .item {
   flex: 1 0 33%;
   }
   }
   @media (max-width: 768px) {
   .item {
   flex: 1 0 50%;
   }
   }
   @media (max-width: 576px) {
   .item {
   flex: 1 0 100%;
   }
   }
</style>
<style>
   .dropdown-submenu {
   position: relative;
   }
   .dropdown-submenu .dropdown-menu {
   top: 0;
   left: 100%;
   margin-top: -1px;
   }
   .caret {
   display: inline-block;
   width: 0;
   height: 0;
   margin-left: 2px;
   vertical-align: middle;
   border-top: 4px dashed;
   border-top: 4px solid\9;
   border-right: 4px solid transparent;
   border-left: 4px solid transparent;
   }
   #states,
   #districts,
   #smartCities {
   background-image: url('/css/searchicon.png');
   background-position: 10px 12px;
   background-repeat: no-repeat;
   width: 100%;
   font-size: 16px;
   padding: 12px 20px 12px 40px;
   border: 1px solid #ddd;
   margin: 20px 10px;
   }
   .hideList {
   display: none;
   }
   .category {
   display: block;
   width: 100%;
   clear: both;
   text-align: center;
   }
   .category_box {
   display: inline-block;
   vertical-align: top;
   width: 23%;
   text-align: center;
   min-height: 120px;
   margin: 5px;
   height: auto;
   padding: 10px;
   border: 1px solid #fff;
   box-sizing: border-box;
   transition: all .5s;
   -webkit-transition: all .5s;
   }
   .category_box .icon {
   display: block;
   height: 65px;
   width: 70px;
   margin: 0px auto;
   clear: both;
   transition: all .5s;
   -webkit-transition: all .5s;
   vertical-align: middle;
   }
   .category_box .icon img {
   height: 100%;
   width: 100%;
   }
</style>
<div class="page-title section-padding">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="page_title-content">
               <h3>Data Library</h3>
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
                  <li class="bg-green mySlides">
                     <h3 class="value"><span class="counter-value" data-count="450">0</span>+</h3>
                     <span class="text pointer">Indicators</span>
                  </li>
                  <li class="bg-yellow mySlides">
                     <h3 class="value"><span class="counter-value" data-count="450">0</span>+</h3>
                     <span class="text pointer">Statistics</span>
                  </li>
                  <li class="bg-red mySlides">
                     <h3 class="value"><span class="counter-value" data-count="450">0</span>+</h3>
                     <span class="text pointer">Infographics</span>
                  </li>
                  <li class="bg-green mySlides">
                     <h3 class="value"><span class="counter-value" data-count="450">0</span>+</h3>
                     <span class="text pointer">Visuals</span>
                  </li>
                  <li class="bg-yellow mySlides">
                     <h3 class="value"><span class="counter-value" data-count="450">0</span>+</h3>
                     <span class="text pointer">Topics</span>
                  </li>
                  <li class="bg-red mySlides">
                     <h3 class="value"><span class="counter-value" data-count="1.5">0</span>+</h3>
                     <span class="text">Sources</span>
                  </li>
                  <li class="bg-green mySlides">
                     <h3 class="value"><span class="counter-value" data-count="4.1">0</span>b+</h3>
                     <span class="text">Time Series</span>
                  </li>
               </ul>
               <!-- <h5 class="text-center" style="font-size: 20px;">India and India-Centric Statistics, National, State and District Data, Rankings.</h5> -->
               <!-- <p class="text-center">Take a look at <a href="#"><u>data coverage matrix</u></a> by country or topic to see the full picture!</p> -->
               <div class="data-app data-bulletin h-auto text-center pt-4 pl-4 pr-4 pb-2">
                  <div class="row justify-content-center">
                     <div class="col-md-6">
                        <div class="imgArea"><img src="assets/images/databoard.jpg"></div>
                        <h2><a href="{{url('data_board')}}" class="btn btn-success">Data Board</a></h2>
                     </div>
                     <div class="col-md-6">
                        <div class="imgArea"><img src="assets/images/datacoverage.png"></div>
                        <h2><a href="{{ url('data-coverage')}}" class="btn btn-success">Data Coverage</a></h2>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="row">
                     <div class="col-md-4">
                        <ul class="nav nav-tabs tabs-left sideways">
                           <li><a class="active" href="" data-toggle="tab">Country Data Sets
                              </a>
                           </li>
                           <li><a href="" onClick="countryGroup(event)">Country Groups
                              </a>
                           </li>
                           <li><a href="" data-toggle="tab">Country Rankings</a></li>
                           <li><a href="" data-toggle="tab">India In Context to the World
                              </a>
                           </li>
                           <li><a href="" data-toggle="tab">India In Context to Country Groups
                              </a>
                           </li>
                           <li><a href="" data-toggle="tab">India Key Rankings
                              </a>
                           </li>
                           <li><a href="" data-toggle="tab">India Data
                              </a>
                           </li>
                           <li>
                              <a href="" onClick="showStates(event);">States Data
                              </a>
                           </li>
                           <li>
                              <a href="" onClick="showDistricts(event);">Districts Data
                              </a>
                           </li>
                           <li><a href="" data-toggle="tab">State Rankings
                              </a>
                           </li>
                           <li><a href="" data-toggle="tab">District Rankings
                              </a>
                           </li>
                           <li>
                              <a href="" onClick="showSmartCities(event);">100 Smart Cities Data
                              </a>
                           </li>
                           <li>
                              <a href="" onclick="showBlock(event)">Block /Tehsil Data
                              </a>
                           </li>
                           <li>
                              <a class="clickDataInsight">Data Insights<span class="caret"></span>
                              </a>
                           </li>
                           <!-- show data insight menu-->
                           <li class="dataInsight" style="display:none;">
                              <a href="#" data-toggle="tab">Infographics
                              </a>
                           </li>
                           <li class="dataInsight" style="display:none;">
                              <a href="#" data-toggle="tab">Visuals
                              </a>
                           </li>
                           <li class="dataInsight" style="display:none;">
                              <a href="#" data-toggle="tab">BAnalytics
                              </a>
                           </li>
                           <li class="dataInsight" style="display:none;">
                              <a href="#" data-toggle="tab">Dashboards
                              </a>
                           </li>
                           <li class="dataInsight" style="display:none;">
                              <a href="#" data-toggle="tab">Dayboards
                              </a>
                           </li>
                           <!-- end data insight menu-->
                           <li class="clickDataMap">
                              <a href="" data-toggle="tab">Data Maps<span class="caret"></span></a>
                           </li>
                           <!-- show data maps menu-->
                           <li class="dataMap" style="display:none;">
                              <a href="" data-toggle="tab">Country
                              </a>
                           </li>
                           <li class="dataMap" style="display:none;">
                              <a href="" data-toggle="tab">India
                              </a>
                           </li>
                           <li class="dataMap" style="display:none;">
                              <a href="" data-toggle="tab">States
                              </a>
                           </li>
                           <li class="dataMap" style="display:none;">
                              <a href="" data-toggle="tab">Districts
                              </a>
                           </li>
                           <!-- end data maps menu-->
                           <!-- show data sets -->
                           <li class="clickDataSet">
                              <a href="" data-toggle="tab">Data Sets<span class="caret"></span>
                              </a>
                           </li>
                           <li class="dataSet" style="display:none;">
                              <a href="{{ url('mandi-prices')}}">Mandi Prices
                              </a>
                           </li>
                           <li class="dataSet" style="display:none;">
                              <a href="{{ url('mandi-arrival')}}">Mandi Arrivals
                              </a>
                           </li>
                           <li class="dataSet" style="display:none;">
                              <a href="{{ url('apys')}}">APYs
                              </a>
                           </li>
                           <li class="dataSet" style="display:none;">
                              <a href="{{ url('snds')}}" data-toggle="tab">SnDs
                              </a>
                           </li>
                           <li class="dataSet" style="display:none;">
                              <a href="{{ url('wholesale-prices')}}" data-toggle="tab">Wholesale Prices
                              </a>
                           </li>
                           <li class="dataSet" style="display:none;">
                              <a href="{{ url('retail-prices')}" data-toggle="tab">Retail Prices
                              </a>
                           </li>
                           <!-- show data sets -->
                           <li>
                              <a href="" onClick="showDataSources(event);">Data Sources
                              </a>
                           </li>
                           <li>
                              <h4 class="mt-3">Topics</h4>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-8" style="margin-top:25px;" id="listData">
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
   const nextSlide = (event) => {
       const slider = event.parentNode.children[1]
       slider.append(slider.children[0])
   }
   const prevSlide = (event) => {
       const slider = event.parentNode.children[1]
       slider.prepend(slider.children[slider.children.length - 1])
   }
   $.ajax({
       url: "/front_parent_topic",
       method: "get",
       dataType: "JSON",
       processData: false,
       contentType: false,
       cache: false,
       success: function(data) {
           for (var i = 0; i < data.length; i++) {
               $(".sideways").append(`<li class="pointer"><a href="javascript:void(0)" class="pointer" onclick="firstSubTopic(${data[i].id},event)">${data[i].name}</a></li>`);
           }
       }
   });
   
   function firstSubTopic(id,event) {
       //$("#secondSubTopic").empty();
       $('#listData').empty();
       //$("#thirdSubTopic").empty();
       $('#indicatorsList').remove();
       $('a').removeClass('active');
       $(event.target).addClass('active');
       $.ajax({
           url: "/front_get_subtopic/" + id,
           method: "get",
           dataType: "JSON",
           processData: false,
           contentType: false,
           cache: false,
           beforeSend:function(){
               $("#listData").append('<div class="spinner-border"></div>');
           },
           success: function(data) {
               //console.log(data);
               var html = `<div class="wrapper" id="indicatorsList"><button class="prev" type="button" onclick="prevSlide(this)">➤</button>
                                       <div class="slider">
                                           <div class="item"><a onclick="firstSubTopic(${data[0].parent_id})"style="font-size:20px; color: #c60001;" class="pointer underlined">Indicators</a></div>
                                           <div class="item"><a style="font-size:20px; color: #c60001;" class="pointer">Sources</a></div>
                                           <div class="item"><a style="font-size:20px; color: #c60001;" class="pointer">Datasets</a></div>
                                           <div class="item"><a style="font-size:20px; color: #c60001;" class="pointer">Statistics</a></div>
                                           <div class="item"><a style="font-size:20px; color: #c60001;" class="pointer">Infographics</a></div>
                                           <div class="item"><a style="font-size:20px; color: #c60001;" class="pointer">Analytics</a></div>
                                           <div class="item"><a  style="font-size:20px; color: #c60001;" class="pointer">Visuals</a></div>
                                           <div class="item"><a style="font-size:20px; color: #c60001;" class="pointer">Dashboards</a></div>
                                       </div><button class="next" type="button" onclick="nextSlide(this)">➤</button>
                                   </div>`;
               $("#listData").append(`${html}`);
               var html2 = `<div class="row">`;
               for (var i = 0; i < data.length; i++) {
                   html2 += `<div class="col-md-6" style="height:fit-content;">
                                               <a style="font-size:18px;color: blue;">${data[i].name}</a>
                                               <div style="margin-top:10px;margin-left:15px;">${secondSubTopicChild(data[i].id)}</div>
                                           </div>`;
               }
               html2 += `</div>`;
               //console.log(html2);
               $('#listData').append(html2);
               $(".spinner-border").remove();
   
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
               //console.log(data);
               for (var i = 0; i < data.length; i++) {
                   //console.log(thirdSubTopic(data[i].id));
                   console.log(data[i].sub_topic);
                   if (i < 10) {
                       if (data[i].sub_topic.length == 0) {
                           html += `<li style="margin:5px 0px;list-style-type: disclosure-closed;"><a href='data_library/topic?topic=` + data[i].id + `' style='font-size:16px;color: #c60001;'>` + data[i].name + `</a></li>`;
                       }else{
                           html += `<li style="margin:5px 0px;list-style-type: disclosure-closed;"><a href='sub_topic_list?subTopicId=${data[i].sub_topic[0].parent_id}' style='font-size:16px;color: #c60001;'>` + data[i].name + `</a></li>`;
                       }
                   } 
                   // else {
                   //     html += `<li class="hideList" style="margin:5px 0px;list-style-type: disclosure-closed;"><a href='data_library/topic?topic=` + data[i].id + `' style='font-size:16px;color: #c60001;'>` + data[i].name + `</a></li>`;
                   // }
               }
   
           }
       });
       //console.log(html);
       return html += `<a href="sub_topic_list?subTopicId=${id}" class="btn btn-primary">See All</a>`;
   }
</script>
<script>
   var pathUrl = '<?php echo asset('assets/admin_assets/'); ?>';
   var path = '<?php echo asset('assets/'); ?>';
   $(document).ready(function() {
       $(".mySlides").removeAttr("style");
   });
   // if ($(window).width() >= 992) {
   //     $('.world-atlas-header').slick({
   //         autoplay: false,
   //         autoplaySpeed: 1000,
   //         slidesToShow: 4,
   //         slidesToScroll: 1,
   //         arrows: false,
   //         //width:''
   //     });
   // } else {
   //     $('.world-atlas-header').slick({
   //         autoplay: false,
   //         autoplaySpeed: 1000,
   //         slidesToShow: 2,
   //         slidesToScroll: 2,
   //         arrows: false,
   //         //width:''
   //     });
   // }
   $('.world-atlas-header').slick({
       autoplay: true,
       autoplaySpeed: 1000,
       slidesToShow: 4,
       slidesToScroll: 1,
       arrows: false,
       responsive: [
           {
               breakpoint: 768,
               settings: {
                   slidesToShow: 2
               }
           }
       ]
   });
   
   
   $(document).ready(function() {
       //$(".slick-cloned").remove();
       $('.dropdown-submenu a.test').on("click", function(e) {
           $(this).next('ul').toggle();
           e.stopPropagation();
           e.preventDefault();
       });
       $('.clickDataInsight').on("click", function(e) {
           $('.dataInsight').toggle();
       });
       $('.clickDataMap').on("click", function(e) {
           $('.dataMap').toggle();
       });
       $('.clickDataSet').on("click", function(e) {
           $('.dataSet').toggle();
       });
   });
   function showStates(event){
       //alert('states');
       console.log(event);
       event.preventDefault();
       $("#listData").empty();
       $('a').removeClass('active');
       $(event.target).addClass('active');
       //console.log($(ele).parent('li'));
       $.ajax({
           url: 'showStates',
           method: "POST",
           dataType: 'json',
           data: {
               "_token": "{{ csrf_token() }}",
               'data': 1
           },
           success: function(data) {
               $("#allStates").remove();
               var html = `
               <input type="text" class="form-control" id="states" onkeyup="fetchStates();" placeholder="Search for States.." title="Type in a name">
               <div class="row category" id="allStatesData">`;
               for (var i = 0; i < data.length; i++) {
                   html += `<div class="category_box">
                               <div class="icon">
                                   <a href="state?stateId=${data[i].id}">
                                     <img src="${pathUrl}/statesIcons/${data[i].icon}">
                                   </a>
                               </div>
                               <div class="state_name">
                                   <a href="state?stateId=${data[i].id}">${data[i].name}</a>
                               </div>
                           </div>`;
               }
               html += `</div>`;
               $('#listData').append(html);
               //console.log(data);
           }
       });
   }
   function showDistricts(event){
       event.preventDefault();
       //alert('states');
       $("#listData").empty();
       $('a').removeClass('active');
       $(event.target).addClass('active');
       //console.log($(ele).parent('li'));
       $.ajax({
           url: 'showDistricts',
           method: "POST",
           dataType: 'json',
           data: {
               "_token": "{{ csrf_token() }}",
               'data': 1
           },
           success: function(data) {
               $("#allDistricts").remove();
               var html = `
               <input type="text" class="form-control" id="districts" onkeyup="fetchDistricts();" placeholder="Search for Districts.." title="Type in a name">
               <div class="row category" id="allDistrictsData">`;
               for (var i = 0; i < data.length; i++) {
                   html += `<div class="category_box">
                               <div class="icon">
                                   <a href="data_library/district?districtId=${data[i].id}">
                                     <img src="${pathUrl}/districtsIcons/${data[i].icon}">
                                   </a>
                               </div>
                               <div class="district_name">
                                   <a href="#">${data[i].name}</a>
                               </div>
                           </div>`;
               }
               html += `</div>`;
               $('#listData').append(html);
               //console.log(data);
           }
       });
   }
   function showSmartCities(event){  
       event.preventDefault();
       //alert('states');
       $("#listData").empty();
       $('a').removeClass('active');
       $(event.target).addClass('active');
       //console.log($(ele).parent('li'));
       $.ajax({
           url: 'showSmartCities',
           method: "POST",
           dataType: 'json',
           data: {
               "_token": "{{ csrf_token() }}",
               'data': 1
           },
           success: function(data) {
               $("#allSmartCities").remove();
               var html = `
               <input type="text" class="form-control" id="smartCities" onkeyup="fetchSmartCities();" placeholder="Search for Smart Cities.." title="Type in a name">
               <div class="row category" id="allSmartCitiesData">`;
               for (var i = 0; i < data.length; i++) {
                   html += `<div class="category_box">
                               <div class="icon">
                                   <a href="data_library/smart-city?id=${data[i].id}">
                                     <img src="${pathUrl}/smartCitiesIcons/${data[i].icon}">
                                   </a>
                               </div>
                               <div class="smartCity_name">
                                   <a href="data_library/smart-city?id=${data[i].id}">${data[i].name}</a>
                               </div>
                           </div>`;
               }
               html += `</div>`;
               $('#listData').append(html);
               //console.log(data);
           }
       });
   }
   function showBlock(event){  
       event.preventDefault();
       //alert('states');
       $("#listData").empty();
       $('a').removeClass('active');
       $(event.target).addClass('active');
       //console.log($(ele).parent('li'));
       $.ajax({
           url: 'showBlock',
           method: "POST",
           dataType: 'json',
           data: {
               "_token": "{{ csrf_token() }}",
               'data': 1
           },
           success: function(data) {
            console.log(data);
               $("#allBlock").remove();
               var html = `
               <input type="text" id="allBlock" onkeyup="fetchBlock();" placeholder="Search for Block.." title="Type in a name" class="form-control">
               <div class="row category" id="allBlockData">`;
               for (var i = 0; i < data.length; i++) {
                   html += `<div class="category_box">
                               <div class="smartCity_name">
                                   <a href="data_library/block?name=${data[i].block}" class="btn btn-primary">${data[i].block}</a>
                               </div>
                           </div>`;
               }
               html += `</div>`;
               $('#listData').append(html);
               //console.log(data);
           }
       });
   }
   function showDataSources(event){
      event.preventDefault();
      $("#listData").empty();
       $('a').removeClass('active');
       $(event.target).addClass('active');
      $.ajax({
           url: 'showDataSources',
           method: "GET",
           dataType: 'json',
           success: function(data) {
               console.log(data);
               $("#listData").empty();
               var html = `<ul class="list-group">`;
               for (var i = 0; i < data.length; i++) {
                   html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                   <a href="data_library/source?id=${data[i].source}">${data[i].source}</a>
                       <span class="badge badge-primary badge-pill">${data[i].total_source}</span>
                   </li>`;
               }
               html += `</ul>`;
               $('#listData').append(html);
               //console.log(data);
           }
       });
   }
   
   function countryGroup(event){
       event.preventDefault();
       $("#listData").empty();
       $('a').removeClass('active');
       $(event.target).addClass('active');
       $.ajax({
           url: 'country-group-list',
           method: "GET",
           dataType: 'json',
           success: function(data) {
               console.log(data);
               var html = `<div class="all-country with-image-group">
                               <div class="brand-container-wrapper">`;
                               for(var i = 0; i < Object.keys(data).length; i++) {
                                  // alert(data[Object.keys(data)[i]].length);
                                   html += `<div class="brand-block">
                                                   <div class="brand-tag">${Object.keys(data)[i]}</div>
                                                       <ul>`;
                                   for(var j = 0; j < data[Object.keys(data)[i]].length; j++){
                                       html += `<li>
                                                   <a href="" onclick="CountryListGroup(${data[Object.keys(data)[i]][j].id},event)"><img src="${path + '/country_group_icon/'+data[Object.keys(data)[i]][j].icon}" />${data[Object.keys(data)[i]][j].name}</a>
                                               </li>`;
                                   }
                                   html += `</ul></div>`;
                                           
                               }
                               
                           html+= `</div></div>`;
                               
                       $('#listData').append(html)
               //console.log(data);
           }
       });
   }
   function CountryListGroup(id,event){
       event.preventDefault();
       $("#listData").empty();
       $('a').removeClass('active');
       $(event.target).addClass('active');
       $.ajax({
           url: 'country-list-group/'+id,
           method: "GET",
           dataType: 'json',
           success: function(data) {
               console.log(data);
               var html = `<input type="text" class="form-control" id="SearchCountryListGroup" onkeyup="SearchCountryListGroup();" placeholder="Search for Countries.." title="Type in a name" style="width:100%;">
               <ul>`;
               for (var i = 0; i < data.length; i++) {
                   html += `<li style="margin:10px 0px" class="allContryListGroup"><span>${data[i].country_name.charAt(0)}</span><ul style="display:inline-block;margin-left:10px;"><li><a href="data_library/country?country=${data[i].country_name}" _onclick="getCountryTopic(${data[i].country_id},event)">${data[i].country_name}</a></li></ul></li>`;
               }
               html += `</ul>`;
               $('#listData').append(html);
           }
       });
   }
   
   function SearchCountryListGroup(){
       var input, filter, div1, div2, a, i, txtValue;
       input = document.getElementById("SearchCountryListGroup");
       filter = input.value.toUpperCase();
       //alert(filter);die;
       div1 = document.getElementsByClassName("allContryListGroup");
       for (i = 0; i < div1.length; i++) {
           a = div1[i].getElementsByTagName("a")[0];
           txtValue = a.textContent || a.innerText;
           //console.log(txtValue.toUpperCase().indexOf(filter));die;
           if (txtValue.toUpperCase().indexOf(filter) > -1) {
               div1[i].style.display = "";
           } else {
               div1[i].style.display = "none";
           }
       }
   }
   
   function getCountryTopic(id,event){
       event.preventDefault();
       $("#listData").empty();
       $('a').removeClass('active');
       $(event.target).addClass('active');
       $.ajax({
           url: 'get-country-topic/'+id,
           method: "GET",
           dataType: 'json',
           success: function(data) {
               console.log(data);
               // var html = `<input type="text" class="form-control" id="SearchCountryListGroup" onkeyup="SearchCountryListGroup();" placeholder="Search for Countries.." title="Type in a name" style="width:100%;">
               // <ul>`;
               // for (var i = 0; i < data.length; i++) {
               //     html += `<li style="margin:10px 0px" class="allContryListGroup"><span>${data[i].country_name.charAt(0)}</span><ul style="display:inline-block;margin-left:10px;"><li><a href="" onclick="getCountryTopic(${data[i].country_name},event)">${data[i].country_name}</a></li></ul></li>`;
               // }
               // html += `</ul>`;
               // $('#listData').append(html);
           }
       });
   }
   
   
   // filter
   function fetchStates(){
       var input, filter, div1, div2, a, i, txtValue;
       input = document.getElementById("states");
       filter = input.value.toUpperCase();
       //alert(filter);die;
       div1 = document.getElementById("allStatesData");
       div2 = div1.getElementsByClassName("category_box");
       for (i = 0; i < div2.length; i++) {
           a = div2[i].getElementsByTagName("a")[1];
           txtValue = a.textContent || a.innerText;
           //console.log(txtValue.toUpperCase().indexOf(filter));die;
           if (txtValue.toUpperCase().indexOf(filter) > -1) {
               div2[i].style.display = "";
           } else {
               div2[i].style.display = "none";
           }
       }
   }
   function fetchDistricts(){
       var input, filter, div1, div2, a, i, txtValue;
       input = document.getElementById("districts");
       filter = input.value.toUpperCase();
       //alert(filter);die;
       div1 = document.getElementById("allDistrictsData");
       div2 = div1.getElementsByClassName("category_box");
       for (i = 0; i < div2.length; i++) {
           a = div2[i].getElementsByTagName("a")[1];
           txtValue = a.textContent || a.innerText;
           //console.log(txtValue.toUpperCase().indexOf(filter));die;
           if (txtValue.toUpperCase().indexOf(filter) > -1) {
               div2[i].style.display = "";
           } else {
               div2[i].style.display = "none";
           }
       }
   }
   function fetchSmartCities(){
       var input, filter, div1, div2, a, i, txtValue;
       input = document.getElementById("smartCities");
       filter = input.value.toUpperCase();
       //alert(filter);die;
       div1 = document.getElementById("allSmartCitiesData");
       div2 = div1.getElementsByClassName("category_box");
       for (i = 0; i < div2.length; i++) {
           a = div2[i].getElementsByTagName("a")[1];
           txtValue = a.textContent || a.innerText;
           //console.log(txtValue.toUpperCase().indexOf(filter));die;
           if (txtValue.toUpperCase().indexOf(filter) > -1) {
               div2[i].style.display = "";
           } else {
               div2[i].style.display = "none";
           }
       }
   }
   function fetchBlock(){
       var input, filter, div1, div2, a, i, txtValue;
       input = document.getElementById("allBlock");
       filter = input.value.toUpperCase();
       //alert(filter);die;
       div1 = document.getElementById("allBlockData");
       div2 = div1.getElementsByClassName("category_box");
       for (i = 0; i < div2.length; i++) {
           a = div2[i].getElementsByTagName("a")[1];
           txtValue = a.textContent || a.innerText;
           //console.log(txtValue.toUpperCase().indexOf(filter));die;
           if (txtValue.toUpperCase().indexOf(filter) > -1) {
               div2[i].style.display = "";
           } else {
               div2[i].style.display = "none";
           }
       }
   }
   
</script>