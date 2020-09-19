<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStalkerFilesGroupsAlbumsTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::create(
                'photo_albums',
                function (Blueprint $table) {
                    $table->engine = 'InnoDB';
                    $table->increments('id')->unsigned();
                    $table->integer('position')->nullable();
                    $table->string('name', 255);
                    $table->text('description')->nullable();
                    $table->string('folder_id', 255);
                    $table->unsignedInteger('user_id')->nullable();
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
                    $table->unsignedInteger('user_id_edited')->nullable();
                    $table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');
                    $table->timestamps();
                    $table->softDeletes();
                }
            );
        } catch (\Throwable $th) {
            try {
                Schema::create(
                    'photo_albums',
                    function (Blueprint $table) {
                        $table->engine = 'InnoDB';
                        $table->increments('id')->unsigned();
                        $table->integer('position')->nullable();
                        $table->string('name', 255);
                        $table->text('description')->nullable();
                        $table->string('folder_id', 255);
                        $table->unsignedInteger('user_id')->nullable();
                        $table->unsignedInteger('user_id_edited')->nullable();
                        $table->timestamps();
                        $table->softDeletes();
                    }
                );
            } catch (\Throwable $th) {
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_albums');
    }
}
