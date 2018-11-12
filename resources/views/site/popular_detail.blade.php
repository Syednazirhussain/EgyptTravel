@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-9{
		background-image: url("{{ asset("/site/assets/images/4.jpg") }}");
	}

    .error { 
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

     .select2-selection__arrow {
        padding: 14px 12px 4px 0 !important;
     }

     .select2-selection__rendered{
        padding: 12px 12px !important;
        height: 50px !important;
        font-size: 13px !important;
        border-radius: 0 !important;
        border: 2px solid rgba(0,0,0,.1) !important;
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

<section id="overview" class="header header-bg-9">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="header-content">
                    <div class="header-content-inner">
                        <div class="toure-title">
                            <i class="fa fa-eye"></i>
                            <h1>{{ $packageDetail->title }}</h1>
                        </div>
                        <div class="row">
                            
                            <div class="col-xs-6 col-sm-3">
                                <div class="trip">
                                    <i class="flaticon-dollar-coins"></i>
                                    <h5>{{ $packageDetail->prices->title }}</h5>
                                    <p><?php echo round( $packageDetail->prices->price, 0); ?>$ per person</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="trip">
                                    <i class="flaticon-night"></i>
                                    <h5>Nights</h5>
                                    <p>{{ $packageDetail->day }} Days / {{ $packageDetail->night }} Nights</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="trip">
                                    <i class="flaticon-road-perspective-of-curves"></i>
                                    <h5>Travelling Dates</h5>
                                    <p>{{ \Carbon\Carbon::parse($packageDetail->traveling_date)->format('F d, Y') }}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="trip">
                                    <i class="flaticon-car"></i>
                                    <h5>Covering Sight</h5>
                                    <p>{{ $packageDetail->covering_sight }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div  class="navbar-default tour-nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav navbar-nav text-center">
                    <li><a class="page-scroll" href="#overview">Overview</a></li>
                    <li><a class="page-scroll" href="#experience">Details</a></li>
                </ul> <!--end portfolio sorting -->
            </div>
        </div>
    </div>
</div>

<main class="destination_details">
    <section id="experience">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-offset-2 col-md-8">
                    <div class="section-title text-center">
                        <i class="fa fa-list-alt"></i>
                        <h2>Details</h2>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">


                    <div class="col-md-9">
                        <div class="experience-title">
                            <p>
                                <?php echo htmlspecialchars_decode($packageDetail->description,ENT_NOQUOTES); ?> 
                            </p>
                        </div>
                        <div class="middle-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="{{ asset('storage/packages/'.$packageDetail->feature_image) }}" title="{{ $packageDetail->title }}" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="experience-title">
                            <h2>Additional Information</h2>
                            <p><?php echo htmlspecialchars_decode($packageDetail->description,ENT_NOQUOTES); ?></p>
                        </div>                        
                    </div>

                    <div class="col-md-3">
                        <div class="sidber-box popular-post-widget">
                            <div class="cats-title">Egypt Famous Places</div>
                            <div class="popular-post-inner">
                                @if(isset($famousPlaces))
                                    @foreach($famousPlaces as $famousPlace)
                                        <div class="widget-activity-item">
                                            <div class="widget-activity-avatar">
                                                <img src="{{ asset('storage/famous_places/'.$famousPlace->image) }}" title="{{ $famousPlace->title }}"> 
                                            </div>
                                            <div class="widget-activity-header">
                                              <a href="{{ route('site.famous_place.detail',[$famousPlace->id]) }}">{{ $famousPlace->title }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="sidber-box popular-post-widget">
                            <div class="cats-title">Egypt Tour Packages</div>
                            <div class="popular-post-inner">
                                @if(isset($packages))
                                    @foreach($packages as $package)
                                        <div class="widget-activity-item">
                                            <div class="widget-activity-avatar">
                                                <img src="{{ asset('storage/packages/'.$package->feature_image) }}" title="{{ $package->title }}"> 
                                            </div>
                                            <div class="widget-activity-header">
                                              <a href="{{ route('site.popular_package.detail',[$package->id]) }}">{{ $package->title }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="sidber-box popular-post-widget">
                            <div class="cats-title">Egypt Nile Cruises Tour Packages</div>
                            <div class="popular-post-inner">
                                @if(isset($package_nileCruises))
                                    @foreach($package_nileCruises as $package_nileCruise)
                                        <div class="widget-activity-item">
                                            <div class="widget-activity-avatar">
                                                <img src="{{ asset('storage/packages/'.$package_nileCruise->feature_image) }}" title="{{ $package_nileCruise->title }}"> 
                                            </div>
                                            <div class="widget-activity-header">
                                              <a href="{{ route('site.popular_package.detail',[$package_nileCruise->id]) }}">{{ $package_nileCruise->title }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <div class="booking">
                        
                        @if (session()->has('msg.success'))
                            @include('layouts.success_msg')
                        @endif

                        @if (session()->has('msg.error'))
                            @include('layouts.error_msg')
                        @endif

                        <h3>Booking</h3>
                        <div class="booking-form">
                            <form action="{{ route('site.package.booking') }}" method="POST" id="book_now">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="package_id">Packages</label>
                                            <select type="text" name="package_id" class="form-control package">
                                                @if(isset($packages))
                                                  @if(isset($booking))
                                                    @foreach($packages as $package)
                                                        @if($booking->package_id == $package->id)
                                                            <option  value="{{ $package->id }}" <?php echo "selected"; ?> >{{ $package->title }}</option>
                                                        @else
                                                            <option  value="{{ $package->id }}">{{ $package->title }}</option>
                                                        @endif
                                                    @endforeach
                                                  @else
                                                    @foreach($packages as $package)
                                                      <option  value="{{ $package->id }}">{{ $package->title }}</option>
                                                    @endforeach
                                                  @endif
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="hotel_id">Hotel</label>
                                        <select type="text" name="hotel_id" id="hotel_id" class="form-control" value="@if(isset($booking)){{ $booking->hotel_id }}@endif">
                                            @if(isset($hotels))
                                              @if(isset($booking))
                                                @foreach($hotels as $hotel)
                                                    @if($booking->hotel_id == $hotel->id)
                                                        <option  value="{{ $hotel->id }}" <?php echo "selected"; ?> >{{ $hotel->name }}</option>
                                                    @else
                                                        <option  value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                    @endif
                                                @endforeach
                                              @else
                                                @foreach($hotels as $hotel)
                                                  <option  value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                @endforeach
                                              @endif
                                            @endif
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="room_code">Rooms</label>
                                        <select type="text" name="room_code" id="room_code" class="form-control" value="@if(isset($booking)){{ $booking->room_code }}@endif">
                                            @if(isset($rooms))
                                              @if(isset($booking))
                                                @foreach($rooms as $room)
                                                    @if($booking->room_code == $room->code)
                                                        <option  value="{{ $room->code }}" <?php echo "selected"; ?> >{{ $room->name }}</option>
                                                    @else
                                                        <option  value="{{ $room->code }}">{{ $room->name }}</option>
                                                    @endif
                                                @endforeach
                                              @else
                                                @foreach($rooms as $room)
                                                  <option  value="{{ $room->code }}">{{ $room->name }}</option>
                                                @endforeach
                                              @endif
                                            @endif
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Prefered Starting Date:*</label>
                                            <input type="text" class="form-control" name="start_date" id="start_date">                        
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Prefered Ending Trip:</label>
                                            <input type="text" class="form-control" name="end_date" id="end_date">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Additional Information</label>
                                            <textarea type="text" name="additional_info" id="additional_info" class="form-control" style="height: 90px; width: 750px; resize: none;" ></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="thm-btn btn-block">Book now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

@endsection

@section('js')

<script type="text/javascript">

        // Initialize validator
        $('#book_now').validate({
            focusInvalid: false,
            rules: {
              'name':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              },
              'email':{
                required: true,
                email: true
              },
              'start_date': {
                  required: true,
              },
              'end_date': {
                  required: true,
                  greaterThan: "#start_date" 
              },
              'package_id':{
                required: true
              },
              'additional_info':{
                required: true
              }
            },
            messages: {
              'name':{
                required: "Please enter name"
              },
              'email': {
                required: "Please enter email"
              },
              'additional_info': {
                required: "Please enter additional information"
              },
              'end_date' : {
                greaterThan: "Must be greater than start date"
              }
            }
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphabets only");

        $.validator.addMethod("greaterThan", function(value, element, params) {
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params).val());
            }
            return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val())); 
        },'Must be greater than {0}.');

        $('#start_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
       });

        $('#end_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
       });

        // Initialize Select2
          $(function() {
            $('#hotel_id').select2({
              placeholder: 'Select value',
            });
          });

          // Initialize Select2
          $(function() {
            $('#room_code').select2({
              placeholder: 'Select value',
            });
          });

          // Initialize Select2
        $(function() {
            $('.package').select2({
                placeholder: 'Select value',
            });
        });

</script>

@endsection
