<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transactions';
    protected $fillable=[
        'order_id',
        'transaction_status',
        'payment_method',
        'gross_amount',
        'transaction_time',
        'midtrans_response',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
