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
}
