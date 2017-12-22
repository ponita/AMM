<?php

class TargetAudience extends \Eloquent {
	protected $table = 'unhls_targetaudience';

	public function meetings()
	{
		return $this->belongsTo('Meeting', 'meeting_id', 'id');
	}

}