@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.famousPlaces.index') }}"><i class="fa fa-map-marker"></i>&nbsp;Famous Places</a> / 
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
                        <div class="panel-title">Add Famous Places</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.famousPlaces.store') }}" method="POST" id="famous_places">

                            @include('famous_places.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

