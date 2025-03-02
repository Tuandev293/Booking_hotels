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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('room_id')->constrained('rooms',)->onDelete('cascade');
            $table->foreignId('discount_id')->nullable()->constrained('discounts',)->onDelete('set null');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->decimal('total_price', 10, 3);
            $table->decimal('discount_amount', 10, 3)->nullable()->default(0);
            $table->enum('booking_status', ['Confirmed', 'Pending', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
