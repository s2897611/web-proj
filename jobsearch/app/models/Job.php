<?php
class Job extends Eloquent {
  
  // applies rules that a job must contain before submission
  public static $rules = array(
           // ensures that the title field has content before submission
           'title' => 'required',
    
           // ensures that the company field has content before submission
           'company' => 'required',
    
           // ensures that the salary field has content and is not nil before submission
           'salary' => 'required:min:0',
           
           // ensures that the location field has content before submission
           'location' => 'required',
      
           // ensures that the description field has content before submission
           'description' => 'required',
    
           // ensures that the open date field has content before submission
           'open_date' => 'required',
    
           // ensures that the close date field has content before submission
           'close_date' => 'required'
           );
}