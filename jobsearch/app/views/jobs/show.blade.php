@extends('layout')
@section('content')
  <h1>Job Details</h1>
  <table id="aboutTable">
    <tr><td>Title:</td><td>{{{ $job->title }}}</td></tr>
    <tr><td>Company:</td><td>{{{ $job->company }}}</td></tr>
    <tr><td>Salary:</td><td>${{{ $job->salary }}}</td></tr>
    <tr><td>Location:</td><td>{{{ $job->location }}}</td></tr>
    <tr><td>Description:</td><td>{{{ $job->description }}}</td></tr>
    <tr><td>Open date:</td><td>{{{ $job->open_date }}}</td></tr>
    <tr><td>Close date:</td><td>{{{ $job->close_date }}}</td></tr>
    <tr><td>Time Left:</td><td>{{$interval->y}} years, {{$interval->m}} months, {{$interval->d}} days</td></tr>
    
  </table>
  @if (Auth::user()->category=='employer' and (Auth::user()->id==$job->user_id))
    <p>{{ link_to_route('job.edit', 'Edit', array($job->id)) }} </p>
    {{ Form::open(array('method' => 'DELETE', 'route' => array('job.destroy', $job->id))) }}
    {{ Form::submit('Delete') }}
    {{ Form::close() }}
    <h2>Job Applicants</h2>
    <ul>
      @foreach($applications as $application)
        <li>{{ $application->name }}</li>
      @endforeach
    </ul>
  @elseif (Auth::user()->category=='jobSeeker')
    <p>{{ link_to_route('application.show', 'Apply', array($job->id)) }} </p>
  @endif
  
  
@stop