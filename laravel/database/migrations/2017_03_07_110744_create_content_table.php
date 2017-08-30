<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('NUM');
            $table->string('cont_category');
            $table->string('cont_name');
            $table->string('cont_price');
            $table->string('cont_detail');
            $table->string('cont_effect_sound')->nullable();
            $table->string('cont_background_sound')->nullable();
            $table->string('cont_voice')->nullable();
            $table->string('cont_moving')->nullable();
            $table->string('cont_image');
            $table->boolean('cont_check');
            $table->string('cont_video')->nullable();
            $table->integer('cont_sell')->nullable();

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
        Schema::dropIfExists('contents');
    }
}
