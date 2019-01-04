<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Product;
use Session;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('backend_views.modules.orders.index_page', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the order id
        $order = Order::find($id);

        // get related order, orderItems, products, users
        $orderItems = OrderItem::where(['order_id'=>$id])->get();

        // link to products
        foreach ($orderItems as $key => $product) {
            $products=Product::where(['id'=>$product->product_id])
                ->first();
                $orderItems[$key]->product_name = $products->product_name;
                $orderItems[$key]->product_code = $products->product_code;
                $orderItems[$key]->product_price = $products->product_price;
        }
        return view('backend_views.modules.orders.show_page', compact('order', 'orderItems')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * this is for update buttons.
     * for updating order status
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pending(Request $request, $id)
    {
        // update the data in the database
        Order::where([ 'id' => $id ])
        ->update([ 'order_status' => 0 ]);

        //session message
        /*$request->session()->flash('flash_message_success', 'Order Status: Pending order.');*/
        Session::flash('flash_message_success', 'Order Status: Pending order.');

        //redirect page
        /*return redirect('admin/orders');*/
        return redirect(route('orders.index'));
    }

    public function confirmed(Request $request, $id)
    {
        // update the data in the database
        Order::where([ 'id' => $id ])
        ->update([ 'order_status' => 1 ]);

        //session message
        /*$request->session()->flash('flash_message_success', 'Order Status: Confirmed order.');*/
        Session::flash('flash_message_success', 'Order Status: Confirmed order.');

        //redirect page
        /*return redirect('admin/orders');*/
        return redirect(route('orders.index'));
    }

    public function onTheWay(Request $request, $id)
    {
        // update the data in the database
        Order::where([ 'id' => $id ])
        ->update([ 'order_status' => 2 ]);

        //session message
        /*$request->session()->flash('flash_message_success', 'Order Status: On the way.');*/
        Session::flash('flash_message_success', 'Order Status: On the way.');

        //redirect page
        /*return redirect('admin/orders');*/
        return redirect(route('orders.index'));
    }

    public function delivered(Request $request, $id)
    {
        // update the data in the database
        Order::where([ 'id' => $id ])
        ->update([ 'order_status' => 3 ]);

        //session message
        /*$request->session()->flash('flash_message_success', 'Order Status: Delivered successfully.');*/
        Session::flash('flash_message_success', 'Order Status: Delivered successfully.');

        //redirect page
        /*return redirect('admin/orders');*/
        return redirect(route('orders.index'));
    }

    public function cancelled(Request $request, $id)
    {
        // update the data in the database
        Order::where([ 'id' => $id ])
        ->update([ 'order_status' => 4 ]);

        //session message
        /*$request->session()->flash('flash_message_success', 'Order Status: Cancelled order.');*/
        Session::flash('flash_message_success', 'Order Status: Cancelled order.');

        //redirect page
        /*return redirect('admin/orders');*/
        return redirect(route('orders.index'));
    }




}
