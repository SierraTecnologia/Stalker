<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumCapaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_capa', function (Blueprint $table) {
            $table->increments('albc_id');
            $table->integer('albc_alb_cod')->unsigned();
            $table->string('albc_img');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('albc_alb_cod')->references('alb_cod')->on('album')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('album_capa', function (Blueprint $table) {
            $table->dropForeign(['albc_alb_cod']);
        });
        Schema::dropIfExists('album_capa');
    }
}
