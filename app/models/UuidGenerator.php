<?php

class UuidGenerator extends \Eloquent {
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'uuids';

    public $timestamps = false;

    public function thematicarea()
	{
		return $this->belongsTo('ThematicAreas','thematicArea_id');
	}
}