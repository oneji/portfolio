<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('education', function (Blueprint $table) {
            $table->string('major_ru')->nullable()->after('major_en');
            $table->string('degree_ru')->nullable()->after('degree_en');
            $table->string('study_place_ru')->nullable()->after('study_place_en');
            $table->text('description_ru')->nullable()->after('description_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('education', function (Blueprint $table) {
            $table->dropColumn('major_ru');
            $table->dropColumn('degree_ru');
            $table->dropColumn('study_place_ru');
            $table->dropColumn('description_ru');
        });
    }
}
