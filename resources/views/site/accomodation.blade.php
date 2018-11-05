@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-4{
		background-image: url("{{ asset("/site/assets/images/1.jpg") }}");
	}
    
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
                            <form action="{{ route('site.accomodation') }}" id="searchForm" method="GET">
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



<!--                         <div class="col-sm-3 col-md-5 hidden-xs text-right">
                            <a class="filters-btn collapse" data-toggle="collapse" href="#collapseMap"  onclick="init();"><i class="flaticon-earth-globe"></i></a>
                            <a href="hotels-grid.html" class="filters-btn"><i class="flaticon-squares-gallery-grid-layout-interface-symbol"></i></a>
                            <a href="hotels-list.html" class="filters-btn"><i class="flaticon-bulleted-list"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>

            @if(isset($search))
            <div class="col-sm-12 col-md-12" id="searchBy">
                @if(isset($search['search']))
                    <h5 class="m-t-0 p-t-0" >Search By: <em>{{ $search['search'] }}</em></h5>
                @endif
            </div>
            @endif


            <!-- collapse map -->
<!--             <div class="col-sm-12">
                <div class="collapse" id="collapseMap">
                    <div id="map"></div>
                </div>
            </div> -->

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
<!-- 			                            <div class="ratting">
			                                <i class="fa fa-star"></i>
			                                <i class="fa fa-star"></i>
			                                <i class="fa fa-star"></i>
			                                <i class="fa fa-star-half-o"></i>
			                                <i class="fa fa-star-o"></i>
			                            </div> -->
			                            <!-- title-->
			                        	<h3>{{ $accomodation->name }}</h3>
			                            <!-- Text Intro-->
			                        	<?php echo substr($accomodation->address, 0, 80) . '...'; ?>
<!-- 			                            <div class="free-service">
			                                <i class="flaticon-television" data-toggle="tooltip" data-placement="top" title="" data-original-title="Plasma TV with cable chanels"></i>
			                                <i class="flaticon-swimmer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Swimming pool"></i>
			                                <i class="flaticon-wifi" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free wifi"></i>
			                                <i class="flaticon-weightlifting" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fitness center"></i>
			                                <i class="flaticon-lemonade" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant"></i>
			                            </div> -->
			                        </div>
	                        	</div>
	                        	<div class="col-md-offset-2 col-md-4">
			                        <div class="hotel-right"> 
			                            <div class="hotel-person">from 
                                            <span class="color-blue">$273</span>
                                        </div>
			                            <a class="thm-btn" href="{{ $accomodation->url_link }}" target="_blank">Details</a>
			                        </div>
	                        	</div>
	                        </div>
	                    </div>
                    @endforeach
                </div>
                {{ $accomodations->links('vendor.pagination.default') }}
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

@section('js')
<script type="text/javascript">
    
    $('#search').bind("enterKey",function(e){
        $('#searchForm').submit();
    });

    $('#search').keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });


</script>
@endsection