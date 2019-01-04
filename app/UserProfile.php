<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'avatar', 'contact', 'about',
    ];

    protected $guarded = [];


    public function user(){
    	return $this->belongsTo('App\User');
    }




}
