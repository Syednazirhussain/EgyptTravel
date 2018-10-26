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
                            <a href="javascript:void(0)" class="filters-btn"><i class="flaticon-squares-gallery-grid-layout-interface-symbol"></i></a>
                            <a href="javascript:void(0)" class="filters-btn"><i class="flaticon-bulleted-list"></i></a>
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
            
            <div class="col-sm-12 col-md-12">
                <div class="hotel-list-content">
                    @foreach($packages as $package)
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
                            <h2>{{ $package->title }}</h2>
                            <p>
                                <?php
                                    $desc = strip_tags($package->description);
                                    echo substr($desc,0,80)."...";
                                ?>
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
                            <div class="row">
                                <div class="col-sm-12 col-md-12" style="border-bottom: 1px solid #ddd">
                                    <h5>
                                        <strong>6</strong>&nbsp;Days&nbsp;
                                        <strong>5</strong>&nbsp;Nights
                                    </h5>
                                </div>
                            </div>
                            <div class="hotel-person m-t-3">from 
                                <span class="color-blue">$273</span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <a class="btn btn-default btn-sm" style="background-color: #fec107; color: #fff" href="javascript:void(0)">Book Online</a>                                    
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <button class="btn btn-default btn-sm contact_us" data-package="{{ $package->id }}" data-toggle="modal" data-target="#callUs"><i class="fa fa-phone"></i>&nbsp;Want us to call you</button>
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
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="agree">
                                      <label class="form-check-label" style="font-weight: normal;display: inline;" for="defaultCheck1">
                                        I hereby accept the <a href="javascript:void(0)">Privacy Policy</a> and authorize SOTC and its representatives to contact me
                                      </label>
                                    </div>
                                    <button type="submit" class="btn btn-warning m-t-2" id="submit">Submit</button>                                  
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


@section('js')

<script type="text/javascript">

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#validation_errors').hide();
    
    $('.contact_us').click(function(){

        $("label.error").hide();
        $(".error").removeClass("error");

        var package_id = $(this).data('package');
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

    $("#package_contact_us").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();

        if( $(this).validate().form() ) 
        {
            $.post("{{ route('site.tour_packages.contact') }}",data,function(response){
                
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



            });
        }

    });



</script>

@endsection