@extends('frontend_views.layouts.master_page')

@section('content')
<div class="container">

    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a>
            </li>
            <li><a href="blog.html">Blog</a>
            </li>
            <li>Blog post</li>
        </ul>
    </div>

    {{-------------------------------------------}}
    {{-- left column | blog | comments | reply --}}
    {{-------------------------------------------}}  
    <div class="col-sm-9" id="blog-post">
        @include('backend_views.layouts.flash_message_page')
        <div class="box">
            <h3>{!! $row->post_title !!}</h3>
            <p class="author-date">By <a href="#">{!! $row->user->name !!}</a> | {!! $row->created_at !!}</p>
            <p class="lead">Here is overview of posts</p>

            <div id="post-content">
                <p>
                    @if($row->post_image == '')
                        No post image
                        @else
                        <img src="{!! asset('uploads/posts/large/'.$row->post_image) !!}" class="img-responsive" alt="{!! $row->post_image !!}" />
                        @endif
                </p>

                <p>{!! $row->post_body !!}</p>
            </div>
            <!-- /#post-content -->
            
            {{-- this form will appear when the user is logged in --}}
            @if(Auth::check())
                <div id="comment-form" data-animate="fadeInUp">
                    <h4>Leave comment here</h4>
                
                    
                    {{-- @include('components.toast-message') --}}
                    @include('frontend_views.modules.posts._show_comment_form')
                
                </div>
            @endif
            <!-- /#comment-form -->
            @include('frontend_views.modules.posts._show_comment')
        </div>
        <!-- /.box -->
    </div><!-- /.blog-post -->
    <!-- /.left column | blog | comments | reply  -->


    {{-------------------------------------------}}
    {{-- left column | blog menu --}}
    {{-------------------------------------------}} 
    <div class="col-md-3">
        @include('frontend_views.modules.posts._blog_menu')
    </div>

</div>
<!-- /.container -->


@endsection


@section('script')
<script>
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });   
</script>
@endsection