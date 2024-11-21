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
        Schema::create('yorumlars', function (Blueprint $table) {
            $table->id();
            $table->string('adi')->nullable();
            $table->text('metin')->nullable();
            $table->integer('sirano')->default(1)->nullable();
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
        Schema::dropIfExists('yorumlars');
    }
};
