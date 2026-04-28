<?php

namespace App\Models;

use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
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
        ->withPivot('total_order')
        ->withTimestamps()  
        ->using(ProductOrder::class);
    }
}
