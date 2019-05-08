<?php

class UuiddGenerator extends \Eloquent {
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'uuidsd';

    public $timestamps = false;

    public function thematicarea()
	{
		return $this->belongsTo('ThematicAreas','thematicArea_id');
	}
}