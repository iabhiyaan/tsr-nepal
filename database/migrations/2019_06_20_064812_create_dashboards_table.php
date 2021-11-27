<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');

              $table->string('site_name')->nullable();
              $table->text('description')->nullable();
              $table->string('logo')->nullable();
              $table->string('contactus_image')->nullable();

              $table->text('googlemap')->nullable();

              $table->string('post_box')->nullable();

              $table->string('page_title')->nullable();
              $table->string('meta_title')->nullable();
              $table->text('meta_description')->nullable();
              $table->text('keyword')->nullable();

              $table->string('email')->nullable();
              $table->string('telephone')->nullable();
              $table->string('mobile')->nullable();
              $table->string('address')->nullable();

              $table->string('homepagevideo_link')->nullable();


              // $table->string('twitter')->nullable();
              $table->string('youtube')->nullable();
              $table->string('facebook')->nullable();
              $table->string('twitter')->nullable();
              $table->string('linkedin')->nullable();
              $table->string('instagram')->nullable();
              $table->string('pinterest')->nullable();

//homepage

              $table->string('homepagemain_image')->nullable();
              $table->text('homepagemain_title')->nullable();
              $table->text('homepagemain_description')->nullable();

              $table->string('homepagemain_image_link')->nullable();



              $table->string('testimonial_words')->nullable();



              $table->string('working_times')->nullable();
              $table->string('nepse_price')->nullable();
              $table->string('nepse_price_color')->nullable();
              $table->string('nepse_increase_value')->nullable();
              $table->string('nepse_persentage')->nullable();
              // $table->string('team_banner_image')->nullable();
              // $table->string('testimonial_banner_image')->nullable();
              // $table->string('contactus_banner_image')->nullable();
              //
              $table->string('videolist_banner_image')->nullable();




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
        Schema::dropIfExists('dashboards');
    }
}
