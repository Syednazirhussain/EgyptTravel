@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.packages.index') }}">
                        <i class="fa fa-briefcase"></i>&nbsp;Packages
                    </a>&nbsp;/
                </span>
                <a href="{{ route('admin.packages.create') }}">Add</a>
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
                        <div class="panel-title">Add Package</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.packages.store') }}" method="POST" id="package">

                            @include('packages.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
