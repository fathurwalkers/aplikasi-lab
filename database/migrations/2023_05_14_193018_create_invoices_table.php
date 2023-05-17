<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();

            $table->string('invoice_kode')->nullable();
            $table->string('invoice_status')->nullable(); // BELUM LUNAS - LUNAS
            $table->tinyText('invoice_id_barang')->nullable();

            $table->unsignedBigInteger('penawaran_id')->nullable()->default(null);
            $table->foreign('penawaran_id')->references('id')->on('penawaran')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice');
    }
};
