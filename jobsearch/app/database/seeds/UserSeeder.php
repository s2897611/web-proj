<?php
class UserSeeder extends Seeder {
  public function run()
  {
    // adds a new JobSeeker user
    $user = new User;
    $encrypted = Hash::make('pass1');
    $user->email = 'seeker@hotmail.com';
    $user->password = $encrypted;
    $user->name = 'Sean Jones';
    $user->category = 'jobSeeker';
    $user->industry = null;
    $user->phone = '38206666';
    $user->extraInfo = 'has zero dollars';
    $user->remember_token = "default";
    $user->image_file_name = 'jobSeeker1.jpg';
    $user->save();
    
    // adds a new JobSeeker user
    $user = new User;
    $encrypted = Hash::make('pass2');    
    $user->email = 'poorman@hotmail.com';
    $user->password = $encrypted;
    $user->name = 'Fred Flintstone';
    $user->category = 'jobSeeker';
    $user->industry = null;
    $user->phone = '38205544';
    $user->extraInfo = 'enjoys construction';
    $user->remember_token = "default";
    $user->image_file_name = 'jobSeeker2.jpg';
    $user->save();
    
    // adds a new Employer user
    $user = new User;
    $encrypted = Hash::make('pass3');
    $user->email = 'qldhealth@hotmail.com';
    $user->password = $encrypted;
    $user->name = 'Shane Daley';
    $user->category = 'employer';
    $user->industry = 'Healthcare';
    $user->phone = '38205555';
    $user->extraInfo = 'has many dollars';
    $user->remember_token = "default";
    $user->image_file_name = 'qldhealth.jpg';
    $user->save();
    
    // adds a new Employer user
    $user = new User;
    $encrypted = Hash::make('pass4');
    $user->email = 'swinery@gmail.com';
    $user->password = $encrypted;
    $user->name = 'Jack Mercer';
    $user->category = 'employer';
    $user->industry = 'Resteraunt';
    $user->phone = '38200283';
    $user->extraInfo = 'is a little bit fancy';
    $user->remember_token = "default";
    $user->image_file_name = 'images.jpeg';
    $user->save();
  }
}