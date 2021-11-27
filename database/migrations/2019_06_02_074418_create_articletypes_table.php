<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticletypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articletypes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->enum('published', ['Yes', 'No'])->default('No');

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
        Schema::dropIfExists('articletypes');
    }
}
