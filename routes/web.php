<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::post('/signup', function () {
   
})->name('register');

Route::get('/login', function () {
    return view('login');
});

Route::get('/add-pet', function () {
    return view('add-pet');
});

Route::get('/find-pets', function () {
    return view('find-pets');
});

// Adopt Now button-e click korle form open hone-er route
Route::get('/adopt/{id}', function ($id) {
    return view('adopt-form');
});

// Form submit korle data save hone-er route
Route::post('/adoption/store', function () {
    return redirect('/find-pets')->with('success', 'Adoption request submitted!');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});