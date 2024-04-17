<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');


Route::get('/contacts', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/register/deelnemer', [ProfileController::class, 'showDeelnemerForm'])->name('deelnemer.register');
Route::get('/register/bedrijf', [ProfileController::class, 'showBedrijfForm'])->name('dbedrijf.register');


Route::get('/about', function () {
    return view('about');
});

require __DIR__ . '/auth.php';
