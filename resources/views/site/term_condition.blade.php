@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-2{
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


<!-- page header -->
<section class="header header-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Terms & Conditions</h1>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Term & condition</div>
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
                        <i class="fa fa-check-square-o"></i>
                        <h2>Terms & Conditions</h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="about-title">
                       <p>
                       		@foreach($pages as $page)
                       			@if($page->code == 'term-n-condition')
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