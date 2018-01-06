<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use log;

class Meeting extends \Eloquent 
{
	protected $table = 'unhls_meetings';
	
public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}
public function targetaudience()
    {
        return $this->hasMany('TargetAudience','meeting_id','id');
	}
public function agenda()
    {
        return $this->hasMany('MeetingAgenda','meeting_id','id');
	}
public function thematicarea()
	{
		return $this->belongsTo('ThematicAreas','thematicArea_id','id');
	}
public function organiser()
	{
		return $this->belongsTo('Organiser','organiser_id','id');
	}


	/**
	 * Helper function: check if the Test status is PENDING
	 *
	 * @return boolean
	 */
	// public function isPending()
	// {
	// 	if($this->test_status_id == Meeting::PENDING)
	// 		return true;
	// 	else 
	// 		return false;
	// }

	// *
	//  * Helper function: check if the Test status is COMPLETED
	//  *
	//  * @return boolean
	 
	// public function isCompleted()
	// {
	// 	if($this->test_status_id == Meeting::COMPLETED || $this->test_status_id == Meeting::VERIFIED)
	// 		return true;
	// 	else 
	// 		return false;
	// }
}