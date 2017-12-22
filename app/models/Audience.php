<?php

class Audience extends \Eloquent {
	protected $table = 'unhls_audience';

	public function event()
	{
		return $this->belongsTo('UNHLSEvent', 'event_id', 'id');
	}

}

