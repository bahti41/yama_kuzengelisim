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
        Schema::create('hakkimizdas', function (Blueprint $table) {
            $table->id();
            $table->integer('baslik')->nullable();
            $table->string('kisa_baslik')->nullable();
            $table->text('kisa_acıklama')->nullable();
            $table->text('aciklama')->nullable();
            $table->string('resim')->nullable();
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
        Schema::dropIfExists('hakkimizdas');
    }
};
