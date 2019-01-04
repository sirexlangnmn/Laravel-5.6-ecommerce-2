<div id="myModalCreate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-default waves-effect pull-right" data-dismiss="modal">Cancel</button>
                <h4 class="modal-title text-danger" id="myModalLabel">Create Tags</h4>
            </div>
            <div class="modal-body">
                @include('backend_views.layouts.flash_message_page')
                {!! Form::open(['url'=>'/admin/tags-store', 'method'=>'POST', 'id'=>'frm-insert', ]) !!}
                {!! Form::bsText('tag', null, ['placeholder'=>'Tag', ]) !!}
                <div class="form-group">
                    <div class="form-check">
                        <label class="custom-control custom-checkbox">                   
                            <input type="checkbox" name="status" class="custom-control-input" value="1" />
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"> &nbsp; Tag Status </span>
                        </label>
                    </div>
                </div>
                {!! Form::bsSubmit('Submit', ['class'=>'btn btn-block btn-outline btn-rounded btn-success m-r-10']) !!}
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
