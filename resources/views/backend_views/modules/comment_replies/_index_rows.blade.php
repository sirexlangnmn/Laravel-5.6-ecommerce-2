@foreach($comment_replies as $row)    
<tr class="text-center">
    <td>
        <a href="#" class="btn btn-outline btn-circle btn-danger" data-toggle="modal" data-target="#myModal{!! $row->id !!}"> <span class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"> </span> </a> 
    </td>
    <td>{!! $row->id !!}</td>
    <td>{!! $row->comment_id !!}</td>
    <td>
        <a href="{!! route('users.show', $row->user->id ) !!}" target="_blank" toggle="tooltip" title="Click to view user details">{!! $row->user->name !!}</a>
    </td>
    <td><a href="{!! action('FrontPostsController@show', $row->comment->post->slug ) !!}" target="_blank" toggle="tooltip" title="Click to view the post and comments">{!! str_limit($row->body, 30) !!}</a></td>
    <td>
        @if($row->status == 1)
            {!! Form::open(['method'=>'PUT', 'action'=>['CommentRepliesController@update', $row->id]]) !!}
            <input type="hidden" name="status" value="0" />
            {!! Form::submit('Approved', ['class'=>'btn btn-outline btn-rounded btn-success', 'toggle'=>'tooltip', 'title'=>'Click if you want to disable this comment']) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['method'=>'PUT', 'action'=>['CommentRepliesController@update', $row->id]]) !!}
            <input type="hidden" name="status" value="1" />
            {!! Form::submit('Disabled', ['class'=>'btn btn-outline btn-rounded btn-danger', 'toogle'=>'tooltip', 'title'=>'Click if you want to enable this comment']) !!}
            {!! Form::close() !!}
        @endif
    </td>
    <td>{!! $row->created_at ? $row->created_at->diffForHumans() : 'No Date' !!}</td>    

    @include('backend_views.modules.comment_replies._index_modal_delete')

</tr>
@endforeach