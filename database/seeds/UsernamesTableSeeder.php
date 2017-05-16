<?php

use Illuminate\Database\Seeder;

use App\Username;#Imports Username Model

class UsernamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      # Array of author data to add instead of JSON file
      $usernames = [
        ['Ernest', 'Hemingway', 'Broly'],
        ['Mark', 'Twain', 'Vegeta'],
        ['Stephen', 'King', 'Goku'],
        ['George', 'Orwell', 'Freeza']
      ];

      # Initiate a new timestamp we can use for created_at/updated_at fields
      $timestamp = Carbon\Carbon::now()->subDays(count($usernames));

      # Loop through each author, adding them to the database
      foreach($usernames as $username) {

        # Set the created_at/updated_at for each book to be one day less than
        # the book before. That way each book will have unique timestamps.
        $timestampForThisAuthor = $timestamp->addDay()->toDateTimeString();
        Username::insert([
            'created_at' => $timestampForThisAuthor,
            'updated_at' => $timestampForThisAuthor,
            'first' => $username[0],
            'last' => $username[1],
            'username' => $username[2]

        ]);
      }
}

}
