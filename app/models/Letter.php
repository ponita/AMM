<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use log;

class Letter extends \Eloquent 
{
	protected $table = 'unhls_letters';
	
public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}
}