<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Username extends Model
{
  /**
* Relationship method
*/
public function usernames() {
# Username has many Courses
# Define a one-to-many relationship.
return $this->belongsToMany('Course::class');
}
/**
*
*/
/*
public static function getAuthorsForDropdown() {
  # Get all the authors
  $authors = Username::orderBy('last_name', 'ASC')->get();
  # Organize the authors into an array where the key = author id and value = author name
  $authorsForDropdown = [];
  foreach($authors as $author) {
      $authorsForDropdown[$author->id] = $author->last_name.', '.$author->first_name;
  }
  return $authorsForDropdown;
}
*/
}
