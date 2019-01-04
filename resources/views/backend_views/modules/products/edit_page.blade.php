@extends('backend_views.layouts.master_page')

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Edit Product</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="{!! route('products.index') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Go to Product List</a>
        <a href="{!! route('products.create') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create Product</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Edit Product</li>
        </ol>
    </div>
@endsection
        
<!-- Module|Page Content -->
@section('modules')
{!! Form::open(['route'=>['products.update', $row->id], 'files'=>'true', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
    {{ csrf_field() }}
    {!! Form::hidden('_method', 'PUT') !!}
    @include('backend_views.modules.products._fields')
    
    {{ Form::bsSubmit('Update Product', ['class'=>'btn btn-block btn-outline btn-rounded btn-success m-r-10']) }}

{!! Form::close() !!}
@endsection
<!-- /.Module|Page Content -->