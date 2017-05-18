<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTagTable extends Migration
{
  public function up()
  {
      Schema::create('course_tag', function (Blueprint $table) {

          $table->increments('id');
          $table->timestamps();

          # `book_id` and `tag_id` will be foreign keys, so they have to be unsigned
          #  Note how the field names here correspond to the tables they will connect...
          # `book_id` will reference the `books table` and `tag_id` will reference the `tags` table.
          $table->integer('course_id')->unsigned();
          $table->integer('tag_id')->unsigned();

          # Make foreign keys
          $table->foreign('course_id')->references('id')->on('courses');
          $table->foreign('tag_id')->references('id')->on('tags');
      });
  }

  public function down()
  {
      Schema::drop('course_tag');
    
  }
}
