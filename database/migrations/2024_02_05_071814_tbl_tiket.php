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

        Schema::create('tbl_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('name_categori');
            $table->timestamps();
        });
        Schema::create('tbl_tic', function (Blueprint $table) {
            $table->id();
            $table->string('name_tiket');
            $table->string('jenis_tiket');
            $table->integer('harga_tiket');
            $table->unsignedBigInteger('categori_id');
            $table->integer('jumlah_tiket');
            $table->timestamps();

            $table->foreign('categori_id')->references('id')->on('tbl_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_categori');
        Schema::dropIfExists('tbl_tic');
    }
};
