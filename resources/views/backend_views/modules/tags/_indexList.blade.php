@foreach($tags as $value)    
<tr id="{!! $value->id !!}">
    <td>
        <a href='#' class='btn btn-outline btn-rounded btn-info btn-sm' id="view" data-id="{!! $value->id !!}" 
            data-toggle="tooltip" title="View full record of this particular student." ><i class="fa fa-eye">&nbsp; View</i></a>
        <a href='#' class='btn btn-outline btn-rounded btn-primary btn-sm' data-toggle="modal" data-target="#myModalUpdate" id="ajaxEdit" data-id="{!! $value->id !!}" >
            <span data-toggle="tooltip" title="Edit record." ><i class="fa fa-list">&nbsp; Edit</i></span></a>
        <a href='#' class='btn btn-outline btn-rounded btn-danger btn-sm' data-toggle="modal" data-target="#myModalDelete" id="ajaxDelete" data-id="{!! $value->id !!}">
            <span data-toggle="tooltip" title="Delete record. Are you sure you want to do this?" ><i class="fa fa-trash">&nbsp; Delete </i></span></a>
    </td>
    <td>{!! $value->id !!}</td>
    <td>{!! $value->tag !!}</td>
    <td>
        @if($value->status == 1)
            <span class="label label-success">Active</span>
        @elseif($value->status == 0)
            <span class="label label-danger">Disabled</span>
        @endif
    </td>
    <td>{!! $value->created_at ? $value->created_at->diffForHumans() : 'No Date' !!}</td>  
</tr>
@endforeach