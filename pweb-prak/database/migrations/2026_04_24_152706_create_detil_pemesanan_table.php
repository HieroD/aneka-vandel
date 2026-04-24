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
            $table->id();
            $table->foreignIdFor(Pemesanan::class)->constrained();
            $table->foreignIdFor(Produk::class)->constrained();
            $table->integer('jumlah')->default(1);
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
