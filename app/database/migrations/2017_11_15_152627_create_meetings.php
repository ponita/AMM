<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('unhls_meetings', function($table)
		{
			$table->increments('id');
		   	$table->string('serial_no');
		   	$table->string('name');
		   	$table->integer('thematicArea_id')->unsigned()->nullable();
		    $table->dateTime('start_time');
		    $table->dateTime('end_time');
		    $table->string('approval_status');
			$table->string('approvedby');
			$table->timestamp('approvedon');
			$table->string('venue')->nullable();			
			$table->integer('participants_no')->unsigned()->nullable();	
			$table->integer('organiser_id')->unsigned()->nullable();		
			$table->string('objective');
			$table->string('email');
			$table->string('minutes');		
			$table->integer('user_id')->unsigned();
			$table->text('comment')->nullable();

			$table->softDeletes();
            $table->timestamps();
		});	

		Schema::create('unhls_targetaudience', function($table)
		{

			$table->increments('id');
			$table->integer('meeting_id')->nullable();
			$table->string('targetAudience');
			$table->timestamps();
			$table->softDeletes();
 

		});

		Schema::create('unhls_meeting_agenda', function($table)
		{
		
			$table->increments('id');
			$table->integer('meeting_id');
			$table->text('agenda');

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
		//
		Schema::drop('unhls_meetings');
		Schema::drop('unhls_targetaudience');
		Schema::drop('unhls_meeting_agenda');
	}

}