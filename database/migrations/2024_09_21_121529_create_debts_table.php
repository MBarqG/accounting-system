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
    Schema::create('debts', function (Blueprint $table) {
        $table->id();  // auto-generated transaction ID
        $table->unsignedBigInteger('customer_id');
        $table->decimal('amount', 10, 2);
        $table->date('debt_date');
        $table->enum('type', ['cash', 'check', 'iou'])->nullable();  // Optional type
        $table->text('note')->nullable();  // Optional note
        $table->timestamps();

        // Foreign key constraint to link debts to a customer
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};
