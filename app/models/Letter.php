<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
//use log;

class Letter extends \Eloquent 
{
	protected $table = 'unhls_letters';
	
public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

 public function copied()
    {
        return $this->hasMany('UNHLSLettersCopied','letter_id','id');
    }

	public function getUids(){
    	
    	$registrationDate = strtotime($this->created_at);
    	$year = date('Y', $registrationDate);
    	$Month = date('M', $registrationDate);
    	$Day = date('d', $registrationDate);
    	$autoNum = DB::table('uids')->max('id')+1;
        

    	return 'MGT'.'/'.'L'.$autoNum.'/'.$Day.'/'.$Month.'/'.$year;
    }
}