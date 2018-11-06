@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.blogPosts.index') }}">
                        <i class="fa fa-money"></i>&nbsp;Blog Post
                    </a> /
                </span>Add
            </h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
                        <div class="panel-title">Add Blog Post</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.blogPosts.store') }}" method="POST" id="blogpost">
                            @include('blog_posts.fields') 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
