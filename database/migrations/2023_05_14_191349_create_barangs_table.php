<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();

            $table->string('barang_nama')->nullable();
            $table->string('barang_kondisi')->nullable(); // BAIK - RUSAK
            $table->string('barang_kode')->nullable();
            $table->integer('barang_stok')->nullable();
            $table->integer('barang_nilai')->nullable();

            $table->unsignedBigInteger('lab_id')->nullable()->default(null);
            $table->foreign('lab_id')->references('id')->on('lab')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
