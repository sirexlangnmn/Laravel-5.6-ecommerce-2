@extends('frontend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.dataTablesAndDataExportcss')
@endsection

@section('content')
@include('frontend_views.modules.javascriptPractices1._datatableCreateModal')
@include('frontend_views.modules.javascriptPractices1._datatableUpdateModal')
<div class="container">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Javascript Tutorials</li>
			<li>L5.5 and Ajax jQuery - Alex Petro part 3</li>  
			<li>Datatables</li>   
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
		        <button class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#modalCreate" >
          		<i class="fa fa-plus"></i>Create Student</button>
			</span>
            <p class="lead">Student List</p>
			<hr>
			<div class="card-body">
			@include('frontend_views.modules.javascriptPractices1._datatableList')
			</div>
		</div>
    </div>
</div>
<!-- /.container -->
@endsection


@section('script')
@include('backend_views.components.dataTablesAndDataExportjs')

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
				url    : url,
				type   : post,  
				data   : data,
				dataType : 'json',
				success:function(data)
				{
					/* console.log(data); */

					if ($.isEmptyObject(data.error)){
						/* console.log(data.success) */
						$('#print-alert-success-message').find('ul').empty().append("<li>" + data.success + "</li>");
						$('#print-alert-success-message').css('display', 'block');
						$('#print-alert-error-message').css('display', 'none');
					}
					else{
						printErrorMessages(data.error)		
					}
					
					var tr = $("<tr/>",{
								id : data.id
							});
						tr.append($("<td/>", {
							text : data.id
						})).append($("<td/>", {
							text : data.firstname
						})).append($("<td/>", {
							text : data.middlename
						})).append($("<td/>", {
							text : data.lastname
						})).append($("<td/>", {
							text : data.fullname
						})).append($("<td/>", {
							text : data.sex
						})).append($("<td/>", {
							html : 	" <a href='#' class='btn btn-info btn-xs' id='view' data='"+ data.id +"'>View</a> " +
									" <a href='#' class='btn btn-primary btn-xs' id='edit' data='"+ data.id +"'>Edit</a> " +
									" <a href='#' class='btn btn-danger btn-xs' id='delete' data='"+ data.id +"'>Delete</a> "
						}))

					$('#data-value').append(tr);

					$('#frm-insert').trigger('reset');
				}

			})
		})


		function printErrorMessages(messsage){
			$('#print-alert-error-message').find('ul').empty();
			$('#print-alert-error-message').css('display', 'block');
			$('#print-alert-success-message').css('display', 'none');

			$.each(messsage, function(key, value) {
				$('#print-alert-error-message').find('ul').append("<li>" + value + "</li>");
			});
		}






		// --------------------------------
		// destroy data in the database
		// --------------------------------
		$('body').delegate('#data-value #delete', 'click', function (e) {
			var id = $(this).data('id');
			/* alert(id); */
			$.post('{!! URL::to("js-one-p2/datatable-destroy") !!}', {id:id}, function (data){
				/* console.log(data) */
				$('tr#'+id).remove();
			})
		})




		// --------------------------------
		// edit data in the database
		// --------------------------------
		$('body').delegate('#data-value #edit', 'click', function (e) {
			var id = $(this).data('id');
			/* alert(id); */
			$.get('{!! URL::to("js-one-p2/datatable-edit") !!}', {id:id}, function (data){
				/* console.log(data) */
				$('#frm-update').find('#recent-id').val(data.id)
				$('#frm-update').find('#recent-firstname').val(data.firstname)
				$('#frm-update').find('#recent-middlename').val(data.middlename)
				$('#frm-update').find('#recent-lastname').val(data.lastname)
				$('#frm-update').find('#recent-sex_id').val(data.sex_id)
				$('#modalUpdate').modal('show');
			})
		})





		// --------------------------------
		// update data in the database
		// --------------------------------
		$('#frm-update').on('submit',function(e){
			/* alert('Test One'); */
			e.preventDefault();
			var data = $(this).serialize();
			/* console.log(data) */
			var url  = $(this).attr('action');
			/* console.log(url) */
			$.post(url, data, function (data) {
				/* console.log(data); */

				var tr = $("<tr/>",{
							id : data.id
						});
					tr.append($("<td/>", {
						text : data.id
					})).append($("<td/>", {
						text : data.firstname
					})).append($("<td/>", {
						text : data.middlename
					})).append($("<td/>", {
						text : data.lastname
					})).append($("<td/>", {
						text : data.fullname
					})).append($("<td/>", {
						text : data.sex
					})).append($("<td/>", {
						html : 	" <a href='#' class='btn btn-info btn-xs' id='view' data='"+ data.id +"'>View</a> " +
								" <a href='#' class='btn btn-primary btn-xs' id='edit' data='"+ data.id +"'>Edit</a> " +
								" <a href='#' class='btn btn-danger btn-xs' id='delete' data='"+ data.id +"'>Delete</a> "
					}))

				$('#data-value tr#'+data.id).replaceWith(tr);

				$('#frm-update').trigger('reset');
			})
		})








	
	</script>


@endsection
