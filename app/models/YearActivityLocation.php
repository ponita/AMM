<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;


class YearActivityLocation extends Eloquent
{
	protected $table = 'year_activity_location';
	
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
	public function yearactivities()
	{
		return $this->belongsTo('YearActivities', 'year_activities_id', 'id');
	}
	public function yearsubactivities()
	{
		return $this->belongsTo('YearSubActivities', 'year_subactivities_id', 'id');
	}

}