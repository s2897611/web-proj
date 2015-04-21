<?php

class UserController extends \BaseController {

  // Displays Job Seekers home page
	public function index()
	{
    // gets the users attributes
    $user = Auth::user();
    
    // gets all jobs
    $jobs = Job::all();
    
    // returns seeker_index.blade.php and compacts $user and $jobs for use in HTML
    return View::make('users.seeker_index', compact('user', 'jobs'));
	}
  
  // returns page to create a new user
	public function create()
	{
		return View::make('users.create');
	}

  // saves the new user to the users table if they pass validation
	public function store()
	{
    // gets all input
    $input = Input::all();
    
    // applies validation rules to input provided
    $v = Validator::make($input,User::$rules);
    
    // if fields pass validation add new user
    if($v->passes())
    {
      // encrypts the password
      $encrypted = Hash::make($input['password']);
      $user = new User;
      $user->email = $input['email'];
      $user->password = $encrypted;
      $user->name = $input['name'];
      $user->category = $input['category'];
      $user->phone = $input['phone'];
      
      // checks if a file is provided
      if (Input::hasFile('image')) {
        $user->image = $input['image'];
      }
      $user->extraInfo = $input['extraInfo'];
      $user->remember_token = "default";
      $user->save();
      
      // redirects to homepage
      return Redirect::action('JobController@index');
    } else {
      // stays on create user page and displays errors
      return Redirect::action('UserController@create')->withErrors($v);
    }
  }

  // displays the employers page
	public function show($id)
	{
    
    //$job = Job::find($id);
    $user = Auth::user();
    $jobs = Job::all();

    return View::make('users.index', compact('user', 'jobs', 'applications'));
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
  
  // logs in a certain user if their email and password are valid
  public function login() {
      $userdata = array (
          'email' => Input::get('email'),
          'password' => Input::get('password')
      );
      // if email and password are valid. Sign in and return to previous page
      if (Auth::attempt($userdata)) {
          return Redirect::to(URL::previous());
      // if email and password are not valid. return to previous page and display input
      } else {
          return Redirect::to(URL::previous())->withInput();
      }
  }
  
  // logs user out and returns to home page
  public function logout() 
  {
      Auth::logout();
      return Redirect::action('JobController@index');
  }
  
  // displays documentation page for the project
  public function documentation()
  {
    return View::make('users.documentation');
  }
}
