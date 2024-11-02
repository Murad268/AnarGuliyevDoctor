<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoImageToVideoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_galleries', function (Blueprint $table) {
            $table->string('video_image')->nullable(); // 'video_url' əvəzinə mövcud sütunlardan birini qeyd edin
            $table->string('status')->nullable();
            $table->string('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_galleries', function (Blueprint $table) {
            $table->dropColumn('video_image');
        });
    }
}
