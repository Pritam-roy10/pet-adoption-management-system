<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
            $table->decimal('offered_price', 10, 2)->nullable();
            $table->string('payout_number', 20)->nullable();
            $table->string('payout_trx_id', 50)->nullable();
            $table->string('payout_status', 20)->default('unpaid'); 
            $table->string('location');
            $table->string('pet_image');
            $table->text('description')->nullable();
            $table->string('status')->default('pending'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};