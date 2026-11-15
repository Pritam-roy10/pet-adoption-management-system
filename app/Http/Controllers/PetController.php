<?php

namespace App\Http\Controllers;

use App\Models\Pet;
<<<<<<< HEAD
use App\Models\Adoption; // ১. Adoption মডেলটি এখানে ইমপোর্ট করে নেওয়া হলো
=======
use App\Models\Adoption; 
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
use Illuminate\Http\Request;

class PetController extends Controller
{
<<<<<<< HEAD
    // ১. ইউজার যখন পেট পোস্ট সাবমিট করবে
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function store(Request $request)
    {
        $request->validate([
            'pet_name'     => 'required|string|max:50',
            'category'     => 'required',
            'gender'       => 'required',
            'age'          => 'required',
            'phone'        => 'required',
            'asking_price' => 'required|numeric',
            'location'     => 'required',
            'pet_image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:5242',
            'description'  => 'nullable|max:500',
        ]);

        $imagePath = null;
        if ($request->hasFile('pet_image')) {
            $image = $request->file('pet_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/pets'), $imageName);
            $imagePath = 'uploads/pets/' . $imageName;
        }

        Pet::create([
            'pet_name'     => $request->pet_name,
            'category'     => $request->category,
            'gender'       => $request->gender,
            'age'          => $request->age,
            'phone'        => $request->phone,
            'asking_price' => $request->asking_price,
            'location'     => $request->location,
            'pet_image'    => $imagePath,
            'description'  => $request->description,
<<<<<<< HEAD
            'status'       => 'pending', // অ্যাডমিন অ্যাপ্রুভ করার আগে পেন্ডিং থাকবে
=======
            'status'       => 'pending', 
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
        ]);

        return back()->with('success', 'Pet listing submitted successfully! Waiting for admin approval.');
    }

<<<<<<< HEAD
    // ২. সাধারণ ইউজারদের জন্য 'approved' পেটগুলো ফিল্টারসহ find-pets পেজে দেখানোর জন্য (অ্যাপ্রুভড অ্যাডপশন বাদ দিয়ে)
    public function index(Request $request)
    {
        // যে পেটগুলোর অ্যাডপশন অলরেডি 'approved' হয়ে গেছে, তাদের pet_id গুলো বের করে নেওয়া হলো
        $adoptedPetIds = Adoption::where('status', 'approved')->pluck('pet_id');

        // স্ট্যাটাস 'approved' এবং যেগুলো অলরেডি অ্যাডপ্ট হয়ে গেছে ($adoptedPetIds) সেগুলো বাদ দিয়ে কুয়েরি করা হলো
        $query = Pet::where('status', 'approved')
                    ->whereNotIn('id', $adoptedPetIds);

        // ক্যাটাগরি ফিল্টার
=======
    
    public function index(Request $request)
    {
        
        $adoptedPetIds = Adoption::where('status', 'approved')->pluck('pet_id');

        
        $query = Pet::where('status', 'approved')
                    ->whereNotIn('id', $adoptedPetIds);

        
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

<<<<<<< HEAD
        // জেন্ডার ফিল্টার
=======
        
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
        if ($request->has('gender') && $request->gender != '') {
            $query->where('gender', $request->gender);
        }

<<<<<<< HEAD
        // সার্চ বক্স ফিল্টার (নাম বা লোকেশন দিয়ে)
=======
        
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('pet_name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $pets = $query->latest()->get();

        return view('find-pets', compact('pets'));
    }

<<<<<<< HEAD
    // ৩. অ্যাডমিন প্যানেলে সব পেটের রিকোয়েস্ট (Pending + Approved) দেখানোর জন্য
=======
   
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function adminIndex()
    {
        $pets = Pet::latest()->get();
        return view('admin.pets', compact('pets'));
    }

<<<<<<< HEAD
    // ৪. অ্যাডমিন যখন পেট Approve করবে
=======
  
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function approve($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'approved']);
        return back()->with('success', 'Pet listing approved successfully!');
    }

<<<<<<< HEAD
    // ৫. অ্যাডমিন যখন পেট Delete করবে
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return back()->with('success', 'Pet listing deleted!');
    }
}




