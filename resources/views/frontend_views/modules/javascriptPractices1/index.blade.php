@extends('frontend_views.layouts.master_page')

@section('content')
@include('frontend_views.modules.javascriptPractices1._indexCreateModal')
@include('frontend_views.modules.javascriptPractices1._indexUpdateModal')
<div class="container">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Javascript Tutorials</li>
			<li>L5.5 and Ajax jQuery - Alex Petro part 1</li>   
			<li>Reload Data Button</li>   
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
				<button class="btn btn-info btn-md pull-right" id="read-data" style="margin-left:10px">
				<i class="fa fa-plus"></i>Load Data</button>	
		        <button class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#modalCreate" >
                <i class="fa fa-plus"></i>Create Student</button>
			</span>
			@if($students->count() == 0)
            <p class="lead">No Student Record </p>
			@elseif($students->count() == 1)
            <p class="lead">{!! $students->count() !!} Student in the List</p>
			@elseif($students->count() >= 1)
            <p class="lead">{!! $students->count() !!} Students in the List</p>
			@endif
            <hr>

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Fullname</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Fullname</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
					<tbody id="data-value">
						{{-- di ko gets kung bakit working kahit naka comment ito. Includes talaga itong _indexRow ng index.blade.php --}}
                        {{-- @include('frontend_views.modules.javascriptPractices1._indexRow') --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->
@endsection


@section('script')
	<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	$('#read-data').on('click', function() {
		
		// --------------------------------
		// read data in the database
		// --------------------------------
		$.get("{!! URL::to('javascript-one/read') !!}", function (data) {
			$('#data-value').empty().html(data);        
		}) 
		


		// Note: 
		//		2nd method to read data in the database
		//      This block of code is same code on above.
		//      But in this method the html tags are append and called by data-value id.
		
		/* 
		$.get("{!! URL::to('javascript-one/read') !!}", function (data) {
			$('#data-value').empty()
				$.each(data, function (i, data) {
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
							html : 	" <a href='' class='btn btn-info btn-xs' id='view' data='"+ data.id +"'>View</a> " +
									" <a href='' class='btn btn-primary btn-xs' id='edit' data='"+ data.id +"'>Edit</a> " +
									" <a href='' class='btn btn-danger btn-xs' id='delete' data='"+ data.id +"'>Delete</a> "
						}))

					$('#data-value').append(tr);
			});
		});
		*/
		


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
					/* console.log(data) */
					
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





		// --------------------------------
		// destroy data in the database
		// --------------------------------
		
		/* 
		$(document).on('click', '#delete', function(e){
			var id = $(this).data('id');
			$.post('{!! URL::to("javascript-one/destroy") !!}', {id:id}, function(data) {
				$('#data-value #'+id).remove();
			})
		}) 
		*/


		// Note: 
		//		2nd method to destroy data in the database
		//      This block of code is same code on above.

		$('body').delegate('#data-value #delete', 'click', function (e) {
			var id = $(this).data('id');
			/* alert(id); */
			$.post('{!! URL::to("javascript-one/destroy") !!}', {id:id}, function (data){
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
			$.get('{!! URL::to("javascript-one/edit") !!}', {id:id}, function (data){
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


















	});	  
	</script>
@endsection

