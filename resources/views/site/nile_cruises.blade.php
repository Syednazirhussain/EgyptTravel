@extends('site.default')


@section('css')

<style type="text/css">

    .social_link a{
        color: #898989;
        font-size: 13px;
    }
    .social_link a:hover{
        color: #fec107;
    }

    .pagination>li.active>span{
        background-color: #fec107;
        border: none;
    }
    
</style>

@endsection


@section('logo')
<a class="navbar-brand" href="{{ route('public.site') }}">
    @if($webSetting[0]->logo != null)
        <img class="img-resposive" style="margin-top: -30px; min-height: 50px; max-height: 100px; min-width: 120px; max-width: 180px" src="{{ asset('storage/setting/'.$webSetting[0]->logo ) }}" title="{{ $webSetting[0]->title}}" />
    @else
        <img class="img-resposive" style="margin-top: -30px; min-height: 50px; max-height: 100px; min-width: 120px; max-width: 180px" src="{{ asset('storage/packages/default.png') }}" title="{{ $webSetting[0]->title}}"/>
    @endif
</a>
@endsection


@section('content')

<!-- page header -->
<section class="header" style='background-image: url("{{ asset("/site/assets/images/1.jpg") }}");'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Nile Cruises</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since </p>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Nile Cruises</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hotel -->
<section class="tour-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="tools-ber">
                    <div class="row">

                        <div class="col-sm-3 col-md-3 hidden-xs">
                            <form action="{{ route('site.nile_curises') }}" id="searchForm" method="GET">
                                <div class="input-group custom-search">
                                    <input type="text" class="form-control" name="search" id="search" placeholder="Search" value="@if(isset($search['search'])){{ $search['search']}}@endif" />
                                    <span class="input-group-btn">
                                        <button class="btn hotel-search" type="button">
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <div class="select-filters">
                                <form action="{{ route('site.nile_curises') }}" method="GET" id="searchByPrice">
                                    <select name="price" id="sort_price">
                                        <option value="0">All Prices</option>
                                        <option value="100-200">100 to 200</option>
                                        <option value="200-400">200 to 400</option>
                                        <option value="400-600">400 to 600</option>
                                        <option value="600-800">600 to 800</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <div class="select-filters">
                                <form action="{{ route('site.nile_curises') }}" method="GET" id="searchByMonth">
                                    <select name="month" id="sort_month">
                                        <option value="0">Month Of Travel</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <div class="select-filters">
                                <form action="{{ route('site.nile_curises') }}" method="GET" id="searchByNight">
                                    <select name="night" id="sort_night">
                                        <option value="0">Duration</option>
                                        <option value="1-7">Less than 7 nights</option>
                                        <option value="8-12">8 to 12 nights</option>
                                        <option value="12-above">More than 12 nights</option>
                                    </select>
                                </form>
                            </div>
                        </div>

<!--                         <div class="col-sm-3 col-md-5 hidden-xs text-right">
                            <a class="filters-btn collapse" data-toggle="collapse" href="#collapseMap"  onclick="init();"><i class="flaticon-earth-globe"></i></a>
                            <a href="javascript:void(0)" class="filters-btn"><i class="flaticon-squares-gallery-grid-layout-interface-symbol"></i></a>
                            <a href="javascript:void(0)" class="filters-btn"><i class="flaticon-bulleted-list"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- collapse map -->
<!--             <div class="col-sm-12">
                <div class="collapse" id="collapseMap">
                    <div id="map"></div>
                </div>
            </div> -->

            @if(isset($search))
            <div class="col-sm-12 col-md-12" id="searchBy">
                @if(isset($search['search']))
                    <h5 class="m-t-0 p-t-0" ><em>Search By&nbsp;:</em> {{ $search['search'] }}</h5>
                @elseif(isset($search['price']))
                    <h5 class="m-t-0 p-t-0" ><em>Search By&nbsp;:</em> {{ $search['price'] }}</h5>
                @elseif(isset($search['month']))
                    <h5 class="m-t-0 p-t-0" ><em>Search By&nbsp;:</em> {{ $search['month'] }}</h5>
                @endif
            </div>
            @endif
            
            <div class="col-sm-12 col-md-12">
                <div class="hotel-list-content">
                    @foreach($packages as $package)
                        <div class="hotel-item">
                            <div class="hotel-image">
                                <a href="javascript:void(0)">
                                    <div class="img">
                                        @if($package->feature_image != null)
                                            <img style="height: 200px; width: 400px" class="img-responsive" src="<?php echo asset("storage/packages/".$package->feature_image); ?>"> 
                                        @else
                                            <img style="height: 200px; width: 400px" class="img-responsive" src="<?php echo asset("storage/packages/default.png"); ?>"> 
                                        @endif 
                                    </div>
                                </a>
                            </div>
                            <div class="hotel-body">
                                <h3>{{ $package->title }}</h3>
                                <p>
                                    <span>Covering Sight</span>&#58;
                                    <span>{{ $package->covering_sight }}</span>
                                    <p>{{ $package->prices->title }}</p>
                                </p>
                                <p>
                                    <span>From&nbsp;{{ $package->day }}&nbsp;days&nbsp;To&nbsp;{{ $package->night }}&nbsp;nights</span>
                                </p>
                                <div class="free-service">
                                    <i class="flaticon-television" data-toggle="tooltip" data-placement="top" title="" data-original-title="Plasma TV with cable chanels"></i>
                                    <i class="flaticon-swimmer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Swimming pool"></i>
                                    <i class="flaticon-wifi" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free wifi"></i>
                                    <i class="flaticon-weightlifting" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fitness center"></i>
                                    <i class="flaticon-lemonade" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant"></i>
                                </div>
                            </div>
                            <div class="hotel-right"> 
                                <div class="hotel-person">from <span class="color-blue">$273</span></div>
                                <a class="thm-btn" href="javascript:void(0)">Details</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $packages->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')

