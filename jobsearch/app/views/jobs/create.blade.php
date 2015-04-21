@extends('layout')
@section('title')
Add Job
@stop
@section('content')
<h2>Create new job: </h2>
    {{ Form::open(array('action' => 'JobController@store')) }}
        {{ Form::hidden('user_id', Auth::user()->id) }}
        {{ Form::label('title', 'Title: ') }}
        {{ Form::text('title') }}
        {{ $errors->first('title') }}
        <p>
        {{ Form::label('company', 'Company: ') }}
        {{ Form::text('company') }}
        {{ $errors->first('company') }}
        <p>
        {{ Form::label('location', 'Location: ') }}
        {{ Form::text('location') }}
        {{ $errors->first('location') }}
        <p>
        {{ Form::label('salary', 'Salary: ') }}
        {{ Form::text('salary') }}
        {{ $errors->first('salary') }}
        <p>
        {{ Form::label('open_date', 'Open_date: ') }}
        {{ Form::text('open_date') }}
        {{ $errors->first('open_date') }}
        <p>
        {{ Form::label('close_date', 'Close_date: ') }}
        {{ Form::text('close_date') }}
        {{ $errors->first('close_date') }}
        <p>
        {{ Form::label('description', 'Description: ') }} <br>
        {{ Form::textArea('description') }}
        {{ $errors->first('description') }}
        <p>
        {{ Form::submit('Submit') }}
        {{ Form::reset('Reset') }}
    {{ Form::close() }}
@stop
          