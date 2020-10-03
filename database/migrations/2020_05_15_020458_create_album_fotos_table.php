<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_fotos', function (Blueprint $table) {
            $table->increments('albf_id');
            $table->integer('albf_alb_cod')->unsigned();
            $table->string('albf_img');            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('albf_alb_cod')->references('alb_cod')->on('album')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('album_fotos', function (Blueprint $table) {
            $table->dropForeign(['albf_alb_cod']);
        });
        Schema::dropIfExists('album_fotos');
    }
}
