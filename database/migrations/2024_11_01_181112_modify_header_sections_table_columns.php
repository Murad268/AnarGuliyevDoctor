<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyHeaderSectionsTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('header_sections', function (Blueprint $table) {
            $table->text('mini_title')->nullable()->change();
            $table->text('title')->nullable()->change();
            $table->text('subtitle')->nullable()->change();
            $table->text('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('header_sections', function (Blueprint $table) {
            $table->string('mini_title')->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->string('subtitle')->nullable()->change();
            $table->string('image')->nullable()->change();
        });
    }
}
