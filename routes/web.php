<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;

// হোম পেজ (নিশ্চিত করুন resources/views/home.blade.php ফাইলটি আছে এবং ভেতরে কোড লেখা আছে)
Route::get('/', function () {
    return view('home');
})->name('home');

// Auth Routes (Signup & Login Views)
Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/login', function () {
    return view('login');
})->name('login');

// Controller Action Routes (Authentication)
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // নাম পরিবর্তন করা হয়েছে
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Static Pages
Route::get('/add-pet', function () {
    return view('add-pet');
})->name('add.pet');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Pet Routes (Controller-সহ)
Route::get('/find-pets', [PetController::class, 'index'])->name('find.pets');
Route::post('/pets/store', [PetController::class, 'store'])->name('pets.store');

// Adoption Routes (Controller-সহ)
Route::get('/adopt/{id}', [AdoptionController::class, 'create'])->name('adopt.create');
Route::post('/submit-adoption', [AdoptionController::class, 'store'])->name('submit.adoption');

// Admin Panel Routes
Route::get('/admin/pets', [PetController::class, 'adminIndex'])->name('admin.pets');
Route::get('/admin/pet/approve/{id}', [PetController::class, 'approve'])->name('admin.pet.approve');
Route::get('/admin/pet/delete/{id}', [PetController::class, 'destroy'])->name('admin.pet.delete');


use App\Http\Controllers\AdminController;

Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
Route::get('/admin/pets', [AdminController::class, 'managePets'])->name('admin.pets');



// Adoption Admin Routes (AdminController-এর সাথে কানেক্ট করা)
Route::get('/admin/adoptions', [AdminController::class, 'manageAdoptions'])->name('admin.adoptions');
Route::get('/admin/adoption/accept/{id}', [AdminController::class, 'acceptAdoption'])->name('admin.adoptions.accept');
Route::get('/admin/adoption/reject/{id}', [AdminController::class, 'rejectAdoption'])->name('admin.adoptions.reject');




Route::get('/admin/pet/approve/{id}', [AdminController::class, 'approvePet'])->name('admin.pet.approve');
Route::get('/admin/pet/reject/{id}', [AdminController::class, 'rejectPet'])->name('admin.pet.delete');