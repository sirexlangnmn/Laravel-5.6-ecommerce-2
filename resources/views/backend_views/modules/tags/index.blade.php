@extends('backend_views.layouts.master_page')

@section('style')
    @include('backend_views.components.dataTablesAndDataExportcss')
@endsection

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Post Tag</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="#" data-toggle="modal" data-target="#myModalCreate" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create Post Tag</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Post Tag</li>
        </ol>
    </div>
@endsection
        
<!-- Module|Page Content -->
@section('modules')
@include('backend_views.modules.tags._indexModalCreate')
@include('backend_views.modules.tags._indexModalUpdate')
@include('backend_views.modules.tags._indexModalDelete')
<div class="table-responsive">
    {{-- to check if the data pass successfully --}}
    {{-- {!! dd($products) !!} --}}
    <table id="example23" class="display nowrap table-hover table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Post Tag</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Post Tag</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </tfoot>
        <tbody id="data-value">

            @include('backend_views.modules.tags._indexList')
        
        </tbody>
    </table>
</div>
@endsection
<!-- /.Module|Page Content -->


@section('script')
    @include('backend_views.components.dataTablesAndDataExportjs')
    {{-- <script src="{{ asset('javascriptPractices/ajaxcrudii.js') }}"></script> --}}
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
                            html :
                                 	" <a href='#' class='btn btn-outline btn-rounded btn-info btn-sm' id='view' data='"+ data.id +"'><i class='fa fa-eye'>&nbsp; View</i></a> " +
									" <a href='#' class='btn btn-outline btn-rounded btn-primary btn-sm' id='edit' data='"+ data.id +"'><i class='fa fa-list'>&nbsp; Edit</i></span></a> " +
									" <a href='#' class='btn btn-outline btn-rounded btn-danger btn-sm' id='delete' data='"+ data.id +"'><i class='fa fa-trash'>&nbsp; Delete </i></span></a> "
						})).append($("<td/>", {
							text : data.id
						})).append($("<td/>", {
							text : data.tag
						})).append($("<td/>", {
							text : data.status
						})).append($("<td/>", {
							text : data.created_at
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
        $('#frm-destroy').on('submit',function(e){
			/* alert('Test One'); */
			e.preventDefault();
			var data = $(this).serialize();
			/* console.log(data) */
			var url  = $(this).attr('action');
			/* console.log(url) */
			$.post(url, data, function (data) {
                /* console.log(data); */
                /* $('#data-value tr#'+data.id).remove(); */
                readByAjax();

                $('#myModalDelete').modal('hide');
			})
		})


        readByAjax();

        function readByAjax()
        {
            $.ajax({
				type     : 'get',
				url      : "{!! url('/admin/tags-read') !!}",
				dataType : 'html',
				success:function(data)
				{
					/* console.log(data);      */
                    $('#data-value').html(data);  
                }          
            })
        }
        
		// ----------------------------------------------
		// get data to be edit and update in the database
		// ----------------------------------------------
		$('body').delegate('#data-value #ajaxEdit', 'click', function (e) {
			var id = $(this).data('id');
			/* alert(id); */
			$.get('{!! URL::to("/admin/tags-edit") !!}', {id:id}, function (data){
				/* console.log(data) */
				$('#frm-update').find('#recent-id').val(data.id)
				$('#frm-update').find('#recent-tag').val(data.tag)
				$('#frm-update').find('#recent-status').val(data.status)
				$('#myModalUpdate').modal('show');
			})
        })
        


        // ---------------------------------------
		// get data to be delete in the database
		// ---------------------------------------
		$('body').delegate('#data-value #ajaxDelete', 'click', function (e) {
			var id = $(this).data('id');
			/* alert(id); */
			$.get('{!! URL::to("/admin/tags-edit") !!}', {id:id}, function (data){
				/* console.log(data) */
				$('#modal-data').find('#recent-id').append("<strong>" + data.id + "</strong>");
				$('#modal-data').find('#recent-tag').append("<strong>" + data.tag + "</strong>");
				$('#modal-data').find('#recent-status').append("<strong>" + data.status + "</strong>");
                $('#frm-destroy').find('#recent-id').val(data.id)
                $('#myModalDelete').modal('show');
                $('#modal-data').trigger('reset');
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
                            html :
                                 	" <a href='#' class='btn btn-outline btn-rounded btn-info btn-sm' id='view' data='"+ data.id +"'><i class='fa fa-eye'>&nbsp; View</i></a> " +
									" <a href='#' class='btn btn-outline btn-rounded btn-primary btn-sm' id='edit' data='"+ data.id +"'><i class='fa fa-list'>&nbsp; Edit</i></span></a> " +
									" <a href='#' class='btn btn-outline btn-rounded btn-danger btn-sm' id='delete' data='"+ data.id +"'><i class='fa fa-trash'>&nbsp; Delete </i></span></a> "
						})).append($("<td/>", {
							text : data.id
						})).append($("<td/>", {
							text : data.tag
						})).append($("<td/>", {
							text : data.status
						})).append($("<td/>", {
							text : data.created_at
						}))

				$('#data-value tr#'+data.id).replaceWith(tr);

				$('#frm-update').trigger('reset');
			})
		})








	
	</script>
@endsection
