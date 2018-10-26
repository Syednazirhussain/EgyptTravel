<table class="table table-responsive" id="userstable">
    <thead>
        <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Role</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
                @if($user->pic != null)
                <img class="img-thumbnail" src="<?php echo asset("storage/users/".$user->pic); ?>" style="width: 75px; height:75px;"> 
                @else
                <img class="img-thumbnail" src="<?php echo asset("storage/users/default.png"); ?>" style="width: 75px; height:75px;"> 
                @endif
            </td>
            <td>{{ ucfirst($user->name) }}</td>
            <td>{!! $user->email !!}</td>
            <td>{{ $user->mobile }}</td>
            <td>
                @if($user->user_role_code == 'admin')
                    <span class="label label-primary">{{ ucfirst($user->user_role_code)  }}</span>
                @else
                    <span class="label label-info">{{ ucfirst($user->user_role_code)  }}</span>
                @endif
            </td>
            <td>
                @if($user->status_code == 'active')
                    <span class="label label-primary">{{ ucfirst($user->status_code)  }}</span>
                @else
                    <span class="label label-danger">{{ ucfirst($user->status_code)  }}</span>
                @endif
            </td>

            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
                <a href="{!! route('admin.users.edit', [$user->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>