<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinkController;
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


Route::get("/", [LinkController::class,'index'])->name("short.index");
Route::post("/", [LinkController::class,'store'])->name("short.store");
Route::get("/{short}", [LinkController::class, 'searchShort'])
		->where('short', '.*')
		->name("short.search");
Route::delete('/delete/{link}', [LinkController::class, 'deleteShort'])->name("short.delete");
