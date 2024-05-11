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
        Schema::create('product_measurement_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('measurement_units_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('quantity',10,2);
            $table->decimal('price',10,2);
            $table->timestamps();
            $table->foreign('measurement_units_id')->references('id')->on('measruing_units');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_measurement_units');
    }
};
