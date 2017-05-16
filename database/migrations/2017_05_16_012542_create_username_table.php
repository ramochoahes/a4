<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Username;# uses Username model

class CreateUsernameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('usernames', function (Blueprint $table) {
        # if name =  multiple words-> use one_two format
        $table->increments('id');
        $table->string('username');
        $table->string('first');
        $table->string('last')->nullable();
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
        Schema::drop('usernames');

    }
}
