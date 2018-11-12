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


<!-- page header -->
<section class="header header-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Things to do</h1>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Things to do</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- blog -->
<section class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <h3 class="well" style="background-color: #fff;border: none;">Egypt Famous Site</h3>
                    @if(isset($place_categorys))
                        @foreach($place_categorys as $place_category)
                            <div class="col-sm-6">
                                <div class="blog-content">
                                    <div class="blog-img image-hover">
                                        <a href="javascript:void(0)">
                                            <img style="width: 390px; height: 300px;" class="img-responsive" src="{{ asset('storage/place_category/'.$place_category->image) }}">
                                        </a>
                                        <span class="post-date">{{ \Carbon\Carbon::parse($place_category->created_at)->format('F d, Y') }}</span>
                                    </div>
                                    <h4>
                                        <a href="javascript:void(0)">{{ $place_category->name }}</a>
                                    </h4>
                                    @foreach($place_category->famousPlaces as $famousPlace)
                                        <a  href="{{ route('site.famous_place.detail',[$famousPlace->id]) }}">{{ $famousPlace->title }}</a><br>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ $place_categorys->links('vendor.pagination.default') }}
            </div>

            <!-- sideber -->
            <div class="col-md-3 col-sm-4">

                <div class="sidber-box cats-widget">
                    <div class="cats-title">
                        All Categories
                    </div>
                    <ul>
                        @if(isset($place_categorys))
                            @foreach($place_categorys as $place_category)
                                <li>
                                    <a href="javascript:void(0)">{{ $place_category->name }}</a> 
                                    <span>{{ count($place_category->famousPlaces) }}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="sidber-box popular-post-widget">
                    <div class="cats-title">Travel Tips</div>
                    <div class="popular-post-inner">
                        @if(isset($pages))
                            @foreach($pages as $page)
                                @if($page->code == 'travel-tip')
                                    {{ substr(strip_tags(htmlspecialchars_decode($page->description,ENT_NOQUOTES)),0,200) }}
                                    <a href="{{ route('site.page',['travel-tip']) }}"> 
                                        ...&nbsp;Read More
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>



@endsection

