@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-4{
		background-image: url("{{ asset("/site/assets/images/4.jpg") }}");
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


<!-- page header -->
<section class="header header-bg-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Accomodations</h1>
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

                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <div class="select-filters">
                                <form action="{{ route('site.accomodation') }}" method="GET" id="searchByCity">
                                    <select name="city" id="city">
                                        <option value="0">Select City</option>
                                        <option value="cairo">Cairo</option>
                                        <option value="alexandria">Alexandria</option>
                                        <option value="luxor">Luxor</option>
                                        <option value="aswan">Aswan</option>
                                        <option value="sharm-el-sheikh">Sharm El Sheikh</option>
                                        <option value="hurghada">Hurghada</option>
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
                    <h5 class="m-t-0 p-t-0" ><strong>Search result for : <em>"{{ $search['search'] }}"</em></strong></h5>
                @elseif(isset($search['city']))
                    <h5 class="m-t-0 p-t-0" ><strong>Search result for city: <em>"{{ $search['city'] }}"</em></strong></h5>
                @endif
            </div>
            @endif
            
            <div class="col-sm-12 col-md-9">
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
			                            <div class="ratting">
			                                <i class="fa fa-star"></i>
			                                <i class="fa fa-star"></i>
			                                <i class="fa fa-star"></i>
			                                <i class="fa fa-star-half-o"></i>
			                                <i class="fa fa-star-o"></i>
			                            </div>
			                            <!-- title-->
			                        	<h3>{{ $accomodation->name }}</h3>
			                            <!-- Text Intro-->
			                        	{{ substr($accomodation->address, 0, 40) }}&nbsp;... 
			                            <div class="free-service m-t-2">
                                            <div class="row">
                                                @if(isset($images))
                                                    @foreach($images as $key => $values)
                                                        @if($key == $accomodation->id)
                                                            @foreach($values as $value)
                                                                @if($value['name'] != '')
                                                                    <div class="img-thumb col-xs-4 col-sm-4 col-md-3">
                                                                        <a href="{{ $value['file'] }}" data-source="{{ $value['file'] }}">
                                                                            <img style="width: 30px;height: 25px" class="img-responsive" src="{{ $value['file'] }}">  
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
			                            </div>
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

            <div class="col-sm-4 col-md-3">
                <div class="sidber-box popular-post-widget">
                    <div class="cats-title">Recommended Hotels</div>
                    <div class="popular-post-inner">
                        @if(isset($recommended_hotels))
                            @foreach($recommended_hotels as $recommended_hotel)
                                <div class="widget-activity-item">
                                    <div class="widget-activity-avatar">
                                        @if(isset($recommendedImages))
                                            @foreach($recommendedImages as $key => $image)
                                                @if($key == $recommended_hotel->id)
                                                    <img src="{{ asset('storage/accomodations/'.$image) }}" title="{{ $recommended_hotel->name }}"> 
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="widget-activity-header">
                                      <a href="{{ $recommended_hotel->url_link }}" target="_blank">{{ $recommended_hotel->name }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</section>


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

    var city = "@if(isset($search['city'])){{ $search['city'] }}@endif";

    if(city != '')
    {
        $('#city option[value='+city+']').attr('selected','selected');
    }

    $('#city').on('change',function(){
        if($(this).val() != '0')
        {
            $('#searchByCity').submit();
        }
        else
        {
            window.location.href = "{{ route('site.accomodation') }}";
        }
    });

    $(document).ready(function() {
      $('.img-thumb > a ').magnificPopup({type:'image'});
    });


</script>
@endsection