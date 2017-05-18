<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Tag; # imports Tag model

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('tags', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->string('name');
         });
     }

     public function down()
     {
         Schema::drop('tags');
     }
}
