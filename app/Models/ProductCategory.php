<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory, HasUuids;

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

}
