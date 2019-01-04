<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend_assets/images/logo/logo_circle.png') }}">
    <title>Ecommerce v2.0 | Laravel 5.6</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('backend_assets/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('backend_assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') !!}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{!! asset('backend_assets/css/animate.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! asset('backend_assets/css/style.css') !!}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{!! asset('backend_assets/css/colors/blue.css') !!}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') !!}"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>


    @yield('content')


    <!-- jQuery -->
    <script src="{!! asset('backend_assets/plugins/bower_components/jquery/dist/jquery.min.js') !!}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('backend_assets/bootstrap/dist/js/tether.min.js') !!}"></script>
    <script src="{!! asset('backend_assets/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('backend_assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js') !!}"></script>
     
     @yield('script')

    <!-- Menu Plugin JavaScript -->
    <script src="{!! asset('backend_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') !!}"></script>
    <!--slimscroll JavaScript -->
    <script src="{!! asset('backend_assets/js/jquery.slimscroll.js') !!}"></script>
    <!--Wave Effects -->
    <script src="{!! asset('backend_assets/js/waves.js') !!}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{!! asset('backend_assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') !!}"></script>
    <script src="{!! asset('backend_assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js') !!}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('backend_assets/js/custom.min.js') !!}"></script>
    <!--Style Switcher -->
    <script src="{!! asset('backend_assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') !!}"></script>

</body>

</html>
