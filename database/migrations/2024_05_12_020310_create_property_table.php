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
        Schema::create('property', function (Blueprint $table) {
            $table->id('property_id');
            $table->string('property_name')->nullable();
            $table->string('property_address')->nullable(); // Address can be nullable
            $table->decimal('square_meter', 8, 2);
            $table->integer('bedrooms')->nullable();
            $table->integer('toilet')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable(); // Image path can be nullable
            $table->string('quality')->nullable(); // Quality can be nullable
            $table->string('monthly_rate')->nullable(); // Monthly rate can be nullable
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
