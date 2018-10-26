@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.users.index') }}"><i class="fa fa-user"></i>&nbsp;User</a> /
                </span>
                @if(isset($user)){{ $user->name }}@endif
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
                        <div class="panel-title">@if(isset($user)){{ $user->name  }}@endif</div>
                    </div>
                    <div class="panel-body">
                        <form  id="userForm">
                            @include('users.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


