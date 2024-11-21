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
        Schema::create('urunlers', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->integer('altkategori_id');
            $table->string('baslik')->nullable();
            $table->string('url')->nullable();
            $table->string('tag')->nullable();
            $table->string('anahtar')->nullable();
            $table->string('aciklama')->nullable();
            $table->text('metin')->nullable();
            $table->string('resim')->nullable();
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
        Schema::dropIfExists('urunlers');
    }
};
