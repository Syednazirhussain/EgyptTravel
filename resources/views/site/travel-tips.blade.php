@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-2{
		background-image: url("{{ asset("/site/assets/images/4.jpg") }}");
	}

    .social_link a{
        color: #898989;
        font-size: 13px;
    }
    .social_link a:hover{
        color: #fec107;
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
<section class="header header-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Travel tips</h1>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Travel Tips</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="hotels-details-inner">
    <div class="container">
        <div class="row">
            <h3 class="well" style="background-color: #fff;border: none;">Egypt Travel Tips</h3>
            <div class="col-md-8 col-sm-8">
                <p>
                    @foreach($pages as $page)
                        @if($page->code == 'travel-tip')
                            <?php echo htmlspecialchars_decode($page->description,ENT_NOQUOTES); ?> 
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4">

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
                                      <a href="javascript:void(0)">{{ $famousPlace->title }}</a>
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
                                      <a href="javascript:void(0)">{{ $package->title }}</a>
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
                                      <a href="javascript:void(0)">{{ $package_nileCruise->title }}</a>
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

