<?php
class ApplicationSeeder extends Seeder {
  
  // adds a premade application where seeker@hotmail.com has applied for Waiter job
  public function run()
  {
    $application = new Application;
    $application->user_id = 1;
    $application->job_id = 3;
    $application->application_date = '2014-06-01';
    $application->letter = 'Give me job';
    $application->save();
  }
}