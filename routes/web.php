<?php

use App\Http\Controllers\ContestController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [ContestController::class, 'index'])->name('contest');
Route::post('/contest', [ContestController::class, 'store'])->name('contest.store');

Route::get('/terminos-y-condiciones', function () {
    return view('welcome');
})->name('termsAndConditions');

Route::get('/politica-de-privacidad', function () {
    return view('welcome');
})->name('policies');


