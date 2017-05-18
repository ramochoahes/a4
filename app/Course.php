<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    public function username() {
		# Course has one username
		# Define an inverse one-to-many relationship.
		return $this->belongsToMany('Username::class');
	}

  public function tags()
  {
      # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
      return $this->belongsToMany('App\Tag')->withTimestamps();
  }

}
