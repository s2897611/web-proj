@extends('layout')
@section('title')
  JobSearch - Home
@stop
@section('content')
  <h1>Welcome to Job Search</h1>
  <p>{{ link_to_route('job.browse','View all jobs') }}</p>
  <p>{{ link_to_route('job.search_jobs','Search for Jobs') }}</p>
  <h3>Job Listing Activity (7 Days): </h3>
  @if (count($jobs) == 0)
    <p>No results found.</p>
  @else
    <table class="table table-striped" id="tableView">
      <tr><td>Title</td><td>Company</td><td>Location</td><td>Salary</td>
          <td>Open date</td><td>Close date</td><td>Link</td></tr>
    @foreach($jobs as $job)
      <tr><td>{{{ $job->title }}}</td><td>{{{ $job->company }}}</td>
          <td>{{{ $job->location }}}</td><td>${{{ $job->salary }}}</td>
          <td>{{{ $job->open_date }}}</td><td>{{{ $job->close_date }}}</td>
          <td>{{ link_to_route('job.show', 'View Job', array($job->id)) }}</td></tr>
    @endforeach
  @endif
@stop
        
