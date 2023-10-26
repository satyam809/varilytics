<style>
    .categories_top {
        display: block;
        clear: both;
        text-align: left;
        border: 1px solid #ccc;
        padding: 5px;
        font-size: 14px;
    }

    .categories_top>.rotate_text {
        display: inline-block;
        position: relative;
        font-weight: 700;
        margin-left: -60px;
        margin-right: -57px;
        padding: 3px 0px 3px 0px;
        width: 136px;
        background: #000;
        color: #fff;
        text-align: center;
        vertical-align: middle;
        text-transform: uppercase;
        transform: rotate(-90deg);
        -webkit-transform: rotate(-90deg);
    }

    .categories_top_left {
        display: inline-block;
        position: relative;
        width: 14%;
        _min-height: 100px;
        border-right: 1px solid #ccc;
        text-align: center;
        vertical-align: middle;
        margin-right: 1%;
        padding-right: 1%;
        box-sizing: border-box;
    }

    .categories_top_left>.image {
        display: block;
        width: 50px;
        height: 55px;
        margin: 0px auto;
        clear: both;
    }

    .categories_top_left>.image img {
        width: 100%;
        transition: all .5s;
        -webkit-transition: all .5s;
        margin-top: 5px;
    }

    .categories_top_left>span {
        display: block;
        clear: both;
        font-weight: 700;
        font-size: 14px;
        margin: 10px 0px 10px 0px;
        line-height: 15px;
    }

    .categories_top_right {
        display: inline-block;
        width: 81%;
        text-align: left;
        vertical-align: middle;
        padding: 0px 10px 0px 10px;
        font-size: 14px;
    }

    .categories_top_right a {
        border-right: 1px solid #ccc;
        padding-right: 5px;
        margin-right: 7px;
        line-height: 25px;
    }

    @media (max-width: 767px) {
        .categories_top>.rotate_text {
            display: block;
            margin: 0px;
            margin-bottom: 20px;
            width: auto;
            padding: 2px 5px 2px 5px;
            transform: rotate(0deg);
        }
    }

    @media (max-width: 767px) {
        .categories_top_left {
            display: block;
            width: 100%;
            border: 0px;
            margin-right: 0%;
        }
    }

    @media (max-width: 767px) {
        .categories_top_right {
            display: block;
            width: 100%;
        }
    }
</style>
<style>
    th {
        _min-width: 88px;
    }

    .table tr td,
    .table tr th {
        padding: 5px 5px;
    }
</style>
<div class="container" style="margin-top: 150px;margin-bottom: 50px">
    <div class="categories_top">

        <div class="rotate_text">STATE</div>
        <a href="data_library/state?id={{ $_GET['stateId']}}">
            <div class="categories_top_left">
                <div class="image">
                    <img src="{{ asset('assets/admin_assets/statesIcons/') }}/{{ $state->icon }}">
                </div>
                <span>{{ $state->name }}</span>
            </div>
        </a>

        <div class="categories_top_right">
            <?php foreach ($allStates as $key => $value) { ?>
                <a href="state?stateId={{$value->id}}" class="">{{ $value->name}} </a>
            <?php } ?>
        </div>
    </div>
    <div class="categories_top" style="margin-top:60px;">

        <div class="rotate_text">DISTRICT</div>
        <a href="">
            <div class="categories_top_left">
                <span>Select District</span>
            </div>
        </a>
        <div class="categories_top_right">
            <?php foreach ($district as $key => $value) { ?>
                <a href="data_library/district?id={{$value->id}}" class="">{{ $value->name}} </a>
            <?php } ?>
        </div>
    </div>
</div>
