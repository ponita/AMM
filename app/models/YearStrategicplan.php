<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

// class YearActivities extends Eloquent
// {
// 	protected $table = 'year_activities';
	
// 	public function yearplan()
// 	{
// 		return $this->belongsTo('YearPlan', 'id');
// 	}
// 	public function yearobjectives()
// 	{
// 		return $this->belongsTo('YearObjectives', 'year_objective_id', 'id');
// 	}
// 	public function yearstrategies()
// 	{
// 		return $this->belongsTo('YearStrategies', 'year_strategies_id', 'id');
// 	}
// 	public function yearsubobjectives()
// 	{
// 		return $this->belongsTo('YearSubObjectives', 'year_subobjectives_id', 'id');
// 	}
	
 
// }

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

// class YearObjectives extends Eloquent
// {
// 	protected $table = 'year_objectives';
	
	
// 	public function yearplan()
// 	{
// 		return $this->belongsTo('YearPlan', 'id');
// 	}

// }

class YearPlan extends Eloquent
{
	protected $table = 'year_plan';

}

class YearStrategies extends Eloquent
{
	protected $table = 'year_strategies';
	
	public function yearplan()
	{
		return $this->belongsTo('YearPlan', 'id');
	}
	public function yearobjectives()
	{
		return $this->belongsTo('YearObjectives', 'year_objective_id', 'id');
	}

}

class YearSubActivities extends Eloquent
{
	protected $table = 'year_subactivities';
	
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
	
}

class YearSubObjectives extends Eloquent
{
	protected $table = 'year_subobjectives';
	
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
	

}

