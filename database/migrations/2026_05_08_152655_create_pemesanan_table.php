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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_tiket');
            $table->string('status_pemesanan');
            $table->foreign('id_user')
            ->references('id')
            ->on('users');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_jadwal')
            ->references('id')
            ->on('jadwal');
            $table->unsignedBigInteger('id_jadwal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
