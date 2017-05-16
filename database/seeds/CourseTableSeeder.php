<?php

use Illuminate\Database\Seeder;

use App\Course; #Imports Course Model

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      # Array of author data to add
      $courses = [

        ['Martial Arts', 'BJJ', 'Broly', 'other'],
        ['Culinary', 'Baking', 'Vegeta', 'other'],
        ['Golf', 'Putting', 'Goku', 'other'],
        ['Other', 'Misc', 'Freeza', 'other']

      ];

      # Initiate a new timestamp we can use for created_at/updated_at fields
      $timestamp = Carbon\Carbon::now()->subDays(count($courses));

      # Loop through each author, adding them to the database
      foreach($courses as $course) {

        # Set the created_at/updated_at for each book to be one day less than
        # the book before. That way each book will have unique timestamps.
        $timestampForThisAuthor = $timestamp->addDay()->toDateTimeString();
        Course::insert([
            'created_at' => $timestampForThisAuthor,
            'updated_at' => $timestampForThisAuthor,
            'category' => $course[0],
            'description' => $course[[1],
            #'username' => $course[[2], no longer needed either
            'username_id' => 1,
            'other' => $course[3]

        ]);
      }
}

}
