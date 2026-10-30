<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'category',
        'price',
        'stock',
        'minimum_stock',
        'unit',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock' => 'integer',
            'minimum_stock' => 'integer',
        ];
    }

    public function isLowStock(): bool
    {
        return $this->stock <= $this->minimum_stock;
    }
    
public function stockMovements(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(StockMovement::class);
}

}