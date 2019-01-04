@extends('backend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.dataTablesAndDataExportcss')
@endsection

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Post List</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="{!! route('posts.create') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create Post</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Post List</li>
        </ol>
    </div>
@endsection
        
<!-- Module|Page Content -->
@section('modules')
{{-- <form action="/admin/posts/multiple-destroy" method="post"> --}}
{!! Form::open(['action'=>['PostsController@multipleDestroy', ''], 'method'=>'DELETE' ]) !!}
{!! csrf_field() !!}
{!! method_field('delete') !!}            

<div class="table-responsive">
    {{-- to check if the data pass successfully --}}
    {{-- {!! dd($products) !!} --}}
    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>                 
                    <select name="checkBoxArray" id="" class="form-control display-none" >
                        <option value="delete">Delete</option>
                    </select>

                    <label class="custom-control custom-checkbox">                   
                        <input type="checkbox" id="options" class="custom-control-input" />
                        <span class="custom-control-indicator"></span>
                    </label>
                    {!! Form::button('', ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger fa fa-trash-o', 'data-toggle'=>'tooltip', 'title'=>'Multiple Delete' ]) !!}
                
                </th>
                <th>Action</th>
                <th>ID</th>
                <th>Title</th>
                <th>Post Content</th>
                <th>Image</th>
                <th>Status</th>
                <th>Post Author</th>
                <th>Category</th>
                <th>Second Photo</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Action</th>
                <th>ID</th>
                <th>Title</th>
                <th>Post Content</th>
                <th>Image</th>
                <th>Status</th>
                <th>Post Author</th>
                <th>Category</th>
                <th>Second Photo</th>
                <th>Date Registered</th>
            </tr>
        </tfoot>
        <tbody>

            @include('backend_views.modules.posts._index_rows')
        
        </tbody>
    </table>
</div>
{!! Form::close() !!}

@endsection
<!-- /.Module|Page Content -->

@section('script')
    @include('backend_views.components.dataTablesAndDataExportjs')

    <script>
        $(document).ready(function(){
            $('#options').click(function(){
                /*console.log('it works')*/

                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    });
                }
                else{
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });

                }
            });
        });
    </script>
@endsection
