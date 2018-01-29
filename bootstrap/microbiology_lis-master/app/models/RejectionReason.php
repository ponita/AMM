<?php

class RejectionReason extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rejection_reasons';

	public $timestamps = false;

	/**
	 * Test relationship
	 */
	public function tests()
	{
		return $this->hasMany('AnalyticSpecimenRejection', 'test_id');
	}

	/**
	 * Specimen relationship
	 */
	public function specimens()
	{
		return $this->hasMany('PreAnalyticSpecimenRejection', 'specimen_id');
	}

}