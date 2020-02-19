<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;


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


	public function getMonthlyData(){

		$start = date_create($value->from_timeframe);
		$end = date_create($value->to_timeframe);
		$interval = DateInterval::createFromDateString('1 month');
		$period   = new DatePeriod($start, $interval, $end);
		$spanned_months = array();
		foreach ($period as $dt) {
			$spanned_months[] = $dt->format("n");
		}
	}

	
}