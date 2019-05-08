<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
//use log;

class Meeting extends \Eloquent 
{
	protected $table = 'unhls_meetings';


/**
	 * Meeting status constants
	 */
	const STARTED = 1;
	const COMPLETED = 2;
	const VERIFIED = 3;
	const APPROVED = 4;
	const CANCELLED = 5;

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
public function maction()
    {
        return $this->hasMany('UNHLSMeetingAction','meeting_id','id');
	}
public function thematicarea()
	{
		return $this->belongsTo('ThematicAreas','thematicArea_id','id');
	}
public function department()
	{
		return $this->belongsTo('Department', 'department_id', 'id');
	}
public function workplan()
	{
		return $this->belongsTo('DepartmentWorkplan', 'workplan_id', 'id');
	}
public function organiser()
	{
		return $this->belongsTo('Organiser','organiser_id','id');
	}
//Filters for reports

	public static function reportfilters($datefrom,$dateto,$thematicArea)
	{
		return Meeting::Where(function ($query) use ($datefrom,$dateto,$thematicArea){
			$query->where('start_time','>=',$datefrom)
					->where('start_time','<=',$dateto);
					
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$thematicArea){
			$query->where('end_time','>=',$datefrom)
					->where('end_time','<=',$dateto);
					
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$thematicArea){
			$query->where('thematicArea_id','=',$thematicArea);
					
					
		})
		
		->get();
	}

	public static function detailedfilter($datefrom,$dateto,$thematicArea){
	
		return Meeting::Where(function ($query) use ($datefrom,$dateto,$thematicArea){
			$query->orWhere('thematicArea_id','=',$thematicArea);
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$thematicArea){
			$query->where('start_time','>=',$datefrom)
					->where('start_time','<=',$dateto);
					
		})
		->orWhere(function ($query) use ($datefrom,$dateto,$thematicArea){
			$query->where('end_time','>=',$datefrom)
					->where('end_time','<=',$dateto);
					
		})
		
		
		->get();
	}

public function getUidd(){
    	
    	$registrationDate = strtotime($this->created_at);
    	$year = date('Y', $registrationDate);
    	$Month = date('m', $registrationDate);
    	$Day = date('d', $registrationDate);
    	$autoNum = DB::table('uidd')->max('id')+1;
        $name = preg_split("/\s+/", $this->thematicArea_id);
        $initials = null;
        $ulin ='';

    	foreach ($name as $n){
    		$initials .= $n[0];

    	}
    	return $year.'/'.$Month.'/'.$Day.'/'.$autoNum;
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
	 
	public function isCompleted()
	{
		if($this->status_id == Meeting::COMPLETED)
			return true;
		else 
			return false;
	}

	public static function completedmeeting($datefrom=NULL ,$dateto=NULL ,$name='' ,$statusId=2 )
	{
		return Meeting::Where(function ($query) use ($name){
			$query->orWhere('name','LIKE','%$name%');
		})
		->orWhere(function ($query) use ($datefrom){
			$query->where('start_time','>=',$datefrom)
					->where('start_time','<=',$dateto);
					
		})
		->orWhere(function ($query) use ($dateto){
			$query->where('end_time','>=',$datefrom)
					->where('end_time','<=',$dateto);
					
		})

		->orWhere(function ($query) use ($statusId){
			$query->where('status_id','=',$statusId ?:2);
					
		})
		

		// if ($statusId > 0) {
		// 	$meetings = $meetings->where(function($q) use ($statusId)
		// 	{
		// 		    $q->where('status_id','=', $statusId);//Filter by status
				
		// 	});
		// }
		
		->get();
	}
}