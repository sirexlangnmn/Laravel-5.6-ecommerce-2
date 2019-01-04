@extends('backend_views.layouts.master_page')

@section('style')
    {!! Html::style('backend_assets/plugins/bower_components/morrisjs/morris.css') !!}
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        
        ga('create', 'UA-19175540-9', 'auto');
        ga('send', 'pageview');
    </script>
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Ecom-Dashboard</h4>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li class="active">Ecom-Dashboard</li>
    </ol>
</div><!-- /.col-lg-12 -->
@endsection

@section('modules')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box" style="background-color: #F5F5F5;">
            <h3 class="box-title"><i class="fa fa-eye text-success"></i><a href="" toggle="tooltip" title="View Details"> Visitors</a></h3>
            <div class="text-right"> <span class="text-muted">Todays Visitors</span>
                <h1><sup><i class="ti-arrow-up text-success"></i></sup> 10,000</h1>
            </div>
            <span class="text-info">60%</span>
            <div class="progress m-b-0">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box" style="background-color: #F5F5F5;">
            <h3 class="box-title"><i class="ti-shopping-cart text-success"></i><a href="{{ route('products.index') }}" toggle="tooltip" title="View Details" target="_blank" > PRODUCTS</a></h3>
            <div class="text-right"> <span class="text-muted">Todays Products</span>
                <h1><sup><i class="ti-arrow-up text-success"></i></sup>{{ $products->count() }}</h1>
            </div>
            <span class="text-success">20%</span>
            <div class="progress m-b-0">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box" style="background-color: #F5F5F5;">
            <h3 class="box-title"><i class="ti-shopping-cart text-danger"></i><a href="{{ route('orders.index') }}" toggle="tooltip" title="View Details" target="_blank" > ORDERS</a></h3>
            <div class="text-right"> <span class="text-muted"> Orders List</span>
                <h1><sup><i class="ti-arrow-down text-danger"></i></sup>{{ $orders->count() }}</h1>
            </div>
            <span class="text-danger">30%</span>
            <div class="progress m-b-0">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box" style="background-color: #F5F5F5;">
            <h3 class="box-title"><i class="fa fa-users text-info"></i><a href="{{ route('users.index') }}" toggle="tooltip" title="View Details" target="_blank" > USERS</a></h3>
            <div class="text-right"> <span class="text-muted"> Total Active Users</span>
                <h1><sup><i class="ti-arrow-up text-info"></i></sup>{{ $users->count() }}</h1>
            </div>
            <span class="text-info">60%</span>
            <div class="progress m-b-0">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
            </div>
        </div>
    </div>
</div>
<!--row -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box" style="background-color: #F5F5F5;">
            <h3 class="box-title"><i class="ti-shopping-cart text-success"></i> Order Received</h3>
            <div class="text-right"> <span class="text-muted">Todays Order</span>
                <h1><sup><i class="ti-arrow-up text-success"></i></sup> 12,000</h1>
            </div>
            <span class="text-success">20%</span>
            <div class="progress m-b-0">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box" style="background-color: #F5F5F5;">
            <h3 class="box-title"><i class="ti-cut text-danger"></i> Tax Deducation</h3>
            <div class="text-right"> <span class="text-muted">Monthly Deduction</span>
                <h1><sup><i class="ti-arrow-down text-danger"></i></sup> $5,000</h1>
            </div>
            <span class="text-danger">30%</span>
            <div class="progress m-b-0">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box" style="background-color: #F5F5F5;">
            <h3 class="box-title"><i class="ti-wallet text-info"></i> Revenue Stats</h3>
            <div class="text-right"> <span class="text-muted">Weekly Revenue</span>
                <h1><sup><i class="ti-arrow-up text-info"></i></sup> $10,000</h1>
            </div>
            <span class="text-info">60%</span>
            <div class="progress m-b-0">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box" style="background-color: #F5F5F5;">
            <h3 class="box-title"><i class="ti-stats-up"></i> Yearly Sales</h3>
            <div class="text-right"> <span class="text-muted">Yearly Income</span>
                <h1><sup><i class="ti-arrow-up text-inverse"></i></sup> $9,000</h1>
            </div>
            <span class="text-inverse">80%</span>
            <div class="progress m-b-0">
                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
            </div>
        </div>
    </div>
</div>
<!--row -->
<!--row -->
<div class="row">
    <div class="col-md-7 col-lg-8 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Product Sales</h3>
            <ul class="list-inline text-center">
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>iMac</h5>
                </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>iPhone</h5>
                </li>
            </ul>
            <div id="morris-area-chart2" style="height: 370px;"></div>
        </div>
    </div>
    <div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Order Stats</h3>
            <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
            <ul class="list-inline m-t-30 text-center">
                <li class="p-r-20">
                    <h5 class="text-muted"><i class="fa fa-circle" style="color: #fb9678;"></i> Order</h5>
                    <h4 class="m-b-0">8500</h4>
                </li>
                <li class="p-r-20">
                    <h5 class="text-muted"><i class="fa fa-circle" style="color: #01c0c8;"></i> Pending</h5>
                    <h4 class="m-b-0">3630</h4>
                </li>
                <li>
                    <h5 class="text-muted"> <i class="fa fa-circle" style="color: #4F5467;"></i> Delivered</h5>
                    <h4 class="m-b-0">4870</h4>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Product Overview</h3>
            <div class="table-responsive">
                <table class="table product-overview">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Order ID</th>
                            <th>Photo</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Steave Jobs</td>
                            <td>#85457898</td>
                            <td>
                                <img src="{!! asset('backend_assets/plugins/images/chair.jpg') !!}" alt="iMac" width="80">
                            </td>
                            <td>Rounded Chair</td>
                            <td>20</td>
                            <td>10-7-2017</td>
                            <td>
                                <span class="label label-success font-weight-100">Paid</span>
                            </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Varun Dhavan</td>
                            <td>#95457898</td>
                            <td>
                                <img src="{!! asset('backend_assets/plugins/images/chair2.jpg') !!}" alt="iPhone" width="80">
                            </td>
                            <td>Wooden Chair</td>
                            <td>25</td>
                            <td>09-7-2017</td>
                            <td>
                                <span class="label label-warning font-weight-100">Pending</span>
                            </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Ritesh Desh</td>
                            <td>#68457898</td>
                            <td>
                                <img src="{!! asset('backend_assets/plugins/images/chair3.jpg') !!}" alt="apple_watch" width="80">
                            </td>
                            <td>Gray Chair</td>
                            <td>12</td>
                            <td>08-7-2017</td>
                            <td>
                                <span class="label label-success font-weight-100">Paid</span>
                            </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>Hrithik</td>
                            <td>#45457898</td>
                            <td>
                                <img src="{!! asset('backend_assets/plugins/images/chair4.jpg') !!}" alt="mac_mouse" width="80">
                            </td>
                            <td>Pure Wooden chair</td>
                            <td>18</td>
                            <td>02-7-2017</td>
                            <td>
                                <span class="label label-default font-weight-100">Failed</span>
                            </td>
                            <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    {!! Html::script('backend_assets/plugins/bower_components/morrisjs/morris.js') !!}
    {!! Html::script('backend_assets/js/dashboard1.js') !!} 
@endsection