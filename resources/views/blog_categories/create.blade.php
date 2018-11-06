@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.blogCategories.index') }}">
                        <i class="fa fa-money"></i>&nbsp;Blog Category
                    </a> /
                </span>Add
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
                        <div class="panel-title">Add Blog Category</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.blogCategories.store') }}" method="POST" id="blogcategory">
                            @include('blog_categories.fields') 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
