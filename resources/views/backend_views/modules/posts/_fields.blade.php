{{-- {!! dd($row) !!} --}}
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        
        {{-- main photo on this table --}}
        <i class="text-success">Note: Min: h400 x w900 | Max: h650 x w1100</i>
        <div class="form-group {!! $errors->has('post_image') ? 'has-error' : '' !!}">
            {!! Form::label('post_image', 'Post Image', ['class'=>'control-label']) !!}
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput">
                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                    <span class="fileinput-filename"></span>
                </div>
                <span class="input-group-addon btn btn-default btn-file"> 
                    <span class="fileinput-new">Select file</span>
                    <span class="fileinput-exists">Change</span>
                {!! Form::file('post_image', ['id'=>'product_image', 'class'=>'custom-file-input']) !!}
                </span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" 
                data-dismiss="fileinput">Remove</a> 
                <div id="thumb-output"></div>
            </div>
            <span class="text-danger">
                {!! $errors->has('post_image') ? $errors->first('post_image') : '' !!}
            </span>

            @if( Route::currentRouteName() == 'posts.edit' )
                <label class="control-label">Current post_Image</label>
                <input type="hidden" name="current_image" value="{!! $row->post_image !!}" />
                @if(!empty($row->post_image))
                    <div class="product-img">
                        <img src="{!! asset('uploads/posts/large/'.$row->post_image) !!}">
                        <div class="pro-img-overlay">
                        <a href="{!! route('destroy.post.image', $row->id) !!}" class="bg-danger">
                        <i class="ti-trash"></i></a></div>
                    </div>
                @endif
                <br />
                <i class="text-success">
                If you want to update post image too, delete the old one first.
                </i>
            @endif
        </div>

        {{-- photo that on separated table Photo--}}
        <div class="form-group {!! $errors->has('second_image') ? 'has-error' : '' !!}">
            {!! Form::label('second_image', 'Second Image', ['class'=>'control-label']) !!}
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput">
                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                    <span class="fileinput-filename"></span>
                </div>
                <span class="input-group-addon btn btn-default btn-file"> 
                <span class="fileinput-new">Select file</span>
                <span class="fileinput-exists">Change</span>
                {!! Form::file('second_image', ['id'=>'product_image', 'class'=>'custom-file-input']) !!}
                </span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" 
                data-dismiss="fileinput">Remove</a> 
                <div id="thumb-output"></div>
            </div>
            <span class="text-danger">
                {!! $errors->has('second_image') ? $errors->first('second_image') : '' !!}
            </span>

            @if( Route::currentRouteName() == 'posts.edit' )
                <label class="control-label">Current Photo 2</label>
                <input type="hidden" name="current_image2" value="{!! $row->second_image !!}" />
                @if(!empty($row->second_image))
                    <div class="product-img"><img src="{!! asset('uploads/posts/large/'.$row->second_image) !!}"><div class="pro-img-overlay"><a href="{!! route('destroy.post.image', $row->id) !!}" class="bg-danger"><i class="ti-trash"></i></a></div></div>
                @endif
                <br />
                <i>If you want to update post image too, delete the old one first.</i>
            @endif
        </div>
    </div>  {{-- /. col-lg-4 col col-md-4 col-sm-12 col-xs-12 --}}
    

    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12"> 

        {{ Form::bsText('post_title', $row->post_title, ['placeholder'=>'Post Title', ]) }}
        {{ Form::bsTextArea('post_body', $row->post_body, ['rows'=>'6', ]) }}

        {!! Form::label('', 'Select Tags', ['class'=>'control-label']) !!}
        <div class="form-group">
        <div class="form-check">
            @foreach($tags as $tag)
            <label class="custom-control custom-checkbox"> 
                <input  type="checkbox" 
                        name="tags[]" 
                        class="custom-control-input" 
                        value="{!! $tag->id !!}"
                    
                    @foreach ($row->tags as $t)
                        @if($tag->id == $t->id)
                            checked
                        @endif
                    @endforeach
                />
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"> &nbsp; {!! $tag->tag !!}</span>
            </label>
            @endforeach                           
        </div>
        </div>
        
        <div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
            {!! Form::label('post_category_id', 'Category', ['class'=>'control-label']) !!}
            
            @if(Route::currentRouteName() == 'posts.create')
                {!! Form::select('post_category_id', [''=>'Choose Category'] + $post_categories, $row->pc_title, ['class'=>'form-control']) !!}
            @elseif(Route::currentRouteName() == 'posts.edit')
                {!! Form::select('post_category_id', $post_categories, $row->post_category_id, ['class'=>'form-control']) !!}
            @endif

            <span class="text-danger">
                {!! $errors->has('post_category_id') ? $errors->first('post_category_id') : '' !!}
            </span>
        </div>
        

          
        <label class="custom-control custom-checkbox">                   
            <input type="checkbox" name="post_status" class="custom-control-input" value="1" 
            @if($row->post_status == 1) checked @endif />
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description"> &nbsp; Post Status </span>
        </label>
     
    </div> {{-- /. col-lg-6 col col-md-6 col-sm-12 col-xs-12 --}}
</div> 








