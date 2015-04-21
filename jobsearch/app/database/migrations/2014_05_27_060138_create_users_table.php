<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	// sets columns of users table
	public function up()
	{
    Schema::create('users', function($table) {
        $table->increments('id');
        $table->string('email')->unique();
        $table->string('password')->index(); // uses the password as table index
        $table->string('name');
        $table->string('category');
        $table->string('industry')->nullable(); // allows industry to be nullable as job Seekers do not have an industry
        $table->string('phone');
        $table->text('extraInfo');
        $table->string('remember_token');
        $table->timestamps();
    });
	}
  
	// function to drop users table
	public function down()
	{
		Schema::drop('users');
	}

}
