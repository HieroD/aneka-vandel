<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pemesanan extends Model
{
    protected $guarded = [];
    protected $table = 'pemesanan';

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function produk(): BelongsToMany
    {
        return $this->belongsToMany(
            Produk::class,
            'detil_pemesanan',   
            'pemesanan_id',   
            'produk_id',    
        )
        ->withPivot('jumlah')    
        ->withTimestamps()  
        ->using(DetilPemesanan::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tanggal_pemesanan' => 'date',
            'tanggal_pengiriman' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }
}
