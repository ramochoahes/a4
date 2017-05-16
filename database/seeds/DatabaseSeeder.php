<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #This goes first because the course table needs this to exist on its table
        $this->call(UsernamesTableSeeder::class);
        #$this->call(CourseTableSeeder::class);
    }
}
