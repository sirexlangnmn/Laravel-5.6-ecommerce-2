<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

// To undesrtsand more about sluggable, go to..
// [FreeTutorials.Us] Udemy - php-with-laravel-for-beginners-become-a-master-in-laravel
// I don't know what is good in using slug, as far as I know, it cost additional database weight that can result in slowing your system.

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'status', 'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ],
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        if ($this->role->role_title == 'Admin' && $this->status == 1) {
            return true;
        }

        return false;
    }

    public function isSoftwareEngineer()
    {
        if ($this->role->role_title == 'Software Engineer' && $this->status == 1) {
            return true;
        }

        return false;
    }

    /*I am expecting error. I convert the functions from singular to plural*/
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*  /.I am expecting error. I convert the functions from singular to plural*/

    public function comment_replies()
    {
        return $this->hasMany(CommentReply::class);
    }

    public function userProfile()
    {
        return $this->hasOne('App\UserProfile');
    }
}
