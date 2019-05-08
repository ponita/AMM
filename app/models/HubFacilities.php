<?php

class HubFacilities extends \Eloquent {
	protected $table = "hub_facilities";

	public function hub()
	{
		return $this->belongsTo('Hub','hub_id','id');
	}
}