<?php

class ApplicationController extends \BaseController {

	public function index()
	{
		//
	}

  // displays form to apply for a job
	public function create()
	{
    // gets information of current user
    $user = Auth::user();
    // displays form to add new job and allows user attributes to be accessed
    return View::make('applications.apply', compact('user'));
	}

  // stores new application if input passes validation
	public function store()
	{
		// gets all input from form
    $input = Input::all();
    
    // applies rules to the input provided by the user
    $v = Validator::make($input,Application::$rules);
    
    // if user input passes validation save new application and redirect to home page
    if($v->passes())
    {
       $application = new Application;
       $application->letter = $input['letter'];
       $application->application_date = new DateTime();
       $application->job_id = 3;
       $application->user_id = 1;
       $application->save();
       return Redirect::action('JobController@index');
    // if user input fails validation return create job page with errors
    } else {
       return Redirect::action('ApplicationController@create')->withErrors($v);
    }
	}

	public function show($id)
	{
		// gets information of current user
    $user = Auth::user();
    $job = Job::find($id);
    // displays form to add new job and allows user attributes to be accessed
    return View::make('applications.apply', compact('user', 'job'));
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


}
