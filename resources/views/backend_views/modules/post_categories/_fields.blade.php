{{-- {!! dd($row) !!} --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  

        
    {{ Form::bsText('pc_title', $row->pc_title, ['placeholder'=>'Title', ]) }}
    {{ Form::bsTextArea('pc_description', $row->pc_description, ['rows'=>'4', ]) }}

    <div class="form-group">
        <div class="form-check">
            <label class="custom-control custom-checkbox">                   
                <input type="checkbox" name="pc_status" class="custom-control-input" value="1" 
                    @if($row->pc_status == 1) checked @endif>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"> &nbsp; Post Category Status </span>
            </label>
        </div>
    </div>

    {{ Form::bsSubmit('Submit', ['class'=>'btn btn-block btn-outline btn-rounded btn-success m-r-10']) }}

    </div> {{-- /. col-lg-12 col col-md-12 col-sm-12 col-xs-12 --}}
</div> 






