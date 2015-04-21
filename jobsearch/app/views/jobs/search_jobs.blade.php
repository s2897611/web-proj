@extends('layout')
@section('title')
JobSearch - Search Jobs
@stop
@section('content')
  <h1>Search Jobs</h1>
  {{ Form::open(array('action' => 'JobController@search')) }}
    <table id="searchTable">
      <tr><td>{{ Form::label('query', 'Search by Title, Location, Min Salary, Industry, Keyword: ') }} <br> {{   
                 Form::text('query') }}</td>
      {{ $errors->first('query') }}
    </table>
  {{ Form::submit('Search') }} {{ Form::reset('Reset') }}
  {{ Form::close() }}
@stop
        
