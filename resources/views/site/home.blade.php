@extends('site.default')

@section('css')

<style type="text/css">
	.slider-wrapper{
		background-image: url("{{ asset("/site/assets/images/1.jpg") }}");
	}

    .destination{
        background-image: url("{{ asset("/site/assets/images/7.jpg") }}");
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
                        <li class="active"><a href="#tab1default" data-toggle="tab"><i class="flaticon-paper-plane"></i>Tour</a></li>
                        <li><a href="#tab2default" data-toggle="tab"> <i class="flaticon-cabin"></i>Hotel</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            <div class="row">
                                <div class="col-xs-12 col-sm-9 col-md-10">
                                    <div class="row panel-margin">
                                        <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                            <label>Arrival</label>
                                            <div class="icon-addon">
                                                <input type="text" placeholder="Date" class="form-control" id="datepicker1"/>
                                                <label class="glyphicon fa fa-calendar"  title="email"></label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                            <label>Going</label>
                                            <div class="icon-addon">
                                                <input type="text" placeholder="Date" class="form-control" id="datepicker2"/>
                                                <label class="glyphicon fa fa-calendar"  title="email"></label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                            <label>Room</label>
                                            <!-- filters select -->
                                            <div class="select-filters">
                                                <select name="room" id="room">
                                                    <option value="" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                            <label>Person</label>
                                            <!-- filters select -->
                                            <div class="select-filters">
                                                <select name="person" id="person">
                                                    <option value="" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                            <label>Child</label>
                                            <!-- filters select -->
                                            <div class="select-filters">
                                                <select name="child" id="child">
                                                    <option value="" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                            <label>Day</label>
                                            <!-- filters select -->
                                            <div class="select-filters">
                                                <select name="day" id="day">
                                                    <option value="" selected="">1 days</option>
                                                    <option value="2">2 days</option>
                                                    <option value="3">3 days</option>
                                                    <option value="4">4 days</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2">
                                    <button type="button" class="thm-btn">Search book</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <div class="row">
                                <div class="col-xs-12 col-sm-9 col-md-10">
                                    <div class="row panel-margin">
                                        <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                            <label>Arrival</label>
                                            <div class="icon-addon">
                                                <input type="text" placeholder="Date" class="form-control" id="datepicker3"/>
                                                <label class="glyphicon fa fa-calendar"  title="email"></label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                            <label>Going</label>
                                            <div class="icon-addon">
                                                <input type="text" placeholder="Date" class="form-control" id="datepicker4"/>
                                                <label class="glyphicon fa fa-calendar"  title="email"></label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                            <label>Room</label>
                                            <!-- filters select -->
                                            <div class="select-filters">
                                                <select name="room" id="room2">
                                                    <option value="" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                            <label>Person</label>
                                            <!-- filters select -->
                                            <div class="select-filters">
                                                <select name="person" id="person2">
                                                    <option value="" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                            <label>Child</label>
                                            <!-- filters select -->
                                            <div class="select-filters">
                                                <select name="child" id="child2">
                                                    <option value="" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                            <label>Day</label>
                                            <!-- filters select -->
                                            <div class="select-filters">
                                                <select name="day" id="day2">
                                                    <option value="" selected="">1 days</option>
                                                    <option value="2">2 days</option>
                                                    <option value="3">3 days</option>
                                                    <option value="4">4 days</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2">
                                    <button type="button" class="thm-btn">Search book</button>
                                </div>
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
                    <h2>Popular Packages</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @foreach($packages as $package)
                <div class="col-md-6">
                    <div class="hotel-item">
                        <div class="hotel-image">
                            <a href="javascript:void(0)">
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
                            <div class="hotel-person">from 
                                <span class="color-blue">${{ $package->prices->price }}</span> person
                            </div>
                            <a class="thm-btn" href="javascript:void(0)">Details</a>
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
                    <h2>Recommended Hotels</h2>
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
                            <a href="javascript:void(0)">
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
                    <h2>Famous Places</h2>
                    <p>This is Amazing Travel Agency !</p>
                </div>
            </div>
        </div>
        <div class="row thm-margin">
        	@foreach($famousPlaces as $famousPlace)
	            <div class="col-md-3 col-sm-4 thm-padding">
	                <div class="destination-grid">
	                    <a href="javascript:void(0)">
				            @if($famousPlace->image != null)
			                    <img style="height: 250px" class="img-responsive" src="<?php echo asset("storage/famous_places/".$famousPlace->image); ?>" title="{{ $famousPlace->title }}"> 
			                @else
			                    <img style="height: 250px" class="img-responsive" src="<?php echo asset("storage/famous_places/default.png"); ?>"> 
			                @endif
	                    </a>
	                    <div class="mask">
	                        <h2>Egypt</h2>
	                        <p><?php echo strip_tags($famousPlace->description); ?></p>
	                    </div>
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
	                                	<a href="javascript:void(0)">
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
                                		<a href="javascript:void(0)">
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
                                	<a href="javascript:void(0)">
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
                        	<a href="javascript:void(0)">
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
<!--                         webSetting[0]->footer_text -->
                        Copyrights © 2018-19 <a href="javascript:void(0)">Egypt Travel</a>&nbsp;-&nbsp;All rights reserved 
                    </p>
                </div>
                <div class="col-sm-8">
                    <div class="footer-menu">
                        <ul>
                        	@foreach($pages as $page)
                            <li>
                            	<a href="javascript:void(0)">{{ $page->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
