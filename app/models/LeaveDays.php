<?php

class LeaveDays extends Eloquent
{
	protected $table = "leave_days";

	public function leave()
	{
		return $this->belongsTo('LeaveForm', 'leave_id', 'id');
	}

	public $timestamps = false;
}