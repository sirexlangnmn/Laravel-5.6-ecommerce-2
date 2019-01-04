@extends('frontend_views.layouts.master_page')

@section('content')

@include('frontend_views.modules.javascriptPractices3._indexModalUpdate')
<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Javascript Tutorials</li>
            <li>L5.4 and Ajax by Hero Sony</li>
        </ul>
    </div>

    <div class="col-md-3">
        <!-- Side Nav -->
        @include('frontend_views.layouts.javascriptPracticesSideNav')
        <!-- Side Nav End -->
    </div>
    

    <div class="col-md-9">
        <div class="box">
             <p class="lead">{!! isset($user)?'Edit' : 'Create New' !!} User</p>
            <hr>

            {!! Form::open(['url'=>'/js-three/store', 'method'=>'POST', 'id'=>'frm-insert']) !!}
    
            <div class="col-md-6">
                {{ Form::bsText('name', null, ['id'=>'name', 'class'=>'form-control', 'placeholder'=>'Name', 'required'=>'required']) }}
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>      
                </div>
            </div>
            <div class="col-md-6">                
               <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>      
                </div>
                {!! Form::label('role_id', 'Roles') !!}
                {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null, ['class'=>'form-control']) !!} 
			</div>

            {{ Form::bsSubmit('Submit', ['class'=>'btn btn-block btn-outline btn-rounded btn-success', 'style'=>'margin-left: -15px;']) }}
            
            {!! Form::close() !!}
        </div>
    </div>

    <div class="col-md-3">
    </div>

    <div class="col-md-9">
        <div class="box">
            <p class="lead">Users List</p>
            <hr>

            <div class="table-responsive" id="data-value">

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

        // --------------------------------		
		// store data in the database
		//---------------------------------
		$('#frm-insert').on('submit',function(e){
			/* alert('Test One'); */
			e.preventDefault();
			var data = $(this).serialize();
			/* console.log(data) */
			var url  = $(this).attr('action');
			/* console.log(url) */
			var post = $(this).attr('method'); 
			/* console.log(post) */
			$.ajax({
				url      : url,
				type     : post,  
				data     : data,
				dataType : 'json',
				success:function(data)
				{
					/* console.log(data);  */

                    readByAjax();

					$('#frm-insert').trigger('reset'); 
				}

			})
		})

        readByAjax();

        function readByAjax()
        {
            $.ajax({
				type     : 'get',
				url      : "{!! url('/js-three/readByAjax') !!}",
				dataType : 'html',
				success:function(data)
				{
					/* console.log(data);      */
                    $('#data-value').html(data);  
                }          
            })
        }



        $(document).on('click', '#ajaxDelete', function(e) {
            var id = $(this).val();
            /* alert(id); */
            $.ajax({
				type     : 'post',
				url      : "{!! url('/js-three/delete') !!}",
                data     :  {id:id},
				dataType : 'json',
				success:function(data)
				{
					/* console.log(data);      */
                    $('tbody tr.id'+id).remove();  
                }          
            })
        })


        $(document).on('click', '#ajaxEdit', function(e) {
            var id = $(this).val();
            /* alert(id); */
            $.ajax({
				type     : 'get',
				url      : "{!! url('/js-three/edit') !!}",
                data     :  {id:id},
				dataType : 'json',
				success:function(data)
				{
					/* console.log(data); */     
                    $('#modalUpdate').modal('show'); 

                    var frmUpdate = $('#frm-update');
                    frmUpdate.find('#recent-id').val(data.id);
                    frmUpdate.find('#recent-name').val(data.name);
                    frmUpdate.find('#recent-email').val(data.email);
                    frmUpdate.find('#recent-role-id').val(data.role_id);
                }          
            })
        })

        $('#frm-update').on('submit',function(e){
			/* alert('Test One'); */
			e.preventDefault();
			var data = $(this).serialize();
			/* console.log(data) */
			var url  = $(this).attr('action');
			/* console.log(url) */
			var post = $(this).attr('method'); 
			/* console.log(post) */
			$.post(url, data, function(data)
			{
                /* console.log(data);  */

                readByAjax();

                $('#frm-update').trigger('reset');
                $('#modalUpdate').modal('hide'); 

			})
		})




</script>
@endsection

