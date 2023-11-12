<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PorductController;
use App\Http\Controllers\LombaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/data', [PorductController::class, 'getProduct'])->name('dataproduct');
Route::post('/datastore', [PorductController::class, 'createProduct'])->name('createproduct');


// Route Lomba
Route::get('/lomba', [LombaController::class, 'index']);
Route::post('/storelomba', [LombaController::class, 'store']);
Route::post('/delete/{id}', [LombaController::class, 'destroy']);
