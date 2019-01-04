<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="keywords" content="">
    <meta name="keywords" content="">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script>
    window.Laravel = json_encode([
        'csrf-token' => csrf_token(),
    ]); 
    </script>
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/logo/logo_circle.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    {!! Html::style('frontend_assets/css/font-awesome.css') !!}
    {!! Html::style('frontend_assets/css/bootstrap.min.css') !!}
    {!! Html::style('frontend_assets/css/animate.min.css') !!}
    {!! Html::style('frontend_assets/css/owl.carousel.css') !!}
    {!! Html::style('frontend_assets/css/owl.theme.css') !!}
    <!-- theme stylesheet -->
    {!! Html::style('frontend_assets/css/style.default.css') !!}
    <!-- your stylesheet with modifications -->
    {!! Html::style('frontend_assets/css/custom.css') !!}
    {!! Html::script('frontend_assets/js/respond.min.js') !!}
    
    {!! Html::script('frontend_assets/js/jquery-1.11.0.min.js') !!}
    {!! Html::script('frontend_assets/js/bootstrap.min.js') !!}
    @yield('style')

</head>

<body>


@include('frontend_views.layouts.topbar')
@include('frontend_views.layouts.navbar')

<div id="all">

    <div id="content">

        @yield('content')

    </div><!-- /#content -->
    
    @include('frontend_views.layouts.footer')

</div><!-- /#all -->

@yield('script')
{!! Html::script('frontend_assets/js/jquery.cookie.js') !!}
{!! Html::script('frontend_assets/js/waypoints.min.js') !!}
{!! Html::script('frontend_assets/js/modernizr.js') !!}
{!! Html::script('frontend_assets/js/bootstrap-hover-dropdown.js') !!}
{!! Html::script('frontend_assets/js/owl.carousel.min.js') !!}
{!! Html::script('frontend_assets/js/front.js') !!}



</body>

</html>