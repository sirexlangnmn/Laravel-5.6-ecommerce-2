@extends('backend_views.layouts.master_page')

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Edit User Profile</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">User</a></li>
            <li class="active">Edit User Profile</li>
        </ol>
    </div>
@endsection
        
<!-- Module|Page Content -->
@section('modules')
{!! Form::open(['action'=>['UserProfilesController@store'], 'files'=>'true', 'method'=>'POST']) !!}
    {{ csrf_field() }}
    
    @include('backend_views.modules.users._editUserProfileFields')
    
    {{ Form::bsSubmit('Update User Profile', ['class'=>'btn btn-block btn-outline btn-rounded btn-success m-r-10']) }}

{!! Form::close() !!}
@endsection
<!-- /.Module|Page Content -->


@section('script')
<script>
    $(".toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });   
</script>
@endsection