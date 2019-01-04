<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
    	'photo_title',
    	'photo_status'
	];
	

	protected $guarded = [];


	/* No effect
	public function getClientOriginalExtension($photo){
		return $this->uploads . $photo ;
	}
	*/

	public function post(){
        return $this->belongsTo(Post::class);
    }
}
