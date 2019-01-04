{{-- {!! dd($orders) !!} --}}
@foreach($orders as $order)    
<tr class="text-center">
    <td>
        <div class="btn-group btn-mini dropdown">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button"> Action <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu animated flipInY">
                {!! Form::open(['route'=>['orders.destroy', $order->id], 'method'=>'DELETE' ]) !!}
                {{-- <li>{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}</li> --}}
                {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}
           
                <li>{!! link_to_route('orders.show', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-primary fa fa-list', 'data-toggle'=>'tooltip', 'title'=>'Show Details'] ) !!}
                </li>   

                {!! Form::close() !!} 
            </ul>
        </div>
        <div class="btn-group btn-mini dropdown">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-success dropdown-toggle waves-effect waves-light" type="button"> Status <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu animated flipInY">
                @include('backend_views.modules.orders._index_rows_statusButtons')
            </ul>
        </div>
    </td>
    <td>{!! $order->id !!}</td>
    <td>{!! $order->user->name !!}</td>
    {{-- <td>
        @foreach($order->products as $product)
            {!! $product->product_name !!}
        @endforeach
    </td>
    <td>
        @foreach($order->orderItems as $orderItem)
            {!! $orderItem->oi_quantity !!}
        @endforeach
    </td> --}}
    <td>{!! $order->order_date !!}</td>
    <td>
        @if($order->order_status == 3)
            <span class="label label-success">Delivered</span>
        @elseif($order->order_status == 2)
            <span class="label label-primary">On The Way</span>
        @elseif($order->order_status == 1)
            <span class="label label-info">Confirmed</span>
        @elseif($order->order_status == 0)
            <span class="label label-warning">Pending</span>
        @elseif($order->order_status == 4)
            <span class="label label-danger">Cancelled</span>
        @endif
    </td>
    
    {{-- @include('backend_views.modules.orders._index_modal_delete') --}}
            
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

<button type="button" data-toggle="modal" data-target="#myModal{!! $order->id !!}" class="btn btn-danger btn-circle text-inverse" > <i class="fa fa-trash-o" data-toggle="tooltip" title="Delete Details"></i> </button>

<button type="button" class="btn btn-default btn-circle text-inverse" data-toggle="tooltip" title="Standby"><i class="fa fa-info"></i> </button> 
--}}