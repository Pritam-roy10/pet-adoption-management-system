<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Adoption;

class AdminController extends Controller
{

    public function manageUsers()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }


    public function managePets()
    {
        $pets = Pet::latest()->get();
        return view('admin.pets', compact('pets'));
    }

    public function approvePet($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'approved']);
        return back()->with('success', 'Pet listing approved successfully!');
    }

    public function rejectPet($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update(['status' => 'rejected']); 
        return back()->with('success', 'Pet listing rejected!');
    }


    public function manageAdoptions()
    {
        $requests = Adoption::latest()->get();
        return view('admin.adoptions', compact('requests'));
    }


    public function acceptAdoption($id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->update(['status' => 'approved']);
        return back()->with('success', 'Adoption request accepted successfully!');
    }

    public function rejectAdoption($id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->update(['status' => 'rejected']);
        return back()->with('success', 'Adoption request rejected!');
    }
}