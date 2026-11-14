<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'adopter_name',
        'phone',
        'email',
        'address',
        'payment_method',
        'note',
        'status',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
