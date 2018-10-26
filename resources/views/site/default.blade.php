<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Travel</title>
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
                            <li><a href="{{ route('site.about') }}">About Egypt</a></li>
                            <li><a href="{{ route('site.accomodation') }}">Accomodation</a></li>
                            <li><a href="{{ route('site.nile_curises') }}">Nile Cruises</a></li>
                            <li><a href="{{ route('site.tour_packages') }}">Tour Packages</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">FAQ</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)">Thing to do</a></li>
                                    <li><a href="javascript:void(0)">How to travel</a></li>
                                    <li><a href="javascript:void(0)">Travel Help</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> 
            @yield('content')
        </div>

        @yield('footer')

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

        <script src="{{ asset('/assets/js/jquery.validate.min.js') }}"></script>


        @yield('js')

        <script type="text/javascript">

            var url = window.location.href; 

            urlArray = url.split("/");

            console.log(urlArray);

            var lastUrlString = urlArray[urlArray.length-1];

            console.log(lastUrlString);

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