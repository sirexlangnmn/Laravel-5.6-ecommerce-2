
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" {{-- aria-labelledby="Create Student" --}} aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Student Record</h4>
            </div>
            <div class="modal-body">
                @include('backend_views.layouts.flash_message_page')
                <form action="{{ URL::to('js-one-p2/datatable-store') }}" method="POST" id="frm-insert">
                {{-- {!! Form::open(['method'=>'POST', 'id'=>'frm-insert' ]) !!} --}}
                {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                            </div>
                            <div class="form-group">
                                <input type="text" name="middlename" class="form-control" placeholder="Middlename">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                            </div>
                        </div>  {{-- col-md-6 --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="sex_id">
                                    <option value=""> Choose gender here . . . </option>
                                    @foreach($sexes as $key => $sex)
                                    <option value="{!! $key !!}">{!! $sex !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  {{-- col-md-6 --}}
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-md" value="Save" />
                            
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times"></i>Close
                        </button>
                    </div>
                {{-- {!! Form::close() !!} --}}
                </form>
            </div>
        </div>
    </div>
</div>


{{-- 
<form action="#" method="post">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Firstname">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Middlename">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Lastname">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm" id="smbButton">
            <i class="fa fa-save"></i>Save
        </button>
        <button type="button" class="btn btn-default btn-sm"" data-dismiss="modal" aria-hidden="true">
            <i class="fa fa-times"></i>Close
        </button>
    </div>
</form>
 --}}


{{-- 
{!! Form::open(['method'=>'POST', 'id'=>'frm-insert' ]) !!}
{!! Form::bsText('firstname', '', ['id'=>'firstname', 'placeholder'=>'Firstname', ]) !!}
{!! Form::bsText('middlename', '', ['id'=>'middlename', 'placeholder'=>'Middlename', ]) !!}
{!! Form::bsText('lastname', '', ['id'=>'lastname', 'placeholder'=>'Lastname', ]) !!}
<div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
    {!! Form::label('sex_id', 'Gender', ['class'=>'control-label']) !!}
    {!! Form::select('sex_id', [''=>'Choose Category'] + $sex, '', ['id'=>'sex_id', 'class'=>'form-control']) !!}
    <span class="text-danger">
        {!! $errors->has('sex_id') ? $errors->first('sex_id') : '' !!}
    </span>
</div>
    
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-save"></i>Save
    </button>
    <button type="button" class="btn btn-default btn-sm"" data-dismiss="modal" aria-hidden="true">
        <i class="fa fa-times"></i>Close
    </button>
</div>
{!! Form::close() !!} 
--}}