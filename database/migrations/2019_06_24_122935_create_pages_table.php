<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();

            $table->tinyInteger('published')->default(0);
            $table->longText('description')->nullable();

            $table->string('identifier')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();

            $table->string('page_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();


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
        Schema::dropIfExists('pages');
    }
}
