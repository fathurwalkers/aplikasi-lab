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

            $table->string('invoice_pembuat')->nullable();
            $table->string('invoice_kode')->nullable();
            $table->string('invoice_status')->nullable(); // BELUM LUNAS - LUNAS

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice');
    }
};
