@extends('layout')
@section('title')
JobSearch - Browse Jobs
@stop
@section('content')
  <h1>All Jobs</h1>
  @if (count($jobs) == 0)
    <p>No results found.</p>
  @else
    <table class="table table-striped" id="tableView">
      <tr><td>Title</td><td>Company</td><td>Location</td><td>Salary</td>
          <td>Open date</td><td>Close date</td><td>Link</td></tr>
      {{-- goes through all jobs and lists each jobs details --}}
      @foreach($jobs as $job)
      <tr><td>{{{ $job->title }}}</td><td>{{{ $job->company }}}</td>
          <td>{{{ $job->location }}}</td><td>${{{ $job->salary }}}</td>
          <td>{{{ $job->open_date }}}</td><td>{{{ $job->close_date }}}</td>
          <td>{{ link_to_route('job.show', 'View Job', array($job->id)) }}</td></tr>
    @endforeach
    {{ $jobs->links() }}
  @endif
@stop
        
