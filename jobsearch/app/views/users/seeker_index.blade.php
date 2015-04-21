@extends('layout')
@section('title')
JobSearch - Job Seeker
@stop
@section('content')
  @if (Auth::check() and Auth::user()->category == 'jobSeeker')
    <h1>Job Seeker Page</h1>
    <p>Name: <br> {{{ $user->name }}}</p>
    <p>E-Mail: <br> {{{ $user->email }}}</p>
    <p>Phone Number: <br> {{{ $user->phone }}}</p>
    <p>Additional Information: <br> {{{ $user->extraInfo }}}</p>
  @else
    <h2>You must be a Job Seeker to continue.</h2> 
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
  @endif
@stop