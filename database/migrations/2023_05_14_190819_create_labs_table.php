<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lab', function (Blueprint $table) {
            $table->id();

            $table->string('lab_nama')->nullable();
            $table->string('lab_kode')->nullable();
            $table->string('lab_penanggung_jawab')->nullable();
            $table->integer('lab_nilai')->nullable();

            $table->unsignedBigInteger('login_id')->nullable()->default(null);
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lab');
    }
};
