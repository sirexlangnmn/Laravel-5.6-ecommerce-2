<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
        	'user_id' => 3,
        	'order_date' => '2018-09-27 06:48:38',
        	'order_address' => 'Quezon City',
        	'order_status' => 1
        ]);

        Order::create([
        	'user_id' => 4,
        	'order_date' => '2018-09-27 07:48:38',
        	'order_address' => 'Taguig City',
        	'order_status' => 1
        ]);
    }
}
