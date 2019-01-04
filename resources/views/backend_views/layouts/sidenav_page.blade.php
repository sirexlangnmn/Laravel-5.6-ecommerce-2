<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="{!! asset('uploads/users/medium/'.Auth::user()->userProfile->avatar) !!}" alt="user-img" class="img-circle"></div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="{!! route('users.show', Auth::user()->id) !!}"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();" > 

                            <i class="fa fa-power-off"></i> {{ __('Logout') }}
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf 
                            </form> 
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li>
                <div class="hide-menu t-earning">
                    <div id="sparkline2dash" class="m-b-10"></div>
                    <small class="db">TOTAL EARNINGS - JUNE 2017</small>
                    <h3 class="m-t-0 m-b-0">$2,478.00</h3>
                </div>
            </li>
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
            <li> <a href="{!! route('dashboard_route') !!}" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Dashboard</span></a> </li>

            <li><a href="#" class="waves-effect"><i data-icon="O" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">Products<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">7</span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! route('products.create') !!}">Create Products</a></li>
                    <li><a href="{!! route('products.index') !!}">Products List</a></li>
                </ul>
            </li>
            <li> <a href="{!! route('orders.index') !!}" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Orders</span></a> </li>

            <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="F" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">All About Post<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    {{-- <li> <a href="javascript:void(0)">Second Level Item</a> </li> --}}
                    <li> <a href="javascript:void(0)" class="waves-effect"> Post <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li><a href="{!! route('posts.create') !!}">Create Posts</a></li>
                            <li><a href="{!! route('posts.index') !!}">Posts List</a></li>
                            <li><a href="{!! route('comments.index') !!}">All Comments</a></li>
                            <li><a href="{!! route('replies.index') !!}">All Replies</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"> Post Category <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{!! route('post-categories.create') !!}">
                                Create Post Category</a>
                            </li>
                            <li><a href="{!! route('post-categories.index') !!}">
                                Post Categories List</a>
                            </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"> Post Tags <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li><a href="{!! url('/admin/tags-index') !!}">
                                Post Tags List</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#" class="waves-effect"><i data-icon="O" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">Users<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">7</span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! route('users.create') !!}">Create User</a></li>
                    <li><a href="{!! route('users.index') !!}">Users List</a></li>
                </ul>
            </li>

            <li><a href="tables.html" class="waves-effect"><i data-icon="O" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">Tables<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">7</span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="basic-table.html">Basic Tables</a></li>
                    <li><a href="table-layouts.html">Table Layouts</a></li>
                </ul>
            </li>
            <li> <a href="widgets.html" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Widgets</span></a> </li>

            <li class="nav-small-cap">--- Front View </li>
            <li><a href="tables.html" class="waves-effect"><i data-icon="O" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">Tables<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">7</span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="basic-table.html">Basic Tables</a></li>
                    <li><a href="table-layouts.html">Table Layouts</a></li>
                </ul>
            </li>
            <li> <a href="widgets.html" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Widgets</span></a> </li>
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->