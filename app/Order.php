<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /*protected $primaryKey = 'order_id';*/

    
    protected $fillable = [
    	'user_id',
    	'order_date',
    	'order_address',
    	'order_status',
	];
	

	protected $guarded = [];


	public function user(){
		return $this->belongsTo(User::class);
	}


	public function orderItems(){
		return $this->hasMany(OrderItem::class);
	}


	public function products(){
		return $this->belongsToMany(Product::class, 'order_items');
	}









}
