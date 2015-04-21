@extends('layout')
@section('title')
Jobseeker - Employers
@stop
@section('content')
  @if (!(Auth::check()))
    <h2>You must be an Employer to continue.</h2> 
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
  @elseif (Auth::user()->category=='employer')
    <h1>Employers Page</h1>
    <p>Name: <br> {{{ $user->name }}}</p>
    <p>E-Mail: <br> {{{ $user->email }}}</p>
    <p>Industry: <br> {{{ $user->industry }}}</p>
    <p>Phone Number: <br> {{{ $user->phone }}}</p>
    <p>Additional Information: <br> {{{ $user->extraInfo }}}</p>
    <h1>Manage Jobs
    {{ HTML::link('job/create', 'Add Job', array('class' => 'btn btn-success', 'id' => 'addBtn')) }}</h1> 
    <table class="table table-striped" id="tableView">
      <tr><td>Title</td><td>Company</td><td>Location</td><td>Salary</td><td>Open date</td><td>Close date</td>
          <td>Description</td><td>Link</td></tr>
      @foreach($jobs as $job)
        @if (count($jobs) == 0)
        <p>No results found.</p>
        @elseif ($job->user_id == $user->id)
        <tr><td>{{{ $job->title }}}</td><td>{{{ $job->company }}}</td><td>{{{ $job->location }}}</td>
            <td>${{{ $job->salary }}}</td><td>{{{ $job->open_date }}}</td><td>{{{ $job->close_date }}}</td>
            <td>{{{ $job->description }}}</td><td>{{ link_to_route('job.show', 'View Job', array($job->id)) }}</td></tr>
        @endif
      @endforeach
  @else
      <h1> You must be an employer to continue</h1>
  @endif 
@stop
      
     

      