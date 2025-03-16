<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('order_number')->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->string('village');
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->string('detail_address')->nullable()    ;
            $table->enum('status', ['pending', 'paid', 'shipped', 'arrived'])->default('pending');
            $table->integer('shipping_cost')->nullable();
            $table->string('courier')->nullable();
            $table->string('tracking_number')->nullable();
            $table->enum('transaction_status', ['capture', 'settlement', 'pending', 'cancel', 'expire'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->integer('gross_amount')->default(0);
            $table->timestamp('transaction_time')->nullable();
            $table->longText('midtrans_response')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