<!-- Footer Section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="footer-box address-inner">
                    <p>{{ $webSetting[0]->footer_text }}</p>
                    <div class="address">
                        <i class="fa fa-twitter"></i>
                        <p class="social_link">
                            <a href="{{ $webSetting[0]->twitter_link }}">Twitter</a>
                        </p>
                    </div>
                    <div class="address">
                        <i class="fa fa-facebook"></i>
                        <p class="social_link">
                            <a href="{{ $webSetting[0]->facebook_link }}">Facebook</a>
                        </p>
                    </div>
                    <div class="address">
                        <i class="fa fa-instagram"></i>
                        <p class="social_link">
                            <a href="{{ $webSetting[0]->instagram_link }}">Instagram</a>
                        </p>
                    </div>
                    <div class="address">
                        <i class="fa fa-google-plus"></i>
                        <p class="social_link">
                            <a href="{{ $webSetting[0]->google_plus_link }}">admin@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-6">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-box">
                            <h4 class="footer-title">Packages</h4>
                            <ul class="categoty">
                                @foreach($packages as $package)
                                    <li>
                                        <a href="{{ route('site.popular_package.detail',[$package->id]) }}">
                                            {{ $package->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-box">
                            <h4 class="footer-title">Hotels</h4>
                            <ul class="categoty">
                                @foreach($accomodations as $accomodation)
                                    <li>
                                        <a href="{{ $accomodation->url_link }}">
                                            {{ $accomodation->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-box">
                            <h4 class="footer-title">Famous Places</h4>
                            <ul class="categoty">
                            @foreach($famousPlaces as $famousPlace)
                                <li>
                                    <a href="{{ route('site.famous_place.detail',[$famousPlace->id]) }}">
                                        {{ $famousPlace->title }} 
                                    </a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 hidden-sm">
                <div class="footer-box">
                    <h4 class="footer-title">Gallery</h4>
                    <ul class="gallery-list">
                        @foreach($famousPlaces as $famousPlace)
                        <li> 
                            <a href="{{ route('site.famous_place.detail',[$famousPlace->id]) }}">
                                @if($famousPlace->image != null)
                                    <img style="height: 85px;max-width: 85px" src="<?php echo asset("storage/famous_places/".$famousPlace->image); ?>" title="{{ $famousPlace->title }}"> 
                                @else
                                    <img style="height: 85px;max-width: 85px" src="<?php echo asset("storage/famous_places/default.png"); ?>"> 
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <p> 
                        Copyrights © 2018-19 <a href="{{ route('public.site') }}">Egypt Travel</a>&nbsp;-&nbsp;All rights reserved 
                    </p>
                </div>
                <div class="col-sm-8">
                    <div class="footer-menu">
                        <ul>
                            @foreach($pages as $page)
                                @if($page->code == 'about')
                                    <li>
                                        <a href="{{ route('site.page',['about']) }}">{{ $page->name }}</a>
                                    </li>
                                @elseif($page->code == 'travel-help')
                                    <li>
                                        <a href="{{ route('site.page',['travel-help']) }}">{{ $page->name }}</a>
                                    </li>
                                @elseif($page->code == 'travel-planner')
                                    <li>
                                        <a href="{{ route('site.page',['travel-planner']) }}">{{ $page->name }}</a>
                                    </li>
                                @elseif($page->code == 'travel-tip')
                                    <li>
                                        <a href="{{ route('site.page',['travel-tip']) }}">{{ $page->name }}</a>
                                    </li>
                                @elseif($page->code == 'privacy-policy')
                                    <li>
                                        <a href="{{ route('site.page',['privacy-policy']) }}">{{ $page->name }}</a>
                                    </li>
                                @elseif($page->code == 'term-n-condition')
                                    <li>
                                        <a href="{{ route('site.page',['term-n-condition']) }}">{{ $page->name }}</a>
                                    </li>
                                @elseif($page->code == 'faq')
                                    <li>
                                        <a href="{{ route('site.page',['faq']) }}">{{ $page->name }}</a>
                                    </li>
                                @elseif($page->code == 'contact')
                                    <li>
                                        <a href="{{ route('site.page',['contact']) }}">{{ $page->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection

@section('js')

<script type="text/javascript">

    $('#sort_price').on('change', function() {
        $('#searchByPrice').submit();
    });

    $('#sort_month').on('change', function() {
        if($(this).val() != 0)
        {
            $('#searchByMonth').submit();
        }
    });

    $('#sort_night').on('change', function() {
        if($(this).val() != 0)
        {
            $('#searchByNight').submit();
        }
    });

    $('#search').bind("enterKey",function(e){
        
        $('#searchForm').submit();
    });

    $('#search').keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });

    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var month = (new Date()).getMonth();
    for (; month < monthNames.length; month++) 
    {
        $('#sort_month').append('<option value='+(month+1)+'>' + monthNames[month] + '</option>');
    }


</script>

@endsection