<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($blogCategories as $blogCategory)
        <tr>
            <td>{!! $blogCategory->name !!}</td>
            <td>
                @if($blogCategory->image != null)
                    <img class="img-thumbnail" src="<?php echo asset("storage/famous_places/".$famousPlaces->image); ?>" title="{{ $famousPlaces->title }}" style="width: 75px; height:75px;"> 
                @else
                    <img class="img-thumbnail" src="<?php echo asset("storage/famous_places/default.png"); ?>" style="width: 75px; height:75px;"> 
                @endif
            </td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['admin.blogCategories.destroy', $blogCategory->id], 'method' => 'delete']) !!}
                <a href="{!! route('admin.blogCategories.edit', [$blogCategory->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>