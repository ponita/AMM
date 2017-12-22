<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use log;

class UNHLSEvent extends Eloquent
{
	protected $table = 'unhls_events';
	
	
	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public function district()
	{
		return $this->belongsTo('District', 'district_id', 'id');
	}

	public function objective()
    {
        return $this->hasMany('UNHLSEventObjective','event_id','id');
	}

	public function lesson()
    {
        return $this->hasMany('UNHLSEventLesson','event_id','id');
	}

	public function recommendation()
    {
        return $this->hasMany('UNHLSEventRecommendation','event_id','id');
	}

	public function action()
    {
        return $this->hasMany('UNHLSEventAction','event_id','id');
	}

	public function audience()
    {
        return $this->hasMany('Audience','event_id','id');
	}

	public static function filtereventsbydate($datefrom,$dateto,$name)
	{
		return UNHLSEvent::Where(function ($query) use ($datefrom,$dateto,$name){
			$query->orWhere('name','LIKE','%$name%');
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$name){
			$query->where('start_date','>=',$datefrom)
					->where('start_date','<=',$dateto);
					
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$name){
			$query->where('end_date','>=',$datefrom)
					->where('end_date','<=',$dateto);
					
		})
		->get();
	}

	// 	public function isNotReceived()
	// {
	// 	if($this->test_status_id == UnhlsTest::NOT_RECEIVED)
	// 		return true;
	// 	else 
	// 		return false;
	// }

	/**
	 * Helper function: check if the Test status is PENDING
	 *
	 * @return boolean
	 */
	// public function isPending()
	// {
	// 	if($this->test_status_id == UnhlsTest::PENDING)
	// 		return true;
	// 	else 
	// 		return false;
	// }

	// *
	//  * Helper function: check if the Test status is STARTED
	//  *
	//  * @return boolean
	 
	// public function isStarted()
	// {
	// 	if($this->test_status_id == UnhlsTest::STARTED)
	// 		return true;
	// 	else 
	// 		return false;
	// }

	// /**
	//  * Helper function: check if the Test status is COMPLETED
	//  *
	//  * @return boolean
	//  */
	// public function isCompleted()
	// {
	// 	if($this->test_status_id == UnhlsTest::COMPLETED || $this->test_status_id == UnhlsTest::VERIFIED)
	// 		return true;
	// 	else 
	// 		return false;
	// }

}