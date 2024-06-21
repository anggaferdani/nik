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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->unsignedBigInteger('kategori_produk_id')->nullable();
            $table->foreign('kategori_produk_id')->references('id')->on('kategori_produks');
            $table->string('deskripsi')->nullable();
            $table->bigInteger('aktif')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
