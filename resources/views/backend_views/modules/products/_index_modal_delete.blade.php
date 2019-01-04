<div id="myModal{!! $row->id !!}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-danger" id="myModalLabel">Very important!</h4>
            Once you delete this product details, there's no getting it back.
            Make sure you want to do this.
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6 col col-md-6 col-sm-12 col-xs-12">
                    <p class="text-center">
                        <img src="{!! asset('uploads/products/small/'.$row->product_image) !!}">
                    </p>  
                    <p>Product Image:</p>      
                </div>
                <div class="col-lg-6 col col-md-6 col-sm-12 col-xs-12">
                    <p>Product-ID: &nbsp; <strong>{!! $row->id !!}</strong></p>
                    <p>Product Name: &nbsp; <strong>{!! $row->product_name !!}</strong></p>
                    <p>Product Code: &nbsp; <strong>{!! $row->product_code !!}</strong></p>
                    <p>Product Description: &nbsp; <strong>{!! $row->product_description !!}</strong></p>
                    <p>Product Price: &nbsp; <strong>{!! $row->product_price !!}</strong></p>
                    <p>Created At: &nbsp; <strong>{!! $row->created_at !!}</strong></p>
                    <p>Updated At: &nbsp; <strong>{!! $row->updated_at !!}</strong></p>  
                </div>
            </div>
        </div>
        <div class="modal-footer">
            
            {!! Form::open(['route'=>['products.destroy', $row->id], 'method'=>'POST' ]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-rounded btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}
                {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}
            {!! Form::close() !!} 
            
            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancel</button>
        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
