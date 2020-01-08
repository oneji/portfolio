<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPortfolioItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->string('title_ru')->after('title_en');
            $table->string('subtitle_ru')->after('subtitle_en');
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
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->dropColumn('title_ru');
            $table->dropColumn('subtitle_ru');
            $table->dropColumn('description_ru');
        });
    }
}
