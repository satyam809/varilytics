<!-- Data Banner -->
<div class="image-banner"> <img src="assets/images/hero/infographic-banner.jpg">
    <div class="image-content">
        <h2>Infographics</h2>
    </div>
</div>

<!-- Topics -->
<div class="info-topics section-padding">
    <div class="container">
        <h3>Current Topics ></h3>
        <ul data-aos="fade-right" data-aos-delay="500">
            <?php foreach ($currentTopic as $data) { ?>
                <li><a href="javascript:void(0);" onclick="filterInfographics({{ $data->id }})">{{ $data->name }} </a></li>
            <?php } ?>
        </ul>
        <br>
        <br>
        <h3>Industries ></h3>
        <ul data-aos="fade-right" data-aos-delay="500">
            <?php foreach ($industries as $data) { ?>
                <li><a href="javascript:void(0);"  onclick="filterInfographics({{ $data->id }})">{{ $data->name }}</a></li>
            <?php } ?>
        </ul>
    </div>
</div>

<!-- Infographic Images -->
<div class="infographic-images section-padding pt-0">
    <div class="container">
        <div class="row" data-aos="fade-right" data-aos-delay="500" id="filterInfographics">
            <?php foreach ($infographics as $data) { ?>
                <div class="col-md-4">
                    <a href="{{ asset('assets/admin_assets/infographics/pdf/')}}{{'/'}}{{ $data->pdf }}" target="_blank"><img src="{{ asset('assets/admin_assets/infographics/images/')}}{{'/'}}{{ $data->image }}"></a>
                </div>
            <?php } ?>
            <!-- <div class="col-md-4"> <img src="assets/images/hero/infographic2.jpg"> </div>
            <div class="col-md-4"> <img src="assets/images/hero/infographic3.jpg"> </div>
            <div class="col-md-4"> <img src="assets/images/hero/infographic4.jpg"> </div>
            <div class="col-md-4"> <img src="assets/images/hero/infographic5.png"> </div>
            <div class="col-md-4"> <img src="assets/images/hero/infographic6.png"> </div>
            <div class="col-md-4"> <img src="assets/images/hero/infographic7.png"> </div> -->
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
                                    <div class="cta-call"> <span><i class="mdi mdi-phone"></i></span> (+91) 98 1234 5678</div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                    <div class="cta-call"> <span><i class="mdi mdi-web"></i></span>  <a href="mailto:support@varistats.com">
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
    var path = '<?php echo url('/'); ?>';
    function filterInfographics(id) {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: "POST",
            url: "{{url('/filterInfographics')}}",
            dataType: "json",
            cache: false,
            data: {
                "id": id,
                "_token": token,
            },
            success: function(data) {
                //console.log(data[0].image);
                var filterData='';
                for(var i = 0; i< data.length; i++){
                  filterData += `<div class="col-md-4">
                    <a href="${path}/assets/admin_assets/infographics/pdf/${data[i].pdf}" target="_blank"><img src="${path}/assets/admin_assets/infographics/images/${data[i].image}"></a>
                </div>`;
                }
                $('#filterInfographics div').remove();
                $('#filterInfographics').append(filterData);

            }
        });
    }
</script>