<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStalkerFilesGroupsVideosTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create(
            'videos', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('name', 255)->nullable();
                $table->string('url', 255)->nullable();
                $table->string('tempo', 255)->nullable();
                $table->string('language', 255)->nullable();
                $table->integer('actors')->nullable();
                $table->timestamps();
                $table->softDeletes();
            }
        );
        Schema::create(
            'videoables', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('position')->default(0);
                $table->unsignedInteger('video_id')->nullable();
                // $table->foreign('video_id')->references('id')->on('videos');
                $table->string('videoable_id');
                $table->string('videoable_type');
            }
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videoables');
        Schema::dropIfExists('videos');
    }

}
