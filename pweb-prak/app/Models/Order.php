<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $guarded = [];
    protected $table = 'orders';

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_order',   
            'order_id',   
            'product_id',    
        )
        ->withPivot('total_order')    
        ->withTimestamps()  
        ->using(ProductOrder::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'order_date' => 'date',
            'ship_date' => 'date',
            'completion_date' => 'date',
        ];
    }
}
