<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;


class YearObjectives extends Eloquent
{
	protected $table = 'year_objectives';
	
	
	public function yearplan()
	{
		return $this->belongsTo('YearPlan', 'id');
	}

}