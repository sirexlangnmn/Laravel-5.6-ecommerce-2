<div id="myModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-default waves-effect pull-right" data-dismiss="modal">Cancel</button>
                <h4 class="modal-title text-danger" id="myModalLabel">Update Tags</h4>
            </div>
            <div class="modal-body">
                @include('backend_views.layouts.flash_message_page')   
                {!! Form::open(['url'=>'/admin/tags-update', 'method'=>'POST', 'id'=>'frm-update', ]) !!}
                {{-- <input type="hidden" name="id" id="recent-id"> --}}
                {!! Form::hidden('id', null, (['id'=>'recent-id'])) !!}
                {!! Form::bsText('tag', null, ['id'=>'recent-tag', 'placeholder'=>'Tag',]) !!}
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control" id="recent-status" name="status">
                        <option value=""> Choose status here . . . </option>
                        <option value="1">Active</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>
                {!! Form::bsSubmit('Submit', ['class'=>'btn btn-block btn-outline btn-rounded btn-success m-r-10']) !!}
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
