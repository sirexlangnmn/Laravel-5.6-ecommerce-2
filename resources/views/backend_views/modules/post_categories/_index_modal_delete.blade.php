<div id="myModal{!! $row->id !!}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-danger" id="myModalLabel">Very important!</h4>
            Once you delete this post categories record, there's no getting it back.
            Make sure you want to do this.
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>ID: &nbsp; <strong>{!! $row->id !!}</strong></p>
                    <p>Title: &nbsp; <strong>{!! $row->pc_title !!}</strong></p>
                    <p>Description: &nbsp; <strong>{!! $row->pc_description !!}</strong></p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            
            {!! Form::open(['route'=>['post-categories.destroy', $row->id], 'method'=>'DELETE' ]) !!}
                {!! Form::hidden('_method', 'DELETE' ) !!}
                {!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-rounded btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}
                {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}
            {!! Form::close() !!} 
            
            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancel</button>
        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
