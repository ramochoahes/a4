<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up() {

	Schema::create('class', function (Blueprint $table) {
    # if name =  multiple words-> use one_two format
    $table->increments('id');
    $table->string('category');
    $table->string('other')->nullable();
    $table->text('description');
    $table->timestamps();

	});
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('class');
    }
}
