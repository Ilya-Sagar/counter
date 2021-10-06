<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMonthRuAndMonthEngToReportCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_cards', function (Blueprint $table) {
            $table->renameColumn('month', 'month_eng');
            $table->string('month_ru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_cards', function (Blueprint $table) {
            $table->renameColumn('month_eng', 'month');
            $table->dropColumn('month_ru');
        });
    }
}
