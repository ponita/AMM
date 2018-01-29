<?php

class TestStatus extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'test_statuses';

	public $timestamps = false;

	/**
	 * Test relationship
	 */
    public function tests()
    {
        return $this->hasMany('Test');
    }

	/**
	 * TestPhase relationship
	 */
	public function testPhase()
	{
		return $this->belongsTo('TestPhase');
	}
}