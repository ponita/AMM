<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use log;

class Invitation extends \Eloquent
 {
	protected $table = 'unhls_invitations';

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public function getUuidsd(){
    	
    	$registrationDate = strtotime($this->created_at);
    	$year = date('Y', $registrationDate);
    	$Month = date('M', $registrationDate);
    	$Day = date('d', $registrationDate);
    	$autoNum = DB::table('uuidsd')->max('id')+1;
        

    	return 'MGT'.'/'.'INV'.$autoNum.'/'.$Day.'/'.$Month.'/'.$year;
    	// return $year.'/'.$Month.'/'.$initials.'/'.$autoNum;
    } 
} 