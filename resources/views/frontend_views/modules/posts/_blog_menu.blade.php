
    <input type="text"
            class="form-control" 
            value="{{ request()->session()->get('search') }}" 
            onkeydown="if (event.keyCode == 13) ajaxLoad('{{ url('posts') }}?search='+this.value)"
            id="search"
            name="search"
            placeholder="Search topic . . . " />
<br />

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Blog</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="blog.html">About us</a>
            </li>
            <li class="active">
                <a href="blog.html">Fashion</a>
            </li>
            <li>
                <a href="blog.html">News and gossip</a>
            </li>
            <li>
                <a href="blog.html">Design</a>
            </li>
        </ul>
    </div>
</div>

<div class="banner">
    <a href="#">
        <img src="{{ asset('frontend_assets/img/banner.jpg') }}" alt="sales 2014" class="img-responsive">
    </a>
</div> <!-- /.banner -->