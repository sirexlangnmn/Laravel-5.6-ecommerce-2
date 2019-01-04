@foreach($users as $row)    
<tr class="text-center">
    <td>
        <div class="btn-group btn-mini dropdown">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button"> Action <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu animated flipInY">
                {!! Form::open(['route'=>['users.destroy', $row->id], 'method'=>'DELETE' ]) !!}
                    {{-- <li>{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}</li> --}}
                    {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}

                <li>
                    {!! link_to_route('users.edit', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-info fa fa-edit', 'data-toggle'=>'tooltip', 'title'=>'Edit Details'] ) !!}

                    {!! link_to_route('users.show', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-primary fa fa-list', 'data-toggle'=>'tooltip', 'title'=>'Show Details'] ) !!}

                    {!! link_to_route('user.order.records', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-warning fa fa-shopping-cart', 'data-toggle'=>'tooltip', 'title'=>'Show Order Records'] ) !!}

                    <a href="#" class="btn btn-outline btn-circle btn-danger" data-toggle="modal" data-target="#myModal{!! $row->id !!}"> <span class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"> </span> </a> 
                </li>
                {!! Form::close() !!} 
            </ul>
        </div>
    </td>
    <td>{!! $row->id !!}</td>
    <td><a href="{!! route('user.order.records', $row->id) !!}" target="_blank" data-toggle="tooltip" title="See Order Records of {!! $row->name !!}" >{!! $row->name !!}</a></td>
    <td>{!! $row->email !!}</td>
    {{-- if you find role table, show role title. If not, show 'Uncategorized' --}}
    {{-- <td>{!! $row->role ? $row->role->role_title : 'Uncategorized' !!}</td> --}}
    <td>
        @if($row->role_id == 1)
            <span class="label label-primary">Super Admin</span>
        @elseif($row->role_id == 2)
            <span class="label label-info">Admin</span>
        @elseif($row->role_id == 3)
            <span class="label label-success">Customer</span>
        @elseif($row->role_id == 4)
            <span class="label label-warning">Staff</span>
        @elseif($row->role_id == 5)
            <span class="label label-danger">Software Engineer</span>
        @elseif($row->role_id == 0)
            <span class="label label-default">Uncategorized</span>
        @endif
    </td>
    <td>
        @if($row->status == 1)
            <span class="label label-success">Active</span>
        @elseif($row->status == 0)
            <span class="label label-danger">Pending</span>
        @endif
    </td>
    <td>@if($row->image == '')
        No user image
        @else
        <img src="{!! asset('uploads/users/thumbnail/'.$row->image) !!}" alt="{!! $row->image !!}" />
        @endif
    </td>
    <td>{!! $row->created_at ? $row->created_at->diffForHumans() : 'No Date' !!}</td>     

    @include('backend_views.modules.users._index_modal_delete')

</tr>
@endforeach