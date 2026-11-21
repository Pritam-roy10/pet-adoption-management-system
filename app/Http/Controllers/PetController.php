<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Adoption;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pet_name'      => 'required|string|max:50',
            'category'      => 'required',
            'gender'        => 'required',
            'age'           => 'required',
            'phone'         => 'required',
            'asking_price'  => 'required|numeric',
            'payout_number' => 'required|regex:/^01[3-9]\d{8}$/',
            'location'      => 'required',
            'pet_image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:5242',
            'description'   => 'nullable|max:500',
        ]);

        $imagePath = null;
        if ($request->hasFile('pet_image')) {
            $image = $request->file('pet_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/pets'), $imageName);
            $imagePath = 'uploads/pets/' . $imageName;
        }

        
        $askingPrice = (float) $request->asking_price;
        $serviceFee  = $askingPrice * 0.10; 
        $locationLower = strtolower($request->location);
        $transportFee  = (str_contains($locationLower, 'dhaka') || str_contains($locationLower, 'saidpur'))
            ? 200
            : 350;

        $offeredPrice = max(0, round($askingPrice - $serviceFee - $transportFee, 2));

        Pet::create([
            'pet_name'      => $request->pet_name,
            'category'      => $request->category,
            'gender'        => $request->gender,
            'age'           => $request->age,
            'phone'         => $request->phone,
            'asking_price'  => $askingPrice,
            'offered_price' => $offeredPrice,
            'payout_number' => $request->payout_number,
            'payout_trx_id' => null,
            'payout_status' => 'unpaid',
            'location'      => $request->location,
            'pet_image'     => $imagePath,
            'description'   => $request->description,
            'status'        => 'pending',
        ]);

        return back()->with('success', 'Your pet sale listing has been submitted.');
    }

    public function index(Request $request)
    {
        $adoptedPetIds = Adoption::where('status', 'approved')->pluck('pet_id');

        $query = Pet::where('status', 'approved')
                    ->whereNotIn('id', $adoptedPetIds);

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        if ($request->has('gender') && $request->gender != '') {
            $query->where('gender', $request->gender);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('pet_name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $pets = $query->latest()->get();

        return view('find-pets', compact('pets'));
    }

    public function adminIndex()
    {
        $pets = Pet::latest()->get();
        return view('admin.pets', compact('pets'));
    }

    public function approve($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'approved']);
        return back()->with('success', 'Pet listing approved successfully!');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return back()->with('success', 'Pet listing deleted!');
    }


public function markPaid(Request $request, $id)
{
    $request->validate([
        'payout_trx_id' => 'required|string|max:50',
    ]);

    $pet = Pet::findOrFail($id);
    $pet->update([
        'payout_trx_id' => $request->payout_trx_id,
        'payout_status' => 'paid',
    ]);

    return back()->with('success', 'Payout marked as paid with TrxID!');
}



}