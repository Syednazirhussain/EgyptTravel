<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Blog Cat Id</th>
            <th>Tags</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($blogPosts as $blogPost)
        <tr>
            <td>
                @if($blogPost->image != null)
                    <img class="img-thumbnail" src="<?php echo asset("storage/blog_post/".$blogPost->image); ?>" title="{{ $blogPost->title }}" style="width: 75px; height:75px;"> 
                @else
                    <img class="img-thumbnail" src="<?php echo asset("storage/blog_post/default.png"); ?>" style="width: 75px; height:75px;"> 
                @endif
            </td>
            <td>{!! $blogPost->title !!}</td>
            <td>{!! $blogPost->description !!}</td>
            <td>{!! $blogPost->blog_cat_id !!}</td>
            <td>{!! $blogPost->tags !!}</td>
            <td>{!! $blogPost->status !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['admin.blogPosts.destroy', $blogPost->id], 'method' => 'delete']) !!}
                <a href="{!! route('admin.blogPosts.edit', [$blogPost->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>