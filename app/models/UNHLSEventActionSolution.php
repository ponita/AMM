<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UNHLSEventActionSolution extends Eloquent
{
	protected $table = 'unhls_action_solution';
	
	
	public function action()
	{
		return $this->belongsTo('UNHLSEventAction', 'event_action_id', 'id');
	}

	public function maction()
	{
		return $this->belongsTo('UNHLSMeetingAction', 'meeting_action_id', 'id');
	}

}