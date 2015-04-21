@extends('layout')
@section('title')
JobSearch - About
@stop
@section('content')
  <h2>About Page</h2>
  <table id="aboutTable">
    <tr><td>Application Name:</td><td>Job Search</td></tr>
    <tr><td>Created by:</td><td>Nelson Johnstone</td></tr>
    <tr><td>Student Number:</td><td>S2897611</td></tr>
    <tr><td>Date:</td><td>01/06/2014</td></tr>
  </table>
  <h3>How to use JobSearch</h3>
  <p>In order to use Job Search web application a new user is required to sign up using the navigation bar located in the top right of the screen. A user can choose whether they are a job seeker or an employer. Once signed in depending on the users chosen category they can either apply for jobs or add and manage jobs.</p>
  <h3>URL's</h3>
    Home Page: /jobsearch/public/ <br>
    Search Page: /jobsearch/public/jobs/search_jobs <br>
    Browse Jobs: /jobsearch/public/jobs/browse <br>
    Employers Page: /jobsearch/public/user/(USER ID) <br>
    Job Detail Page: /jobsearch/public/job/(JOB ID) <br>
    Edit Page: /jobsearch/public/job/(JOB ID)/edit <br>
    Job Seeker's Page: /jobsearch/public/user <br>
    Documentation: /jobsearch/public/users/documentation
  <h3>Usernames and Passwords</h3>
  <p>
    User 1: Job Seeker<br>
    E-Mail: seeker@hotmail.com <br>
    Password: pass1
  </p>
  <p>
    User 2: Job Seeker<br>
    E-Mail: poorman@hotmail.com <br>
    Password: pass2
  </p>
  <p>
    User 3: Employer<br>
    E-Mail: qldhealth@hotmail.com <br>
    Password: pass3
  </p>
  <p>
    User 4: Employer<br>
    E-Mail: swinery@gmail.com <br>
    Password: pass4
  </p>
  <h2>DataBase Schema</h2>
  <h3>create_users_table</h3>
  <p>
    class CreateUsersTable extends Migration { <br>
  <br>
    // sets columns of users table<br>
    public function up()<br>
    {<br>
      Schema::create('users', function($table) {<br>
          $table->increments('id');<br>
          $table->string('email')->unique();<br>
          $table->string('password')->index(); // uses the password as table index<br>
          $table->string('name');<br>
          $table->string('category');<br>
          $table->string('industry')->nullable(); // allows industry to be nullable as job Seekers do not have an industry<br>
          $table->string('phone');<br>
          $table->text('extraInfo');<br>
          $table->string('remember_token');<br>
          $table->timestamps();<br>
      });<br>
    }<br>
    <br>
    // function to drop users table<br>
    public function down()<br>
    {<br>
      Schema::drop('users');<br>
    }<br>
  <br>
  }
  </p>
  <h3>create_jobs_table</h3>
  <p>
    class CreateJobsTable extends Migration {<br>
  <br>
    // sets columns of the jobs table<br>
    public function up()<br>
    {<br>
      Schema::create('jobs', function($table) {<br>
          $table->increments('id')->unique();<br>
          $table->string('title');<br>
          $table->integer('user_id'); // foreign ID to link users table<br>
          $table->string('company');<br>
          $table->string('location');<br>
          $table->string('salary');<br>
          $table->text('description');<br>
          $table->date('open_date');<br>
          $table->date('close_date');<br>
          $table->timestamps();<br>
      });<br>
    }<br>
  <br>
    //function to drop jobs table<br>
    public function down()<br>
    {<br>
      Schema::drop('jobs');<br>
    }<br>
  <br>
  }
  </p>
  <h3>create_applications_table</h3>
  <p>
    class CreateApplicationsTable extends Migration {<br>
  <br>
    // sets up columns for applications table<br>
    public function up()<br>
    {<br>
      Schema::create('applications', function($table) {<br>
          $table->increments('id');<br>
          $table->integer('user_id'); // foreign ID to link users table<br>
          $table->integer('job_id'); // foreign ID to link jobs table<br>
          $table->date('application_date');<br>
          $table->string('letter');<br>
          $table->timestamps();<br>
      });<br>
    }<br>
  <br>
    public function down()<br>
    {<br>
      Schema::drop('applications');<br>
    }<br>
  <br>
  }
  </p>
@stop