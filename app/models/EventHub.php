<?php

class EventHub extends \Eloquent {
	protected $table = "event_hubs";

	public function event()
	{
		return $this->belongsTo('UNHLSEvent', 'event_id', 'id');
	}
}