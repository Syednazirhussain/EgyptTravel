@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="javascript:void(0)">
                      <i class="fa fa-star"></i>&nbsp;Page</a> /
                </span>
                @if(isset($page)){{ $page->name }}@endif
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
                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">@if(isset($page)){{ $page->name  }}@endif</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.pages.update',[$page->id]) }}" method="POST" novalidate>
                          @include('pages.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
