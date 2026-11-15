<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
<<<<<<< HEAD
    // ১. নির্দিষ্ট পেটের আইডি ধরে অ্যাডপশন ফর্ম পেজটি দেখাবে
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function create($id)
    {
        $pet = Pet::findOrFail($id);
        return view('adopt-form', compact('pet'));
    }

<<<<<<< HEAD
    // ২. ইউজারের ফর্ম ডাটা এবং পেমেন্ট ইনফো ডেটাবেজে সেভ করবে
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
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
<<<<<<< HEAD
            'status'         => 'pending', // অ্যাডমিন বা phpMyAdmin থেকে এপ্রুভ করার জন্য পেন্ডিং রাখা হলো
=======
            'status'         => 'pending', 
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
        ]);

        return redirect('/find-pets')->with('success', 'Adoption request submitted successfully with payment!');
    }
}


