<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_lists', function (Blueprint $table){
            
            $table->increments('list_no');
            $table->string('list_title');
            $table->string('list_name');
            $table->string('list_content');
            $table->string('list_category');
            $table->string('list_view');
            $table->string('list_file');
            $table->string('list_boardno');
            $table->primary('list_no');
        
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
        //
    }
}
