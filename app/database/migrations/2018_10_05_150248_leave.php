<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Leave extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leave_form', function($table)
		{
			$table->increments('id');
			$table->string('leave_type');
		   	$table->string('department')->nullable();
		   	$table->string('section')->nullable();
		   	$table->text('name')->nullable();
		   	$table->string('email')->nullable();
		   	$table->string('supermail')->nullable();
		   	$table->string('mangmail')->nullable();
		   	$table->integer('emp_contact')->nullable();
		   	$table->integer('days')->unsigned();
		   	$table->integer('user_id')->unsigned();
		   	$table->integer('nok_contact')->unsigned();
		   	$table->string('nok_name')->nullable();
		   	$table->dateTime('date_from')->nullable();
		   	$table->dateTime('date_to')->nullable();
		   	$table->string('s_approval_status');
		   	$table->string('m_approval_status');
		   	$table->string('h_approval_status');
		    $table->integer('approval_status_id');
			$table->string('approvedbys');
			$table->string('approvedbym');
			$table->string('approvedbyh');
			$table->text('comment')->nullable();
			$table->text('s_comment')->nullable();
			$table->text('m_comment')->nullable();
			$table->text('h_comment')->nullable();
			$table->timestamp('approvedon');
			$table->timestamp('m_approvedon');
			$table->timestamp('h_approvedon');
		    
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
		Schema::drop('leave_form');
	}

}
