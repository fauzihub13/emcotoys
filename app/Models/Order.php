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
        'name',
        'phone_number',
        'village',
        'district',
        'city',
        'province',
        'detail_address',
        'status',
        'shipping_cost',
        'courier',
        'tracking_number',
        'transaction_status',
        'payment_method',
        'gross_amount',
        'transaction_time',
        'midtrans_response',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    // public function transaction() {
    //     return $this->hasOne(Transaction::class);
    // }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeNotInTrash($query) {
        return $query->whereNull('deleted_at');
    }

    public function scopeDescending($query) {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeOnProcess($query) {
        return $query->where('status', '!=', 'arrived');
    }
    public function scopeFinish($query) {
        return $query->where('status', '=', 'arrived');
    }
}
