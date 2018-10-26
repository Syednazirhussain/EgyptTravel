@section('css')

<style type="text/css">
    .dataTables_table_wrapper{
        overflow-x: unset !important;
    }
</style>

@endsection

<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th width="150px"></th>
            <th>Title</th>
<!--             <th>Description</th> -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($famousPlaces as $famousPlaces)
        <tr>
            <td>
                @if($famousPlaces->image != null)
                    <img class="img-thumbnail" src="<?php echo asset("storage/famous_places/".$famousPlaces->image); ?>" title="{{ $famousPlaces->title }}" style="width: 75px; height:75px;"> 
                @else
                    <img class="img-thumbnail" src="<?php echo asset("storage/famous_places/default.png"); ?>" style="width: 75px; height:75px;"> 
                @endif
            </td>
            <td> {{ $famousPlaces->title }} </td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['admin.famousPlaces.destroy', $famousPlaces->id], 'method' => 'delete']) !!}
                <a href="{!! route('admin.famousPlaces.edit', [$famousPlaces->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>