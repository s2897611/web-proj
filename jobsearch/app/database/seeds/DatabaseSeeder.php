<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

    // calls UserSeeder, jobSeeder and ApplicationSeeder to add rows to their corresponding tables
		$this->call('UserSeeder');
    $this->call('JobSeeder');
    $this->call('ApplicationSeeder');
	}

}
