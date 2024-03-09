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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('category_id');
            $table->string('made_in');
            $table->string('image')->default('product_default.png');
            $table->string('manufacture_company');
            $table->string('type');
            $table->string('effective_material');
            $table->string('indications');
            $table->string('dosage');
            $table->string('side_effects');
            $table->string('contraindications');
            $table->string('packaging');
            $table->string('storage');
            $table->boolean('state')->default(false);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
