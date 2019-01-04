@extends('backend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.dataTablesAndDataExportcss')
@endsection

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Post Categories</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="{!! route('post-categories.create') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create Post Category</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Post Categories</li>
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
                <th>Post Category Title</th>
                <th>Post Category Description</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Post Category Title</th>
                <th>Post Category Description</th>
                <th>Status</th>
                <th>Created At</th>

            </tr>
        </tfoot>
        <tbody>

            @include('backend_views.modules.post_categories._index_rows')
        
        </tbody>
    </table>
</div>
@endsection
<!-- /.Module|Page Content -->


@section('script')
    @include('backend_views.components.dataTablesAndDataExportjs')
@endsection
