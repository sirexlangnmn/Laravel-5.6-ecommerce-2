@extends('backend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.dataTablesAndDataExportcss')
@endsection

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Product Alternative Images</h4>
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

    {!! Form::open(['route'=>'prod-alt-img.store', 'files'=>'true', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
    {!! csrf_field() !!}
    <div class="form-group {!! $errors->has('prod_alt_image') ? 'has-error' : '' !!}">
        {!! Form::label('prod_alt_image', 'Product Alternative Image', ['class'=>'control-label']) !!}

        {!! Form::hidden('product_id', $row->id ) !!}

        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
            <div class="form-control" data-trigger="fileinput">
                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                <span class="fileinput-filename"></span>
            </div>
            <span class="input-group-addon btn btn-default btn-file"> 
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            {!! Form::file('prod_alt_image[]', ['id'=>'prod_alt_image', 'class'=>'custom-file-input', 'multiple'=>'multiple']) !!}
            </span>
            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
            <div id="thumb-output"></div>
        </div>
        <span class="text-danger">{!! $errors->has('prod_alt_image') ? $errors->first('prod_alt_image') : '' !!}</span>
    </div>

    {{ Form::bsSubmit('Add Alternative Images', ['class'=>'btn btn-block btn-outline btn-rounded btn-success m-r-10']) }}
    {!! Form::close() !!}
    </div>


    <div class="table-responsive">
    {{-- to check if the data pass successfully --}}
    {{-- {!! dd($products) !!} --}}
    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>PID</th>
                <th>Product Alternative Image</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>PID</th>
                <th>Product Alternative Image</th>
            </tr>
        </tfoot>
        <tbody>

            @include('backend_views.modules.products._alternative_images_row')
        
        </tbody>
    </table>
</div>


</div>
           
@endsection
<!-- /.Module|Page Content -->

@section('script')
    @include('backend_views.components.dataTablesAndDataExportjs')
@endsection


        