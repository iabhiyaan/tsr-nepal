<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('identifier')->nullable();

            $table->string('type')->nullable();

            $table->string('table_name')->default('none');

            //if parent field = 0 , it has no parent, if parent = other then 0, it is associated with that column's record
            $table->tinyInteger('parent')->nullable();

            //publish or not in navigation bar
            $table->tinyInteger('published')->default(0);

            //In which order display navigation bar
            $table->tinyInteger('order')->nullable();

            $table->string('location')->nullable();


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
        Schema::dropIfExists('navigations');
    }
}
