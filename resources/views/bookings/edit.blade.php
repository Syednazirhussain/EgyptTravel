@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.bookings.index') }}">
                      <i class="fa fa-bookmark"></i>&nbsp;Booking
                    </a>&nbsp;/
                </span>
                <a href="{{ route('admin.bookings.edit',[$booking->id]) }}">
                    @if(isset($booking)){{ $booking->name }}@endif
                </a>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <br/>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">@if(isset($booking)){{ $booking->name  }}@endif</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.bookings.update',[$booking->id]) }}" method="POST"  id="booking">
                          @include('bookings.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection