<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_why_us', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable(); // Translatable
            $table->longText('text')->nullable(); // Translatable
            $table->string('video')->nullable(); // Regular string field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_why_us');
    }
}
