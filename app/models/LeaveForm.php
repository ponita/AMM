<?php

class LeaveForm extends Eloquent
{
	protected $table = "leave_form";

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public $timestamps = false;
}