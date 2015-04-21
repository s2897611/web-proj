<?php
class JobSeeder extends Seeder {
  public function run()
  {
    // adds a job linked to qldhealth@hotmail.com using user_id
    $job = new Job;
    $job->title = 'Doctor';
    $job->user_id = 3;
    $job->company = 'Queensland Health';
    $job->location = 'Nathan';
    $job->salary = 80000;
    $job->description = 'work in a hospital.';
    $job->open_date = '2012-05-14';
    $job->close_date = '2012-06-14';
    $job->save();
    
    // adds a job linked to qldhealth@hotmail.com using user_id
    $job = new Job;
    $job->title = 'Nurse';
    $job->user_id = 3;
    $job->company = 'Queensland Health';
    $job->location = 'Nathan';
    $job->salary = 60000;
    $job->description = 'work in a hospital with a doctor.';
    $job->open_date = '2012-05-15';
    $job->close_date = '2012-12-15';
    $job->save();
    
    // adds a job linked to swinery@gmail.com using user_id
    $job = new Job;
    $job->title = 'Waiter';
    $job->user_id = 4;
    $job->company = 'Sirromet Winery';
    $job->location = 'Mount Cotton';
    $job->salary = 50000;
    $job->description = 'Serve customers dinner.';
    $job->open_date = '2014-05-31';
    $job->close_date = '2014-06-31';
    $job->save();
    
    // adds a job linked to swinery@gmail.com using user_id
    $job = new Job;
    $job->title = 'Bartender';
    $job->user_id = 4;
    $job->company = 'Sirromet Winery';
    $job->location = 'Mount Cotton';
    $job->salary = 55000;
    $job->description = 'Serve customers alcohol.';
    $job->open_date = '2014-05-31';
    $job->close_date = '2014-06-16';
    $job->save();
  }
}