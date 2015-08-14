<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration {

    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->comment('creator id');
            $table->string('name', 255)->comment('image name');
            $table->string('orig_name', 255)->comment('orig name');
            $table->enum('verb', ['jpg', 'jpeg', 'bmp', 'png', 'gif'])->comment('verb');
            $table->string('mime', 32)->comment('mime type');
            $table->bigInteger('size')->comment('size');
            $table->integer('ups')->comment('up times');
            $table->string('path', 255)->comment('save path');
            $table->integer('loc_id')->comment('location id');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::drop('images');
    }

}
