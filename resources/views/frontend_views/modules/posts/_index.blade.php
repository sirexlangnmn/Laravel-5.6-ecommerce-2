<div class="container">

    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Blogs</li>
            <li>Blogs List</li>
        </ul>
    </div>

    {{---------------------------------------}}
    {{-- left column | blog list --}}
    {{---------------------------------------}}
    <div class="col-sm-9" id="blog-listing">
        @php
            $i = 1;
        @endphp

        @foreach($posts as $key => $row)
        <div class="post">
            <h3>{!! $i ++ !!}. &nbsp; 
                <a href="{!! action('FrontPostsController@show', $parameters = [$row->slug], $absolute = true) !!}">
                {!! $row->post_title !!}</a>
            </h3>
            <p class="author-category">By <a href="#">{!! $row->user->name !!}</a> in <a href="">Fashion and style</a></p>
            <hr>
            <p class="date-comments">
                <a href="#"><i class="fa fa-calendar-o"></i>{!! $row->created_at !!}</a>
                @if ($row->comments->count() == 0)
                <a href="#"><i class="fa fa-comment-o"></i>No Comment Available</a>
                @elseif ($row->comments->count() == 1)
                <a href="#"><i class="fa fa-comment-o"></i>{!! $row->comments->count() !!} Comment</a>
                @elseif ($row->comments->count() >= 1)
                <a href="#"><i class="fa fa-comment-o"></i>{!! $row->comments->count() !!} Comments</a>
                @endif
            </p>
            <div class="image">
                <a href="{!! action('FrontPostsController@show', $parameters = [$row->slug], $absolute = true) !!}">
                    <img src="{!! asset('uploads/posts/large/'.$row->post_image) !!}" 
                    class="img-responsive" alt="{!! $row->post_image !!}">
                </a>
            </div>
            <p class="intro">{!! $row->post_body !!}.</p>
            <p class="read-more">
                <a href="{!! action('FrontPostsController@show', $parameters = [$row->slug], $absolute = true) !!}" 
                class="btn btn-primary">Continue reading</a>
            </p>
        </div>
        @endforeach

        <ul class="pager">
            {!! $posts->render() !!}  {{-- pagination --}} 
        </ul>
        {{-- 
            <ul class="pagination">
            <li class="previous"><a href="#">&larr; Older</a>
            </li>
            <li class="next disabled"><a href="#">Newer &rarr;</a>
            </li>            
        </ul> 
         --}}
       
        {{-- 
        <ul class="pager">
            <li class="previous"><a href="#">&larr; Older</a>
            </li>
            <li class="next disabled"><a href="#">Newer &rarr;</a>
            </li>            
        </ul> 
        --}}
    </div>  <!-- /.col-md-9 -->
    <!-- /.left column -->


    {{---------------------------------------}}
    {{-- right column | blog menu --}}
    {{---------------------------------------}}    
    <div class="col-md-3">
        @include('frontend_views.modules.posts._blog_menu')
    </div>
    <!-- /. blog menu end -->

</div>
<!-- /.container -->