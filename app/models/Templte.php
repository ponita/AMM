<?php

class Templte extends Eloquent
{
	protected $table = "templates";

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}


	public static function getAdmintemplates()
	{
		return Templte::find(1);
	}
}