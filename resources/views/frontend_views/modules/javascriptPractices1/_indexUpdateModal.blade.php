
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" {{-- aria-labelledby="Create Student" --}} aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Student Record</h4>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('javascript-one/update') }}" method="POST" id="frm-update">
                {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" id="recent-id">
                                <input type="text" name="firstname" id="recent-firstname" class="form-control" placeholder="Firstname">
                            </div>
                            <div class="form-group">
                                <input type="text" name="middlename" id="recent-middlename" class="form-control" placeholder="Middlename">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" id="recent-lastname" class="form-control" placeholder="Lastname">
                            </div>
                        </div>  {{-- col-md-6 --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" id="recent-sex_id" name="sex_id">
                                    <option value=""> Choose gender here . . . </option>
                                    @foreach($sexes as $key => $sex)
                                    <option value="{!! $key !!}">{!! $sex !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  {{-- col-md-6 --}}
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-md" value="Update and Save" />
                            
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times"></i>Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

