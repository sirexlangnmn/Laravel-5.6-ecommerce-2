
	@foreach($students as $key => $value)
	<tr id="{!! $value->id !!}">
		<td>{!! $value->id !!}</td>
		<td>{!! $value->firstname !!}</td>
		<td>{!! $value->middlename !!}</td>
		<td>{!! $value->lastname !!}</td>
		<td>{!! $value->fullname !!}</td>
		<td>{!! $value->sex !!}</td>
		<td colspan="3">
			<a href='#' class='btn btn-info btn-xs' id="view" data-id="{!! $value->id !!}" 
				data-toggle="tooltip" title="View full record of this particular student." >View</a>
			<a href='#' class='btn btn-primary btn-xs' id="edit" data-id="{!! $value->id !!}" 
				data-toggle="tooltip" title="Edit record of this particular student." >Edit</a>
			<a href='#' class='btn btn-danger btn-xs' id="delete" data-id="{!! $value->id !!}" 
				data-toggle="tooltip" title="Delete record. Are you sure you want to do this?" >Delete</a>
		</td>
	</tr>
	@endforeach
