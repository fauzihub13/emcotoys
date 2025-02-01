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
}
