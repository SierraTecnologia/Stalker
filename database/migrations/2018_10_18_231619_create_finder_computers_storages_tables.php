<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinderComputersStoragesTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'files', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('location')->nullable();
                $table->string('tags')->nullable();
                $table->text('details')->nullable();
                $table->string('extension')->nullable(); //"json"
                $table->string('mime')->nullable();
                $table->string('size')->nullable();
                $table->nullableTimestamps();
                $table->softDeletes();
            }
        );
        
        
        Schema::create(
            'computer_files', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('location')->nullable();

                $table->string('path')->nullable(); //"/home/sierra/Desenvolvimento/Libs/Finder/."
                $table->string('filename')->nullable(); //"composer.json"
                $table->string('basename')->nullable(); //"composer.json"
                $table->string('pathname')->nullable(); //"/home/sierra/Desenvolvimento/Libs/Finder/./composer.json"
                $table->string('extension')->nullable(); //"json"
                $table->string('realPath')->nullable(); //"./composer.json"
                $table->string('aTime')->nullable(); //2019-12-03 08:23:37
                $table->string('mTime')->nullable(); //2019-12-03 08:23:37
                $table->string('cTime')->nullable(); //2019-12-03 08:23:37
                $table->string('inode')->nullable(); //51930963
                $table->string('size')->nullable(); //2902
                $table->string('perms')->nullable(); //0100644
                $table->string('owner')->nullable(); //1000
                $table->string('group')->nullable(); //1000
                $table->string('type')->nullable(); //"file"
                $table->string('writable')->nullable(); //true
                $table->string('readable')->nullable(); //true
                $table->string('executable')->nullable(); //false
            
                $table->string('file')->nullable(); //true
                $table->string('dir')->nullable(); //false
                $table->string('link')->nullable(); //false
          
                $table->unsignedInteger('file_id')->nullable();
                // $table->foreign('file_id')->references('id')->on('files');
                $table->unsignedInteger('computer_id')->nullable();
                // $table->foreign('computer_id')->references('id')->on('computers');
                $table->nullableTimestamps();
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
        Schema::drop('directorys');
    }

}
