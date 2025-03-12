<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'products';
    protected $fillable=[
        'category_id',
        'slug',
        'name',
        'description',
        'price',
        'weight',
        'height',
        'width',
        'stock',
        'age',
        'sku',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'id'; // Pastikan Laravel menggunakan UUID sebagai kunci
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }
}
