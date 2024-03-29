<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penawaran', function (Blueprint $table) {
            $table->id();

            $table->string('penawaran_kode')->nullable();
            $table->longText('penawaran_deskripsi')->nullable();
            $table->string('penawaran_status')->nullable(); // PENDING - SELESAI
            $table->integer('penawaran_harga_total')->nullable();
            $table->string('penawaran_tipe')->nullable(); // PENGADAAN - JASA

            $table->unsignedBigInteger('data_id')->nullable()->default(null);
            $table->foreign('data_id')->references('id')->on('data')->onDelete('cascade');

            $table->unsignedBigInteger('barang_id')->nullable()->default(null);
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');

            $table->unsignedBigInteger('jasa_id')->nullable()->default(null);
            $table->foreign('jasa_id')->references('id')->on('jasa')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penawaran');
    }
};
