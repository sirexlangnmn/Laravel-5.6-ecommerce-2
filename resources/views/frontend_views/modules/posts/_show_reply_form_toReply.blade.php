
{!! Form::open(['action'=>'FrontPostsController@storeReplyToReply', 'method'=>'POST']) !!}

{!! Form::hidden('reply_id', $reply->id ) !!}
{!! Form::hidden('comment_id', $comment->id ) !!}
{!! Form::hidden('post_id', $comment->post_id ) !!}
{!! Form::bsTextArea('body', $row->body, ['rows'=>'3', ]) !!}
{!! Form::bsSubmit('Send Reply', ['class'=>'btn btn-block btn-outline btn-rounded btn-success m-r-10']) !!}

{!! Form::close() !!}