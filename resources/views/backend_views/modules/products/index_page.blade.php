@extends('backend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.dataTablesAndDataExportcss')
@endsection

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Products List</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="{!! route('products.create') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create Product</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Products</a></li>
            <li class="active">Products List</li>
        </ol>
    </div>
@endsection
        
<!-- Module|Page Content -->
@section('modules')
<div class="table-responsive">
    {{-- to check if the data pass successfully --}}
    {{-- {!! dd($products) !!} --}}
    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Price</th>
                <th>Product Status</th>
                <th>Product Image</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Price</th>
                <th>Product Status</th>
                <th>Product Image</th>
            </tr>
        </tfoot>
        <tbody>

            @include('backend_views.modules.products._index_rows')
        
        </tbody>
    </table>
</div>
@endsection
<!-- /.Module|Page Content -->

@section('script')
    @include('backend_views.components.dataTablesAndDataExportjs')
@endsection
