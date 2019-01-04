<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    
    protected $fillable = [
    	'order_id',
    	'product_id',
    	'oi_quantity',
    	'oi_price',
	];
	
	

	protected $guarded = [];


	public function order(){
		return $this->belongsTo('App\Order');
	}

   
}
