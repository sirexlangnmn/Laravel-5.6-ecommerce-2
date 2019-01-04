
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" {{-- aria-labelledby="Create Student" --}} aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update User Record</h4>
            </div>
            <div class="modal-body">
            {{-- {!! Form::model($user, ['method'=>'PUT', 'id'=>'frm']) !!} --}}
            {!! Form::open(['url'=>'/js-three/update', 'method'=>'POST', 'id'=>'frm-update']) !!}
                <div class="col-md-6">
                    {{-- <input type="hidden" name="id" id="recent-id"> --}}
                    {!!Form::hidden('id', null, (['id'=>'recent-id'])) !!}
                    {{ Form::bsText('name', null, ['id'=>'recent-name', 'class'=>'form-control', 'placeholder'=>'Name', 'required'=>'required']) }}
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="recent-email" class="form-control" placeholder="Email" required>      
                    </div>
                </div>
                <div class="col-md-6">
                    {!! Form::label('role_id', 'Roles') !!}
                    {!! Form::select('role_id', $roles, null, ['id'=>'recent-role-id', 'class'=>'form-control']) !!}
                </div>

                {{ Form::bsSubmit('Save', ['class'=>'btn btn-block btn-outline btn-rounded btn-success', 'style'=>'margin-left: -15px;']) }}
                
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

