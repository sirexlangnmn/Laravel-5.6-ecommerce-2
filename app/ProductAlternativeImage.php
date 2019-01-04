<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAlternativeImage extends Model
{
    protected $fillable = [
		    'product_id',
            'prod_alt_image',
	];

	protected $guarded = [];

	public function product(){
        return $this->belongsTo('App\Product');
    }

}
