<?php

class LeaveForm extends Eloquent
{
	protected $table = "leave_form";

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}
	public function leave_days()
	{
		return $this->hasMany('Leave_Days','id');
	}

	public $timestamps = false;
}

