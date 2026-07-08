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
                return asset('assets/placeholder.png');
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
