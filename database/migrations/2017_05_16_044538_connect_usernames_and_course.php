<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectUsernamesAndCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


      Schema::table('courses', function (Blueprint $table) {

      # Remove the field associated with the old way we were storing authors
      # Can do this here, or update the original migration that creates the `books` table
      #$table->dropColumn('username'); # dropped it manually in migration

      # Creating a new INT field called `username_id` that has to be unsigned (i.e. positive)
      $table->integer('username_id')->unsigned()->nullable();

      # Making this field `username_id` is a foreign key that connects to the `id` field in the `usernames` table
      #Schema::disableForeignKeyConstraints();
      $table->foreign('username_id')->references('id')->on('usernames');

  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('courses', function (Blueprint $table) {

      # ref: http://laravel.com/docs/migrations#dropping-indexes
      # combine tablename + fk field name + the word "foreign"
      $table->dropForeign('courses_username_id_foreign');

      $table->dropColumn('username_id');

  });
    }
}
