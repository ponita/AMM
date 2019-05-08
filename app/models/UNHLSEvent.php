<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
//use log;

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
	public function unhlsfacilities()
	{
		return $this->hasMany('Facility', 'facility_id', 'id');
	}
	public function department()
	{
		return $this->belongsTo('Department', 'department_id', 'id');
	}
	public function workplan()
	{
		return $this->belongsTo('DepartmentWorkplan', 'workplan_id', 'id');
	}

	public function hub()
	{
		return $this->hasMany('Hub','hub_id','id');
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

	public function eventfacility()
    {
        return $this->hasMany('EventFacility','event_id','id');
	}

	public function eventhub()
    {
        return $this->hasMany('EventHub','event_id','id');
	}

	public function audiencedata()
    {
        return $this->hasMany('AudienceData','event_id','id');
	}

	public function thematicarea()
	{
		return $this->belongsTo('ThematicAreas','thematicArea_id','id');
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

	// public function getThematicarea()
	// {
	// 	$query = $this->db->get('unhls_thematicareas');
	// 	if($query->num_rows() > 0){
	// 		return $query->result();
	// 	}
	// }


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
    	$Month = date('m', $registrationDate);
    	$Day = date('d', $registrationDate);
    	$autoNum = DB::table('uuids')->max('id')+1;
        $name = preg_split("/\s+/", $this->thematicArea_id);
        $initials = null;
        $ulin ='';

    	foreach ($name as $n){
    		$initials .= $n[0];

    	}
    	return $year.'/'.$Month.'/'.$Day.'/'.$autoNum;
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

	public static function reportfilter($datefrom,$dateto,$thematicArea)
	{
		return UNHLSEvent::Where(function ($query) use ($datefrom,$dateto,$thematicArea){
			$query->where('start_date','>=',$datefrom)
					->where('start_date','<=',$dateto);
					
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$thematicArea){
			$query->where('end_date','>=',$datefrom)
					->where('end_date','<=',$dateto);
					
		})
		
		->orWhere(function ($query) use ($datefrom,$dateto,$thematicArea){
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