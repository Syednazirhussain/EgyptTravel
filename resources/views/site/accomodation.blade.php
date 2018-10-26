@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-4{
		background-image: url("{{ asset("/site/assets/images/1.jpg") }}");
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
<section class="header header-bg-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Accomodations</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since </p>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Accomodations List</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hotel -->
<section class="hotel-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="tools-ber">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 hidden-xs">
                            <div class="input-group custom-search">
                                <input type="text" class="form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn hotel-search" type="button">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <!-- filters select -->
                            <div class="select-filters">
                                <select name="sort_price" id="sort-price">
                                    <option value="" selected="">Sort by price</option>
                                    <option value="lower">Lowest price</option>
                                    <option value="higher">Highest price</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <!-- filters select -->
                            <div class="select-filters">
                                <select name="sort_price" id="sort-rank">
                                    <option value="" selected="">Sort by ranking</option>
                                    <option value="lower">Rank one</option>
                                    <option value="higher">Rank one</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-5 hidden-xs text-right">
                            <a class="filters-btn collapse" data-toggle="collapse" href="#collapseMap"  onclick="init();"><i class="flaticon-earth-globe"></i></a>
                            <a href="hotels-grid.html" class="filters-btn"><i class="flaticon-squares-gallery-grid-layout-interface-symbol"></i></a>
                            <a href="hotels-list.html" class="filters-btn"><i class="flaticon-bulleted-list"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- collapse map -->
            <div class="col-sm-12">
                <div class="collapse" id="collapseMap">
                    <!-- The element that will contain Google Map. This is used in both the Javascript and CSS above. --> 
                    <div id="map"></div>
                </div>
            </div>
            <!-- sideber -->
            <div class="col-sm-12 col-md-12">
                <div class="hotel-list-content">
                	@foreach($accomodations as $accomodation)
	                    <div class="hotel-item">
	                        <div class="row">
	                        	<div class="col-md-6">
			                        <div class="hotel-image">
			                            <a href="javascript:void(0)">
			                                <div class="img">
							                    @if(isset($accomodationImage[$accomodation->id]))
						                            @if($accomodationImage[$accomodation->id] != null)
						                                <img class="img-responsive" style="height: 200px"  src="<?php echo asset("storage/accomodations/".$accomodationImage[$accomodation->id]); ?>"> 
						                            @else
						                                <img class="img-responsive" style="height: 200px" src="<?php echo asset("storage/accomodations/default.png"); ?>"> 
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
			                            <!-- title-->
			                        	<h3>{{ $accomodation->name }}</h3>
			                            <!-- Text Intro-->
			                        	<?php echo substr($accomodation->address, 0, 40) . '...'; ?>
			                            <div class="free-service">
			                                <i class="flaticon-television" data-toggle="tooltip" data-placement="top" title="" data-original-title="Plasma TV with cable chanels"></i>
			                                <i class="flaticon-swimmer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Swimming pool"></i>
			                                <i class="flaticon-wifi" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free wifi"></i>
			                                <i class="flaticon-weightlifting" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fitness center"></i>
			                                <i class="flaticon-lemonade" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant"></i>
			                            </div>
			                        </div>
	                        	</div>
	                        	<div class="col-md-offset-2 col-md-4">
			                        <div class="hotel-right"> 
			                            <div class="hotel-person">from <span class="color-blue">$273</span></div>
			                            <a class="thm-btn" href="{{ $accomodation->url_link }}" target="_blank">Details</a>
			                        </div>
	                        	</div>
	                    </div>

	                        </div>
                    @endforeach
                </div>
                <!-- pagination -->
                <div class="pagination-inner">
                    <!-- pager -->
                    <ul class="pager">
                        <li class="previous"><a href="#">Previous</a></li>
                        <li class="next"><a href="#">Next</a></li>
                    </ul>
                    <!-- pagination -->
                    <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">15</a></li>
                    </ul>
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
                        <p>
                            <a href="{{ $webSetting[0]->twitter_link }}">Twitter</a>
                        </p>
                    </div>
                    <div class="address">
                        <i class="fa fa-facebook"></i>
                        <p><a href="{{ $webSetting[0]->facebook_link }}">Facebook</a></p>
                    </div>
                    <div class="address">
                        <i class="fa fa-instagram"></i>
                        <p><a href="{{ $webSetting[0]->instagram_link }}">Instagram</a></p>
                    </div>
                    <div class="address">
                        <i class="fa fa-google-plus"></i>
                        <p><a href="{{ $webSetting[0]->google_plus_link }}">admin@gmail.com</a></p>
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
                <div class="col-sm-5">
                    <p>{{ $webSetting[0]->footer_text }}</p>
                </div>
                <div class="col-sm-7">
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