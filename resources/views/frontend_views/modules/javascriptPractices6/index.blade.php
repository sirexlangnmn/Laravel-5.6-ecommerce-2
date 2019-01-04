@extends('frontend_views.layouts.master_page')

@section('content')

<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Javascript Tutorials</li>
            <li>L5.5 and Ajax Tutorial - Advanced CRUD example Search, Sort, Paginate</li>
        </ul>
    </div>

    <div class="col-md-3">
        <!-- Side Nav -->
        @include('frontend_views.layouts.javascriptPracticesSideNav')
        <!-- Side Nav End -->
    </div>
    

    <div class="col-md-9">
        <div class="box">
            <p class="lead">Roles</p>
            <hr>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th># 1735</th>
                            <td>22/06/2013</td>
                            <td>$ 150.00</td>
                            <td><span class="label label-info">Being prepared</span></td>
                            <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->


{{-- <tbody>
    <tr>
        <th># 1735</th>
        <td>22/06/2013</td>
        <td>$ 150.00</td>
        <td><span class="label label-info">Being prepared</span>
        </td>
        <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
        </td>
    </tr>
    <tr>
        <th># 1735</th>
        <td>22/06/2013</td>
        <td>$ 150.00</td>
        <td><span class="label label-success">Received</span>
        </td>
        <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
        </td>
    </tr>
    <tr>
        <th># 1735</th>
        <td>22/06/2013</td>
        <td>$ 150.00</td>
        <td><span class="label label-danger">Cancelled</span>
        </td>
        <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
        </td>
    </tr>
    <tr>
        <th># 1735</th>
        <td>22/06/2013</td>
        <td>$ 150.00</td>
        <td><span class="label label-warning">On hold</span>
        </td>
        <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
        </td>
    </tr>
</tbody> --}}

@endsection

@section('script')

@endsection

