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
<!-- about section -->
<section class="about-section">
    <!-- about section -->
    <div class="about-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="section-title text-center">
                        <i class="fa fa-hand-o-up"></i>
                        <h2>Travel Tips</h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="about-title">
                       <p>
                       		@foreach($pages as $page)
                       			@if($page->code == 'travel-tip')
                       				<?php echo htmlspecialchars_decode($page->description,ENT_NOQUOTES); ?> 
                       			@endif
                       		@endforeach
                       </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

