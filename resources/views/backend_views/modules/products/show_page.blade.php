@extends('backend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.carousel_css')
@endsection

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Show Product</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="{!! route('products.index') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Go to Product List</a>
        <a href="{!! route('products.create') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create Product</a>
        <a href="{!! route('products.edit', $row->id) !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Edit Product</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Show Product</li>
        </ol>
    </div>
@endsection
            
<!-- Module|Page Content -->
@section('modules')
<h2 class="m-b-0 m-t-0">{!! $row->product_name !!}</h2> <small class="text-muted db">{!! $row->product_code !!}</small>
<hr>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="white-box text-center"> <img src="{!! asset('uploads/products/large/'.$row->product_image) !!}" class="img-responsive" /> </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-6">
        <h4 class="box-title m-t-40">Product description</h4>
        <p>{!! $row->product_description !!}</p>
        <h2 class="m-t-40">₱ {!! $row->product_price !!}<small class="text-success">(36% off)</small></h2>
        <button class="btn btn-inverse btn-rounded m-r-5" data-toggle="tooltip" title="Add to cart"><i class="ti-shopping-cart"></i> </button>
        <button class="btn btn-danger btn-rounded"> Buy Now </button>
        <h3 class="box-title m-t-40">Key Highlights</h3>
        <ul class="list-icons">
            <li><i class="fa fa-check text-success"></i> Sturdy structure</li>
            <li><i class="fa fa-check text-success"></i> Designed to foster easy portability</li>
            <li><i class="fa fa-check text-success"></i> Perfect furniture to flaunt your wonderful collectibles</li>
        </ul>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="box-title m-t-40">General Info</h3>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="390">Brand</td>
                        <td> Stellar </td>
                    </tr>
                    <tr>
                        <td>Delivery Condition</td>
                        <td> Knock Down </td>
                    </tr>
                    <tr>
                        <td>Seat Lock Included</td>
                        <td> Yes </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td> Office Chair </td>
                    </tr>
                    <tr>
                        <td>Style</td>
                        <td> Contemporary &amp; Modern </td>
                    </tr>
                    <tr>
                        <td>Wheels Included</td>
                        <td> Yes </td>
                    </tr>
                    <tr>
                        <td>Upholstery Included</td>
                        <td> Yes </td>
                    </tr>
                    <tr>
                        <td>Upholstery Type</td>
                        <td> Cushion </td>
                    </tr>
                    <tr>
                        <td>Head Support</td>
                        <td> No </td>
                    </tr>
                    <tr>
                        <td>Suitable For</td>
                        <td> Study &amp; Home Office </td>
                    </tr>
                    <tr>
                        <td>Adjustable Height</td>
                        <td> Yes </td>
                    </tr>
                    <tr>
                        <td>Model Number</td>
                        <td> F01020701-00HT744A06 </td>
                    </tr>
                    <tr>
                        <td>Armrest Included</td>
                        <td> Yes </td>
                    </tr>
                    <tr>
                        <td>Care Instructions</td>
                        <td> Handle With Care, Keep In Dry Place, Do Not Apply Any Chemical For Cleaning. </td>
                    </tr>
                    <tr>
                        <td>Finish Type</td>
                        <td> Matte </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @include('backend_views.modules.products._show_carousel')

</div>
           
@endsection
<!-- /.Module|Page Content -->

@section('script')
    @include('backend_views.components.carousel_js')
@endsection

        