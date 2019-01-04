<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/*protected $primaryKey = 'product_id';*/

    
    protected $fillable = [
    	'product_name',
        'product_code',
    	'product_price',
    	'product_description',
    	'product_status',
    	'product_image',
	];
	

	protected $guarded = [];

    public function productAlternativeImages(){
        return $this->hasMany('App\ProductAlternativeImage');
    }

}
