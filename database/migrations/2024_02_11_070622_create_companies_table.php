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
        Schema::create('tbl_profilusaha', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->text('isi');
            $table->string('visi');
            $table->string('logo');
            $table->string('singkatan_namausaha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_profilusaha');
    }
};
