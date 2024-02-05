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
            $table->string('code_booking');
            $table->string('nama_user');
            $table->string('total_qty');
            $table->string('no_kursi');
            $table->date('tgl_pergi');
            $table->string('total_harga');
            $table->string('id_user');
            $table->string('id_rute');
            $table->string('waktu_pesan');
            $table->string('status');
            $table->timestamps();
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
