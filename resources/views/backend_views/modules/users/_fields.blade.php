{{-- {!! dd($row) !!} --}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        {{ Form::bsText('name', $row->name, ['placeholder'=>'Fullname', ]) }}
        {{ Form::bsText('email', $row->email, ['placeholder'=>'Email', ]) }}
    </div> {{-- class="col-lg-6 col-md-6 col-sm-12 col-xs-12" --}}

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">  
        @if( Route::currentRouteName() == 'users.create' )
        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            {!! Form::label('password', 'Password', ['class'=>'control-label']) !!}
                <input type="password" name="password" class="form-control" {{-- value="{!! $row->password !!}" --}} placeholder="Password" />
            <span class="text-danger">{!! $errors->has('password') ? $errors->first('password') : '' !!}</span>
        </div>
        @endif

        <div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
            {!! Form::label('role_id', 'Role', ['class'=>'control-label']) !!}
            
            @if(Route::currentRouteName() == 'users.create')
                {!! Form::select('role_id', [''=>'Choose Role'] + $roles, $row->role_title, ['class'=>'form-control']) !!}
            @elseif(Route::currentRouteName() == 'users.edit')
                {!! Form::select('role_id', $roles, $row->role_id, ['class'=>'form-control']) !!}
            @endif

            <span class="text-danger">{!! $errors->has('role_id') ? $errors->first('role_id') : '' !!}</span>
        </div>

        
        <div class="form-check">
            <label class="custom-control custom-checkbox">                   
                <input type="checkbox" name="status" class="custom-control-input" value="1" @if($row->status == 1) checked @endif>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"> &nbsp; User Status </span>
            </label>
        </div>

    </div> {{-- /. col-lg-6 col col-md-6 col-sm-12 col-xs-12 --}}
</div> 






