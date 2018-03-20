<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use log;

class UNHLSEvent extends Eloquent
{
	protected $table = 'unhls_events';
	
/**
	 * Activity status constants
	 */
	const NOT_RECEIVED = 1;
	const PENDING = 2;
	const STARTED = 3;
	const COMPLETED = 4;
	const VERIFIED = 5;


	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public function district()
	{
		return $this->belongsTo('District', 'district_id', 'id');
	}
	public function country()
	{
		return $this->belongsTo('Country', 'country_id', 'id');
	}

	public function objective()
    {
        return $this->hasMany('UNHLSEventObjective','event_id','id');
	}

	public function lesson()
    {
        return $this->hasMany('UNHLSEventLesson','event_id','id');
	}

	public function challenge()
    {
        return $this->hasMany('UNHLSEventChallenges','event_id','id');
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

	public function audiencedata()
    {
        return $this->hasMany('AudienceData','event_id','id');
	}

	public function thematicarea()
	{
		return $this->belongsTo('ThematicAreas','thematicArea_id');
	}

	public function funder()
	{
		return $this->belongsTo('Funder','funders_id');
	}

	public function organiser()
	{
		return $this->belongsTo('Organiser','organiser_id');
	}

	public function healthregion()
	{
		return $this->belongsTo('Healthregion','healthregion_id');
	}
	/**
	 * User (created) relationship
	 */
	public function createdBy()
	{
		return $this->belongsTo('User', 'created_by', 'id');
	}

	/**
	 * User (APPROVED) relationship
	 */
	public function approvedBy()
	{
		return $this->belongsTo('User', 'approvedby', 'id');
	}

	public function getThematicarea()
	{
		$query = $this->db->get('unhls_thematicareas');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}


	public function getType()
	{
		$query = $this->db->get('unhls_events');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getUuid(){
    	
    	$registrationDate = strtotime($this->created_at);
    	$year = date('Y', $registrationDate);
    	$Month = date('M', $registrationDate);
    	$autoNum = DB::table('uuids')->max('id')+1;
        $name = preg_split("/\s+/", $this->thematicArea_id);
        $initials = null;
        $ulin ='';

    	foreach ($name as $n){
    		$initials .= $n[0];

    	}
    	return $year.'/'.$Month.'/'.$initials.'/'.$autoNum;
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


	
//Filters for reports

	public static function reportfilter($datefrom,$dateto,$name,$type,$thematicArea)
	{
		return UNHLSEvent::Where(function ($query) use ($datefrom,$dateto,$name,$type,$thematicArea){
			$query->orWhere('name','LIKE','%$name%');
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$name,$type,$thematicArea){
			$query->where('start_date','>=',$datefrom)
					->where('start_date','<=',$dateto);
					
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$name,$type,$thematicArea){
			$query->where('end_date','>=',$datefrom)
					->where('end_date','<=',$dateto);
					
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$name,$type,$thematicArea){
			$query->where('type','=',$type);
					
					
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$name,$type,$thematicArea){
			$query->where('thematicArea_id','=',$thematicArea);
					
					
		})
		// ->orWhere(function ($query) use ($department)
		// 	{
		// 	    $query->where('thematicArea_id', 'like', '%' . $department . '%');//Search by department
		// 	})
		// ->orWhere(function ($query) use ($type)
		// 	{
		// 	    $query->where('type', 'like', '%' . $type . '%');//Search by type
		// 	})
		->get();
	}


	// 	public function isNotReceived()
	// {
	// 	if($this->event_status_id == UNHLSEvent::NOT_RECEIVED)
	// 		return true;
	// 	else 
	// 		return false;
	// }

	// /**
	//  * Helper function: check if the event status is PENDING
	//  *
	//  * @return boolean
	//  */
	// public function isPending()
	// {
	// 	if($this->event_status_id == UNHLSEvent::PENDING)
	// 		return true;
	// 	else 
	// 		return false;
	// }

	// *
	//  * Helper function: check if the event status is STARTED
	//  *
	//  * @return boolean
	 
	// public function isStarted()
	// {
	// 	if($this->event_status_id == UNHLSEvent::STARTED)
	// 		return true;
	// 	else 
	// 		return false;
	// }

	// /**
	//  * Helper function: check if the event status is COMPLETED
	//  *
	//  * @return boolean
	//  */
	// public function isCompleted()
	// {
	// 	if($this->event_status_id == UNHLSEvent::COMPLETED || $this->event_status_id == UNHLSEvent::VERIFIED)
	// 		return true;
	// 	else 
	// 		return false;
	// }

	public static function completevent($datefrom,$dateto,$name)
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

}