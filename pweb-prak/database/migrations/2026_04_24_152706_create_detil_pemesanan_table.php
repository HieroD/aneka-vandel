<?php

use App\Models\Pemesanan;
use App\Models\Produk;
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
        Schema::create('detil_pemesanan', function (Blueprint $table) {
            $table->foreignIdFor(Pemesanan::class)->constrained();
            $table->foreignIdFor(Produk::class);
            $table->primary(['pemesanan_id', 'produk_id']);
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detil_pemesanan');
    }
};
