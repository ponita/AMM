<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UNHLSEventChallenges extends Eloquent
{
	protected $table = 'unhls_events_challenges';
	
	
	public function event()
	{
		return $this->belongsTo('UNHLSEvent', 'event_id', 'id');
	}

}