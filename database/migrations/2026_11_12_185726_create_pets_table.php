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
    Schema::create('pets', function (Blueprint $table) {
        $table->id();
        $table->string('pet_name');
        $table->string('category');
        $table->string('gender');
        $table->string('age');
        $table->string('phone');
        $table->decimal('asking_price', 10, 2);
        $table->string('location');
        $table->string('pet_image');
        $table->text('description')->nullable();
        $table->string('status')->default('pending'); // পেন্ডিং বা অ্যাপ্রুভড স্ট্যাটাস রাখার জন্য
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
