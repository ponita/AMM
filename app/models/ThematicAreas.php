<?php

class ThematicAreas extends \Eloquent {
	protected $table = 'unhls_thematicareas';

	public function department()
    {
        return $this->hasMany('Department','thematicArea_id','id');
	}
	
}