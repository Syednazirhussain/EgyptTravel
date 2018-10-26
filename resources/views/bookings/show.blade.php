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
                <a href="{{ route('admin.bookings.show',[$booking->id]) }}">
                    @if(isset($booking)){{ $booking->name }}@endif
                </a>
            </h1>
        </div>
        <div class="panel">
          <div class="panel-body bg-white">
            <div class="box m-a-0">
              <div class="box-row">
                <div class="box-cell">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <p><strong>Name</strong></p>
                                <p><strong>Email</strong></p>
                                <p><strong>Duration</strong></p>
                                <p><strong>Package</strong></p>
                                <p><strong>Hotel/Cruise Type</strong></p>
                                <p><strong>Room Type</strong></p>
                            </div>
                            <div class="col-md-9">
                                <p><strong>{{ $booking->name }}</strong></p>
                                <p>{{ $booking->email }}</p>
                                <p>
                                    <span class="label label-primary"> 
                                        {{ \Carbon\Carbon::parse($booking->start_date)->format('F d, Y') }}  
                                    </span>
                                    &nbsp;to&nbsp;
                                    <span class="label label-primary"> 
                                        {{ \Carbon\Carbon::parse($booking->end_date)->format('F d, Y') }} 
                                    </span>
                                </p>
                                <p>{{ $booking->package->title }}</p>
                                <p>{{ $booking->hotel->name }}</p>
                                <p>{{ ucfirst($booking->room_code) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-cell">
                    <div class="px-content">
                        <h2 class="m-t-0">Additional Information</h2>
                        <p>
                            {{ $booking->additional_info }}
                        </p>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary pull-right">Back</a>
                    </div>                    
                </div>
              </div>
            </div>
          </div>


        </div>

    </div>
@endsection

