<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Adoption;

class AdminController extends Controller
{
    // ১. ইউজার অ্যাডমিন পেজ
    public function manageUsers()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    // ২. পেট রিকোয়েস্ট পেজ
    public function managePets()
    {
        $pets = Pet::latest()->get();
        return view('admin.pets', compact('pets'));
    }

    // পেট Approve করার জন্য
    public function approvePet($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'approved']);
        return back()->with('success', 'Pet listing approved successfully!');
    }

    // পেট Reject করার জন্য
    public function rejectPet($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'rejected']); // চাইলে $pet->delete() ও দিতে পারো
        return back()->with('success', 'Pet listing rejected!');
    }

    // ৩. অ্যাডপশন রিকোয়েস্ট পেজ
    public function manageAdoptions()
    {
        $requests = Adoption::latest()->get();
        return view('admin.adoptions', compact('requests'));
    }

    // অ্যাডপশন Accept করার জন্য
    public function acceptAdoption($id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->update(['status' => 'approved']);
        return back()->with('success', 'Adoption request accepted successfully!');
    }

    // অ্যাডপশন Reject করার জন্য
    public function rejectAdoption($id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->update(['status' => 'rejected']);
        return back()->with('success', 'Adoption request rejected!');
    }
}