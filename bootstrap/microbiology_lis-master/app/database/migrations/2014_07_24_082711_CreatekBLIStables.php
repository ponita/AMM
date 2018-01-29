<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatekBLIStables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('unhls_districts', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('unhls_facility_ownership', function($table){
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('unhls_facility_level', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

        });

        Schema::create('unhls_facilities', function($table)
        {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->integer('district_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('ownership_id')->unsigned();

            $table->foreign('level_id')->references('id')->on('unhls_facility_level');
            $table->foreign('district_id')->references('id')->on('unhls_districts');
            $table->foreign('ownership_id')->references('id')->on('unhls_facility_ownership');

            $table->timestamps();
        });

		Schema::create('users', function(Blueprint $table)
        {
            $table->increments("id")->unsigned();
            $table->string("username", 50)->unique();
            $table->string("password", 100);
            $table->string("email", 100);
            $table->string("name", 100)->nullable();
            $table->tinyInteger("gender")->default(0);
            $table->string("designation", 100)->nullable();
            $table->string("image", 100)->nullable();
            $table->string("remember_token", 100)->nullable();
            $table->integer('facility_id')->unsigned()->nullable();

            $table->foreign('facility_id')->references('id')->on('unhls_facilities');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tokens', function(Blueprint $table)
        {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamps();
        });

        Schema::create('unhls_patients', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('patient_number')->nullable();
            $table->string('ulin')->nullable();//todo: should be unique
            $table->string('nin')->nullable();//todo: should be unique
            $table->string('name', 100);
            $table->date('dob');
            $table->tinyInteger('gender')->default(0);
            $table->string('email', 100)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('village_residence', 150)->nullable();
            $table->string('village_workplace', 150)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('occupation')->nullable();
            $table->string('external_patient_number', 20)->nullable();
            $table->integer('created_by')->unsigned()->default(0);

            $table->index('patient_number');
            $table->index('created_by');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('specimen_types', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name', 45);
            $table->string('description', 100)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('test_categories', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name',100)->unique();
            $table->string('description',100)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('measure_types', function(Blueprint $table)
        {
            $table->integer('id')->unsigned();
            $table->string('name',100)->unique();

            $table->primary('id');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('measures', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('measure_type_id')->unsigned();
            $table->string('name', 100);
            $table->string('unit', 30)->nullable();
            $table->string('description', 150)->nullable();

            $table->foreign('measure_type_id')->references('id')->on('measure_types');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('measure_ranges', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('measure_id')->unsigned();
            $table->decimal('age_min')->nullable();
            $table->decimal('age_max')->nullable();
            $table->tinyInteger('gender')->unsigned()->nullable();
            $table->decimal('range_lower', 7, 3)->nullable();
            $table->decimal('range_upper', 7, 3)->nullable();
            $table->string('alphanumeric', 200)->nullable();
            $table->string('interpretation', 100)->nullable();

            $table->index('alphanumeric');

            $table->softDeletes();
            $table->foreign('measure_id')->references('id')->on('measures');
        });

        Schema::create('test_types', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name', 100);
            $table->string('description', 100)->nullable();
            $table->integer('test_category_id')->unsigned();
            $table->string('targetTAT', 50)->nullable();
            $table->string('prevalence_threshold', 50)->nullable();

            $table->foreign('test_category_id')->references('id')->on('test_categories');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('testtype_measures', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('test_type_id')->unsigned();
            $table->integer('measure_id')->unsigned();
            $table->tinyInteger('ordering')->nullable();
            $table->tinyInteger('nesting')->nullable();

            $table->foreign('test_type_id')->references('id')->on('test_types');
            $table->foreign('measure_id')->references('id')->on('measures');
            $table->unique(array('test_type_id','measure_id'));
        });

        Schema::create('testtype_specimentypes', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('test_type_id')->unsigned();
            $table->integer('specimen_type_id')->unsigned();

            $table->foreign('test_type_id')->references('id')->on('test_types');
            $table->foreign('specimen_type_id')->references('id')->on('specimen_types');
            $table->unique(array('test_type_id','specimen_type_id'));
        });

        Schema::create('test_phases', function(Blueprint $table)
        {
            $table->integer('id')->unsigned();
            $table->string('name',45);

            $table->primary('id');
        });

        Schema::create('test_statuses', function(Blueprint $table)
        {
            $table->integer('id')->unsigned();
            $table->string('name',45);
            $table->integer('test_phase_id')->unsigned();

            $table->primary('id');
			$table->foreign('test_phase_id')->references('id')->on('test_phases');
		});

		Schema::create('specimen_statuses', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->string('name',45);

			$table->primary('id');
		});

		Schema::create('rejection_reasons', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string("reason", 100);
		});

        Schema::create('facilities', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name', 500);

            $table->timestamps();
        });

        Schema::create('referrals', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('facility_from')->unsigned()->nullable();
            $table->integer('facility_to')->unsigned()->nullable();
            $table->string('person')->nullable();
            $table->text('contacts')->nullable();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('facility_from')->references('id')->on('unhls_facilities');
            $table->foreign('facility_to')->references('id')->on('unhls_facilities');

            $table->timestamps();
        });

        Schema::create('diseases', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 60);
        });

        Schema::create('specimens', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('suspected_disease_id')->unsigned()->nullable();
            $table->integer('specimen_type_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('specimen_status_id')->unsigned()->default(UnhlsSpecimen::ACCEPTED);
            $table->integer('accepted_by')->unsigned();
            $table->integer('referral_id')->unsigned()->nullable();
            $table->string('lab_id');
            $table->timestamp('time_collected')->nullable();
            $table->timestamp('time_accepted')->nullable();

            $table->index('accepted_by');
            $table->foreign('specimen_type_id')->references('id')->on('specimen_types');
            $table->foreign('suspected_disease_id')->references('id')->on('diseases');
            $table->foreign('patient_id')->references('id')->on('unhls_patients');
            $table->foreign('specimen_status_id')->references('id')->on('specimen_statuses');
            $table->foreign('referral_id')->references('id')->on('referrals');
        });

        Schema::create('unhls_tests', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('test_type_id')->unsigned();
            $table->integer('specimen_id')->unsigned();
            $table->string('interpretation',200)->default('');
            $table->integer('test_status_id')->unsigned()->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('tested_by')->unsigned()->default(0);
            $table->integer('verified_by')->unsigned()->default(0);
            $table->string('requested_by',60);
            $table->timestamp('time_created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('time_started')->nullable();
            $table->timestamp('time_completed')->nullable();
            $table->timestamp('time_verified')->nullable();
            $table->timestamp('time_sent')->nullable();
            $table->integer('external_id')->nullable();//Unique ID for external records

            $table->index('created_by');
            $table->index('tested_by');
            $table->index('verified_by');
            $table->foreign('test_type_id')->references('id')->on('test_types');
            $table->foreign('specimen_id')->references('id')->on('specimens');
            $table->foreign('test_status_id')->references('id')->on('test_statuses');
        });

        Schema::create('pre_analytic_specimen_rejections', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('specimen_id')->unsigned();
            $table->integer('rejected_by')->unsigned();
            $table->integer('rejection_reason_id')->unsigned()->nullable();
            $table->string('reject_explained_to',100)->nullable();
            $table->timestamp('time_rejected')->nullable();

            $table->index('rejected_by');
            $table->foreign('specimen_id')->references('id')->on('specimens');
            $table->foreign('rejection_reason_id')->references('id')->on('rejection_reasons');
        });

        Schema::create('analytic_specimen_rejections', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('specimen_id')->unsigned();
            $table->integer('rejected_by')->unsigned();
            $table->integer('rejection_reason_id')->unsigned()->nullable();
            $table->string('reject_explained_to',100)->nullable();
            $table->timestamp('time_rejected')->nullable();

            $table->index('rejected_by');
            $table->foreign('test_id')->references('id')->on('unhls_tests');
            $table->foreign('specimen_id')->references('id')->on('specimens');
            $table->foreign('rejection_reason_id')->references('id')->on('rejection_reasons');
        });

		Schema::create('unhls_test_results', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('test_id')->unsigned();
			$table->integer('measure_id')->unsigned();
			$table->string('result',1000)->nullable();
			$table->timestamp('time_entered')->default(DB::raw('CURRENT_TIMESTAMP'));
			
            $table->foreign('test_id')->references('id')->on('unhls_tests');
            $table->foreign('measure_id')->references('id')->on('measures');
			$table->unique(array('test_id','measure_id'));
		});

        Schema::create('instruments', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name', 100);
            $table->string('ip', 15)->nullable();
            $table->string('hostname', 100)->nullable();
            $table->string('description', 100)->nullable();
            $table->string('driver_name', 100)->nullable();

            $table->nullableTimestamps();
        });

        Schema::create('instrument_testtypes', function(Blueprint $table)
        {
            $table->integer('instrument_id')->unsigned();
            $table->integer('test_type_id')->unsigned();

            $table->foreign('instrument_id')->references('id')->on('instruments');
            $table->foreign('test_type_id')->references('id')->on('test_types');
            $table->unique(array('instrument_id','test_type_id'));
        });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('instrument_testtypes');
        Schema::dropIfExists('instruments');
		Schema::dropIfExists('unhls_test_results');
		Schema::dropIfExists('unhls_tests');
		Schema::dropIfExists('specimens');
        Schema::dropIfExists('referrals');
        Schema::dropIfExists('facilities');
		Schema::dropIfExists('rejection_reasons');
		Schema::dropIfExists('test_statuses');
		Schema::dropIfExists('specimen_statuses');
		Schema::dropIfExists('test_phases');
		Schema::dropIfExists('testtype_specimentypes');
        Schema::dropIfExists('testtype_measures');
        Schema::dropIfExists('test_types');
        Schema::dropIfExists('measure_ranges');
        Schema::dropIfExists('measures');
        Schema::dropIfExists('measure_types');
        Schema::dropIfExists('test_categories');
        Schema::dropIfExists('specimen_types');
        Schema::dropIfExists('unhls_patients');
        Schema::dropIfExists('tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('unhls_facilities');
        Schema::dropIfExists('unhls_districts');
        Schema::dropIfExists('unhls_facility_ownership');
        Schema::dropIfExists('unhls_facility_level');
	}
}
