<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('miasto', 100)->nullable();
            $table->string('ulica', 100)->nullable();
            $table->string('kod', 6)->nullable();
            $table->string('strona', 100)->nullable();
            $table->string('telefon1', 45)->nullable();
            $table->string('telefon2', 45)->nullable();
            $table->string('telefon3', 45)->nullable();
            $table->longtext('info')->nullable();
            $table->string('email', 45)->nullable();
            $table->string('email2', 45)->nullable();
            $table->string('email3', 45)->nullable();
            $table->string('email4', 45)->nullable();
            $table->string('opiekun', 45)->nullable();
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
        Schema::dropIfExists('media');
    }
}
