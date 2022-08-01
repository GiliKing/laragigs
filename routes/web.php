<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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


// All listings
Route::get('/', [ListingController::class, 'index']);

// show create Form
Route::get('/li/create', [ListingController::class, 'create'])->middleware('auth');


// store listing data
Route::post('/li', [ListingController::class, 'store'])->middleware('auth');


// show edit form
Route::get('li/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');


// update listing
Route::put('/li/{listing}', [ListingController::class, 'update'])->middleware('auth');


// Delete listing
Route::delete('/li/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// manage listings

Route::get('/li/manage', [ListingController::class, 'manage'])->middleware('auth');

// single listing
Route::get('/li/{listing}', [ListingController::class, 'show']);


// show  Register/Create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');


// create New User
Route::post('/users', [UserController::class, 'store']);

//  logout user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// show login form

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


// login in user

Route::post('/users/authenticate', [UserController::class, 'authenticate']);


