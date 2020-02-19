<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrantdata extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('grant_data', function($table)

		{
		    $table->increments('id');
		    $table->integer('identity')->nullable();
		    $table->string('objective')->nullable();
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
		Schema::drop('grant_data');
	}

}
