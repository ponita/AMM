<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use log;

class Invitation extends \Eloquent
 {
	protected $table = 'unhls_invitations';

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}
} 