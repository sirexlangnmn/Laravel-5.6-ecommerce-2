{{--
Legend of corresponding button, label, and status
danger = 4 cancelled
warning = 0 pending
info = 1 confirmed
primary = 2 on the way
success = 3 delivered 
--}}



{!! Form::open(['route'=>['orders.destroy', $order->id], 'method'=>'DELETE' ]) !!}
    {{-- <li>{!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}</li> --}}
    {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}

<li>
    @if($order->order_status == 3)

        <span class="label label-success">Successful Transaction</span>

    @elseif($order->order_status == 2)
    
        {!! link_to_route('orders.delivered', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-success fa fa-check', 'data-toggle'=>'tooltip', 'title'=>'Delivered'] ) !!}

    @elseif($order->order_status == 1)

        {!! link_to_route('orders.cancelled', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger fa fa-ban', 'data-toggle'=>'tooltip', 'title'=>'Cancelled'] ) !!}

        {!! link_to_route('orders.onTheWay', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-primary fa fa-truck', 'data-toggle'=>'tooltip', 'title'=>'On the way'] ) !!}

        {!! link_to_route('orders.delivered', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-success fa fa-check', 'data-toggle'=>'tooltip', 'title'=>'Delivered'] ) !!}
    
    @elseif($order->order_status == 0)

        {!! link_to_route('orders.cancelled', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-danger fa fa-ban', 'data-toggle'=>'tooltip', 'title'=>'Cancelled'] ) !!}

        {!! link_to_route('orders.confirmed', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-info fa fa-cubes', 'data-toggle'=>'tooltip', 'title'=>'Confirmed'] ) !!}

        {!! link_to_route('orders.onTheWay', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-primary fa fa-truck', 'data-toggle'=>'tooltip', 'title'=>'On the way'] ) !!}

        {!! link_to_route('orders.delivered', '', $order->id, ['type'=>'submit', 'class'=>'btn btn-outline btn-circle btn-success fa fa-check', 'data-toggle'=>'tooltip', 'title'=>'Delivered'] ) !!}
    
    @elseif($order->order_status == 4)

        <span class="label label-danger">Cancelled Transaction</span>

    @endif    

</li>
{!! Form::close() !!} 