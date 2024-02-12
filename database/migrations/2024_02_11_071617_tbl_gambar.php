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
        Schema::create('tbl_gambar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gambar');
            $table->unsignedBigInteger('profil_id');
            $table->timestamps();
            $table->foreign('profil_id')->references('id')->on('tbl_profilusaha')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_gambar');
    }
};
