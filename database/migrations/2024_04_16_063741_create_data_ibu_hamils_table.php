<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ibu');
            $table->integer('umur_ibu');
            $table->string('alamat');
            $table->string('email');
            $table->string('password');
            $table->string('nik');
            $table->string('no_telepon');
            $table->integer('kehamilan_ke');
            $table->string('nama_suami');
            $table->integer('umur_suami');
            $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ibu_hamils');
    }
};
