<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            // Relasi ke transaksi
            $table->foreignId('transaksi_id')
                ->constrained('transaksis')
                ->onDelete('cascade');

            $table->string('metode'); // Contoh: Cash, Transfer, Qris
            $table->decimal('jumlah_bayar', 10, 2);
            $table->decimal('kembalian', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
