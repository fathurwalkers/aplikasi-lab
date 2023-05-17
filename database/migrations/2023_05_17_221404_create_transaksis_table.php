<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            $table->string('transaksi_pemilik')->nullable();
            $table->string('transaksi_kode')->nullable();
            $table->string('transaksi_status')->nullable(); // PROSES - SELESAI
            $table->integer('transaksi_harga_total')->nullable();

            $table->unsignedBigInteger('invoice_id')->nullable()->default(null);
            $table->foreign('invoice_id')->references('id')->on('invoice')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
