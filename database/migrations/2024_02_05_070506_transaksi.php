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
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('code_booking')->unique();
            $table->string('nama');
            $table->string('total_pesan');
            $table->string('no_kursi');
            $table->date('tgl_pergi');
            $table->string('total_harga');
            $table->unsignedBigInteger('user_id');
            // $table->unsignedInteger('id_user');
            // $table->unsignedInteger('id_rutes');
            $table->string('waktu_pesan');
            $table->string('status');

            // $table->foreign('id_user')->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('id_rutes')->references('id_rute')->on('tbl_rute')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_transaksi');
    }
};
