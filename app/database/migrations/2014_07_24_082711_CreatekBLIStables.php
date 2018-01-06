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

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tokens', function(Blueprint $table)
        {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamps();
        });

        Schema::create('patients', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('patient_number')->unique();
            $table->string('name', 100);
            $table->date('dob');
            $table->tinyInteger('gender')->default(0);
            $table->string('email', 100)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('external_patient_number', 20)->nullable();
            $table->integer('created_by')->unsigned()->default(0);

            $table->index('external_patient_number');
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
            $table->string('unit', 30);
            $table->string('description', 150)->nullable();

            $table->foreign('measure_type_id')->references('id')->on('measure_types');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('measure_ranges', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('measure_id')->unsigned();
            $table->integer('age_min')->unsigned()->nullable();
            $table->integer('age_max')->unsigned()->nullable();
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
            $table->integer('status')->unsigned();
            $table->string('person', 500);
            $table->text('contacts');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('patients');
        Schema::dropIfExists('tokens');
        Schema::dropIfExists('users');
    }




}
