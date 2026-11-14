<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_name',
        'category',
        'gender',
        'age',
        'phone',
        'asking_price',
        'location',
        'pet_image',
        'description',
        'status',
    ];
}
