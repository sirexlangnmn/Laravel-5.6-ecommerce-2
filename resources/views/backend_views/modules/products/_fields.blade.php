{{-- {!! dd($row) !!} --}}
<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        <div class="form-group {!! $errors->has('product_name') ? 'has-error' : '' !!}">
            {!! Form::label('product_name', 'Product Name', ['class'=>'col-md-12']) !!}
            {!! Form::text('product_name', $row->product_name, ['class'=>'form-control', 'placeholder'=>'Product Name']) !!}
            <span class="text-danger">{!! $errors->has('product_name') ? $errors->first('product_name') : '' !!}</span>
        </div>

        <div class="form-group {!! $errors->has('product_price') ? 'has-error' : '' !!}">
            {!! Form::label('product_price', 'Product Price', ['class'=>'col-md-12']) !!}
            {!! Form::number('product_price', $row->product_price, ['class'=>'form-control', 'min'=>'0', 'placeholder'=>'Product Price']) !!}
            <span class="text-danger">{!! $errors->has('product_price') ? $errors->first('product_price') : '' !!}</span>
        </div>

        <div class="form-group {!! $errors->has('product_description') ? 'has-error' : '' !!}">
            {!! Form::label('product_description', 'Product Description', ['class'=>'col-md-12']) !!}
            {!! Form::textarea('product_description', $row->product_description, ['class'=>'form-control', 'row'=>'5', 'placeholder'=>'Product Price']) !!}
            <span class="text-danger">{!! $errors->has('product_description') ? $errors->first('product_description') : '' !!}</span>
        </div>        
    </div>  {{-- /. col-lg-6 col col-md-6 col-sm-12 col-xs-12 --}}
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
    </div>

    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        <div class="form-group {!! $errors->has('product_code') ? 'has-error' : '' !!}">
            {!! Form::label('product_code', 'Product Code', ['class'=>'col-md-12']) !!}
            {!! Form::text('product_code', $row->product_code, ['class'=>'form-control', 'placeholder'=>'Product Code']) !!}
            <span class="text-danger">{!! $errors->has('product_code') ? $errors->first('product_code') : '' !!}</span>
        </div>
        
        <div class="form-group">
            <label class="col-sm-12"></label>
            <div class="col-sm-12">
            <div class="form-check">
                <label class="custom-control custom-checkbox">
                    @if( Route::currentRouteName() == 'products.create' )
                    <input type="checkbox" name="product_status" class="custom-control-input" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> &nbsp; Product Status </span>
                    @endif

                    @if( Route::currentRouteName() != 'products.create' )
                    <input type="checkbox" name="product_status" class="custom-control-input" value="1" @if($row->product_status == 1) checked @endif>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> &nbsp; Product Status </span>
                    @endif
                </label>
            </div>
            </div>
        </div>

        <div class="form-group {!! $errors->has('product_image') ? 'has-error' : '' !!}">
            {!! Form::label('product_image', 'Product Image', ['class'=>'col-md-12']) !!}
            <div class="col-sm-12">
                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput">
                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                        <span class="fileinput-filename"></span>
                    </div>
                    <span class="input-group-addon btn btn-default btn-file"> 
                    <span class="fileinput-new">Select file</span>
                    <span class="fileinput-exists">Change</span>
                    {!! Form::file('product_image', ['id'=>'product_image', 'class'=>'custom-file-input']) !!}
                    </span>
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                    <div id="thumb-output"></div>

                    @if( Route::currentRouteName() == 'products.edit' )
                        <input type="hidden" name="current_image" value="{!! $row->product_image !!}">
                        @if(!empty($row->product_image))
                            <img src="{!! asset('uploads/products/small/'.$row->product_image) !!}" /> &nbsp; <a href="{!! route('destroyProductImage_route', $row->id) !!}" class="btn btn-mini fcbtn btn btn-outline btn-danger btn-1e">Delete Image</a>
                        @endif
                        <br />
                        <i>If you want to update image too, delete the old one first.</i>
                    @endif


                </div>
                    <span class="text-danger">{!! $errors->has('product_image') ? $errors->first('product_image') : '' !!}</span>
            </div>
        </div>
    </div> {{-- /. col-lg-6 col col-md-6 col-sm-12 col-xs-12 --}}
</div> 







