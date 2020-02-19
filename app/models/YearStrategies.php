<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;


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