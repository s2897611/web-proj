<?php

class JobController extends \BaseController {

  // The homepage of JobSearch
	public function index()
	{    
    // retreives any jobs listed within the last week
    $jobs = Job::whereRaw('open_date > ?', array(new DateTime('- 1 week')))->get();
    
    // displays Jobs index page and allows access for jobs returned from query
    return View::make('jobs.index',compact('jobs'));
  }

  // shows a form to add a new job and passes in the current users attributes
	public function create()
	{
    // gets information of current user
    $user = Auth::user();
    
    // displays form to add new job and allows user attributes to be accessed
    return View::make('jobs.create', compact('user'));
	}

  // adds the new job to the jobs table
	public function store()
	{
    // gets all input from form
    $input = Input::all();
    
    // applies rules to the input provided by the user
    $v = Validator::make($input,Job::$rules);
    
    // if user input passes validation save new job and redirect to home page
    if($v->passes())
    {
       $job = new Job;
       $job->title = $input['title'];
       $job->user_id = $input['user_id'];
       $job->company = $input['company'];
       $job->location = $input['location'];
       $job->salary = $input['salary'];
       $job->open_date = $input['open_date'];
       $job->close_date = $input['close_date'];
       $job->description = $input['description'];
       $job->save();
       return Redirect::action('JobController@index');
    // if user input fails validation return create job page with errors
    } else {
       return Redirect::action('JobController@create')->withErrors($v);
    }
  }

  // shows the specific jobs details using job attributes and checks whether the user has access to edit the job
	public function show($id)
	{
    // gets the logged in users ID
    $user = Auth::user()->id;
    
    // Finds the required Job from the Jobs table using its ID
		$job = Job::find($id);
    
    // returns list of applicants with connected users details
    $applications = DB::select('select name, email, image_file_name, letter, jobs.id,  jobs.user_id, users.id 
        from applications, users, jobs where applications.user_id = users.id and applications.job_id = jobs.id');

    // returns the job expiration date
    $expires = new DateTime($job->close_date);
    
    // gets current date
    $now_date = new DateTime;
    
    // calculates amount of days left until expiration date is reached
    $interval = $expires->diff($now_date);

    // displays jobs/show.blade.php and compacts $job, %user and $industry for use on the page
    return View::make('jobs.show', compact('job', 'user', 'interval', 'applications'));
	}

  // opens for for editting a specified job and checks whether the user is authorized to do so
	public function edit($id)
	{
    // if no user is logged in redirect to jobsearch home page
    if (!Auth::check()) return Redirect::route('job.index');
    
    // if user is logged in get job ID and display for to edit selected job
    $job = Job::find($id);
    return View::make('jobs.edit', compact('job'));
  }

  // updates the job if required fields are valid
	public function update($id)
	{
    // checks if user has authority to update job
		if (!Auth::check()) return Redirect::route('job.index');
    
    // finds specific job using jobs ID
    $job = Job::find($id);
    
    // retrieves all user input
    $input = Input::all();
    
    // validates user input against specified rules
    $v = Validator::make($input,Job::$rules);
    
    // if user input passes validation saves changes and redirect to that job's details
    if($v->passes())
    {
        $job->title = $input['title'];
        $job->company = $input['company'];
        $job->salary = $input['salary'];
        $job->save();
        return Redirect::route('job.show', array($job->id));
    } 
    // Show validation errors
    else {
      return Redirect::action('JobController@edit', $job->id)->withErrors($v);
    }
	}

  // deletes slected job
	public function destroy($id)
	{
    // gets the current jobs ID
    $job = Job::find($id);
    
    // deletes selected job
    $job->delete();
    
    // redirects to employers page
    return Redirect::route('user.show');
  }

  // returns a list of all jobs
  public function browse()
  {
    // displays 3 jobs per page
    $jobs = Job::paginate(3);
    return View::make('jobs.browse', compact('jobs'));
  }
  
  // displays a form to search for jobs
  public function search_jobs()
  {
    return View::make('jobs.search_jobs');
  }
  
  // performs the search based on if the query matches any columns in the jobs table
  public function search()
  { 
    // gets all input
    $input = Input::all();
    
    // stores query in variable
    $query = $input['query'];
    
    // search query on database
    $jobs = DB::select('select jobs.id, title, user_id, users.id, industry, location, salary, company, open_date, close_date, description 
      from jobs, users where title like :query and jobs.user_id = users.id or location like :query and jobs.user_id = users.id 
      or description like :query and jobs.user_id = users.id or salary > :query and jobs.user_id = users.id 
      or industry like :query and jobs.user_id = users.id', array(':query' => $query));

    return View::make('jobs.results', compact('jobs', 'results', 'query'));
  }
}
