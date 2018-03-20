<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUuids extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uuids', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('counter')->unsigned();
		});

		Schema::create('uids', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('counter')->unsigned();
		});

		Schema::create('uuidsd', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('counter')->unsigned();
		});

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('uuids');
		Schema::dropIfExists('uids');
		Schema::dropIfExists('uuidsd');
	}

}
