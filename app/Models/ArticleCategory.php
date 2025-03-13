<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'article_categories';
    protected $fillable=[
        'slug',
        'name',
        'created_at',
        'updated_at',
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function scopeNotInTrash($query) {
        return $query->whereNull('deleted_at');
    }

    public function scopeDescending($query) {
        return $query->orderBy('created_at', 'desc');
    }
}
