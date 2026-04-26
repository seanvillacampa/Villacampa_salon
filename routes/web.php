<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookingController;
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

Route::get("/services", [ServiceController::class, "index"]);
Route::post("/services_form", [ServiceController::class, "store"]);
Route::get("/services/{id}/edit", [ServiceController::class, "edit"]);
Route::put("/services/{id}", [ServiceController::class, "update"]);
Route::delete("/services/{id}", [ServiceController::class, "delete"]);

Route::get("/bookings", [BookingController::class, "index"]);
Route::post("/bookings_form", [BookingController::class, "store"]);
Route::get("/bookings/{id}/edit", [BookingController::class, "edit"]);
Route::put("/bookings/{id}", [BookingController::class, "update"]);
Route::delete("/bookings/{id}", [BookingController::class, "delete"]);

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/paymenthistory', [PaymentController::class, 'history'])->name('payments.history');
Route::post('/payments/{booking}/mark-paid', [PaymentController::class, 'markAsPaid'])->name('payments.markAsPaid');

require __DIR__.'/auth.php';
