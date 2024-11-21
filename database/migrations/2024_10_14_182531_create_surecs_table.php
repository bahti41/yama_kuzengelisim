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
        Schema::create('surecs', function (Blueprint $table) {
            $table->id();
            $table->string('surec')->nullable();
            $table->string('baslik')->nullable();
            $table->string('aciklama')->nullable();
            $table->integer('sirano')->default(1);
            $table->boolean('durum')->default(0);
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
        Schema::dropIfExists('surecs');
    }
};
