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

    .free-service i {
        margin: 0px 25px 0px 0px !important;
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

    .widget-activity-item {
        position: relative;
        padding: 12px 15px 12px 64px;
    }
    .widget-activity-avatar>img {
        width: 34px;
        height: 34px;
        border-radius: 2px;
    }
    .widget-activity-avatar {
        position: relative;
        display: block;
        float: left;
        width: 34px;
        height: 34px;
        margin-top: 3px;
        margin-left: -49px;
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
<section class="header" style='background-image: url("{{ asset("/site/assets/images/4.jpg") }}");'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Tour Packages</h1>
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
                                        <option value="0"> All Prices </option>
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

                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <div class="select-filters">
                                <form action="{{ route('site.tour_packages') }}" method="GET" id="searchByPriceLevel">
                                    <select name="price_level" id="priceLevel">
                                        <option value="0">Sort by price</option>
                                        @if(isset($search['price_level']))
                                            @if($search['price_level'] == $priceLevel['min'])
                                                <option value="@if(isset($priceLevel)){{ $priceLevel['min'] }}@endif" selected="selected">Lowest price</option>
                                                <option value="@if(isset($priceLevel)){{ $priceLevel['max'] }}@endif">Highest price</option>
                                            @else
                                                <option value="@if(isset($priceLevel)){{ $priceLevel['min'] }}@endif">Lowest price</option>
                                                <option value="@if(isset($priceLevel)){{ $priceLevel['max'] }}@endif" selected="selected">Highest price</option>
                                            @endif
                                        @else
                                            <option value="@if(isset($priceLevel)){{ $priceLevel['min'] }}@endif">Lowest price</option>
                                            <option value="@if(isset($priceLevel)){{ $priceLevel['max'] }}@endif">Highest price</option>
                                        @endif
                                    </select>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @if(isset($search))
            <div class="col-sm-12 col-md-12" id="searchBy">
                @if(isset($search['search']))
                    <h5 class="m-t-0 p-t-0" ><strong>Search result for : <em>"{{ $search['search'] }}"</em></strong></h5><br /><br />
                @elseif(isset($search['price']))
                    <h5 class="m-t-0 p-t-0" ><strong>Search result for price : <em>"{{ $search['price'] }}"</em></strong></h5><br /><br />
                @elseif(isset($search['price_level_text']))
                    <h5 class="m-t-0 p-t-0" ><strong>Search result for : <em>"{{ $search['price_level_text'] }}"</em></strong></h5><br /><br />
                @endif
            </div>
            @endif


            
            <div class="col-sm-12 col-md-9">
                <div class="hotel-list-content">
                    @foreach($packages as $package)
                    <div class="hotel-item">
                        <div class="hotel-image">
                            <a href="{{ route('site.popular_package.detail',[$package->id]) }}">
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
                            <h3><strong>{{ $package->title }}</strong></h3>
                            <p>
                                <?php
                                    $desc = strip_tags($package->description);
                                    echo substr($desc,0,120)."...";
                                ?>
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
                            <div class="row">
                                <div class="col-sm-12 col-md-12" style="border-bottom: 1px solid #ddd">
                                    <h5>
                                        <strong>6</strong>&nbsp;Days&nbsp;
                                        <strong>5</strong>&nbsp;Nights
                                    </h5>
                                </div>
                            </div>
                            <div class="hotel-person m-t-3"> 
                                <span class="color-blue"><?php echo str_replace(".00", "", $package->prices->price)."$"; ?> </span>
                                <small>Starting price per adult</small>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <a class="btn btn-default" style="margin-top: 10px; background-color: #fec107; color: #fff" href="{{ route('site.popular_package.detail',[$package->id]) }}">Book Online</a>                                    
                                    <button class="btn btn-default contact_us m-t-1" data-package="{{ $package->id }}" data-toggle="modal" data-target="#callUs"><i class="fa fa-phone"></i> &nbsp;Want us to call?</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $packages->links('vendor.pagination.default') }}
            </div>

            <div class="col-sm-4 col-md-3">

                <form action="{{ route('site.tour_packages') }}" method="GET" id="priceFilter">
                    <input type="hidden" name="from" id="from">
                    <input type="hidden" name="to" id="to">
                    <input type="hidden" name="type" value="tour_packages">
                </form>

                <div class="sidber-box cats-price">
                    <div class="cats-title">Price</div>
                    <div class="price-Pips">
                        <input type="text" id="range" value="range" name="range" />
                    </div>
                </div>


                <div class="sidber-box popular-post-widget">
                    <div class="cats-title">Popular Packages</div>
                    <div class="popular-post-inner">
                        @if(isset($popular_packages))
                            @foreach($popular_packages as $popular_package)
                                <div class="widget-activity-item">
                                    <div class="widget-activity-avatar">
                                        <img class="img-responsive" src="{{ asset('storage/packages/'.$popular_package->feature_image) }}" title="{{ $popular_package->title }}"> 
                                    </div>
                                    <div class="widget-activity-header">
                                      <a href="{{ route('site.popular_package.detail',[$popular_package->id]) }}">{{ $popular_package->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

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



@section('js')

<script type="text/javascript">

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var from = "{{ \Request::input('from') }}";
    var to = "{{ \Request::input('to') }}";

    if(to != '' && from != '')
    {   
        //range slide
        $("#range").ionRangeSlider({
            type: "double",
            grid: true,
            min: 100,
            max: 500,
            from: from,
            to: to,
            prefix: "$",
            onFinish: saveResult
        });
    }
    else
    {
        //range slide
        $("#range").ionRangeSlider({
            type: "double",
            grid: true,
            min: 100,
            max: 500,
            from: 100,
            to: 200,
            prefix: "$",
            onFinish: saveResult
        });        
    }


    function  saveResult(data) {
        var from = data.from;
        var to = data.to;
        $('#from').val(from);
        $('#to').val(to);
        $('#priceFilter').submit();
    };

    var night = "@if(isset($search['night'])){{ $search['night'] }}@endif";

    if(night != '')
    {
        var text = $('#sort_night option[value='+night+']').text();
        $('#searchBy').html('');
        $('#searchBy').html('<h5 class="m-t-0 p-t-0" ><strong>Search result for duration : <em>"'+text+'"</em></strong></h5><br /><br />');
        $('#sort_night option[value='+night+']').attr('selected','selected');
    }

    $('#sort_night').on('change', function() {
        if($(this).val() != 0)
        {
            $('#searchByNight').submit();
        }
    });


    $('#priceLevel').on('change', function() {
        if($(this).val() != 0)
        {
            $('#searchByPriceLevel').submit();
        }
    });


    var price = "@if(isset($search['price'])){{ $search['price'] }}@endif";

    if(price != '')
    {
        $('#sort_price option[value='+price+']').attr('selected','selected');
    }

    $('#sort_price').on('change', function() {
        $('#searchByPrice').submit();
    });


    var s_month = "@if(isset($search['month'])){{ $search['month'] }}@endif";
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];    
    var month = (new Date()).getMonth();

    if(s_month != 0)
    {
        $('#searchBy').html('');
        $('#searchBy').html('<h5 class="m-t-0 p-t-0" ><strong>Search result for month of : <em>"'+monthNames[s_month-1]+'"</em></strong></h5><br /><br />');

        var search = s_month-1;

        for (; month < monthNames.length; month++) 
        {
            if(search == month)
            {
                $('#sort_month').append('<option value='+(month+1)+' selected>' + monthNames[month] + '</option>');
            }
            else
            {
                $('#sort_month').append('<option value='+(month+1)+'>' + monthNames[month] + '</option>'); 
            }
        }
    }
    else
    {
        for (; month < monthNames.length; month++) 
        {
            $('#sort_month').append('<option value='+(month+1)+'>' + monthNames[month] + '</option>');
        }
    }

    $('#sort_month').on('change', function() {
        if($(this).val() != 0)
        {
            $('#searchByMonth').submit();
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