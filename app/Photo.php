<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $fillable=['file',''];

	protected $directory='/user_image/';



	public function getFileAttribute($file)
	{

		return $this->directory.$file;
	}
    //
}
