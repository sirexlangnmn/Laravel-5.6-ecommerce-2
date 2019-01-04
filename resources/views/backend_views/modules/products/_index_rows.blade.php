@foreach($allProducts as $row)    
<tr class="text-center">
    <td>
        <div class="btn-group btn-mini dropdown">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button"> Action <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu animated flipInY">
                {!! Form::open(['route'=>['products.destroy', $row->id], 'method'=>'DELETE' ]) !!}
                    {{-- <li>{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}</li> --}}
                    {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}

                <li>
                    {!! link_to_route('products.edit', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-info fa fa-edit', 'data-toggle'=>'tooltip', 'title'=>'Edit Details'] ) !!}

                    {!! link_to_route('products.show', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-primary fa fa-list', 'data-toggle'=>'tooltip', 'title'=>'Show Details'] ) !!}

                    {!! link_to_route('products.show', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-success fa fa-plus', 'data-toggle'=>'tooltip', 'title'=>'Add Attributes'] ) !!}

                    {!! link_to_route('prod-alt-img.show', '', $row->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-warning fa fa-camera-retro', 'data-toggle'=>'tooltip', 'title'=>'Add Alternative Images'] ) !!}

                    <a href="#" class="btn btn-outline btn-circle btn-danger" data-toggle="modal" data-target="#myModal{!! $row->id !!}"> <span class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"> </span> </a> 
                </li>
                {!! Form::close() !!} 
            </ul>
        </div>
    </td>
    <td>{!! $row->id !!}</td>
    <td>{!! $row->product_name !!}</td>
    <td>{!! $row->product_code !!}</td>
    <td>₱ {!! $row->product_price !!}</td>
    <td>
        @if($row->product_status == 1)
            Active
        @elseif($row->product_status == 0)
            Disabled
        @endif
    </td>
    <td><img src="{!! asset('uploads/products/thumbnail/'.$row->product_image) !!}" alt="{!! $row->product_image !!}" />
    </td>
    
    @include('backend_views.modules.products._index_modal_delete')
            
</tr>
@endforeach


{{-- 
<a href="" type="button" class="btn btn-primary btn-circle text-inverse" data-toggle="tooltip" title="View Details">
<i class="fa fa-list"></i> </a>

<a href="" type="button" class="btn btn-success btn-circle text-inverse" data-toggle="tooltip" title="Add Product Attributes">
<i class="fa fa-plus"></i> </a>

<a href="" type="button" class="btn btn-info btn-circle text-inverse" data-toggle="tooltip" title="Edit Details">
<i class="fa fa-edit (alias)"></i> </a>

<a href="" type="button" class="btn btn-warning btn-circle text-inverse" data-toggle="tooltip" title="Add Alternative Images"><i class="fa fa-camera-retro"></i> </a>

<button type="button" data-toggle="modal" data-target="#myModal{!! $row->id !!}" class="btn btn-danger btn-circle text-inverse" > <i class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"></i> </button>

<button type="button" class="btn btn-default btn-circle text-inverse" data-toggle="tooltip" title="Standby"><i class="fa fa-info"></i> </button> 
--}}