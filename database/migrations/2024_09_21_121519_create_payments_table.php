<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();  // auto-generated payment ID
            $table->unsignedBigInteger('customer_id');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->enum('type', ['cash', 'check', 'iou']);
            $table->text('note')->nullable();  // Optional for IOU notes
            $table->timestamps();

            // Foreign key constraint to link payments to a customer
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
