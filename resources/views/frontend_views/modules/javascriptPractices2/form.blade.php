<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Javascript Tutorials</li>
            <li>L5.5 and Ajax Tutorial - Advanced CRUD example Search, Sort, Paginate</li>
        </ul>
    </div>

    <div class="col-md-3">
        <!-- Side Nav -->
        @include('frontend_views.layouts.javascriptPracticesSideNav')
        <!-- Side Nav End -->
    </div>
    

    <div class="col-md-9">
        <div class="box">
            <span>
		        <a href="javascript:ajaxLoad('{!! url('js-two/index') !!}')" class="btn btn-primary btn-md pull-right" >
                <i class="fa fa-list"></i>Role List</a>
            </span>  
            <p class="lead">{!! isset($role)?'Edit' : 'Create New' !!} Roles</p>
            <hr>

            @if (isset($role))
                {!! Form::model($role, ['method'=>'PUT', 'id'=>'frm']) !!}
            @else
                {!! Form::open(['id'=>'frm']) !!}
            @endif
    
            <div class="col-md-6">
                {{ Form::bsText('role_title', null, ['class'=>'form-control'.($errors->has('role_title')?" is-invalid" : ""), 'autofocus', 'placeholder'=>'Role Title', ]) }}
				<span id="error-role_title" class="text-danger"></span>
              </div>
            <div class="col-md-6">
                {{ Form::bsText('role_description', null, ['class'=>'form-control'.($errors->has('role_description')?" is-invalid" : ""), 'autofocus', 'placeholder'=>'Role Description', ]) }}  
				<span id="error-role_description" class="text-danger"></span>
			</div>

            {{ Form::bsSubmit('Submit', ['class'=>'btn btn-block btn-outline btn-rounded btn-success', 'style'=>'margin-left: -15px;']) }}
            
            {!! Form::close() !!}
        </div>
    </div>

</div>