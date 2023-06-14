<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penawaran_invoice', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('penawaran_id')->nullable()->default(null);
            $table->foreign('penawaran_id')->references('id')->on('penawaran')->onDelete('cascade');

            $table->unsignedBigInteger('invoice_id')->nullable()->default(null);
            $table->foreign('invoice_id')->references('id')->on('invoice')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penawaran_invoice');
    }
};
