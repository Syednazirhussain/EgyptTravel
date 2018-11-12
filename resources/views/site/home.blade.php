@extends('site.default')

@section('css')

<style type="text/css">
	.slider-wrapper{
		background-image: url("{{ asset("/site/assets/images/4.jpg") }}");
	}

    .destination{
        background-image: url("{{ asset("/site/assets/images/1.jpg") }}");
    }

    .social_link a{
        color: #898989;
        font-size: 13px;
    }
    .social_link a:hover{
        color: #fec107;
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

<!-- /.nav end -->
<div class="slider-wrapper">
    <div class="responisve-container">
        <div class="slider">
            <div class="fs_loader"></div>
            <div class="slide">
                <p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top" data-ease-in="easeOutBounce">Welcome to </p>
                <p class="slider-titele" data-position="210,0" data-in="left"  data-step="2" style="margin-left: -115px;" data-delay="100">
                    {{ $webSetting[0]->title }}
                </p>
                <p class="slider-text" data-position="270,100" style="margin-left: 250px !important;" data-in="bottom" data-out="right" data-step="2" data-delay="1000">
                    {{ $webSetting[0]->sub_title }}
                </p>
            </div>
            <div class="slide">
                <p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top">Welcome to </p>
                <p class="slider-titele" data-position="210,0" data-in="bottom" style="margin-left: -115px;" data-step="2" data-delay="100">
                    {{ $webSetting[0]->title }}
                </p>
                <p class="slider-text" data-position="270,100" style="margin-left: 250px !important;" data-in="bottom" data-out="right" data-step="2" data-delay="1000">
                    {{ $webSetting[0]->sub_title }}  
                </p>
            </div>
        </div>
    </div>
</div>
<!-- booking -->
<div class="container boking-inner">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tour" data-toggle="tab">
                                <i class="flaticon-paper-plane"></i>Tour
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tour">
                            <div class="row">
                                <form action="{{ route('site.package.main.search') }}" method="POST" id="main_search">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-xs-12 col-sm-9 col-md-10">
                                        <div class="row panel-margin">
                                            <div class="col-xs-6 col-sm-4 col-md-4 panel-padding">
                                                <label>Search</label>
                                                <input type="text" name="search" class="form-control" placeholder="Search" style="height: 42px">
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                                <label>All Prices</label>
                                                <div class="select-filters">
                                                    <select name="price" id="s_price">
                                                        <option value="0">Price</option>
                                                        <option value="100-200">100 to 200</option>
                                                        <option value="200-400">200 to 400</option>
                                                        <option value="400-600">400 to 600</option>
                                                        <option value="600-800">600 to 800</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                                <label>Months</label>
                                                <div class="select-filters">
                                                    <select name="month" id="month">
                                                        <option value="0">Month</option>   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                                <label>Duration</label>
                                                <div class="select-filters">
                                                    <select name="duration" id="duration">
                                                        <option value="0">Duration</option>
                                                        <option value="1-7">Less than 7 nights</option>
                                                        <option value="8-12">8 to 12 nights</option>
                                                        <option value="12-above">More than 12 nights</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                                <label>Categorys</label>
                                                <div class="select-filters">
                                                    <select name="category_id" id="category_id">
                                                        <option value="0">Category</option>
                                                        @if(isset($categorys))
                                                            @foreach($categorys as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-2">
                                        <button type="button" id="search" class="thm-btn">Search</button>
                                        <button type="button" class="btn btn-default btn-sm m-t-3" id="refresh" style="height: 45px;width: 40px"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recommended Packages -->
<section class="hotel-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="title">
                    <h2 id="popular_package">Popular Egypt Tour Packages</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @foreach($packages as $package)
                <div class="col-md-6">
                    <div class="hotel-item">
                        <div class="hotel-image">
                            <a href="{{ route('site.popular_package.detail',[$package->id]) }}">
                                <div class="img">
                                    @if($package->feature_image != null)
                                        <img style="height: 200px" class="img-responsive" src="<?php echo asset("storage/packages/".$package->feature_image); ?>"> 
                                    @else
                                        <img style="height: 200px" class="img-responsive" src="<?php echo asset("storage/packages/default.png"); ?>"> 
                                    @endif
                                </div>
                            </a>
                        </div>
                        <div class="hotel-body">
                            <h3>{{ $package->title }}</h3>
                            <p>
                                <span>Covering Sight</span>&#58;
                                <span>{{ $package->covering_sight }}</span>
                                <p>
                                    @if(isset($package->prices->title))
                                        {{ $package->prices->title }}
                                    @else
                                        {{ App\Models\Price::find($package->price_id)->title }}
                                    @endif
                                </p>
                            </p>
                            <p>
                                <span>From&nbsp;{{ $package->day }}&nbsp;days&nbsp;To&nbsp;{{ $package->night }}&nbsp;nights</span>
                            </p>
                            <div class="free-service">
                                <i class="fa fa-plane" data-toggle="tooltip" data-placement="top" title="" data-original-title="Flights"></i>
                                <i class="fa fa-bed" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hotels"></i>
                                <i class="fa fa-camera" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sightseeing"></i>
                                <i class="fa fa-exchange" data-toggle="tooltip" data-placement="top" title="" data-original-title="Transfer"></i>
                                <i class="fa fa-cc-visa" data-toggle="tooltip" data-placement="top" title="" data-original-title="Visa"></i>
                                <i class="fa fa-cutlery" data-toggle="tooltip" data-placement="top" title="" data-original-title="Meals"></i>
                            </div>
                        </div>
                        <div class="hotel-right"> 
                            <div class="hotel-person">from 
                                <span class="color-blue">
                                    @if(isset($package->prices->price))
                                        ${{ round($package->prices->price,0) }}                                    
                                    @else
                                        ${{ round(App\Models\Price::find($package->price_id)->first()->price,0) }}
                                    @endif
                                </span> per person
                            </div>
                            <a class="thm-btn" href="{{ route('site.popular_package.detail',[$package->id]) }}">Details</a>
                        </div>                         
                    </div>
                </div>                    
                @endforeach
            </div>  
        </div>
    </div>
</section>

<!-- hotel -->
<section class="hotel-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="title">
                    <h2>Recommended Hotels In Egypt</h2>
                    <p>This is Amazing hotel in Egypt !</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
        	@foreach($accomodations as $accomodation)
	            <div class="col-md-6">
	                <div class="hotel-item">
                        <div class="hotel-image">
                            <a href="{{ $accomodation->url_link }}" target="_blank">
                                <div class="img">
                                    @if(isset($accomodationImage[$accomodation->id]))
                                        @if($accomodationImage[$accomodation->id] != null)
                                            <img style="height: 200px" class="img-responsive" src="<?php echo asset("storage/accomodations/".$accomodationImage[$accomodation->id]); ?>"> 
                                        @else
                                            <img style="height: 200px" class="img-responsive" src="<?php echo asset("storage/accomodations/default.png"); ?>"> 
                                        @endif
                                    @endif 
                                </div>
                            </a>
                        </div>
                        <div class="hotel-body">
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h3>{{ $accomodation->name }}</h3>
                            <!-- Text Intro -->
                            <p>
                                <?php echo substr($accomodation->address, 0, 40) . '...'; ?>
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
                            <a class="thm-btn" href="{{ $accomodation->url_link }}" target="_blank">Details</a>
                        </div>
	                </div>
	            </div>
            @endforeach
            </div>
        </div>
    </div>
</section>

<!-- service -->
<section class="service-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="title">
                    <h2>Our Service</h2>
                    <p>This is Amazing Travel Agency !</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-3 inner-box">
                    <article>
                        <div class="icon"><span class="flaticon-placeholder"></span></div>
                        <div class="content-text">
                            <h5>Diverse Destination</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                    </article>
                </div>
                <div class="col-sm-3 inner-box">
                    <article>
                        <div class="icon"><span class="flaticon-map"></span></div>
                        <div class="content-text">
                            <h5>Fast Booking</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                    </article>
                </div>
                <div class="col-sm-3 inner-box">
                    <article>
                        <div class="icon"><span class="flaticon-lemonade"></span></div>
                        <div class="content-text">
                            <h5>Drinks Included</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                    </article>
                </div>
                <div class="col-sm-3 inner-box">
                    <article>
                        <div class="icon"><span class="flaticon-party"></span></div>
                        <div class="content-text">
                            <h5>After Partys</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Famous Places -->
<section class="destination">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="title">
                    <h2>Egypt Famous Places</h2>
                    <p>This is Amazing Travel Agency !</p>
                </div>
            </div>
        </div>
        <div class="row thm-margin">
        	@foreach($famousPlaces as $famousPlace)
	            <div class="col-md-3 col-sm-4 thm-padding">
	                <div class="destination-grid">
	                    <a href="{{ route('site.famous_place.detail',[$famousPlace->id]) }}">
				            @if($famousPlace->image != null)
			                    <img style="height: 250px" class="img-responsive" src="<?php echo asset("storage/famous_places/".$famousPlace->image); ?>" title="{{ $famousPlace->title }}"> 
			                @else
			                    <img style="height: 250px" class="img-responsive" src="<?php echo asset("storage/famous_places/default.png"); ?>"> 
			                @endif
	                    </a>
	                    <a class="mask" href="{{ route('site.famous_place.detail',[$famousPlace->id]) }}">
	                        <h2>Egypt</h2>
                            <p>
                                <?php 
                                    $desc =  strip_tags($famousPlace->description);
                                    echo substr($desc,0,100)."..."; 
                                ?>
                            </p>
	                    </a>
	                    <div class="dest-name">
	                        <h5>{{ $famousPlace->title }} </h5>
	                        <h4>Egypt</h4>
	                    </div>
	                    <div class="dest-icon">
	                        <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
	                        <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
	                        <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
	                        <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
	                    </div>
	                </div>
	            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Counter -->
<section class="counter-inner" style='background-image: url("{{ asset("/site/assets/images/counter.jpg") }}")'>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="count-content">
                    <div class="count-icon">
                        <i class="flaticon-earth-globe"></i>
                    </div>
                    <div class="count">
                        <h1 class="count-number">348</h1>
                        <div class="count-text">Destinations</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="count-content">
                    <div class="count-icon">
                        <i class="flaticon-cabin"></i>
                    </div>
                    <div class="count">
                        <h1 class="count-number">89</h1>
                        <div class="count-text">Hotels</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="count-content">
                    <div class="count-icon">
                        <i class="flaticon-photographer-with-cap-and-glasses"></i>
                    </div>
                    <div class="count">
                        <h1 class="count-number">987</h1>
                        <div class="count-text">Tourists</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="count-content">
                    <div class="count-icon">
                        <i class="flaticon-airplane-flight-in-circle-around-earth"></i>
                    </div>
                    <div class="count">
                        <h1 class="count-number">891</h1>
                        <div class="count-text">Tour</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')

<script type="text/javascript">

    var price = "@if(isset($search['price'])){{ $search['price'] }}@endif";

    if(price != '')
    {
        $('#s_price option[value='+price+']').attr('selected','selected');
    }

    $('#refresh').hide();

    var url = window.location.href; 
    urlArray = url.split("/");
    console.log(urlArray);
    var lastUrlString = urlArray[urlArray.length-1];

    if(lastUrlString == 'search')
    {
        $('#popular_package').text('');
        $('#popular_package').text('Search result...');
        $('#refresh').show();
    }

    $('#search').on('click',function(){
        $('#main_search').submit();
    });

    $('#refresh').on('click',function(){
        window.location.href = "{{ route('public.site') }}";
    });


    var s_month = "@if(isset($search['month'])){{ $search['month'] }}@endif";
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];    
    var month = (new Date()).getMonth();

    if(s_month != 0)
    {
        var search = s_month-1;

        for (; month < monthNames.length; month++) 
        {
            if(search == month)
            {
                $('#month').append('<option value='+(month+1)+' selected>' + monthNames[month] + '</option>');
            }
            else
            {
                $('#month').append('<option value='+(month+1)+'>' + monthNames[month] + '</option>'); 
            }
        }
    }
    else
    {
        for (; month < monthNames.length; month++) 
        {
            $('#month').append('<option value='+(month+1)+'>' + monthNames[month] + '</option>');
        }
    }

    var duration = "@if(isset($search['duration'])){{ $search['duration'] }}@endif";

    if(duration != '')
    {
        $('#duration option[value='+duration+']').attr('selected','selected');
    }

    var category_id = "@if(isset($search['category_id'])){{ $search['category_id'] }}@endif";

    if(category_id != '')
    {
        $('#category_id option[value='+category_id+']').attr('selected','selected');
    }



</script>

@endsection


