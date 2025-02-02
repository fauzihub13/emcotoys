<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketPlace extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'marketplaces';
    protected $fillable=[
        'slug',
        'image',
        'name',
        'url',
        'created_at',
        'updated_at',
    ];


}
