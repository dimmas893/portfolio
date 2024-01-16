<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [WelcomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {
Route::prefix('profil')->group(function () {
    Route::get('',  [ProfilController::class, 'index']);
    Route::get('getData',  [ProfilController::class, 'getData']);
    Route::put('{id}',  [ProfilController::class, 'update']);
});
// });

require __DIR__ . '/auth.php';
