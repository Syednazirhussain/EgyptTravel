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
                        <h1>Famous Place</h1>
                        <p>@if(isset($famousPlaceDetail)){{ $famousPlaceDetail->title  }}@endif</p>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Famous Place</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- famouus places details -->

<section class="hotels-details-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div id="sync1" class="owl-carousel">
                    <div class="item">
                        <img src="{{ asset('storage/famous_places/'.$famousPlaceDetail->image) }}" title="{{ $famousPlaceDetail->title }}" class="img-responsive">
                    </div>
                </div>
                <h3>{{ $famousPlaceDetail->title }}</h3>
                <p>
                    <?php echo htmlspecialchars_decode( $famousPlaceDetail->description ,ENT_NOQUOTES); ?>
                </p>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4">
                <!-- popular post -->
                <div class="sidber-box popular-post-widget">
                    <div class="cats-title">Categories </div>
                    <div class="popular-post-inner">

                        @if(isset($place_categorys))
                            @foreach($place_categorys as $place_category)
                                <div class="widget-activity-item">
                                    <div class="widget-activity-avatar">
                                        <img src="{{ asset('storage/place_category/'.$place_category->image) }}" title="{{ $place_category->name }}"> 
                                    </div>
                                    <div class="widget-activity-header">
                                      <a href="javascript:void(0)">{{ $place_category->name }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="sidber-box tags-widget">
                    <div class="cats-title">Tags </div>
                    <div class="tags-inner">
                        <?php
                            $tags = explode(",", $famousPlaceDetail->tags);
                            foreach ($tags as $tag) 
                            {
                        ?>
                        <a href="javascript:void(0)" class="ui tag"><?php echo $tag; ?></a>                            
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>





@endsection

