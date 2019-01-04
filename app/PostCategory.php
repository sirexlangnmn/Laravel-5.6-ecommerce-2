<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    
    protected $fillable = [
    	'pc_title',
    	'pc_description',
    	'pc_status'
	];
	

	protected $guarded = [];


	/* for future deletion*/
    /*public function post(){
        return $this->belongsTo('App\Post');
    }*/

    public function posts(){
        return $this->hasMany('App\Post');
    }
    




}
