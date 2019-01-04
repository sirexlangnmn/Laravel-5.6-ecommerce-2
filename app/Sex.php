<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $fillable = [
        'sex',
    ];

    protected $guarded = [];

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
