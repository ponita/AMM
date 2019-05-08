<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class EventAudience extends Eloquent
{
	protected $table = 'unhls_event_audience';
	
	
	public function event()
	{
		return $this->belongsTo('UNHLSEvent', 'event_id', 'id');
	}

}
