<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Departments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
		public function up()
	{
		Schema::create('departments', function($table)

		{
		    $table->increments('id');
			$table->integer('thematicArea_id');
		    $table->string('name')->nullable();
		    $table->timestamps();
			$table->softDeletes();


		});

		Schema::create('department_workplan', function($table)

		{
		    $table->increments('id');
			$table->integer('department_id');
			$table->integer('thematicArea_id');
		    $table->string('workplan')->nullable();
			$table->dateTime('from_timeframe')->nullable();
			$table->dateTime('to_timeframe')->nullable();
		    $table->timestamps();
			$table->softDeletes();


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('departments');
		Schema::drop('department_workplan');
	}

}
