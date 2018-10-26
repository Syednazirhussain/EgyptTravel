<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Title</th>
            <th>Label</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($prices as $price)
        <tr>
            <td>{!! $price->title !!}</td>
            <td>{!! $price->label !!}</td>
            <td>{!! $price->price !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['admin.prices.destroy', $price->id], 'method' => 'delete']) !!}
                <a href="{!! route('admin.prices.edit', [$price->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>