<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Letters extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		
		Schema::create('unhls_letters', function($table)
		{
			$table->increments('id');
			$table->string('ref_no');
		   	$table->string('dear')->nullable();
		   	$table->string('ref')->nullable();
		   	$table->text('body')->nullable();
		   	$table->text('title')->nullable();
		   	$table->string('name')->nullable();
		   	$table->integer('user_id')->unsigned();
		   	$table->string('receiver')->nullable();
		   	$table->dateTime('date')->nullable();
		   	 $table->string('approval_status');
			$table->string('approvedby');
			$table->text('comment')->nullable();
			$table->timestamp('approvedon');
		    
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
		Schema::drop('unhls_letters');
	}

}
