@extends('site.default')

@section('css')

<style type="text/css">
    .modal-backdrop{
        display: none;
    }

    .modal {
      text-align: center;
    }

    @media screen and (min-width: 768px) { 
      .modal:before {
        display: inline-block;
        vertical-align: middle;
        content: " ";
        height: 100%;
      }
    }



    .modal-dialog {
      display: inline-block;
      text-align: left;
      vertical-align: middle;
    }

    .errorTxt, .error { 
        color: #dc3545 !important;
        font-weight: unset !important;
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
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- page header -->
<section class="header" style='background-image: url("{{ asset("/site/assets/images/1.jpg") }}");'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Tour Packages</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since </p>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Tour Packages</div>
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
                            <form action="{{ route('site.tour_packages') }}" id="searchForm" method="GET">
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
                                <form action="{{ route('site.tour_packages') }}" method="GET" id="searchByPrice">
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
                                <form action="{{ route('site.tour_packages') }}" method="GET" id="searchByMonth">
                                    <select name="month" id="sort_month">
                                        <option value="0">Month Of Travel</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <div class="select-filters">
                                <form action="{{ route('site.tour_packages') }}" method="GET" id="searchByNight">
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

<!--             <div class="col-sm-12">
                <div class="collapse" id="collapseMap">
                    <div id="map"></div>
                </div>
            </div> -->

            @if(isset($search))
            <div class="col-sm-12 col-md-12" id="searchBy">
                @if(isset($search['search']))
                    <h5 class="m-t-0 p-t-0" >Search By: <em>{{ $search['search'] }}</em></h5>
                @elseif(isset($search['price']))
                    <h5 class="m-t-0 p-t-0" >Search By: <em>{{ $search['price'] }}</em></h5>
                @elseif(isset($search['month']))
                    <h5 class="m-t-0 p-t-0" >Search By: <em>{{ $search['month'] }}</em></h5>
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
                                        <img style="height: 224px" class="img-responsive" src="<?php echo asset("storage/packages/".$package->feature_image); ?>"> 
                                    @else
                                        <img style="height: 224px" class="img-responsive" src="<?php echo asset("storage/packages/default.png"); ?>"> 
                                    @endif 
                                </div>
                            </a>
                        </div>
                        <div class="hotel-body">
                            <h3>{{ $package->title }}</h3>
                            <p>
                                <?php
                                    $desc = strip_tags($package->description);
                                    echo substr($desc,0,80)."...";
                                ?>
                            </p>
                            <div class="free-service">
                                <i class="flaticon-television m-l-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Plasma TV with cable chanels"></i>
                                <i class="flaticon-swimmer m-l-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Swimming pool"></i>
                                <i class="flaticon-wifi m-l-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free wifi"></i>
                                <i class="flaticon-weightlifting m-l-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fitness center"></i>
                                <i class="flaticon-lemonade m-l-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant"></i>
                            </div>
                        </div>
                        <div class="hotel-right"> 
                            <div class="row">
                                <div class="col-sm-12 col-md-12" style="border-bottom: 1px solid #ddd">
                                    <h5>
                                        <strong>6</strong>&nbsp;Days&nbsp;
                                        <strong>5</strong>&nbsp;Nights
                                    </h5>
                                </div>
                            </div>
                            <div class="hotel-person m-t-3">from 
                                <span class="color-blue"><?php echo str_replace(".00", "", $package->prices->price)."$"; ?> </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <a class="btn btn-default" style="background-color: #fec107; color: #fff" href="javascript:void(0)">Book Online</a>                                    
                                    <button class="btn btn-default contact_us m-t-1" data-package="{{ $package->id }}" data-toggle="modal" data-target="#callUs"><i class="fa fa-phone"></i>&nbsp;Want us to call you</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $packages->links('vendor.pagination.default') }}
            </div>

            <div class="modal" id="callUs">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Want us to call you</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="alert alert-danger" id="validation_errors"></div>
                            <p>Kindly enter your contact details, our travel experts will contact you shortly to assist you with your holiday.</p>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <form action="{{ route('site.tour_packages.contact') }}" id="package_contact_us" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="control-label">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <input type="hidden" name="package_id" id="package_id">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="agree">
                                      <label class="form-check-label" style="font-weight: normal;display: inline;" for="defaultCheck1">
                                        I hereby accept the <a href="javascript:void(0)">Privacy Policy</a> and authorize SOTC and its representatives to contact me
                                      </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="col-sm-12 col-md-3">
                                                <button type="submit" class="btn btn-warning m-t-2" id="submit">Submit</button>
                                            </div>
                                            <div class="col-sm-12 col-md-9">
                                                <span id="loader" class="pull-left" style="float: left;">
                                                    <i class="fa fa-spinner fa-3x fa-spin"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="package_img"></div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                        <i class="fa fa-times"></i>&nbsp;Cancel
                    </button>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('footer')


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

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

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

    

    $('#validation_errors').hide();
    
    $('.contact_us').click(function(){

        $("label.error").hide();
        $(".error").removeClass("error");

        var package_id = $(this).data('package');
        $('#package_id').val(package_id);
        $.ajax({
            url: "{{ route('site.tour_packages.show',['']) }}/"+package_id,
            type: "GET",
            success: function(response){
                console.log(response.payload);
                var data = response.payload;

                console.log(data.feature_image);
                console.log(data.title);

                var image_path = "{{ asset('storage/packages') }}";
                var package_image = image_path+"/"+data.feature_image;
                var image = '<img style="height: 200px" class="img-responsive" src="'+package_image+'">';
                $('#package_img').html(image);
            }
        });
    });


    $('#package_contact_us').validate({
        focusInvalid: false,
        rules: {
          'mobile':{
            required: true,
            digits: true
          },
          'email':{
            required: true,
            email: true,
            minlength: 3
          }
        },
        messages: {
          'mobile':{
            required: "Please enter mobile no"
          },
          'email': {
            required: "Please enter email"
          }
        }
    });

    $('#submit').prop('disabled', true);

    $('#agree').click(function() {
        if($(this).is(':checked')) 
        {
            $('#submit').prop('disabled', false);
        }
        else
        {
            $('#submit').prop('disabled', true);
        }
    });


    $('#loader').css("visibility", "hidden");

    $("#package_contact_us").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();

        if( $(this).validate().form() ) 
        {

            $.ajax({
                url: "{{ route('site.tour_packages.contact') }}",
                data: data,
                type: 'POST',
                beforeSend: function(){
                    $('#submit').prop('disabled', true);
                    $('#loader').css("visibility", "visible");
                },
                success: function(response){
                    $('#loader').css("visibility", "hidden");
                    if(response.status == 'success')
                    {
                        $('#callUs').modal('toggle');
                        console.log(response);
                    }
                    else
                    {
                        var errorArr =  response[Object.keys(response)[0]];

                        var errorhtml = '';
                        errorhtml += '<strong>Whoops!</strong> There were some problems with your input.';
                        errorhtml += '<br/>';
                        errorhtml += '<ul>';
                        for(var i = 0 ; i < errorArr.length ; i++)
                        {
                            errorhtml += '<li>'+errorArr[i]+'</li>';
                        }
                        errorhtml += '</ul>';

                        $('#validation_errors').show();
                        $('#validation_errors').html(errorhtml);                    
                    }
                }
            });
        }
    });

    // $(document).ready(function () {

    //     $('div#searchBy').hide();

    //     var urlParams = new URLSearchParams(window.location.search);
    //     var params = urlParams.toString();
    //     var arr  = params.split("=");
    //     var search_value = arr[1];
    //     $('#search').val(search_value);
    //     if(search_value != '')
    //     {
    //         $('div#searchBy').val("Search By: "+search_value);
    //         $('div#searchBy').show();
    //     }

    // });



    //console.log(urlParams.has('post')); // true
    //console.log(urlParams.get('action')); // "edit"
    //console.log(urlParams.getAll('action')); // ["edit"]
    //console.log(urlParams.toString()); // "?post=1234&action=edit"
    //console.log(urlParams.append('active', '1')); // "?post=1234&action=edit&active=1"



</script>

@endsection