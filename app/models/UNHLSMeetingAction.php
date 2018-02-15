<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UNHLSMeetingAction extends Eloquent
{
	protected $table = 'unhls_meeting_actions';
	
	
	public function meeting()
	{
		return $this->belongsTo('Meeting', 'meeting_id', 'id');
	}

}