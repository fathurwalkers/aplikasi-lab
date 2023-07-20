<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jasa', function (Blueprint $table) {
            $table->id();

            $table->string('jasa_nama_alat')->nullable();
            $table->integer('jasa_harga_care')->nullable();
            $table->integer('jasa_harga_cleaning')->nullable();
            $table->integer('jasa_harga_kalibrasi')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jasa');
    }
};
