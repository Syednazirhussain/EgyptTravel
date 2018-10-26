@extends('default')

@section('content')


<div class="px-content">
           <!--  <ol class="breadcrumb page-breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Dashboard</li>
            </ol> -->
            <div class="page-header">
                <div class="row">
                    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
                        <h1>
                          <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>&nbsp;Dashboard
                          </a>
                        </h1>
                    </div>
                    <hr class="page-wide-block visible-xs visible-sm">
                    <div class="m-b-2 visible-xs visible-sm clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                      <div class="col-md-3">
                            <a href="{{ route('admin.users.index') }}">
                                <div class="box bg-info darken">
                                    <div class="box-cell p-x-3 p-y-1">
                                        <div class="font-weight-semibold font-size-12">USERS</div>
                                        <div class="font-weight-bold font-size-20">{{ $counts['users'] }}</div>
                                        <i class="box-bg-icon middle right font-size-52 ion-ios-people"></i>
                                    </div>
                                </div>
                            </a>
                      </div>
                      <div class="col-md-3">
                        <a href="{{ route('admin.packages.index') }}">
                            <div class="box bg-danger darken">
                              <div class="box-cell p-x-3 p-y-1">
                                <div class="font-weight-semibold font-size-12">PACKAGES</div>
                                <div class="font-weight-bold font-size-20">{{ $counts['packages'] }}</div>
                                <i class="box-bg-icon middle right font-size-52 ion-ios-box"></i>
                              </div>
                            </div>
                        </a>
                      </div>
                      <div class="col-md-3">
                        <a href="{{ route('admin.accomodations.index') }}">
                            <div class="box bg-warning darken">
                              <div class="box-cell p-x-3 p-y-1">
                                <div class="font-weight-semibold font-size-12">ACCOMODATION</div>
                                <div class="font-weight-bold font-size-20">{{ $counts['accomodations'] }}</div>
                                <i class="box-bg-icon middle right font-size-52 ion-ios-box"></i>
                              </div>
                            </div>
                        </a>
                      </div>
                      <div class="col-md-3">
                        <a href="{{ route('admin.famousPlaces.index') }}">
                            <div class="box bg-success darken">
                              <div class="box-cell p-x-3 p-y-1">
                                <div class="font-weight-semibold font-size-12">FAMOUS PLACES</div>
                                <div class="font-weight-bold font-size-20"><small class="font-weight-light"></small>{{ $counts['famousPlaces'] }}</div>
                                <i class="box-bg-icon middle right font-size-52 ion-ios-box"></i>
                              </div>
                            </div>
                        </a>
                      </div>
                    </div>
                </div>
            </div>
            <hr class="page-block m-t-0">
            <div class="row">

              <div class="col-md-3">
                <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title">
                      Latest Users
                    </div>
                  </div>
                  @foreach($users as $user)
                      <div class="widget-activity-item">
                        <div class="widget-activity-avatar">
                            @if($user->pic != null)
                                <img src="<?php echo asset("storage/users/".$user->pic); ?>" title="{{ $user->name }}"> 
                            @else
                                <img src="<?php echo asset("storage/users/default.png"); ?>" title="{{ $user->name }}"> 
                            @endif
                        </div>
                        <div class="widget-activity-header">
                          <a href="{{ route('admin.users.edit', [$user->id]) }}" title="{{ $user->name }}">{{ $user->name }}</a>
                        </div>
                      </div>
                  @endforeach
                  <a href="{{ route('admin.users.index') }}" class="widget-more-link">MORE USERS</a>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title">
                      Latest Packages
                    </div>
                  </div>
                  @foreach($packages as $package)
                      <div class="widget-activity-item">
                        <div class="widget-activity-avatar">
                            @if($package->feature_image != null)
                                <img src="<?php echo asset("storage/packages/".$package->feature_image); ?>"> 
                            @else
                                <img src="<?php echo asset("storage/packages/default.png"); ?>"> 
                            @endif 
                        </div>
                        <div class="widget-activity-header">
                          <a href="{{ route('admin.packages.show',[$package->id]) }}" title="{{ $package->title }}">{{ $package->title }}</a>
                        </div>
                      </div>
                  @endforeach
                  <a href="{{ route('admin.packages.index') }}" class="widget-more-link">MORE PACKAGES</a>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title">
                      Latest Accomodations
                    </div>
                  </div>
                  @foreach($accomodations as $accomodation)
                      <div class="widget-activity-item">
                        <div class="widget-activity-avatar">
                          @if(isset($accomodationImage[$accomodation->id]))
                            @if($accomodationImage[$accomodation->id] != null)
                                <img src="<?php echo asset("storage/accomodations/".$accomodationImage[$accomodation->id]); ?>"> 
                            @else
                                <img src="<?php echo asset("storage/accomodations/default.png"); ?>"> 
                            @endif
                          @endif 
                        </div>
                        <div class="widget-activity-header">
                          <a href="{{ route('admin.accomodations.edit', [$accomodation->id]) }}" title="{{ $accomodation->name }}">{{ $accomodation->name }}</a>
                        </div>
                      </div>
                  @endforeach
                  <a href="{{ route('admin.accomodations.index') }}" class="widget-more-link">MORE ACCOMODATIONS</a>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title">
                      Latest Famous Places
                    </div>
                  </div>

                  @foreach($famousPlaces as $famousPlace)
                      <div class="widget-activity-item">
                        <div class="widget-activity-avatar">
                            @if($famousPlace->image != null)
                                <img src="<?php echo asset("storage/famous_places/".$famousPlace->image); ?>"> 
                            @else
                                <img src="<?php echo asset("storage/famous_places/default.png"); ?>"> 
                            @endif
                        </div>
                        <div class="widget-activity-header">
                          <a href="{{ route('admin.famousPlaces.show',[$famousPlace->id]) }}" title="{{ $famousPlace->title }}">{{ $famousPlace->title }}</a>
                        </div>
                      </div>
                  @endforeach

                  <a href="{{ route('admin.famousPlaces.index') }}" class="widget-more-link">MORE FAMOUS PLACES</a>
                </div>
              </div>

            </div>

        </div>

@endsection