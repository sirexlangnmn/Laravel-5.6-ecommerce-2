@foreach($post_categories as $row)    
<tr class="text-center">
    <td>
        <div class="btn-group btn-mini dropdown">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button"> Action <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu animated flipInY">
                {!! Form::open(['route'=>['post-categories.destroy', $row->id], 'method'=>'DELETE' ]) !!}
                    {{-- <li>{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}</li> --}}
                    {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}

                <li>
                    {!! link_to_route('post-categories.edit', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-info fa fa-edit', 'data-toggle'=>'tooltip', 'title'=>'Edit Details'] ) !!}

                    <a href="#" class="btn btn-outline btn-circle btn-danger" data-toggle="modal" data-target="#myModal{!! $row->id !!}"> <span class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"> </span> </a> 
                </li>
                {!! Form::close() !!} 
            </ul>
        </div>
    </td>
    <td>{!! $row->id !!}</td>
    <td>{!! $row->pc_title !!}</td>
    <td>{!! str_limit($row->pc_description, 20) !!}</td>
    <td>
        @if($row->pc_status == 1)
            <span class="label label-success">Active</span>
        @elseif($row->pc_status == 0)
            <span class="label label-danger">Disabled</span>
        @endif
    </td>
    <td>{!! $row->created_at ? $row->created_at->diffForHumans() : 'No Date' !!}</td>  

    @include('backend_views.modules.post_categories._index_modal_delete')

</tr>
@endforeach