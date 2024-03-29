<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectStatusColumnsToOptionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('option_translations', function (Blueprint $table) {
            $table->string('color')->nullable()->after('status');
            $table->string('funding')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('option_translations', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->dropColumn('funding');
        });
    }
}
