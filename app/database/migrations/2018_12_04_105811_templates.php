<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Templates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('templates', function($table)
		{
			$table->increments('id');
		   	$table->string('t_name')->nullable();
		   	$table->string('doc')->nullable();
		   	$table->integer('user_id')->unsigned();
		    
			$table->softDeletes();
            $table->timestamps();
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('templates');
	}

}
