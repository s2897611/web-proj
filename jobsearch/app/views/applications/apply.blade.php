@extends('layout')
@section('title')
Apply for Job
@stop
@section('content')
<h2>Apply for job: </h2>
    {{ Form::open(array('action' => 'ApplicationController@store')) }}
        {{ Form::hidden('user_id', Auth::user()->id) }}
        {{ Form::hidden('job_id', 'job.id') }}

        {{ Form::label('letter', 'Application Letter: ') }} <br>
        {{ Form::textArea('letter') }}
        {{ $errors->first('letter') }}
        <p>
        {{ Form::submit('Submit') }}
        {{ Form::reset('Reset') }}
    {{ Form::close() }}
@stop
          