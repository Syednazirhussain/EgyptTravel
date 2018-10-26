<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Egypt Travel</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/css/pixeladmin.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/css/widgets.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/css/themes/candy-green.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('/assets/fileuploader/src/jquery.fileuploader.css') }}" media="all" rel="stylesheet">
        <link href="{{ asset('/assets/fileuploader/css/jquery.fileuploader-theme-thumbnails.css') }}" media="all" rel="stylesheet">
        
        @yield('css') 

        <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet">
        <!-- holder.js -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>
        <!-- Pace.js -->
        <script src="{{ asset('/assets/pace/pace.min.js') }}"></script>
        <script src="{{ asset('/assets/demo/demo.js') }}"></script>
        
        <!-- Custom styling -->
        <style>
            .page-header-form .input-group-addon,
            .page-header-form .form-control {
            background: rgba(0,0,0,.05);
            }
        </style>
        <!-- / Custom styling -->

    </head>
    <body>
        <nav class="navbar px-navbar">
            <!-- Navbar togglers -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">
                <ul class="nav navbar-nav bg-green">
                    <li class="dropdown" id="admin-menu-button">
                        <a href class="dropdown-toggle color-white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars fa-2x m-r-1 vertical-a-mid"></i><span class="">Menu</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i>&nbsp;Users</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.famousPlaces.index') }}">
                                    <i class="fa fa-map-marker"></i>&nbsp;Famous Places</a>
                            </li>
                            <li class="dropdown-toggle">
                                <a href="{{ route('admin.packages.index') }}">
                                    <i class="fa fa-briefcase"></i>&nbsp;Packages</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admin.packages.index') }}">
                                            <i class="fa fa-briefcase"></i>&nbsp;&nbsp;Packages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.categories.index') }}">
                                            <i class="fa fa-star"></i>&nbsp;&nbsp;Category
                                        </a>
                                    </li>
                                 </ul>
                            </li>
                            <li>
                                <a href="{{ route('admin.accomodations.index') }}">
                                    <i class="fa fa-home"></i>&nbsp;Accomodation</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.bookings.index') }}"><i class="fa fa-bookmark"></i>&nbsp;Booking</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.prices.index') }}"><i class="fa fa-money"></i>&nbsp;Price</a>
                            </li>
                            <li class="dropdown-toggle">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-list"></i>&nbsp;Pages</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admin.pages.edit',['contact']) }}">
                                            <i class="fa fa-asterisk"></i>&nbsp;&nbsp;Contact
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.pages.edit',['about']) }}">
                                            <i class="fa fa-asterisk"></i>&nbsp;&nbsp;About
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.pages.edit',['travel-planner']) }}">
                                            <i class="fa fa-asterisk"></i>&nbsp;&nbsp;Travel Planner
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.pages.edit',['travel-tip']) }}">
                                            <i class="fa fa-asterisk"></i>&nbsp;&nbsp;Travel Tip
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.pages.edit',['travel-help']) }}">
                                            <i class="fa fa-asterisk"></i>&nbsp;&nbsp;Travel Help
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.pages.edit',['faq']) }}">
                                            <i class="fa fa-asterisk"></i>&nbsp;&nbsp;FAQ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.pages.edit',['privacy-policy']) }}">
                                            <i class="fa fa-asterisk"></i>&nbsp;&nbsp;Privacy Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.pages.edit',['term-n-condition']) }}">
                                            <i class="fa fa-asterisk"></i>&nbsp;&nbsp;Terms & Conditions
                                        </a>
                                    </li>
                                 </ul>
                            </li>
                            <li>
                                <a href="{{ route('admin.webSettings.edit',['setting']) }}"><i class="fa fa-cog"></i>&nbsp;Settings</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Header -->
                <div class="navbar-header">
                    <a class="navbar-brand px-demo-brand" href="{{ route('admin.dashboard') }}">
                        <span class="px-demo-logo bg-primary">
                        </span>Egypt Travel
                    </a>
                </div>
                <div class="nav navbar-nav navbar-brand">
                    <a href="{{ route('public.site') }}" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i>&nbsp;Visit Site</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="@if(Auth::user()->pic != ''){{ asset('storage/users/'.Auth::user()->pic) }} @else {{ asset('storage/users/default.png') }} @endif" alt="" class="px-navbar-image">
                        
                        <span class="hidden-md">{{ ucfirst(Auth::user()->name) }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('admin.users.edit',Auth::user()->id) }}">
                                    <i class="fa fa-cog"></i>&nbsp;&nbsp;Settings
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ route('admin.logout') }}"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        @yield('content') 


        <div class="m-t-4 p-b-4" id="empty-space"></div>

        <footer  class="px-footer px-footer-bottom text-center m-t-4 ">

            <span class="">Copyright © 2018 Egypt Travel. All rights reserved.</span>
            
        </footer>


        <!-- jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/js/pixeladmin.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>

        <script src="{{ asset('/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('/assets/js/custom.js') }}"></script>

        <script src="{{ asset('/assets/fileuploader/src/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/fileuploader/js/custom.js') }}" type="text/javascript"></script>

        <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>

        @yield('js') 

        


    </body>
</html>
