<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pets', [PetController::class, 'index']);
Route::get('/edit-pets/{id}', [PetController::class, 'showEditForm']);
Route::post('/save-edit-pets', [PetController::class, 'savePetsChanges']);
Route::get('/add-new-pet-form', [PetController::class, 'showNewForm']);
Route::post('/save-new-pet', [PetController::class, 'saveNewPet']);
Route::get('/delete-pets/{id}', [PetController::class, 'deletePet']);
