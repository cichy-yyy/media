<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaJournalist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_journalist', function (Blueprint $table) {
            //$table->integer('media_id')->unsigned();
            //$table->integer('journalist_id')-unsigned();
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('journalist_id');
            $table->foreign('media_id')->references('id')->on('media');
            $table->foreign('journalist_id')->references('id')->on('journalist');
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
        Schema::dropIfExists('media_journalist');
    }
}
