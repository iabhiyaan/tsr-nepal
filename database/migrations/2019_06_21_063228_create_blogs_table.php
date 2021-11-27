<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('page_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keyword')->nullable();

            $table->string('title')->nullable();
            $table->string('slug')->nullable();

            $table->string('banner_image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->tinyInteger('published')->default(0);
            $table->tinyInteger('homepage')->default(0);



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
        Schema::dropIfExists('blogs');
    }
}
