@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-9{
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
                <div class="col-sm-12">
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
            </div>
<!--             <div class="separator"></div> -->
        </div>
    </section>

</main>

@endsection

