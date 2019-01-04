
{{-- 

    if comment count as 0, appear "No comment available"
    else, all comment available will appear. 

--}} 

<div id="comments" data-animate="fadeInUp">

@if(count($comments) > 0)
   
    <h4>{!! (count($comments)) !!} comments</h4>
   
    @foreach($comments as $comment)
        <div class="row comment">
            <div class="col-sm-3 col-md-2 text-center-xs">
                <p><img src="{!! asset('uploads/users/small/'.$comment->user->userProfile->avatar) !!}" class="img-responsive img-circle" alt=""></p>
            </div>
            <div class="col-sm-9 col-md-10">
                <h5>{!! $comment->user->name !!}</h5>
                <p class="posted"><i class="fa fa-clock-o"></i> &nbsp; 
                    {!! $comment->created_at !!} | {!! $comment->created_at->diffForHumans() !!}</p>
                
                <p>{!! $comment->body !!}</p>

                {{-- this form will appear when the user is logged in --}}
                @if(Auth::check())
                    <div class="comment-reply-container">
                        <a class="toggle-reply"><i class="fa fa-reply"></i> Reply</a>
                        <div class="comment-reply">
                            <div id="comment-form" data-animate="fadeInUp">
                                
                                @include('frontend_views.modules.posts._show_reply_form')

                            </div>
                        </div>
                    </div>
                @endif
            
            </div>
        </div>

        {{-- 
        
            while looping the comments record ...
            if comment's reply count as 0, appear nothing.
            else, all replies related to comments will appear. 
        
        --}} 
        @if(count($comment->replies) > 0)
            @foreach($comment->replies as $reply)
                @if($reply->status == 1)
                    <div class="col-sm-3 col-md-2">     </div>
                    <div class="col-sm-9 col-md-10">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p><img src="{!! asset('uploads/users/small/'.$reply->user->userProfile->avatar) !!}" class="img-responsive img-circle" alt=""></p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5>{!! $reply->user->name !!}</h5>
                            <p class="posted"><i class="fa fa-clock-o"></i> &nbsp; 
                                {!! $reply->created_at !!} | {!! $reply->created_at->diffForHumans() !!}</p>
                            
                            <p>{!! $reply->body !!}</p>

                            {{-- this form will appear when the user is logged in --}}
                            @if(Auth::check())
                                <div class="comment-reply-container">
                                    <a class="toggle-reply"><i class="fa fa-reply"></i> Reply</a>
                                    <div class="comment-reply">
                                        <div id="comment-form" data-animate="fadeInUp">
                                            
                                            @include('frontend_views.modules.posts._show_reply_form_toReply')

                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                @endif
            @endforeach
        @endif
            

    @endforeach


@else

    <h4>No comment available</h4>

@endif
<!-- /.comment -->
</div>
<!-- /#comments -->