<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;


    protected $table = 'product_categories';
    protected $fillable=[
        'slug',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function scopeNotInTrash($query) {
        return $query->whereNull('deleted_at');
    }


}
