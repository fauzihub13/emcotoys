<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'articles';
    protected $fillable=[
        'category_id',
        'slug',
        'thumbnail',
        'title',
        'body',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category(){
        return $this->belongsTo(ArticleCategory::class);
    }

    public function scopeNotInTrash($query) {
        return $query->whereNull('deleted_at');
    }

    public function scopeDescending($query) {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $categorySlug) {
            return $query->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        });
    }
}
