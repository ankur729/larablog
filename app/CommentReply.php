<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
	protected $fillable=[
	'comment_id',
	'author',
	'email',
	'body',
	'is_active'
	];
	protected $table='comment_replies';
    //

    public function comment()
    {
    	$this->belongsTo('App\Comment');
    }
}
