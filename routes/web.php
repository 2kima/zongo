<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoissonController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\PoissonnerieController;
use App\Http\Controllers\CommandeController;



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/', DefaultController::class);
Route::resource('/poisson', PoissonController::class);
Route::post('/cartAdded', [DefaultController::class, 'cartAdded'])->name('index');
Route::resource('/client', ClientController::class);
Route::resource('/fournisseur', FournisseurController::class);
Route::resource('/commande', CommandeController::class);
Route::resource('/facture', FactureController::class);
Route::resource('/poissonnerie', poissonnerieController::class);

