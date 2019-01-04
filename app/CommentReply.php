<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
    	'comment_id',
        'user_id',
        'body',
        'status',
        'parent_id'
    	
	];


	protected $guarded = [];

	// ako nag lagay nito
    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
