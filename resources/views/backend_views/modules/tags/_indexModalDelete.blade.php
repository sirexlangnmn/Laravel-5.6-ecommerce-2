<div id="myModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 50px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" id="modal-data">
                <h4 class="text-danger">Very important!</h4>
                Once you delete this post categories record, there's no getting it back.
                Make sure you want to do this.
                <hr />
                @include('backend_views.layouts.flash_message_page')
                <p>ID: &nbsp; <strong id="recent-id"></strong></p>
                <p>Tag: &nbsp; <strong id="recent-tag"></strong></p>
                <p>Status: &nbsp; <strong id="recent-status"></strong></p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['url'=>'/admin/tags-destroy', 'method'=>'POST', 'id'=>'frm-destroy', ]) !!}
                    
                    <input type="hidden" name="id" id="recent-id" />
                    {!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-rounded btn-danger', ]) !!}
                    {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}
                {!! Form::close() !!} 
                
                <button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times"></i>Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
