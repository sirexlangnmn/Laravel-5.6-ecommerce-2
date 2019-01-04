@extends('backend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.dataTablesAndDataExportcss')
@endsection

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Comment List</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Comment List</li>
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
                <th>Post Title</th>
                <th>Comment Author</th>
                <th>Comment Content</th>
                <th>Status</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Post Title</th>
                <th>Comment Author</th>
                <th>Comment Content</th>
                <th>Status</th>
                <th>Date Registered</th>
            </tr>
        </tfoot>
        <tbody>

            @include('backend_views.modules.comments._index_rows');
        
        </tbody>
    </table>
</div>
@endsection
<!-- /.Module|Page Content -->

@section('script')
    @include('backend_views.components.dataTablesAndDataExportjs')
@endsection
