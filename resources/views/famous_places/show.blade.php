@extends('default')

@section('content')

<div class="px-content">
    <div class="page-header">
        <h1>
            <span class="text-muted font-weight-light">
                <a href="{{ route('admin.bookings.index') }}">
                  <i class="fa fa-map-marker"></i>&nbsp;Famous Place</a> /
            </span>
            @if(isset($famousPlace)){{ $famousPlace->title }}@endif
        </h1>
    </div>
    <div class="panel">
      <div class="panel-body bg-white">
        <div class="page-blog-posts-item">
          <div class="page-blog-posts-image">
            <img src="{{ asset('storage/famous_places/'.$famousPlace->image ) }}" width="100%">
          </div>
          <h2 class="font-weight-bold text-default m-t-3">
            <a href="javascript:void(0);">{{ $famousPlace->title }}</a>
          </h2>
          <div class="page-blog-posts-content">
            <p>
                <?php echo strip_tags($famousPlace->description); ?>
            </p>
            <p class="pull-right m-t-3">
              <a href="{{ route('admin.famousPlaces.index') }}" class="pull-left btn btn-primary">Back</a>
            </p>
          </div>          
        </div>
      </div>
    </div>
</div>

@endsection
