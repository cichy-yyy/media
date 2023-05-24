<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journalist', function (Blueprint $table) {
            $table->id();
            $table->string('imie',45)->nullable();
            $table->string('nazwisko',45)->nullable();;
            $table->string('stanowisko',45)->nullable();;
            $table->string('region',100)->nullable();;
            $table->string('telefon1',45)->nullable();;
            $table->string('telefon2',45)->nullable();;
            $table->string('email1',45)->nullable();;
            $table->string('email2',45)->nullable();;
            $table->string('email3',45)->nullable();;
            $table->string('medium',45)->nullable();;
            $table->longText('info')->nullable();;
            $table->string('opiekun',45)->nullable();;
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
        Schema::dropIfExists('journalist');
    }
}
