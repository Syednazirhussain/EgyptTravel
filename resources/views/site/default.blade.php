<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title> @if(isset($title)){{ $title }} @endif </title>
        <!-- Favicons -->
 
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/images/1.jpg') }}">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/images/2.jpg') }}">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('assets/images/3.jpg') }}">
        <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/css/pixeladmin.min.css') }}" rel="stylesheet">
        <!-- Base Css -->
        <link href="{{ asset('/site/assets/css/base.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/site/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/site/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>

        <style type="text/css">
            .section-title i{
                color: #fec107 !important;
            }

            @media (min-width: 768px){
                .header-content {
                    padding: 0;
                    height: 70vh;
                }
            }


        </style>
        @yield('css')

    </head>
    <body>
        <!-- page loader -->
        <div class="se-pre-con"></div>
        <div id="page-content">
            <nav id="mainNav" class="navbar navbar-fixed-top">
                <div class="container">
                    <!--Brand and toggle get grouped for better mobile display--> 
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                        </button>
                        @yield('logo')
                    </div>
                    <!--Collect the nav links, forms, and other content for toggling--> 
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ route('public.site') }}">Home</a></li>
                            <li><a href="{{ route('site.page',['about']) }}">About Egypt</a></li>
                            <li><a href="{{ route('site.accomodation') }}">Accomodation</a></li>
                            <li><a href="{{ route('site.nile_curises') }}">Nile Cruises</a></li>
                            <li><a href="{{ route('site.tour_packages') }}">Tour Packages</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">FAQ</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('site.page',['travel-planner']) }}">Thing to do</a></li>
                                    <li><a href="{{ route('site.page',['travel-tip']) }}">How to travel</a></li>
                                    <li><a href="{{ route('site.page',['travel-help']) }}">Travel Help</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> 
            @yield('content')
        </div>

        @yield('footer')

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
                                    <a target="_blank" href="{{ $webSetting[0]->twitter_link }}">Twitter</a>
                                </p>
                            </div>
                            <div class="address">
                                <i class="fa fa-facebook"></i>
                                <p class="social_link">
                                    <a target="_blank" href="{{ $webSetting[0]->facebook_link }}">Facebook</a>
                                </p>
                            </div>
                            <div class="address">
                                <i class="fa fa-instagram"></i>
                                <p class="social_link">
                                    <a target="_blank" href="{{ $webSetting[0]->instagram_link }}">Instagram</a>
                                </p>
                            </div>
                            <div class="address">
                                <i class="fa fa-google-plus"></i>
                                <p class="social_link">
                                    <a target="_blank" href="{{ $webSetting[0]->google_plus_link }}">admin@gmail.com</a>
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
                                                <a target="_blank" href="{{ $accomodation->url_link }}">
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

        <!-- jQuery -->
        <script src="{{ asset('/site/assets/js/jquery.min.js') }}" type="text/javascript"></script>
        <!-- jquery ui js -->
        <script src="{{ asset('/site/assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('/site/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- fraction slider js -->
        <script src="{{ asset('/site/assets/js/jquery.fractionslider.js') }}" type="text/javascript"></script>
        <!-- owl carousel js --> 
        <script src="{{ asset('/site/assets/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
        <!-- counter -->
        <script src="{{ asset('/site/assets/js/jquery.counterup.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/site/assets/js/waypoints.js') }}" type="text/javascript"></script>
        <!-- filter portfolio -->
        <script src="{{ asset('/site/assets/js/jquery.shuffle.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/site/assets/js/portfolio.js') }}" type="text/javascript"></script>
        <!-- magnific popup -->
        <script src="{{ asset('/site/assets/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
        <!-- range slider -->
        <script src="{{ asset('/site/assets/js/ion.rangeSlider.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/site/assets/js/jquery.easing.min.js') }}" type="text/javascript"></script>
        <!-- custom -->
        <script src="{{ asset('/site/assets/js/custom.js') }}" type="text/javascript"></script>



        <script src="{{ asset('/assets/js/pixeladmin.min.js') }}"></script>
        <script src="{{ asset('/assets/js/jquery.validate.min.js') }}"></script>


        @yield('js')

        <script type="text/javascript">

            var url = window.location.href; 

            urlArray = url.split("/");

            console.log(urlArray);

            var lastUrlString = urlArray[urlArray.length-1];

            console.log(lastUrlString);

            // $('ul.nav li a').click(function() {
            //     $('ul.nav li.active').removeClass('active');
            //     $(this).closest('li').addClass('active');
            // });

            // $('ul li a').on('click', function(){
            //     var item = $(this).text();
            //     $(this).parent().addClass('active').siblings().removeClass('active');
            // });


            // console.log($('ul.nav').children('li.active').find('a').text());

            // $('ul.nav li').click(function(){
            //     $(this).each(function(index,value){

            //     });
            // });

            if(lastUrlString == 'home')
            {

                $('ul.nav li:nth-child(2)').removeClass('active');
                $('ul.nav li:nth-child(1)').addClass('active');
            }
            else if(lastUrlString == 'about')
            {
                $('ul.nav li:nth-child(1)').removeClass('active');
                $('ul.nav li:nth-child(2)').addClass('active');
            }
            else if(lastUrlString == 'accomodation')
            {
                $('ul.nav li:nth-child(2)').removeClass('active');
                $('ul.nav li:nth-child(3)').addClass('active');
            }
            else if(lastUrlString == 'nile_curises')
            {
                $('ul.nav li:nth-child(3)').removeClass('active');
                $('ul.nav li:nth-child(4)').addClass('active');
            }
            else if(lastUrlString == 'tour_packages')
            {
                $('ul.nav li:nth-child(4)').removeClass('active');
                $('ul.nav li:nth-child(5)').addClass('active');
            }



            $('ul#dropdown > li').hover(function () {
                $(this).toggleClass('active').siblings().removeClass('active');
            });


        </script>

    </body>
</html>