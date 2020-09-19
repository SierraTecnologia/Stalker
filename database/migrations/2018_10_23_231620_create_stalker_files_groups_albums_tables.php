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


        Schema::create(
            'photos',
            function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();

                $table->text('description');
                $table->string('path')->default('');
                $table->string('relative_url')->default('');
                $table->string('avg_color', 7)->default('');
                $table->boolean('is_published')->default(false);

                $table->string('metadata')->default('');
                $table->unsignedInteger('created_by_user_id')->nullable();
            
                $table->integer('position')->nullable();
                $table->boolean('slider')->nullable();
                $table->string('filename', 255);
                $table->string('name', 255)->nullable();
                $table->unsignedInteger('photo_album_id')->nullable();
                $table->foreign('photo_album_id')->references('id')->on('photo_albums')->onDelete('set null');
                $table->boolean('album_cover')->nullable();
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('photos');
        Schema::dropIfExists('photo_albums');
    }
}
