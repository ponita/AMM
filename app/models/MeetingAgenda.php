<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class MeetingAgenda extends Eloquent
{
	protected $table = 'unhls_meeting_agenda';
	
	
	public function meeting()
	{
		return $this->belongsTo('Meeting', 'meeting_id', 'id');
	}

}
