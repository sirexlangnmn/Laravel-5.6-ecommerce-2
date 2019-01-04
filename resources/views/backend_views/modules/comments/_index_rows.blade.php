@foreach($comments as $row)    
<tr class="text-center">
    <td>
        <div class="btn-group btn-mini dropdown">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button"> Action <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu animated flipInY">
                {!! Form::open(['route'=>['comments.destroy', $row->id], 'method'=>'DELETE' ]) !!}

                <li>
                    <a href="{!! action('CommentRepliesController@show', $row->id) !!}" class="btn btn-outline btn-circle btn-primary" target="_blank"> <span class="fa fa-comment-o" data-toggle="tooltip" title="View replies in this comment via admin side."> </span> </a> 
 
                    <a href="#" class="btn btn-outline btn-circle btn-danger" data-toggle="modal" data-target="#myModal{!! $row->id !!}"> <span class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"> </span> </a> 
                </li>

                {!! Form::close() !!} 
            </ul>
        </div>
    </td>
    <td>{!! $row->id !!}</td>
    <td>{!! $row->post->post_title !!}</td>
    <td>
        <a href="{!! route('users.show', $row->user->id ) !!}" target="_blank" toggle="tooltip" title="Click to view user details">{!! $row->user->name !!}</a>
    </td>
    <td><a href="{!! action('FrontPostsController@show', $row->post->slug ) !!}" target="_blank" toggle="tooltip" title="Click to view the post and comments">{!! str_limit($row->body, 30) !!}</a></td>
    <td>
        @if($row->status == 1)
            {!! Form::open(['method'=>'PUT', 'action'=>['CommentsController@update', $row->id]]) !!}
            <input type="hidden" name="status" value="0" />
            {!! Form::submit('Approved', ['class'=>'btn btn-outline btn-rounded btn-success', 'toggle'=>'tooltip', 'title'=>'Click if you want to disable this comment']) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['method'=>'PUT', 'action'=>['CommentsController@update', $row->id]]) !!}
            <input type="hidden" name="status" value="1" />
            {!! Form::submit('Disabled', ['class'=>'btn btn-outline btn-rounded btn-danger', 'toogle'=>'tooltip', 'title'=>'Click if you want to enable this comment']) !!}
            {!! Form::close() !!}
        @endif
    </td>
    <td>{!! $row->created_at ? $row->created_at->diffForHumans() : 'No Date' !!}</td>    

    @include('backend_views.modules.comments._index_modal_delete')

</tr>
@endforeach