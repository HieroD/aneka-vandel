<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produk extends Model
{
    protected $guarded = [];
    protected $table = 'produk';

    public function pemesanan(): BelongsToMany
    {
        return $this->belongsToMany(
            Pemesanan::class,
            'detil_pemesanan',
            'produk_id',         
            'pemesanan_id'       
        )
        ->withPivot('jumlah')
        ->withTimestamps()  
        ->using(DetilPemesanan::class);
    }
}
