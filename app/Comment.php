<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'post_id',
        'user_id',
        'body',
        'status'
    	
	];


	protected $guarded = [];

    public function replies(){
        /*return $this->hasMany(Comment::class);*/
        return $this->hasMany(CommentReply::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    
    
}
