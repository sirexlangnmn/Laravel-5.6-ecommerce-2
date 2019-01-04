
{!! Form::open(['action'=>'FrontPostsController@storeComment', 'method'=>'POST']) !!}

{!! Form::hidden('post_id', $row->id ) !!}
{!! Form::bsTextArea('body', $row->body, ['rows'=>'3', ]) !!}
{!! Form::bsSubmit('Submit', ['class'=>'btn btn-block btn-outline btn-rounded btn-success m-r-10']) !!}
    
{!! Form::close() !!}



