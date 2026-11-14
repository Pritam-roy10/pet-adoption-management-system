<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    // ১. নির্দিষ্ট পেটের আইডি ধরে অ্যাডপশন ফর্ম পেজটি দেখাবে
    public function create($id)
    {
        $pet = Pet::findOrFail($id);
        return view('adopt-form', compact('pet'));
    }

    // ২. ইউজারের ফর্ম ডাটা এবং পেমেন্ট ইনফো ডেটাবেজে সেভ করবে
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
            'status'         => 'pending', // অ্যাডমিন বা phpMyAdmin থেকে এপ্রুভ করার জন্য পেন্ডিং রাখা হলো
        ]);

        return redirect('/find-pets')->with('success', 'Adoption request submitted successfully with payment!');
    }
}


