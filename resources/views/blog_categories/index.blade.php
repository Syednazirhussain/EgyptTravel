@extends('default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <a href="{{ route('admin.blogCategories.index') }}">
                        <i class="fa fa-star"></i>&nbsp;Places Category
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
                    <a href="{{ route('admin.blogCategories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Category</a>
                </div>

                <div class="table-primary">
                    @include('blog_categories.table')
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
            $('#datatables').dataTable();
            $('#datatables_wrapper .table-caption').text('Places Category');
            $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
@endsection


