{{-- {!! dd($row) !!} --}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <i class="text-success">Note: Min: h550 x w550 | Max: h650 x w650</i>
        
        <div class="form-group {!! $errors->has('new_avatar') ? 'has-error' : '' !!}">
            {!! Form::label('new_avatar', 'Avatar', ['class'=>'control-label']) !!}
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput">
                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                    <span class="fileinput-filename"></span>
                </div>
                <span class="input-group-addon btn btn-default btn-file"> 
                    <span class="fileinput-new">Select file</span>
                    <span class="fileinput-exists">Change</span>
                {!! Form::file('new_avatar', ['id'=>'product_image', 'class'=>'custom-file-input']) !!}
                </span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" 
                data-dismiss="fileinput">Remove</a> 
                <div id="thumb-output"></div>
            </div>
            <span class="text-danger">
                {!! $errors->has('new_avatar') ? $errors->first('new_avatar') : '' !!}
            </span>

            <label class="control-label">Current avatar</label>
            <input type="hidden" name="current_avatar" value="{!! $user->userProfile->avatar !!}" />
           
                <div class="product-img">
                    <img src="{!! asset('uploads/users/medium/'.$user->userProfile->avatar) !!}">
                    <div class="pro-img-overlay">
                    <a href="{!! route('destroy.user.image', $user->userProfile->user_id) !!}" class="bg-danger">
                    <i class="ti-trash"></i></a></div>
                </div>
        
            <br />
            <i class="text-success">
            If you want to update post image too, delete the old one first.
            </i>
        </div>

        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
            {!! Form::label('name', 'Fullname', ['class'=>'control-label']) !!}
            {!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Fullname']) !!}
            <span class="text-danger">{!! $errors->has('name') ? $errors->first('name') : '' !!}</span>
        </div>

        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
            {!! Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
            <span class="text-danger">{!! $errors->has('email') ? $errors->first('email') : '' !!}</span>
        </div>


        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
        <a class="toggle-reply"><i class="text-info">Click here if you want to change your password.</i></a>
        <div class="display-none">
            {!! Form::label('password', 'New Password', ['class'=>'control-label']) !!}
            <input type="password" name="new_password" class="form-control" placeholder="New Password" />
            <input type="hidden" name="current_password" class="form-control" value="{!! $user->password !!}" />
            <span class="text-danger">{!! $errors->has('password') ? $errors->first('password') : '' !!}</span>
        </div>
        </div>

        <div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
            {!! Form::label('role_id', 'Role', ['class'=>'control-label']) !!}
            {!! Form::select('role_id', $roles, $user->role_id, ['class'=>'form-control']) !!}
            <span class="text-danger">{!! $errors->has('role_id') ? $errors->first('role_id') : '' !!}</span>
        </div>

        
        <div class="form-check">
            <label class="custom-control custom-checkbox">                   
                <input type="checkbox" name="status" class="custom-control-input" value="1" @if($user->status == 1) checked @endif>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"> &nbsp; User Status </span>
            </label>
        </div>

    </div>  {{-- /. col-lg-4 col col-md-4 col-sm-12 col-xs-12 --}}
    

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">  
        {{ Form::bsText('contact', $user->userProfile->contact, ['placeholder'=>'Contact', ]) }}
        {{ Form::bsTextArea('about', $user->userProfile->about, ['placeholder'=>'About Me', ]) }}

    </div> {{-- /. col-lg-6 col col-md-6 col-sm-12 col-xs-12 --}}
</div> 






