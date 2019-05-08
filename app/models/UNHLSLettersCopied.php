<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UNHLSLettersCopied extends Eloquent
{
	protected $table = 'unhls_letters_copied';
	
	
	public function letter()
	{
		return $this->belongsTo('Letter', 'letter_id', 'id');
	}

}
