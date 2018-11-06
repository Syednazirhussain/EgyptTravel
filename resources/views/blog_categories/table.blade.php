<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th width="150px">Image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($blogCategories as $blogCategory)
        <tr>
            <td>
                @if($blogCategory->image != null)
                    <img class="img-thumbnail" src="<?php echo asset("storage/place_category/".$blogCategory->image); ?>" title="{{ $blogCategory->title }}" style="width: 75px; height:75px;"> 
                @else
                    <img class="img-thumbnail" src="<?php echo asset("storage/place_category/default.png"); ?>" style="width: 75px; height:75px;"> 
                @endif
            </td>
            <td>{!! $blogCategory->name !!}</td>
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