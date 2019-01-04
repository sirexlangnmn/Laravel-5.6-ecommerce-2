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
		        <a href="javascript:ajaxLoad('{!! url('js-two/create') !!}')" class="btn btn-primary btn-md pull-right" >
                <i class="fa fa-plus"></i>Create Roles</a>
            </span>   
            <div class="col-md-4 pull-right">
				<input type="text"
						class="form-control" 
						value="{{ request()->session()->get('search') }}" 
						onkeydown="if (event.keyCode == 13) ajaxLoad('{{ url('js-two/index') }}?search='+this.value)"
						id="search"
						name="search"
						placeholder="Search topic . . . " />
                
            </div>
            
            <p class="lead">Roles</p> 
            <table class="table table-hover table-striped table-responsive display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Role Title</th>
                        {!!request()->session()->get('field')=='role_title'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                        <th>Role Description</th>
                        {!!request()->session()->get('field')=='role_description'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;   
                    @endphp
                    @foreach ($roles as $role)
                    <tr>
                        <td>{!! $i ++ !!}</td>
                        <td>{!! $role->id !!}</td>
                        <td>{!! $role->role_title !!}</td>
                        <td>{!! $role->role_description !!}</td>
                        <td colspan="3">
                            <a href="javascript:ajaxLoad('{!! url('js-two/show/'.$role->id) !!}')" class='btn btn-info btn-xs'
                                data-toggle="tooltip" title="View full record of this particular record." >View</a>
                            <a href="javascript:ajaxLoad('{!! url('js-two/update/'.$role->id) !!}')" class='btn btn-primary btn-xs' 
                                data-toggle="tooltip" title="Edit record of this particular record." >Edit</a>
                            <input type="hidden" name="_method" value="delete" />
                            <a href="javascript:if(confirm('Are you sure you want to delete this data?')) 
                                     ajaxDelete('{!! url('js-two/delete/'.$role->id) !!}', 
                                     '{!! csrf_token() !!}')" 
                                     class='btn btn-danger btn-xs' 
                                     data-toggle="tooltip" title="Delete record. Are you sure you want to do this?" >Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <ul class="pagination">
            {!! $roles->links() !!} 
            </ul>
        </div>
    </div>

</div>
<!-- /.container -->