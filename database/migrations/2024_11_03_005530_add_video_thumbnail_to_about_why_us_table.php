<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoThumbnailToAboutWhyUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_why_us', function (Blueprint $table) {
            $table->string('video_thumbnail')->nullable()->after('video'); // 'video_title' sütunundan sonra eklenir
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_why_us', function (Blueprint $table) {
            $table->dropColumn('video_thumbnail');
        });
    }
}
