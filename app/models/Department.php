<?php

class Department extends \Eloquent {
	protected $table = "departments" ;

	public function workplan()
    {
        return $this->hasMany('DepartmentWorkplan','department_id','id');
	}

	public function thematicarea()
	{
		return $this->belongsTo('ThematicAreas', 'thematicArea_id', 'id');
	}
}