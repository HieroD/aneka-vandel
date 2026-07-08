<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category', 'price', 'total_product', 'img_path'];

    protected $table = 'products';

    protected function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            if (! $this->img_path) {
                return 'data:image/svg+xml,'.rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="300" fill="#e2e8f0"><rect width="400" height="300"/><text x="200" y="150" text-anchor="middle" fill="#94a3b8" font-size="16" font-family="sans-serif">No Image</text></svg>');
            }

            if (str_starts_with($this->img_path, 'assets/')) {
                return asset($this->img_path);
            }

            return asset('storage/'.$this->img_path);
        });
    }

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
