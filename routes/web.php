<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Models\Tour;

Route::get('/', [HomeController::class, 'index']);

Route::get('/destinations', [DestinationController::class, 'index']);

Route::get('/tours', function () {
    return view('touring');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/trip/{id}', function($id) {
    return view('trip.' . $id);
})->where('id', '[1-5]');

Route::get('/booking/{id}', function($id) {
    $tours = [
        1 => ['id'=>4, 'title'=>'Trip 1 Hari', 'price'=>350000, 'duration_days'=>1, 'max_people'=>12, 'description'=>'Paket trip 1 hari hidden gem Jawa Timur.'],
        2 => ['id'=>5, 'title'=>'Trip 2 Hari', 'price'=>550000, 'duration_days'=>2, 'max_people'=>10, 'description'=>'Paket trip 2 hari Jawa Timur.'],
        3 => ['id'=>6, 'title'=>'Trip 3 Hari', 'price'=>850000, 'duration_days'=>3, 'max_people'=>10, 'description'=>'Paket trip 3 hari Jawa Timur.'],
        4 => ['id'=>7, 'title'=>'Trip 4 Hari', 'price'=>1200000, 'duration_days'=>4, 'max_people'=>8, 'description'=>'Paket trip 4 hari Jawa Timur.'],
        5 => ['id'=>8, 'title'=>'Trip 5 Hari', 'price'=>1500000, 'duration_days'=>5, 'max_people'=>8, 'description'=>'Paket trip 5 hari Jawa Timur.'],
    ];
    $tour = (object) $tours[$id];
    return view('booking', compact('tour'));
})->where('id', '[1-5]');

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/docs', function () {
    $path = storage_path('api-docs/api-docs.json');
    return response()->file($path, ['Content-Type' => 'application/json']);
});

Route::get('/docs/api-docs.json', function () {
    return response()->file(storage_path('api-docs/api-docs.json'), ['Content-Type' => 'application/json']);
});