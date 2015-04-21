<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	// sets up columns for applications table
	public function up()
	{
    Schema::create('applications', function($table) {
        $table->increments('id');
        $table->integer('user_id'); // foreign ID to link users table
        $table->integer('job_id'); // foreign ID to link jobs table
        $table->date('application_date');
        $table->string('letter');
        $table->timestamps();
    });
	}

  // function to drop applications table
	public function down()
	{
		Schema::drop('applications');
	}

}
