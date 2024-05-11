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
        Schema::disableForeignKeyConstraints();
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->enum('status',['New','Processing','Shipped','Delivered','Cancelled'])->default('New');
            $table->enum('payment_method',['Paiement when recieving','Payment via wallet'])->default('Paiement when recieving');
            $table->unsignedBigInteger('address_id');
            $table->decimal('total_price',10,2);
            $table->unsignedBigInteger('delivery_id');
            $table->string('note');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('delivery_id')->references('id')->on('users');
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
