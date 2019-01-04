<?php

use Illuminate\Database\Seeder;
use App\OrderItem;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItem::create([
        	'order_id' => 1,
        	'product_id' => 1,
        	'oi_quantity' => 7,
        	'oi_price' => 777
        ]);

        OrderItem::create([
        	'order_id' => 1,
        	'product_id' => 2,
        	'oi_quantity' => 8,
        	'oi_price' => 888
        ]);

        OrderItem::create([
        	'order_id' => 1,
        	'product_id' => 3,
        	'oi_quantity' => 9,
        	'oi_price' => 99
        ]);

        OrderItem::create([
        	'order_id' => 2,
        	'product_id' => 4,
        	'oi_quantity' => 10,
        	'oi_price' => 100
        ]);

        OrderItem::create([
        	'order_id' => 2,
        	'product_id' => 5,
        	'oi_quantity' => 11,
        	'oi_price' => 1100
        ]);
    }
}
