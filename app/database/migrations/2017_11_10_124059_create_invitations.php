<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvitations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_invitations', function($table)
		{
			$table->increments('id');
		   	$table->string('ref_no');
		   	$table->dateTime('date');
		   	$table->string('reference');
		   	$table->string('title');
		   	$table->string('name');
		   	$table->text('objective');
		   	$table->text('body');
		    $table->text('output');	
		   	$table->string('venue');
		    $table->dateTime('start_date')->nullable();
		    $table->dateTime('end_date')->nullable();
			$table->string('attachment');		
			$table->integer('user_id')->unsigned();
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
		Schema::drop('unhls_invitations');
	}

}
