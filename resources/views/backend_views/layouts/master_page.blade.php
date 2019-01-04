<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
    {{-- @include('backend_views.layouts.meta_page') --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/logo/logo_circle.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script>
    window.Laravel = json_encode([
        'csrf-token' => csrf_token(),
    ]);
    </script>
    
    {{-- @include('backend_views.layouts.style_page') --}}
    {{-- {!! Html::style('') !!} --}}
    <!-- Bootstrap Core CSS -->
    {!! Html::style('backend_assets/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('backend_assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') !!}

    @yield('style')

    <!-- dataTablesAndDataExport related to data-table.html -->
    {{-- @include('backend_views.components.dataTablesAndDataExportcss') --}}
    
    <!-- Menu CSS -->
    {!! Html::style('backend_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') !!}

    <!-- carousel -->
    {{-- @include('backend_views.components.carousel_css') --}}

    <!-- toast CSS -->
    {!! Html::style('backend_assets/plugins/bower_components/toast-master/css/jquery.toast.css') !!}

    <!-- morris CSS -->
    {{-- {!! Html::style('backend_assets/plugins/bower_components/morrisjs/morris.css') !!} --}}

    <!-- animation CSS -->
    {!! Html::style('backend_assets/css/animate.css') !!}
    <!-- Custom CSS -->
    {!! Html::style('backend_assets/css/style.css') !!}
    <!-- color CSS -->
    {!! Html::style('backend_assets/css/colors/blue.css') !!}
    <!-- custom CSS -->
    {!! Html::style('backend_assets/css/custom.css') !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') !!}"></script>
    <![endif]-->
    

    {{-- Google Analytics here.. Pero nilagay ko na sa dashboard_page --}}

</head>
<body>
    {{-- @include('backend_views.layouts.preloader_page') --}}
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    {{-- <div class="preloader">
        <i class="fa fa-refresh fa-spin fa-2x fa-tw"></i>
    </div>     --}}

    
    {{-- @include('backend_views.layouts.topnav_page') --}}
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part" style="background-color: #03A9F3;">
                <a class="logo" href="index.html">
                    <b>
                        <!--This is dark logo icon-->
                        {{-- <img src="{!! asset('backend_assets/images/logo/logo_long.png') !!}" style="width: 200; height: 30px;" alt="home" class="dark-logo" /> --}}
                        <!--This is light logo icon-->
                        <img src="{!! asset('uploads/logo/logo_long.png') !!}" style="width: 200px; height: 35px;" alt="home" class="light-logo" />
                    </b>
                    <span class="hidden-xs">
                        <!--This is dark logo text-->
                        {{-- <img src="{!! asset('backend_assets/images/logo/logo_circle.png') !!}" style="width: 200; height: 30px;" alt="home" class="dark-logo" /> --}}
                        <!--This is light logo text-->
                        {{-- <img src="{!! asset('backend_assets/images/logo/logo_circle.png') !!}" style="width: 200; height: 30px;" alt="home" class="light-logo" /> --}}
                    </span>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    

    @include('backend_views.layouts.sidenav_page')
    
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    @yield('breadcrumb')
                </div>  <!-- /.row bg-title -->
                <div class="row">   <!-- Module|Page Content -->
                    <div class="col-sm-12">
                        {{-- @include('backend_views.layouts.flash_message_page') --}}
                        <div class="white-box">
                            @yield('modules')
                        </div>
                    </div>
                </div>  <!-- /.Module|Page Content -->
            </div>  <!-- /.container-fluid -->
            @include('backend_views.layouts.footer_page')
        </div>  <!-- /.page-wrapper -->
    </div>  <!-- /.wrapper -->
    

    {{-- @include('backend_views.layouts.script_page') --}}
    <!-- jQuery -->
    {{-- {!! Html::script('') !!} --}}
    {!! Html::script('backend_assets/plugins/bower_components/jquery/dist/jquery.min.js') !!}
    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('backend_assets/bootstrap/dist/js/tether.min.js') !!}
    {!! Html::script('backend_assets/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('backend_assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js') !!}
    <!-- Menu Plugin JavaScript -->
    {!! Html::script('backend_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') !!}
    <!--slimscroll JavaScript -->
    {!! Html::script('backend_assets/js/jquery.slimscroll.js') !!}
    <!--Wave Effects -->
    {!! Html::script('backend_assets/js/waves.js') !!}
    
    {{-- carousel --}}
    {{-- @include('backend_views.components.carousel_js') --}}
    
    <!--Counter js -->
    {!! Html::script('backend_assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js') !!}
    {!! Html::script('backend_assets/plugins/bower_components/counterup/jquery.counterup.min.js') !!}
    <!--Morris JavaScript -->
    {!! Html::script('backend_assets/plugins/bower_components/raphael/raphael-min.js') !!}
    {{-- {!! Html::script('backend_assets/plugins/bower_components/morrisjs/morris.js') !!} --}}
    <!-- Custom Theme JavaScript -->
    {!! Html::script('backend_assets/js/custom.min.js') !!}
    <!-- Sparkline chart JavaScript -->
    {!! Html::script('backend_assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') !!}
    {!! Html::script('backend_assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js') !!}
    
    {{-- {!! Html::script('backend_assets/js/dashboard1.js') !!} --}}
    
    <!-- Sparkline chart JavaScript -->
    {!! Html::script('backend_assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') !!}
    {!! Html::script('backend_assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js') !!}

    @yield('script')

    <!-- dataTablesAndDataExport related to data-table.html -->
    {{-- @include('backend_views.components.dataTablesAndDataExportjs') --}}

    <!--Style Switcher -->
    {!! Html::script('backend_assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') !!}

    <!-- thumbnail before upload -->
    @include('backend_views.components.rexImageThumbBeforeUpload')

    <!-- jasny-bootstrap related to form-basic.html -->
    @include('backend_views.components.jasny-bootstrap')



</body>
</html>