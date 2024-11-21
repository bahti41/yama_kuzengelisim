<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesajs', function (Blueprint $table) {
            $table->id();
            $table->string('adi')->nullable();
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->string('konu')->nullable();
            $table->text('mesaj')->nullable();
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
        Schema::dropIfExists('mesajs');
    }
};
