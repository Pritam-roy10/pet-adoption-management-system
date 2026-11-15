<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    
    public function create($id)
    {
        $pet = Pet::findOrFail($id);
        return view('adopt-form', compact('pet'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'pet_id'         => 'required|exists:pets,id',
            'name'           => 'required|string|max:60',
            'phone'          => 'required|string',
            'email'          => 'required|email',
            'address'        => 'required|string',
            'payment_method' => 'required|string',
            'note'           => 'nullable|string|max:1000',
        ]);

        Adoption::create([
            'pet_id'         => $request->pet_id,
            'adopter_name'   => $request->name,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'address'        => $request->address,
            'payment_method' => $request->payment_method,
            'note'           => $request->note,
            'status'         => 'pending', 
        ]);

        return redirect('/find-pets')->with('success', 'Adoption request submitted successfully with payment!');
    }
}


