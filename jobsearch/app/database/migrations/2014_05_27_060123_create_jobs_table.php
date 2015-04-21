<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	// sets columns of the jobs table
	public function up()
	{
    Schema::create('jobs', function($table) {
        $table->increments('id')->unique();
        $table->string('title');
        $table->integer('user_id'); // foreign ID to link users table
        $table->string('company');
        $table->string('location');
        $table->string('salary');
        $table->text('description');
        $table->date('open_date');
        $table->date('close_date');
        $table->timestamps();
    });
	}

	//function to drop jobs table
	public function down()
	{
		Schema::drop('jobs');
	}

}
