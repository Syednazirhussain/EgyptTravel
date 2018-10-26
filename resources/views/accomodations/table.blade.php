<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Title</th>
            <th>Address</th>
            <th>Links</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($accomodations as $accomodation)
        <tr>
            <td>{!! $accomodation->name !!}</td>
            <td>{!! $accomodation->address !!}</td>
            <td><a href="{{ $accomodation->url_link }}" target="_blank">Links</a></td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['admin.accomodations.destroy', $accomodation->id], 'method' => 'delete']) !!}
                <a href="{!! route('admin.accomodations.edit', [$accomodation->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>