<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'role_title',
    	'role_description'
    ];


	protected $guarded = [];


	public function user(){
        return $this->belongsTo(User::class);
    }


    public function users(){
        return $this->hasMany(User::class);
    }



    
}
