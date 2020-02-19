<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Yearplanner extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('year_plan', function($table)

		{
		    $table->increments('id');
		    $table->string('name')->nullable();
		    $table->string('year')->nullable();
		    $table->timestamps();
			$table->softDeletes();
 
		});


		Schema::create('year_objectives', function($table)

		{
		    $table->increments('id');
			$table->string('year')->nullable();
		    $table->string('name')->nullable();
		    $table->timestamps();
			$table->softDeletes();

		});

		Schema::create('year_strategies', function($table)

		{
		    $table->increments('id');
			$table->integer('year_plan_id');
			$table->integer('year_objective_id');
		    $table->string('name')->nullable();
		    $table->timestamps();
			$table->softDeletes();


		});

		Schema::create('year_subobjectives', function($table)

		{
		    $table->increments('id');
			$table->integer('year_plan_id');
			$table->integer('year_objective_id');
			$table->integer('year_strategies_id');
		    $table->string('name')->nullable();
		    $table->timestamps();
			$table->softDeletes();


		});

		Schema::create('year_activities', function($table)

		{
		    $table->increments('id');
			$table->integer('year_plan_id');
			$table->integer('year_objective_id');
			$table->integer('year_strategies_id');
			$table->integer('year_subobjectives_id');
		    $table->string('name')->nullable();
		    $table->string('person_responsible')->nullable();
		    $table->string('funder')->nullable();
		    $table->timestamps();
			$table->softDeletes();


		});

		Schema::create('year_subactivities', function($table)

		{
		    $table->increments('id');
			$table->integer('year_plan_id');
			$table->integer('year_objective_id');
			$table->integer('year_strategies_id');
			$table->integer('year_subobjectives_id');
			$table->integer('year_activities_id');
			$table->integer('target');
			$table->integer('target_count');
		    $table->string('name')->nullable();
		    $table->string('location')->nullable();
			$table->dateTime('from_timeframe')->nullable();
			$table->dateTime('update_from_timeframe')->nullable();
			$table->dateTime('to_timeframe')->nullable();
			$table->dateTime('update_to_timeframe')->nullable();
		    $table->timestamps();
			$table->softDeletes();


		});


		Schema::create('year_activity_location', function($table)

		{
		    $table->increments('id');
			$table->integer('year_plan_id');
			$table->integer('year_objective_id');
			$table->integer('year_strategies_id');
			$table->integer('year_subobjectives_id');
			$table->integer('year_activities_id');
			$table->integer('year_subactivities_id');
			$table->integer('target');
		    $table->string('name')->nullable();
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
		Schema::drop('year_plan');
		Schema::drop('year_objectives');
		Schema::drop('year_strategies');
		Schema::drop('year_subobjectives');
		Schema::drop('year_activities');
		Schema::drop('year_subactivities');
		Schema::drop('year_activity_location');
	}

}
