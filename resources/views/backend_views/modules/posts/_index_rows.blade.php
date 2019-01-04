@foreach($posts as $row)

<tr class="text-center">
    <td>
        <label class="custom-control custom-checkbox">                   
            <input type="checkbox" name="checkBoxArray[]" id="checkBoxes" class="custom-control-input checkBoxes" value="{!! $row->id !!}" />
            <span class="custom-control-indicator"></span>
        </label>
    </td>
    <td>
        <div class="btn-group btn-mini dropdown">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button"> Action <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu animated flipInY">
                {!! Form::open(['route'=>['posts.destroy', $row->id], 'method'=>'DELETE' ]) !!}
                    {{-- <li>{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}</li> --}}
                    {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}

                <li>
                    {!! link_to_route('posts.edit', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-info fa fa-edit', 'data-toggle'=>'tooltip', 'title'=>'Edit this post'] ) !!}

                    {!! link_to_route('comments.show', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-primary fa fa-comment-o', 'data-toggle'=>'tooltip', 'title'=>'View comments in this post via admin side.', 'target'=>'_blank'] ) !!}

                    <a href="{!! action('FrontPostsController@show', $row->slug) !!}" class="btn btn-outline btn-circle btn-warning" target="_blank"> <span class=" fa fa-list" data-toggle="tooltip" title="View comments in this post via front side"> </span> </a> 

                    <a href="#" class="btn btn-outline btn-circle btn-danger" data-toggle="modal" data-target="#myModal{!! $row->id !!}"> <span class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"> </span> </a> 
                </li>
                {!! Form::close() !!} 
            </ul>
        </div>
    </td>
    <td>{!! $row->id !!}</td>
    <td>{!! $row->post_title !!}</td>
    <td>{!! str_limit($row->post_body, 30) !!}</td>
    <td>@if($row->post_image == '')
        No post image
        @else
        <img src="{!! asset('uploads/posts/thumbnail/'.$row->post_image) !!}" alt="{!! $row->post_image !!}" />
        @endif
    </td>
    <td>
        @if($row->post_status == 1)
            <span class="label label-success">Active</span>
        @elseif($row->post_status == 0)
            <span class="label label-danger">Disabled</span>
        @endif
    </td>
    <td><a href="{!! route('users.show', $row->user->id ) !!}" target="_blank">{!! $row->user->name !!}</a></td>
    {{-- if you find post category table, show pc title. If not, show 'Uncategorized' --}}
    <td>{!! $row->post_category ? $row->post_category->pc_title : 'Uncategorized' !!}</td>
    <td>@if($row->post_image == '')
        No post image
        @else
        <img src="{!! asset('uploads/media/thumbnail/'.$row->photo->photo_title) !!}" alt="{!! $row->photo->photo_title !!}" />
        @endif
    </td>    
    <td>{!! $row->created_at ? $row->created_at->diffForHumans() : 'No Date' !!}</td>    

    @include('backend_views.modules.posts._index_modal_delete')

</tr>


@endforeach