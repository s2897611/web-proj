<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    {{ HTML::style('styles/style.css') }}
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


  </head>
  <body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('job.index') }}">Job Search</a>
        </div>
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('user.index') }}">Users</a></li>
            <li><a href="{{ URL::route('user.show') }}">Employers</a></li>
            <li><a href="{{ route('user.documentation') }}">About</a></li>
        </ul>
        <div class="navbar-form navbar-right">  
          @if (Auth::check())
             <p id="navtext">
             {{ Auth::user()->email }} 
             {{ HTML::link('user/logout', 'sign out', array('class' => 'btn btn-primary btn-sm')) }}
             </p>
          @else
            {{ Form::open(array('route' => 'user.login')) }}
                {{ Form::text('email', null, array('placeholder' => 'E-Mail')) }}
                
                {{ Form::password ('password', array('placeholder' => 'Password')) }}
                
                {{ Form::submit('Sign In', array('class' => 'btn btn-success btn-sm')) }}
                {{ HTML::link('user/create', 'Sign Up', array('class' => 'btn btn-danger btn-sm')) }}
            {{ Form::close() }}
          @endif
        </div>  
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    
    <div id="main-body" class="container">
       <div class="row">
          <div class="col-sm-3">
            <div class="list-group", id="userInfo">
              @if (Auth::check())
                <p>Welcome,
                {{ Auth::user()->name }}</p>
                <img src="{{ asset(Auth::user()->image->url('thumb')) }}">
                @endif
                <p>Created by: Nelson Johnstone <br>
                Student Number: S2897611</p>
            </div>
          </div>
          <div class="col-sm-9">
            {{ $errors->first('email') }}
            {{ $errors->first('password') }}
            @yield('content')
          </div>

       </div>

    </div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>