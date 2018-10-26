@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.packages.index') }}">
                      <i class="fa fa-star"></i>&nbsp;Category</a> /
                </span>
                @if(isset($category)){{ $category->title }}@endif
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
                        <div class="panel-title">@if(isset($category)){{ $category->name  }}@endif</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.categories.update',[$category->id]) }}" method="POST"  id="category">
                            @include('categories.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
