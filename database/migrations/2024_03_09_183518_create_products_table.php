<?php

use App\Enums\CountryEnum;
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
            $table->enum('made_in', [$countries = config('countries.countries')]);
            $table->string('image')->nullable();
            $table->text('manufacture_company');
            $table->text('type')->nullable();
            $table->text('effective_material')->nullable();
            $table->text('indications')->nullable();
            $table->text('dosage')->nullable();
            $table->text('side_effects')->nullable();
            $table->text('contraindications')->nullable();
            $table->text('packaging')->nullable();
            $table->text('storage')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();

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
