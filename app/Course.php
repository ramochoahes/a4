<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

/

    public function username() {
		# Book belongs to Author
		# Define an inverse one-to-many relationship.
		return $this->belongsTo('App\Username');
	}

/*
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
*/
}
