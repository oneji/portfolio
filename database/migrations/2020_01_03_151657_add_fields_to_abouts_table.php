<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('first_name_ru')->nullable()->after('first_name_en');
            $table->string('last_name_ru')->nullable()->after('last_name_en');
            $table->string('residence_ru')->nullable()->after('residence_en');
            $table->text('description_ru')->nullable()->after('description_en');
            $table->string('dev_status_ru')->nullable()->after('dev_status_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('first_name_ru');
            $table->dropColumn('last_name_ru');
            $table->dropColumn('residence_ru');
            $table->dropColumn('description_ru');
            $table->dropColumn('dev_status_ru');
        });
    }
}
