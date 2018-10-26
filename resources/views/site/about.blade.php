@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-2{
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
<section class="header header-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>About Egypt</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since </p>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Gallery</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section -->
<section class="about-section">
    <!-- about section -->
    <div class="about-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="section-title text-center">
                        <i class="flaticon-care-about-water"></i>
                        <h2>About Us</h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="about-title">
                       <p>
                       		@foreach($pages as $page)
                       			@if($page->code == 'about')
                       				<?php echo htmlspecialchars_decode($page->description,ENT_NOQUOTES); ?> 
                       			@endif
                       		@endforeach
                       </p>
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