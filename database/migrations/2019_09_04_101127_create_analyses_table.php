<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('page_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keyword')->nullable();


            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('short_description')->nullable();

            $table->string('banner_image')->nullable();
            $table->longText('description')->nullable();
            $table->string('main_image')->nullable();

            $table->string('author')->default('TSR Nepal');

            $table->enum('type', ['Fundamental', 'Technical'])->default('Fundamental');

            $table->tinyInteger('published')->default(0);
            $table->tinyInteger('homepage')->default(0);
            // $table->tinyInteger('exclusive')->default(0);

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
        Schema::dropIfExists('analyses');
    }
}
