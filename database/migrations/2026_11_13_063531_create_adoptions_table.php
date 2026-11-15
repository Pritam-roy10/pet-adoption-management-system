<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
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
            $table->string('status')->default('pending'); 
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('adoptions');
    }
};
