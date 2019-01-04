@extends('frontend_views.layouts.master_page')

@section('content')


<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Javascript Tutorials</li>
            <li>5.1 Laravel CRUD using AJAX (JQuery)</li>
        </ul>
    </div>

    <div class="col-md-3">
        <!-- Side Nav -->
        @include('frontend_views.layouts.javascriptPracticesSideNav')
        <!-- Side Nav End -->
    </div>
    

    <div class="col-md-9">
        <div class="box">
             <p class="lead">Create New Role</p>
            <hr>
            <div class="alert alert-danger" style="display: none" >
                Error 
            </div>
            {!! Form::open(['url'=>'/js-four/store', 'method'=>'post', 'id'=>'form-insert']) !!}
            <div class="col-md-6">
                {{ Form::bsText('role_title', null, ['class'=>'form-control', 'placeholder'=>'Role Title', 'required'=>'required']) }}
            </div>
            <div class="col-md-6">
                {{ Form::bsText('role_description', null, ['class'=>'form-control', 'placeholder'=>'Role Description', 'required'=>'required' ]) }}  
			</div>

            {{ Form::bsSubmit('Submit', ['id'=>'ajaxCreate', 'class'=>'btn btn-block btn-outline btn-rounded btn-success', 'style'=>'margin-left: -15px;']) }}
            
            {!! Form::close() !!}
        </div>
    </div>

    <div class="col-md-3">
    </div>

    <div class="col-md-9">
        <div class="box">
            <p class="lead">Roles List</p>
            
			<div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-responsive display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role Title</th>
                            <th>Role Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Role Title</th>
                            <th>Role Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="data-value">
                        @foreach ($roles as $key => $data)
                            <tr class="id{!! $data->id !!}">
                                <td>{!! $data->id !!}</td>
                                <td>{!! $data->role_title !!}</td>
                                <td>{!! $data->role_description !!}</td>
                                <td colspan="3">
                                    <a href='#' class='btn btn-info btn-xs'
                                        data-toggle="tooltip" title="View full record of this particular student." >View</a>
                                    <button value='{!! $data->id !!}' id='ajaxEdit' class='btn btn-primary btn-xs' {{-- data-toggle="modal" data-target="#modalUpdate" --}}
                                        data-toggle="tooltip" title="Edit record of this particular student." >Edit</button>
                                    <input type="hidden" name="_method" value="delete" />
                                    <button value="{!! $data->id !!}" id='ajaxDelete' class='btn btn-danger btn-xs'
                                        data-toggle="tooltip" title="Delete record. Are you sure you want to do this?" >Delete</button>
                                </td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
			</div>
        </div>
    </div>

</div>

@endsection

@section('script')
<script> 
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

      
    $(document).ready( function ($) {
        /* alert('adadads'); */
        getAll();

        $('#ajaxCreate').click( function (event) {
            event.preventDefault();
            save();
        });

        $('#ajaxDelete').on('click', function() {
            id = $(this).data('id');
            console.log(id);
        });    
    });

    function getAll()
    {
        $("#data-value").empty();
        $.ajax({
            url: "{!! url('js-four/show') !!}",
            type: 'get',
        })
        .done( function (data) {
            /* console.log(data); */
            $.each(data, function (index, val) {
                $('#data-value').append('<tr>')
                $('#data-value').append('<td>' + val.id + '</td>')
                $('#data-value').append('<td>' + val.role_title + '</td>')
                $('#data-value').append('<td>' + val.role_description + '</td>')
                $('#data-value').append('<td colspan="3">' +
                                            "<button class='btn btn-info btn-xs' data='"+ val.id +"'>View</button>" +
                                            "<button class='btn btn-primary btn-xs' data='"+ val.id +"'>Edit</button>" +
                                            "<button class='btn btn-danger btn-xs' data='"+ val.id +"'>Delete</button>" +
                                        '</td>')
                $('#data-value').append('</tr>') 
            }); 
        })
        .fail( function () {
            console.log("error"); 
        })
        /* .always( function () {
            console.log("compllete"); 
        }) */
    }

    function save()
    {
        formData = $('#form-insert').serialize();
        /* console.log(formData); */

        $.ajax({
            url: "{!! url('js-four/store') !!}",
            type: 'post',
            dataType: 'json',
            data: formData,
        })
        .done(function(){
            /* console.log(data); */
            getAll();
        })
        .fail(function(){
            /* console.log("error");  */
            $('alert').show();
        })
        /* .always( function () {
            console.log("compllete"); 
        }) */

    }


    function destroy(id)
    {

        $.ajax({
            url: "{!! url('js-four/delete') !!}/"+id,
            type: 'DELETE',
            dataType: 'JSON',
            data: {_token: '{!! csrf_token() !!}'},
        })
        .done(function(){
            /* console.log(data); */
            getAll();
        })
        .fail(function(){
            /* console.log("error");  */
            $('alert').show();
        })
        /* .always( function () {
            console.log("compllete"); 
        }) */

    }
</script>
@endsection

