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
		    $table->integer('approval_status_id');
			$table->string('approvedby');
			$table->text('comment')->nullable();
			$table->timestamp('approvedon');
		    
			$table->softDeletes();
            $table->timestamps();
		});	

		Schema::create('unhls_letters_copied', function($table){

			 $table->increments('id');
			 $table->integer('letter_id');
			 $table->text('copied');
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
		Schema::drop('unhls_letters');
		Schema::drop('unhls_letters_copied');
	}

}
