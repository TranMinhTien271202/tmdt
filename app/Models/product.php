<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'sale',
        'quantity',
        'info',
        'desc',
        'view',
        'user_id',
        'category_id',
        'brand_id',
        'code_product'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
