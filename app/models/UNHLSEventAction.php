<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UNHLSEventAction extends Eloquent
{
	protected $table = 'unhls_events_actions';
	
	
	public function event()
	{
		return $this->belongsTo('UNHLSEvent', 'event_id', 'id');
	}

	public function solution()
    {
        return $this->hasMany('UNHLSEventActionSolution','event_action_id','id');
	}

}