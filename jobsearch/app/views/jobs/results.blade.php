@extends('layout')
@section('title')
JobSearch - Search Results
@stop
@section('content')
  <h1>Results for '{{ $query }}'</h1>
  @if (count($jobs) == 0)
    <p>No results found.</p>
  @else
    <table class="table table-striped" id="tableView">
    <tr><td>Title</td><td>Company</td><td>Location</td><td>Salary</td>
        <td>Open date</td><td>Close date</td><td>Industry</td><td>Link</td></tr>
    @foreach($jobs as $job)
    <tr><td>{{{ $job->title }}}</td><td>{{{ $job->company }}}</td>
        <td>{{{ $job->location }}}</td><td>${{{ $job->salary }}}</td>
        <td>{{{ $job->open_date }}}</td><td>{{{ $job->close_date }}}</td>
        <td>{{{ $job->industry }}}</td><td>{{ link_to_route('job.show', 'View Job', array($job->id)) }}</td></tr>
    @endforeach
    {{ link_to_route('job.search_jobs','New Search') }}
  @endif
@stop