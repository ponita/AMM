<?php

class EventFacility extends \Eloquent {
	protected $table = "event_facilities";

	public function event()
	{
		return $this->belongsTo('UNHLSEvent', 'event_id', 'id');
	}
}