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
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number');
            $table->enum('vehicle_type',['Car','Truck','Bus','Taxi','Bicycle','Motorcycle']);
            $table->unsignedBigInteger('delivery_id');
            $table->timestamps();
            $table->foreign('delivery_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_details');
    }
};
