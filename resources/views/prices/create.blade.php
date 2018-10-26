@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.prices.index') }}">
                        <i class="fa fa-money"></i>&nbsp;Price
                    </a>&nbsp;/
                </span>
                <a href="{{ route('admin.prices.create') }}">Add</a>
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
                        <div class="panel-title">Add Price</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.prices.store') }}" method="POST" id="price">

                            @include('prices.fields') 

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

