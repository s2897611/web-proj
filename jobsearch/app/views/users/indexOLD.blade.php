@extends('layout')
@section('title')
Jobseeker - Employers
@stop
@section('content')
  @if (Auth::check() and Auth::user()->category == 'employer')
    <h1>Employers Page</h1>
    <h2>Manage Jobs
    {{ HTML::link('job/create', 'Add Job', array('class' => 'btn btn-success', 'id' => 'addBtn')) }}</h2>

    <table class="table table-striped" id="tableView">
    <tr><td>Title</td><td>Company</td><td>Location</td><td>Salary</td><td>Open date</td><td>Close date</td><td>Description</td><td>Link</td></tr>
    @foreach($jobs as $job)
    <tr><td>{{{ $job->title }}}</td><td>{{{ $job->company }}}</td><td>{{{ $job->location }}}</td><td>${{{ $job->salary }}}</td>
        <td>{{{ $job->open_date }}}</td><td>{{{ $job->close_date }}}</td><td>{{{ $job->description }}}</td><td>{{ link_to_route('job.show', 'View Job', array($job->id)) }}</td></tr>
    @endforeach
  @else
    <h2>You must be an employer to continue.</h2> 
    {{ Form::open(array('route' => 'user.login')) }}
      {{ Form::label('email', 'E-Mail: ') }}
      {{ Form::text('email') }}
      {{ $errors->first('email') }}
      {{ Form::label('password', 'Password: ') }}
      {{ Form::password ('password') }}
      {{ $errors->first('password') }}
      <br>
      {{ Form::submit('Sign In') }}
      {{ HTML::link('user/create', 'Sign Up') }}
      {{ Form::close() }}
  @endif
@stop