<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

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