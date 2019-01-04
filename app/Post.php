<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'post_title',
        'post_body',
        'post_image',
        'post_status',
        'user_id',
        'post_category_id',
        'photo_id',
        'slug',
    ];

    protected $guarded = [];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'post_title',
                'onUpdate' => true,
            ],
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post_category()
    {
        return $this->belongsTo('App\PostCategory');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
