<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class YearActivities extends Eloquent
{
	protected $table = 'year_activities';
	
	public function yearplan()
	{
		return $this->belongsTo('YearPlan', 'id');
	}
	public function yearobjectives()
	{
		return $this->belongsTo('YearObjectives', 'year_objective_id', 'id');
	}
	public function yearstrategies()
	{
		return $this->belongsTo('YearStrategies', 'year_strategies_id', 'id');
	}
	public function yearsubobjectives()
	{
		return $this->belongsTo('YearSubObjectives', 'year_subobjectives_id', 'id');
	}
	
 
}