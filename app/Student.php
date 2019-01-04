<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'sex_id',
    ];

    protected $guarded = [];

    public function sex()
    {
        return $this->belongsTo('App\Sex');
    }
}
