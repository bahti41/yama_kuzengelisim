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
        Schema::create('blogkategorilers', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_adi')->nullable();
            $table->string('url')->nullable();
            $table->integer('sirano')->nullable()->default(1);
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
        Schema::dropIfExists('blogkategorilers');
    }
};
