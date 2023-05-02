<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->id();
            $table->string('login_nama')->nullable();
            $table->string('login_username')->unique()->nullable();
            $table->string('login_password')->nullable();
            $table->string('login_email')->unique()->nullable();
            $table->string('login_telepon')->nullable();
            $table->text('login_token')->nullable();
            $table->string('login_level')->nullable(); // ADMIN - PETUGAS - USER
            $table->string('login_status')->nullable(); // unverified / verified
        });
    }

    public function down()
    {
        Schema::dropIfExists('login');
    }
};
