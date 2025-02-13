<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory, HasUuids;

    protected $table = 'carts';
    protected $fillable=[
        'user_id',
        'product_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function items() {
        return $this->belongsTo(Product::class);
    }
}
