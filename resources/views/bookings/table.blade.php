<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Package</th>
            <th>Hotel</th>
            <th>Room</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td><a href="{{ route('admin.bookings.show',[$booking->id]) }}">{{ $booking->package->title }}</a></td>
            <td>{!! $booking->hotel->name !!}</td>
            <td>{!! $booking->room_code !!}</td>
            <td> {{ \Carbon\Carbon::parse($booking->start_date)->format('F d, Y') }}  </td>
            <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('F d, Y') }}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['admin.bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                <a href="{!! route('admin.bookings.edit', [$booking->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                <a href="{{ route('admin.bookings.show',[$booking->id]) }}"><i class="fa fa-eye"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>