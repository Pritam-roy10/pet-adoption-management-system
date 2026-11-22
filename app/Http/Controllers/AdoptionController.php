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
        $request->merge([
            'trx_id' => strtoupper(trim((string) $request->trx_id)),
        ]);

        $request->validate([
            'pet_id'         => 'required|exists:pets,id',
            'name'           => 'required|string|max:60',
            'phone'          => ['required', 'string', 'regex:/^01[3-9][0-9]{8}$/'],
            'email'          => 'required|email|max:254',
            'address'        => 'required|string|min:5|max:250',
            'payment_method' => 'required|string',
            'sender_number'  => ['required', 'string', 'regex:/^01[3-9][0-9]{8}$/'],
            'trx_id'         => ['required', 'string', 'min:6', 'max:20', 'regex:/^[A-Z0-9]+$/', 'unique:adoptions,trx_id'],
            'note'           => 'nullable|string|max:1000',
        ], [
            'trx_id.unique'  => 'This Transaction ID (TrxID) has already been submitted.',
            'trx_id.regex'   => 'Invalid Transaction ID format.',
        ]);

        Adoption::create([
            'pet_id'         => $request->pet_id,
            'adopter_name'   => $request->name,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'address'        => $request->address,
            'payment_method' => $request->payment_method,
            'sender_number'  => $request->sender_number,
            'trx_id'         => $request->trx_id,
            'note'           => $request->note,
            'status'         => 'pending',
        ]);

        return redirect('/find-pets')->with(
            'success',
            'Adoption request submitted! Your bKash TrxID (' . $request->trx_id . ') is pending admin verification.'
        );
    }
}