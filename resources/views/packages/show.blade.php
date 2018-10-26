@extends('default')

@section('content')
<div class="px-content">
    <div class="page-header">
        <h1>
            <span class="text-muted font-weight-light">
                <a href="{{ route('admin.packages.index') }}">
                  <i class="fa fa-briefcase"></i>&nbsp;Package</a> /
            </span>
            <a href="{{ route('admin.packages.show',[$package->id]) }}">
                @if(isset($package)){{ $package->title }}@endif
            </a>
        </h1>
    </div>
    <div class="panel">
      <div class="panel-body bg-white">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="col-md-3">
              <div class="page-profile-v1-avatar">
                  <img src="<?php echo asset("storage/packages/".$package->feature_image); ?>" class="img-thumbnail">
              </div>
              <div class="px-content">
                  <h3 class="m-t-0">Additional Information</h3>
                  <p>
                      <?php echo strip_tags($package->important_notes); ?>
                  </p>
              </div> 
            </div>
            <div class="col-md-9">
              <div class="px-content">
                              <div class="row">
                  <div class="col-md-12">
                      <div class="col-md-3">
                          <p><strong>Title</strong></p>
                          <p><strong>Accomodation</strong></p>
                          <p><strong>Covering Sight</strong></p>
                          <p><strong>Travelling Date</strong></p>
                          <p><strong>Duration</strong></p>
                          <p><strong>Price</strong></p>
                          <p><strong>Discount</strong></p>
                          <p><strong>Description</strong></p>
                      </div>
                      <div class="col-md-9">
                          <p><strong>{{ $package->title }}</strong></p>
                          <p>{{ $package->accomodation->name }}</p>
                          <p>{{ $package->covering_sight }}</p>
                          <p> {{ \Carbon\Carbon::parse($package->traveling_date)->format('F d, Y') }}</p>
                          <p>
                              <span class="label label-primary"> 
                                  {{ $package->day }}&nbsp;day
                              </span>
                              <span class="label label-primary"> 
                                  {{ $package->night }}&nbsp;night
                              </span>
                          </p>
                          <p>{{ $package->prices->title }}</p>
                          <p>{{ $package->discount }}</p>
                          <p>
                            <?php echo strip_tags($package->description); ?>
                          </p>
                          <p>
                            <a href="{{ route('admin.packages.index') }}" class="btn btn-primary pull-right">Back</a>
                          </p>
                      </div>
                  </div>
              </div> 
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
