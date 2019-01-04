@extends('backend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.dataTablesAndDataExportcss')
@endsection

@section('breadcrumb')
{{-- {!! dd($order) !!} --}}
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Ordered Details</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Ordered Details</li>
        </ol>
    </div>
@endsection
            
<!-- Module|Page Content -->
@section('modules')
<div class="table-responsive">
    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>OI-ID</th>
                <th>O-ID</th>
                <th>Ordered Quantity</th>
                <th>Ordered Price</th>
                <th>P-ID</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Price</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>OI-ID</th>
                <th>O-ID</th>
                <th>Ordered Quantity</th>
                <th>Ordered Price</th>
                <th>P-ID</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Price</th>
            </tr>
        </tfoot>
        <tbody>
            {{-- {!! dd($orders) !!} --}}
            @foreach($orderItems as $item)
            <tr class="text-center" colspan="2">
                <td>{!! $item->id !!}</td>
                <td>{!! $item->order_id !!}</td>
                <td>{!! $item->oi_quantity !!}</td>
                <td>{!! $item->oi_price !!}</td>
                <td>{!! $item->product_id !!}</td>
                <td><a href="{!! route('products.show', $item->product_id) !!}" target="_blank" >{!! $item->product_name !!}</a></td>
                <td>{!! $item->product_code !!}</td>
                <td>{!! $item->product_price !!}</td>            
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <h3 class="box-title m-t-40">Customer Info</h3>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="150">User ID</td>
                        <td><strong>{!! $order->user->id !!}</strong></td>
                    </tr>
                    <tr>
                        <td width="150">Fullname</td>
                        <td><strong>{!! $order->user->name !!}</strong></td>
                    </tr>
                    <tr>
                        <td width="150">Email</td>
                        <td><strong>{!! $order->user->email !!}</strong></td>
                    </tr>
                    <tr>
                        <td width="150">Registered At</td>
                        <td><strong>{!! $order->user->created_at !!}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <h3 class="box-title m-t-40">Order Info</h3>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="150">Order Date</td>
                        <td><strong>{!! $order->order_date !!}</strong></td>
                    </tr>
                    <tr>
                        <td width="150">Order Status</td>
                        <td>
                            @if($order->order_status == 3)
                                <span class="label label-success">Delivered</span>
                            @elseif($order->order_status == 2)
                                <span class="label label-primary">On The Way</span>
                            @elseif($order->order_status == 1)
                                <span class="label label-info">Confirmed</span>
                            @elseif($order->order_status == 0)
                                <span class="label label-warning">Pending</span>
                            @elseif($order->order_status == 4)
                                <span class="label label-danger">Cancelled</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<!-- /.Module|Page Content -->

@section('script')
    @include('backend_views.components.dataTablesAndDataExportjs')
@endsection


        