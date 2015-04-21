@extends('layout')
@section('title')
Create User
@stop
@section('content')
  <h2>Create new user: </h2>
  {{ Form::open(array('action' => 'UserController@store', 'files' => true)) }}
    {{ Form::label('email', 'E-Mail: ') }}
    {{ Form::text('email') }}
    {{ $errors->first('email') }}
    <p>
    {{ Form::label('password', 'Password: ') }}
    {{ Form::text('password') }}
    {{ $errors->first('password') }}
    <p>
    {{ Form::label('name', 'Name: ') }}
    {{ Form::text('name') }}
    {{ $errors->first('name') }}
    <p>
    {{ Form::label('category', 'Category: ') }}
    {{ Form::select('category', array( 'default' => 'Select', 'jobSeeker' => 'Job Seeker', 'employer' => 'Employer')) }}
    {{ $errors->first('category') }}
    <p>
    {{ Form::label('phone', 'Phone: ') }}
    {{ Form::text('phone') }}
    {{ $errors->first('phone') }}
    <p>
    {{ Form::label('image', 'Image: ') }}
    {{ Form::file('image') }}
    {{ $errors->first('image') }}
    <p>
    {{ Form::label('extraInfo', 'Additional Information: ') }} <br>
    {{ Form::textArea('extraInfo') }}
    {{ $errors->first('extraInfo') }}
    <p>
    {{ Form::submit('Create') }}
  {{ Form::close() }}
@stop
          