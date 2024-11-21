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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('baslikbir')->nullable();
            $table->string('baslikiki')->nullable();
            $table->string('baslikuc')->nullable();
            $table->string('telefon')->nullable();
            $table->text('metin')->nullable();
            $table->string('sehir')->nullable();
            $table->string('adres')->nullable();
            $table->string('mail')->nullable();
            $table->string('sosyal_baslik')->nullable();
            $table->string('aciklama')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiwitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('footers');
    }
};
