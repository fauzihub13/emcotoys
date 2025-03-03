<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'stores';
    protected $fillable=[
        'slug',
        'name',
        'url',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
