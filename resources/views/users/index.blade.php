@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fa fa-users"></i>&nbsp;Users
                    </a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif

                <div class="text-right m-b-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add
                        User</a>
                </div>

                <div class="table-primary">
                    @include('users.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // -------------------------------------------------------------------------
        // Initialize DataTables
        $(function () {
            $('#userstable').dataTable();
            $('#userstable_wrapper .table-caption').text('Users');
            $('#userstable_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
@endsection