<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('see_on_home_page'); // Varsayılan olarak aktif (true) olabilir
            $table->integer('order')->default(0)->after('status'); // Varsayılan olarak 0
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('order');
        });
    }
};
