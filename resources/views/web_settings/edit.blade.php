@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.webSettings.edit',['setting']) }}">
                        <i class="fa fa-cog"></i>&nbsp;Settings</a> /
                </span>
                @if(isset($webSetting)){{ $webSetting->title }}@endif
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
                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">@if(isset($webSetting)){{ $webSetting->title  }}@endif</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.webSettings.update',[$webSetting->id]) }}" method="POST"  id="setting" enctype="multipart/form-data">
                            @include('web_settings.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
