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
            $table->id();
            $table->string('order_code')->unique();
            $table->usignedBigInteger('user_id');
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('grand_total');
            $table->enum('status', ['pending', 'completed', 'cancelled']);
            $table->integer('table_number');
            $table->enum('payment_method', ['tunai', 'qris']);
            $table->text('note')->nullable();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
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
