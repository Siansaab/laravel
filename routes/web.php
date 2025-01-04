<?php

use App\Http\Controllers\admincontroller;
use Illuminate\Support\Facades\Route;                                   
use Illuminate\Support\Facades\Auth;

// Admin Routes
Route::middleware(['auth'])->group(function () {
  Route::get('/admin', [admincontroller::class, 'index'])->name('dashboard.index');
  Route::get('/adminproduct', [admincontroller::class, 'product'])->name('dashboard.product');
  Route::get('/cart', [admincontroller::class, 'cart'])->name('dashboard.cart');
  Route::post('/addtocart', [admincontroller::class, 'addtocart']);
  Route::get('/viewcart', [admincontroller::class, 'viewcart']);
  Route::post('/addnewproduct', [admincontroller::class, 'addnewproduct']);
  Route::post('/updateproduct', [admincontroller::class, 'updateproduct']);
  Route::get('/deleteproduct/{id}', [admincontroller::class, 'deleteproduct']);
});

// Login Routes
Route::get('/login', [admincontroller::class, 'login'])->name('login');
Route::post('/loginaccount', [admincontroller::class, 'loginaccount'])->name('login.account');

// Logout Route
Route::post('/logout', function () {
  Auth::logout(); // Log the user out
  return redirect('/login'); // Redirect to login page
})->name('logout');
