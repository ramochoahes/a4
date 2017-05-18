<?php

use Illuminate\Database\Seeder;
# models need to be imported here
use App\Course;
use App\Tag;

class CourseTagTableSeeder extends Seeder
{

  public function run()
  {

      # First, create an array of all the books we want to associate tags with
      # The *key* will be the book title, and the *value* will be an array of tags.
      # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
      $courses =[
          'Golf' => ['sports', 'swimming', 'technology', 'tutoring'],
          'Culinary' => ['sports', 'swimming', 'technology', 'tutoring'],
          'Martial Arts' => ['sports', 'swimming', 'technology', 'tutoring']
      ];

      # Now loop through the above array, creating a new pivot for each book to tag
      foreach($courses as $category => $tags) {

          # First get the book
          $course = Course::where('category','like',$category)->first();

          # Now loop through each tag for this book, adding the pivot
          foreach($tags as $tagName) {
              $tag = Tag::where('name','LIKE',$tagName)->first();

              # Connect this tag to this book
              $course->tags()->save($tag);
          }

      }

}
}
