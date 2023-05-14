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
            $table->string('penawaran_status')->nullable(); // PROSES - BERLANGSUNG - SELESAI
            $table->integer('penawaran_harga_total')->nullable();

            $table->unsignedBigInteger('barang_id')->nullable()->default(null);
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');

            $table->unsignedBigInteger('lab_id')->nullable()->default(null);
            $table->foreign('lab_id')->references('id')->on('lab')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penawaran');
    }
};