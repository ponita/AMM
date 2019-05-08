<?php

class Hub extends \Eloquent {
	protected $table = "unhls_hubs";

public function unhlsfacilities()
	{
		return $this->belongsToMany('Facility','facility_id','id');
	}

}