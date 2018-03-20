<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_events', function($table)
		{
			$table->increments('id');
		   	$table->string('serial_no');
		   	$table->string('name');
		   	$table->string('description')->nullable();
		    $table->string('type')->nullable();		    
            $table->string('uid')->nullable();//todo: should be unique
		    $table->dateTime('start_date');
		    $table->dateTime('end_date');
		    $table->string('approval_status');
		    $table->string('co_organiser');
		    $table->integer('approval_status_id');
		    $table->integer('obj_status_id');
		    $table->integer('les_status_id');
		    $table->integer('rec_status_id');
		    $table->integer('action_status_id');
			$table->string('approvedby');
			$table->text('comment')->nullable();
			$table->timestamp('approvedon');
			$table->string('location')->nullable();			
			$table->string('premise')->nullable();	
			$table->integer('district_id')->unsigned()->nullable();
			$table->integer('country_id')->unsigned()->nullable();
			$table->integer('funders_id')->unsigned()->nullable();
			$table->integer('organiser_id')->unsigned()->nullable();
			$table->integer('thematicArea_id')->unsigned()->nullable();
			$table->integer('healthregion_id')->unsigned()->nullable()->default('0');	
			$table->integer('audience_id')->unsigned()->nullable();	
			$table->integer('objective_id')->unsigned()->nullable();		
			$table->integer('participants_no')->unsigned();	
			$table->string('report_filename');
			$table->integer('status_id');
			$table->string('reports');		
			$table->integer('user_id')->unsigned();

			$table->softDeletes();
            $table->timestamps();
		});	
		Schema::create('unhls_events_actions', function($table)
		{
		
			$table->increments('id');
			$table->integer('event_id');
			$table->text('action');
			$table->string('name');
			$table->dateTime('date');
			$table->string('location');

			$table->timestamps();
			$table->softDeletes(); 
  
		});	//

		Schema::create('unhls_events_lessons', function($table){

			$table->increments('id');
			$table->integer('event_id');
			$table->text('lesson');
			$table->timestamps();
			$table->softDeletes();

			});
		Schema::create('unhls_events_challenges', function($table){

			$table->increments('id');
			$table->integer('event_id');
			$table->text('challenges');
			$table->timestamps();
			$table->softDeletes();

			});
		Schema::create('unhls_events_objectives', function($table){

			 $table->increments('id');
			 $table->integer('event_id');
			 $table->text('objective');
			 $table->timestamps();
			 $table->softDeletes();
		});

		Schema::create('unhls_events_recommendations', function($table)
		{

			$table->increments('id');
			$table->integer('event_id');
			$table->text('recommendation');
			$table->timestamps();
			$table->softDeletes();
 

		});

		Schema::create('unhls_audience', function($table)
		{

			$table->increments('id');
			$table->integer('event_id')->nullable();
			$table->integer('meeting_id')->nullable();
			$table->string('audience');
			$table->timestamps();
			$table->softDeletes();
 

		}); 

		Schema::create('unhls_funders', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name',100)->unique();
            $table->string('description',100)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('unhls_organisers', function(Blueprint $table)
        { 
            $table->increments('id')->unsigned();
            $table->string('name',100)->unique();
            $table->integer('telephoneNo')->unsigned();
            $table->string('cadre')->nullable();
            $table->string('email',100);
            $table->string('description',100)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('unhls_thematicareas', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name',100)->unique();
            $table->string('description',100)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('unhls_healthregions', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name',100)->unique();
            $table->string('description',100)->nullable();

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
		Schema::drop('unhls_events');
		Schema::drop('unhls_events_recommendations');
		Schema::drop('unhls_events_objectives');
		Schema::drop('unhls_events_lessons');
		Schema::drop('unhls_events_challenges');
		Schema::drop('unhls_events_actions');
		Schema::drop('unhls_healthregions');
		Schema::drop('unhls_thematicareas');
		Schema::drop('unhls_organisers');
		Schema::drop('unhls_funders');
		Schema::drop('unhls_audience');
	
	}

}
