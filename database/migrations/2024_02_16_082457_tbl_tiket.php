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
        Schema::create('tbl_tiket', function (Blueprint $table) {
            $table->id();
            $table->string('name_tiket');
            $table->string('nama_supir');
            $table->integer('harga_tiket');
            $table->unsignedBigInteger('categori_id');
            $table->unsignedBigInteger('rute_id');
            $table->integer('jumlah_tiket');
            $table->timestamps();

            $table->foreign('categori_id')->references('id')->on('tbl_kategori')->onDelete('cascade');
            $table->foreign('rute_id')->references('id')->on('tbl_rute')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('tbl_tiket');
    }
};
