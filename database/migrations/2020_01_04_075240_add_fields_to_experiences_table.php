<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('occupation_ru')->nullable()->after('occupation_en');
            $table->string('company_ru')->nullable()->after('company_en');
            $table->text('job_description_ru')->nullable()->after('job_description_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn('occupation_ru');
            $table->dropColumn('company_ru');
            $table->dropColumn('job_description_ru');
        });
    }
}
