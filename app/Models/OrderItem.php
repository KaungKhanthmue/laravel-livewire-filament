<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends BaseModel
{
    protected $table= "order_items";

    protected $guarded = [];

    /**
     * Relationship
     */
    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class,"order_id");
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class,"product_id");
    }
}