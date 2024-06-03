<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends BaseModel
{
    protected $table= 'brands';

    protected $guarded = [];

    /**
     * Relationship
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
