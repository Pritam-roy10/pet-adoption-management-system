<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Adoption;

class AdminController extends Controller
{
<<<<<<< HEAD
    // ১. ইউজার অ্যাডমিন পেজ
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function manageUsers()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

<<<<<<< HEAD
    // ২. পেট রিকোয়েস্ট পেজ
=======
   
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function managePets()
    {
        $pets = Pet::latest()->get();
        return view('admin.pets', compact('pets'));
    }

<<<<<<< HEAD
    // পেট Approve করার জন্য
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function approvePet($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'approved']);
        return back()->with('success', 'Pet listing approved successfully!');
    }

<<<<<<< HEAD
    // পেট Reject করার জন্য
    public function rejectPet($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'rejected']); // চাইলে $pet->delete() ও দিতে পারো
        return back()->with('success', 'Pet listing rejected!');
    }

    // ৩. অ্যাডপশন রিকোয়েস্ট পেজ
=======
    
    public function rejectPet($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'rejected']); 
        return back()->with('success', 'Pet listing rejected!');
    }

    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function manageAdoptions()
    {
        $requests = Adoption::latest()->get();
        return view('admin.adoptions', compact('requests'));
    }

<<<<<<< HEAD
    // অ্যাডপশন Accept করার জন্য
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function acceptAdoption($id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->update(['status' => 'approved']);
        return back()->with('success', 'Adoption request accepted successfully!');
    }

<<<<<<< HEAD
    // অ্যাডপশন Reject করার জন্য
=======
    
>>>>>>> 258ba7caed6733567a35ad32773799e72aeda60b
    public function rejectAdoption($id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->update(['status' => 'rejected']);
        return back()->with('success', 'Adoption request rejected!');
    }
}