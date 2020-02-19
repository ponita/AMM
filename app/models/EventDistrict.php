<?php

class EventDistrict extends \Eloquent {
	protected $table = "event_districts";

	public function event()
	{
		return $this->belongsTo('UNHLSEvent', 'event_id', 'id');
	}
}