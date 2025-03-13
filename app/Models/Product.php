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

    public function scopeNotInTrash($query) {
        return $query->whereNull('deleted_at');
    }

    public function scopeDescending($query) {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $categorySlug) {
            return $query->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        });

        $query->when($filters['minAge'] ?? false, function ($query, $minage) {
            return $query->where('age', '>=', $minage);
        });

        $query->when($filters['maxAge'] ?? false, function ($query, $maxage) {
            return $query->where('age', '<=', $maxage);
        });
    }
}
