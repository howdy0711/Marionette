<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermarios', function (Blueprint $table) {

          $table->increments('NUM');
                   $table->string('user_id');
                   $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
                   $table->string('cont_category');
                   $table->string('cont_name');
                   $table->string('cont_price');
                   $table->string('cont_detail');
                   $table->string('cont_effect_sound')->nullable();
                   $table->string('cont_background_sound')->nullable();
                   $table->string('cont_voice')->nullable();
                   $table->string('cont_moving')->nullable();
                   $table->string('cont_image');
                   $table->string('cont_video')->nullable();
                   $table->string('cont_info'); ///구매한 것인지 직접만든것인지 확인
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
        Schema::dropIfExists('usermarios');
    }
}
