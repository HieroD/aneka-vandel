<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'products';

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(
            Order::class,
            'product_order',
            'product_id',
            'order_id'
        )
            ->withPivot('total_order', 'total_price')
            ->withTimestamps()
            ->using(ProductOrder::class);
    }
}
