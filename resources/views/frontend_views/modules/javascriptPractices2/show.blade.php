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
            <p class="lead">Show Roles</p>
            <hr>

            
            <div class="form-group">
			  	<h3>{!! $role->role_title !!}</h3>	
			</div>
			<div class="form-group">
				<h3>{!! $role->role_description !!}</h3>
			</div>

            
        </div>
    </div>

</div>