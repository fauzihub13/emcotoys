<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'orders';
    protected $fillable=[
        'user_id',
        'order_number',
        'status',
        'shipping_cost',
        'courier',
        'tracking_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function transaction() {
        return $this->hasOne(Transaction::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
