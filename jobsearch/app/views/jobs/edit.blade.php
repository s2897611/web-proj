@extends('layout')
@section('title')
Create
@stop
@section('content')
  <p>
    {{ Form::model($job, array('method' => 'PUT', 'route' => array('job.update', $job->id))); }}
    {{ Form::label('title', 'Job Title: ') }}
    {{ Form::text('title') }}
    {{ $errors->first('title') }}
  <p>
    {{ Form::label('company', 'Company: ') }}
    {{ Form::text('company') }}
    {{ $errors->first('company') }}
  <p>
    {{ Form::label('salary', 'Salary: ') }}
    {{ Form::text('salary') }}
    {{ $errors->first('salary') }}
  <p>
    {{ Form::label('location', 'Location: ') }}
    {{ Form::text('location') }}
    {{ $errors->first('location') }}
  <p>
    {{ Form::label('description', 'Description: ') }}
    {{ Form::text('description') }}
    {{ $errors->first('description') }}
  <p>
    {{ Form::label('open_date', 'Open Date: ') }}
    {{ Form::text('open_date') }}
    {{ $errors->first('open_date') }}
  <p>
    {{ Form::label('close_date', 'Close Date: ') }}
    {{ Form::text('close_date') }}
    {{ $errors->first('close_date') }}
  <p>
    {{ Form::submit('Update') }}
    {{ Form::close() }}
@stop