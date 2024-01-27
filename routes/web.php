<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinkController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/signup", [AuthController::class, 'signup'])->name("auth.signup");
Route::post("/register", [AuthController::class, 'register'])->name("auth.register");
Route::get("/signin", [AuthController::class, 'signin'])->name("auth.signin");
Route::post("/login", [AuthController::class, 'login'])->name("auth.login");
Route::get("/logout", [AuthController::class, 'logout'])->name("auth.logout");


Route::get("/", [LinkController::class,'index'])->name("short.index");
Route::post("/", [LinkController::class,'store'])->name("short.store");
Route::get("/{short}", [LinkController::class, 'searchShort'])
		->where('short', '.*')
		->name("short.search");
Route::delete('/delete/{link}', [LinkController::class, 'deleteShort'])->name("short.delete");

