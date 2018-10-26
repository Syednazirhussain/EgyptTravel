<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Traveling Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($packages as $package)
        <tr>
            <td>
                <a href="{{ route('admin.packages.show',$package->id) }}">
                @if($package->feature_image != null)
                <img class="img-thumbnail" src="<?php echo asset("storage/packages/".$package->feature_image); ?>" style="width: 75px; height:75px;"> 
                @else
                <img class="img-thumbnail" src="<?php echo asset("storage/packages/default.png"); ?>" style="width: 75px; height:75px;"> 
                @endif
                </a>
            </td>
            <td>{!! $package->title !!}</td>
            <td>{!! $package->prices->title !!}</td>
            <td>{!! $package->discount !!}</td>
            <td>{{ Carbon\Carbon::parse( $package->traveling_date )->format('F d, Y') }}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['admin.packages.destroy', $package->id], 'method' => 'delete']) !!}
                <a href="{!! route('admin.packages.edit', [$package->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                <a href="{{ route('admin.packages.show',[$package->id]) }}"><i class="fa fa-eye"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>