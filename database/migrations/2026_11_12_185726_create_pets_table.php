<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< HEAD
    /**
     * Run the migrations.
     */
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
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

<<<<<<< HEAD
    /**
     * Reverse the migrations.
     */
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
