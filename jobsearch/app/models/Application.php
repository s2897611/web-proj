<?php
class Application extends Eloquent {
  // ensures that the letter field has content before submission
  public static $rules = array(
           'letter' => 'required'
           );
}