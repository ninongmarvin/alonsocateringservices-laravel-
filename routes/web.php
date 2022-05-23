<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $req) {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/ses', function (Request $request) {
  $request->session()->flush();
  return redirect()->back();
});

// Admin
Route::get('admin', [UserController::class, 'admin'])->name('admin');
// Admin

// Food
Route::get('/food', [FoodController::class, 'foods'])->name('food');
Route::post('add-food', [FoodController::class, 'add_food'])->name('add-food');
Route::post('add-selection', [FoodController::class, 'add_selection'])->name('add-selection');
Route::post('food-cart', [FoodController::class, 'food_cart'])->name('food-cart');
// Food

// Venues
Route::get('/venue', [VenueController::class, 'venues'])->name('venue');
Route::post('add-cities', [VenueController::class, 'add_cities'])->name('add-cities');
Route::post('venue-cart', [VenueController::class, 'venue_cart'])->name('venue-cart');
// Venues

// Services
Route::get('/catering-services', [CateringController::class, 'catering_services'])->name('catering-services');
Route::post('add-services', [CateringController::class, 'add_services'])->name('add-services');
Route::post('add-types', [CateringController::class, 'add_types'])->name('add-types');
Route::post('services-cart', [CateringController::class, 'services_cart'])->name('services-cart');
// Services

// Order
Route::post('turn-order', [OrderController::class, 'turn_order'])->name('turn-order');
Route::post('approve', [OrderController::class, 'approve'])->name('approve');
// Order
