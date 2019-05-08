<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DepartmentWorkplan extends Eloquent
{
	protected $table = 'department_workplan';
	
	
	public function department()
	{
		return $this->belongsTo('Department', 'department_id', 'id');
	}
	public function thematicarea()
	{
		return $this->belongsTo('ThematicAreas', 'thematicArea_id', 'id');
	}

}
