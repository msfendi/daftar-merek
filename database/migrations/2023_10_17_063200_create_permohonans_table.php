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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('pemilik_usaha');
            $table->string('logo');
            $table->string('umk')->nullable();
            $table->string('ttd');
            $table->enum('status', ['diajukan', 'perbaikan', 'ditolak', 'diterima'])->default('diajukan');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
