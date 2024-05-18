<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('form_entries', function (Blueprint $table) {
            $table->string('nim')->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('form_entries', function (Blueprint $table) {
            $table->dropUnique(['nim']);
        });
    }
};
