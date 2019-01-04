@extends('backend_views.layouts.master_page')

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Create Post Category</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="{!! route('post-categories.index') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Go to Post Category List</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Post Category</a></li>
            <li class="active">Create Post Category</li>
        </ol>
    </div>
@endsection
        
<!-- Module|Page Content -->
@section('modules')
{!! Form::open(['action'=>'PostCategoriesController@store', 'method'=>'POST' ]) !!}
    {!! csrf_field() !!}

    @include('backend_views.modules.post_categories._fields')
   
{!! Form::close() !!}
@endsection
<!-- /.Module|Page Content -->

       