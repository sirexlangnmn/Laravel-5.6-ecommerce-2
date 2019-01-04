@foreach($row['productAlternativeImages'] as $productImage)    
<tr class="text-center">
    <td>
        <div class="btn-group btn-mini dropdown">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button"> Action <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu animated flipInY">

                    <a href="#" class="btn btn-outline btn-circle btn-danger" data-toggle="modal" data-target="#myModal{!! $productImage->id !!}"> <span class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"> </span> </a> 
                
            </ul>
        </div>
    </td>
    <td>{!! $productImage->id !!}</td>
    <td>{!! $productImage->product_id !!}</td>
    <td><img src="{!! asset('uploads/products/medium/'.$productImage->prod_alt_image) !!}" alt="{!! $productImage->prod_alt_image !!}" class="img-responsive" />
    </td>
    
    {{-- @include('backend_views.modules.products._index_modal_delete') --}}
            
</tr>
@endforeach