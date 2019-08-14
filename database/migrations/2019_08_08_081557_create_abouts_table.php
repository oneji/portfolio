<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birthday')->nullable();
            $table->string('residence')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('skype')->nullable();
            $table->string('wechat')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('cv')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
