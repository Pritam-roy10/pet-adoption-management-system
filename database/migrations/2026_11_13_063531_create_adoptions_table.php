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
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained()->onDelete('cascade');
            $table->string('adopter_name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('payment_method')->default('bkash');
            $table->text('note')->nullable();
<<<<<<< HEAD
            $table->string('status')->default('pending'); // pending / approved
=======
            $table->string('status')->default('pending'); 
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
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
        Schema::dropIfExists('adoptions');
    }
};
