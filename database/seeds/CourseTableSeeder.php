<?php

use Illuminate\Database\Seeder;

use App\Course;#Imports Course Model
use App\Username;#Imports Username Model

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      # Array of author data to add instead of JSON file
      $courses = [
        ['Martial Arts', 'BJJ', 'Other'],
        ['Golf', 'Putting', 'Other'],
        ['Culinary', 'Baking', 'Other'],
        ['Other', 'Other', 'Other']
      ];

      # Load json file into PHP array
      #$courses = json_decode(file_get_contents(database_path().'/courses.json'), True);
      # Initiate a new timestamp we can use for created_at/updated_at fields
      $timestamp = Carbon\Carbon::now()->subDays(count($courses));

      # Loop through each author, adding them to the database
      foreach($courses as $course) {
      # arr as $key => $value, get the username for the course from the array $courses.
      #foreach($courses as $key => $course) {

        # Find that author in the authors table
        $username_id = DB::table('courses')->where('id', '>', 1)->value('id');

        # Set the created_at/updated_at for each book to be one day less than
        # the book before. That way each book will have unique timestamps.
        $timestampForThisAuthor = $timestamp->addDay()->toDateTimeString();

        Course::insert([
            'created_at' => $timestampForThisAuthor,
            'updated_at' => $timestampForThisAuthor,
            'category' => $course[0],
            'description' => $course[1],
            #'username' => $course[[2], no longer needed either
            'username_id' => $username_id,# replaces username
            'other' => $course[2],

        ]);
      }
}

}
