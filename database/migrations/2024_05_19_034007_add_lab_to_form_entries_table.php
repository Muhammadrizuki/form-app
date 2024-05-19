<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLabToFormEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('form_entries', function (Blueprint $table) {
            $table->string('lab')->nullable();
        });
    }

    public function down()
    {
        Schema::table('form_entries', function (Blueprint $table) {
            $table->dropColumn('lab');
        });
    }
}

